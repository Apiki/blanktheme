import React from 'react';
import { extract } from 'ui/helpers';
import { Grid, Icon } from '../..';

const Package = ({storage})=> {
	const { icons, preferences } = storage;
	const prefix                 = preferences.fontPref.prefix;

	return(
		<Grid>
			{icons.map( ({properties}) => (
				<Icon key={properties.name} prefix={prefix} icon={properties.name} />
			))}
		</Grid>
	);
};

export { Package };
