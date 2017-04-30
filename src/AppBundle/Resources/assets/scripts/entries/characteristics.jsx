import React from 'react'
import ReactDOM from 'react-dom'
import CharacteristicsAttributes from '../components/characteristics-attributes.jsx'

let characteristicsEl = document.getElementById('characteristics');

ReactDOM.render(
    <CharacteristicsAttributes characteristics={JSON.parse(characteristicsEl.getAttribute('data-characteristics'))}
                              attributes={JSON.parse(characteristicsEl.getAttribute('data-attributes'))}
    />,
    characteristicsEl
);
