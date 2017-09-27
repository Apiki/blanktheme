import React from 'react';
import { GbGridItems, GbIcon } from './';

const GbIconPackage = ({storage}) => {
	let pack = storage.icons;
	let prefix  = storage.preferences.fontPref.prefix;

	return(
		<GbGridItems>
			{pack.map( icon => (
				<GbIcon key={icon.properties.name} prefix={prefix} icon={icon.properties.name} />
			))}
		</GbGridItems>
	);
};

export default GbIconPackage;
