import React from 'react';

const Type = ({data}) => (
	<div className="ui-type-card">
		<h4 className="ui-type-slug">{data.key}</h4>
		<h5 className="ui-type-name">{data.value}</h5>
		<h3 className="ui-type-example" style={{fontFamily: data.value}}>ABCDEFGHIJKLM</h3>
		<h3 className="ui-type-example" style={{fontFamily: data.value}}>abcdefghijklm</h3>
	</div>
);

export { Type };
