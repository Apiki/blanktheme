import React from 'react';
import { storiesOf } from '@storybook/react';
import Highlight from 'react-highlight';

export default storiesOf( 'Basics', module )
	.add( 'Colors', () => (
		<div>
			Here will go color pallet
		</div>
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
