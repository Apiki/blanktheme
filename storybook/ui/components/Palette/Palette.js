import React from 'react';
import { extract } from 'ui/helpers';
import { Grid, Color } from 'ui';

const Palette = ({data})=> {
	const palette = extract( data.value );

	return (
		<Grid>
			<h3 className="ui-section-header-small">{data.key}</h3>

			{palette.map( color => (
				<Color data={color} />
			))}
		</Grid>
	);
};

export { Palette };
