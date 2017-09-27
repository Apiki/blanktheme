import React from 'react';

const GbCodeSnippet = ({children, style, size}) => (
	<p className={ `gb-code-snippet ${size}` } style={style}>
		{children}
	</p>
);

export default GbCodeSnippet;
