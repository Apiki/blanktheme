import React from 'react';
import { extract } from '../utils';

const FontItem = (props) => (
	<div className="gb-font-item" key={ props.data.key }>
		<div className="gb-font-preview" style={{ fontFamily: props.data.value }}>Abcde</div>
		<div className="gb-font-info">
			<input className="gb-font-slug" readOnly type="text" value={ props.data.key } />
			<input className="gb-font-name" readOnly type="text" value={ props.data.value } />
		</div>
	</div>
);

const FontsBook = (props) => {
	let fonts = extract( props.data.value );

	return(
		<div key={ props.data.key }>
			<h3 className="gb-label">{ props.data.key }</h3>

			<div className="gb-list">
			{fonts.map( (item) => {
				return item.value ? <FontItem data={ item } /> : '';
			})}
			</div>

			<hr/>
		</div>
	);
};

export default FontsBook;
