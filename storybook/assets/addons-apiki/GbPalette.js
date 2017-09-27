import React from 'react';
import { extract } from './helpers';
import { GbColor, GbGridItems } from './';

const GbPalette = ({data}) => {
	let palette = extract( data.value );

	return(
		<GbGridItems>
			<h3 className="gb-section-header-small">{data.key}</h3>

			{palette.map( color => {
				return color.value ? <GbColor data={color}/> : '';
			})}
		</GbGridItems>
	)
};

export default GbPalette;
