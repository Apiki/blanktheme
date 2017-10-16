import React from 'react';

const Color = ({data}) => (
	<div className="ui-color-card" key={data.key}>
		<div className="ui-color-swatch" style={{background: data.value}}></div>
		<p className="ui-color-name">{data.key}</p>
		<p className="ui-color-hex">HEX: {data.value}</p>
	</div>
);

export { Color };
