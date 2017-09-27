import React from 'react';
import { extract } from '../utils';

const ColorItem = (props) => (
	<div className="gb-color-item" key={ props.data.key }>
		<div className="gb-color-preview" style={{ background: props.data.value }}></div>
		<div className="gb-color-info">
			<input className="gb-color-name" readOnly type="text" value={ props.data.key } />
			<input className="gb-color-hex" readOnly type="text" value={ props.data.value } />
		</div>
	</div>
);

const ColorsPalette = (props) => {
	let palette = extract( props.data.value );

	return(
		<div key={ props.data.key }>
			<h3 className="gb-label">{ props.data.key }</h3>

			<div className="gb-list">
			{palette.map( (item) => {
				return item.value ? <ColorItem data={ item }/> : '';
			})}
			</div>

			<hr/>
		</div>
	);
};

export default ColorsPalette;
