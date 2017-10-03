import React from 'react';

const Header = ({title}) => (
	<header className="ui-page-header">
		<h1 className="ui-page-title">{title ? title : 'Missing title attribute'}</h1>
	</header>
);

export default Header;
