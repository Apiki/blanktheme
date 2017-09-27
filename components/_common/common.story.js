import React from 'react';
import sassToJs from 'sass-to-js';
import { extract } from 'helpers/utils';
import { storiesOf } from '@storybook/react';

import Highlight from 'react-highlight';
import FontsBook from 'helpers/components/FontsBook';
import IconsBook from 'helpers/components/IconsBook';
import ColorsPalette from 'helpers/components/ColorsPalette';
import WrapperComponent from 'helpers/components/WrapperComponent';

const icons          = require( 'assets/fonts/icon/selection.json' );
const colorsPalettes = extract( sassToJs( document.getElementById( 'root' ), { pseudoEl: ':after', cssProperty: 'content' } ) );
const fontsBook      = extract( sassToJs( document.getElementById( 'root' ), { pseudoEl: ':before', cssProperty: 'content' } ) );

storiesOf( 'Project Commons', module )
	.add( 'Colors Palette', () => (
		<WrapperComponent>
			<h2>Color Palette</h2>

			{colorsPalettes.map( (palette) => (
				<ColorsPalette data={ palette } />
			))}

			<h3>Usage</h3>
			<p>The color function accepts two parameters $color and $variation, $variation is optional.</p>
			<Highlight className="sass">
				{'color( $color, $variation: base );  // ex: color( primary, lighten );'}
			</Highlight>
		</WrapperComponent>
	))
	.add( 'Fonts Book', () => (
		<WrapperComponent>
			<h2>Color Palette</h2>

			{fontsBook.map( (book, index) => (
				<FontsBook data={book} />
			))}

			<h3>Usage</h3>
			<p>The color function accepts two parameters $color and $variation, $variation is optional.</p>
			<Highlight className="sass">
				{'font( $font, $variation: base );  // ex: font( primary, bold );'}
			</Highlight>
		</WrapperComponent>
	))
	.add( 'Icons Book', () => (
		<WrapperComponent>
			<h2>Icons Book</h2>

			<IconsBook data={ icons }/>
		</WrapperComponent>
	));
