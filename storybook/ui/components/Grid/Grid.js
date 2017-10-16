import React from 'react';

const Grid = ({children, style}) => (
	<div className="ui-grid" style={style}>
		{children}
	</div>
);

export { Grid };
