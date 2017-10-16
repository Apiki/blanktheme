import React from 'react';
import strclass from 'strclass';

const Snippet = ({size, style, children}) => (
	<p className={strclass( {size}, 'ui-code-snippet' )} style={style}>
		{children}
	</p>
);

export { Snippet };
