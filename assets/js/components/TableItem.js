import React, {Component} from 'react';

class TableItem extends Component
{
    constructor(props) {
        super(props);
        this.rate = props.rate;
    }

    render () {
      return (
          <tr>
              <td>{this.rate.effectiveDate}</td>
              <td>{this.rate.mid}</td>
          </tr>
      )
    }
}


export default TableItem;