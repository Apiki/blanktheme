import React from 'react';
import Highlight from 'react-highlight';
import { storiesOf } from '@storybook/react';
import { Page, Palette, Typography, Package, Code } from 'ui';
import { colors, typefaces, iconPackage } from './data';

storiesOf( 'StyleGuide', module )
	.add( 'Colors', () => (
		<Page title="Colors">
			<h2>Palette</h2>

			{colors.map( palette => (
				<Palette data={palette} />
			))}

			<h2>Usage</h2>
			<Highlight className="scss">
				{`// file.scss`}
			</Highlight>
			<Highlight className="scss">
				{`color( $color, $variation );`}<br />
				{`// -- Example: color( primary, lighten );`}
			</Highlight>
		</Page>
	))
	.add( 'Typography', () => (
		<Page title="Typography">
			<h2>Typefaces</h2>

			{typefaces.map( type => (
				<Typography data={type} />
			))}

			<h2>Usage</h2>
			<Highlight className="scss">
				{`// file.scss`}
			</Highlight>
			<Highlight className="scss">
				{`font( $font, $variation );`}<br/>
				{`// -- Example: font( primary, bold );`}
			</Highlight>
		</Page>
	))
	.add( 'Icon Package', () => (
		<Page title="Icon Package">
			<h2>Package</h2>

			{<Package storage={iconPackage} />}

			<h2>Usage</h2>
			<Highlight className="html">
				{`<!-- file.html -->`}
			</Highlight>
			<Code lang='html'><i class="icon-g-{icon-name}"></i></Code>
		</Page>
	))
;
