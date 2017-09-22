import React from 'react';
import { storiesOf } from '@storybook/react';
import Highlight from 'react-highlight';
import Component from 'utilities/component';
import Color from 'utilities/colors';

export default storiesOf( 'Basics', module )
	.add( 'Colors', () => (
		<Component>
			<h2>Color Palette</h2>

			<h3>Preview</h3>
			<Color />

			<hr />

			<h3>Usage</h3>
			<p>The color function accepts two parameters $color and $variation, $variation is optional.</p>
			<Highlight>
				{'color( $color, $variation: base );'}
			</Highlight>
		</Component>
	))
	.add( 'Fonts', () => (
		<div>
			Here will go Font book
		</div>
	))
	.add( 'Icons', () => (
		<div>
			Here will go Icons book
		</div>
	));
