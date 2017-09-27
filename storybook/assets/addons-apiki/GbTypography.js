import React from 'react';
import { extract } from './helpers';
import { GbType, GbGridItems } from './';

const GbTypography = ({data}) => {
	let typefaces = extract( data.value );

	return(
		<GbGridItems>
			<h2 className="gb-section-header-large">{data.key} Typeface</h2>
			<h3 className="gb-typography-example">{typefaces[0].value}</h3>

			{typefaces.map( typeface => {
				return typeface.value ? <GbType data={typeface}/> : '';
			})}
		</GbGridItems>
	);
};

export default GbTypography;
