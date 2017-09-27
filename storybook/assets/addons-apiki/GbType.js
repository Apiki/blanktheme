import React from 'react';

const GbType = ({data}) => (
	<div className="gb-type-card">
		<h4 className="gb-type-slug">{data.key}</h4>
		<h5 className="gb-type-name">{data.value}</h5>
		<h3 className="gb-type-example" style={{fontFamily: data.value}}>ABCDEFGHIJKLM</h3>
		<h3 className="gb-type-example" style={{fontFamily: data.value}}>abcdefghijklm</h3>
	</div>
);

export default GbType;
