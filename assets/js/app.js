import '../css/app.css';

import React, { Component } from 'react';
import ReactDom from 'react-dom';

import Form from "./components/Form";

class App extends Component {
    render() {
        return (
            <>
                <h2>Exchage rates</h2>
                <Form />
            </>
        )
    }
}

ReactDom.render(<App />, document.getElementById('root'));
