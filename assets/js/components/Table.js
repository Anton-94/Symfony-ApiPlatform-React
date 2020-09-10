import React, {Component} from 'react';
import TableItem from "./TableItem";

class Table extends Component
{
    constructor(props) {
        super(props);
        this.rate = [];
        this.currencyData = props.currencyData;
        if(Object.keys(props.currencyData).length > 0) {
            this.rate = props.currencyData.rates.map((rate, index) =>
                <TableItem key={index} rate={rate} />
            );
        }
    }

    render(){
        return (
            <>
                <div className="row mt-5">
                    <div className="col-3">Currency: <span>{this.currencyData.currency}</span></div>
                    <div className="col-9">Currency code: <span>{this.currencyData.currencyCode}</span></div>
                </div>
                <table className="table table-striped">
                    <thead>
                    <tr>
                        <td>Date</td>
                        <td>Price</td>
                    </tr>
                    </thead>
                    <tbody>
                        {this.rate}
                    </tbody>
                </table>
            </>
        )
    }
}

export default Table;