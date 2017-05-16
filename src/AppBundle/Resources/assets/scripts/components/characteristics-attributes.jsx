import React from 'react'
import Highcharts from 'highcharts'

export default class extends React.Component {
    constructor(props) {
        super(props);

        this.state = {selectedAttributesIds: []};

        this.attributeCheckboxChangeHandler = this.attributeCheckboxChangeHandler.bind(this);
    }

    componentDidMount() {
        this.chart = Highcharts.chart('chart', {
            chart: {
                type: 'column'
            },
            yAxis: {
                title: 'Frequency',
            },
            xAxis: {
                title: 'Attributes',
                type: "category"
            },
            title: {
                text: 'Attributes'
            },
            series: [{
                name: 'Frequency',
                data: this.getAttributesSeries()
            }]
        });
    }

    componentDidUpdate(prevProps, prevState) {
        if (prevState.selectedAttributesIds !== this.state.selectedAttributesIds) {
            console.log(this.getAttributesSeries());
            this.chart.series[0].update({
                data: this.getAttributesSeries()
            });
        }
    }

    attributeCheckboxChangeHandler(attribute) {
        let selectedAttributesIds = this.state.selectedAttributesIds.slice(),
            index = selectedAttributesIds.indexOf(attribute.id);

        if (index === -1) {
            selectedAttributesIds.push(attribute.id);
        } else {
            selectedAttributesIds.splice(index, 1);
        }

        this.setState({
            selectedAttributesIds: selectedAttributesIds
        });
    }

    isAttributeChecked(attribute) {
        return this.state.selectedAttributesIds.indexOf(attribute.id) !== -1;
    }

    topLevelCharacteristics() {
        return this.props.characteristics.filter(function (characteristic) {
            return !characteristic.parent;
        });
    }

    getAttributesSeries() {
        return this.props.attributes.map((attribute) => {
            let data = {y: attribute.characteristics.length, name: attribute.name};
            if (this.isAttributeChecked(attribute)) {
                data.color = '#777';
            }
            return data
        });
    }

    render() {
        return (
            <div>
                {this.topLevelCharacteristics().map((characteristic) => {
                    return <div className="panel panel-primary" key={characteristic.id}>
                        <div className="panel-heading">{characteristic.name}</div>
                        <div className="panel-body">
                            {characteristic.children.map((child) => {
                                return <div className="panel panel-info" key={child.id}>
                                    <div className="panel-heading">{child.name}</div>
                                    <div className="panel-body">
                                        {child.attributes.map((attribute) => {
                                            return <div className="checkbox" key={attribute.id}>
                                                <label>
                                                    <input type="checkbox"
                                                           onChange={this.attributeCheckboxChangeHandler.bind(this, attribute)}
                                                           checked={this.isAttributeChecked(attribute)}/>
                                                    {attribute.name} {' '}
                                                    {attribute.characteristics.length}/{this.props.attributes.length}
                                                </label>
                                            </div>
                                        })}
                                    </div>
                                </div>
                            })}
                        </div>
                    </div>
                })}

                <div className="panel panel-primary">
                    <div className="panel-heading">Quality diagram</div>
                    <div className="panel-body">
                        <div id="chart"></div>
                    </div>
                </div>
            </div>
        );
    }
}
