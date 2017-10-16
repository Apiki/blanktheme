import sassToJs from 'sass-to-js';
import { extract } from 'ui/helpers';

export const colors = extract(
	sassToJs(
		document.getElementById( 'root' ),
		{
			pseudoEl: ':after',
			cssProperty: 'content'
		}
	)
);

export const typefaces = extract(
	sassToJs(
		document.getElementById( 'root' ),
		{
			pseudoEl: ':before',
			cssProperty: 'content'
		}
	)
);

export const iconPackage = require( 'assets/fonts/icon/selection.json' );
