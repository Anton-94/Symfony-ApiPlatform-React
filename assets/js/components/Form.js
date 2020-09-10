import React, { Component } from 'react';
import ReactDom from 'react-dom';
import DatePicker from 'react-datepicker';

import 'react-datepicker/dist/react-datepicker.css';
import Table from "./Table";

class Form extends Component
{
    constructor(props) {
        super(props);
        this.state = {
            date: new Date(),
            currency: 'EUR',
            items: {},
            error: null
        };
        this.table = null;
        this.reactDom = ReactDom;

        this.handleChange = this.handleChange.bind(this);
        this.handleSelect = this.handleSelect.bind(this);
        this.handleClick = this.handleClick.bind(this);
    }

    handleChange(date) {
        this.setState({
            date: date
        })
    }

    handleSelect(event) {
        this.setState({
            currency: event.target.value
        })
    }

    handleClick(event) {
        let date = this.state.date.toISOString().slice(0,10);
        let currency = this.state.currency;
        fetch(`/exchange-rates/${currency}?date=${date}`, {
            method: 'GET',
        })
        .then(response => response.json())
        .then(
            (result) => {
                if (result.status === 200) {
                    let key = date + currency;
                    this.table = <Table currencyData={result.data} key={key}/>
                    this.setState({
                        items: result.data,
                        error: null
                    });
                } else {
                    this.setState({error: result.error});
                }

            },
        );
        event.preventDefault();
    }

    render() {
        return (
            <>
                <form>
                    <div className="form-group">
                        <label className="mr-2"> Select currency:</label>
                        <select value={this.state.currency} onChange={this.handleSelect}>
                            <option value="EUR">Euro</option>
                            <option value="USD">American dollar</option>
                            <option value="UAH">Ukrainian hryvnia</option>
                        </select>
                    </div>
                    <div className="form-group">
                        <label className="mr-2">Select Date: </label>
                        <DatePicker
                            selected={ this.state.date }
                            onChange={ this.handleChange }
                            name="date"
                            dateFormat="Y-M-d"
                        />
                    </div>
                    {this.state.error ? <div className="alert alert-danger">{this.state.error}</div> : ''}
                    <input type="submit" value="Submit" onClick={this.handleClick} />
                </form>
                <div id="table">
                    {this.table}
                </div>
            </>
        );
    }
}

export default Form;