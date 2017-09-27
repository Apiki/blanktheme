import React from 'react';

const GbColor = ({data}) => (
	<div className="gb-color-card" key={data.key}>
		<div className="gb-color-swatch" style={{background: data.value}}></div>
		<p className="gb-color-name">{data.key}</p>
		<p className="gb-color-hex">HEX: {data.value}</p>
	</div>
);

export default GbColor;
