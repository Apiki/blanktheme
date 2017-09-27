import React from 'react';

const GbPage = ({title, children}) => (
	<div className="gb-page">
		<header className="gb-page-header">
			<h1 className="gb-page-title">{title ? title : 'Missing title attribute'}</h1>
		</header>

		<section className="gb-section">
			{children}
		</section>
	</div>
);

export default GbPage;
