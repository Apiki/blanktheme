import React from 'react';

const Icon = ({prefix, icon}) => (
	<div className="ui-icon-card">
		<div className="ui-icon-thumbnail">
			<i className={prefix + icon}></i>
		</div>
		<div className="ui-icon-copy">
			<h5 className="ui-icon-title">{icon}</h5>
		</div>
	</div>
);

export { Icon };
