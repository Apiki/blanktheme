import React from 'react';
import { extract } from 'ui/helpers';
import { Grid, Type } from 'ui';

const Typography = ({data}) => {
	const types   = extract( data.value );
	const primary = types.map( type => {
		if ( type.key == 'base' ) {
			return type.value;
		}
	});

	return(
		<Grid style={{marginTop: 50}}>
			<h2 className="ui-section-header-large">{data.key} Typeface</h2>
			<h3 className="ui-typography-example">{primary}</h3>

			{types.map( type => (
				type.value && <Type data={type}/>
			))}
		</Grid>
	);
};

export { Typography };
