import React from 'react';

const GbIcon = ({prefix, icon}) => (
	<div className="gb-icon-card">
		<div className="gb-icon-thumbnail">
			<i className={prefix + icon}></i>
		</div>
		<div className="gb-icon-copy">
			<h5 className="gb-icon-title">{icon}</h5>
		</div>
	</div>
);

export default GbIcon;
