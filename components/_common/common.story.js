import React from 'react';
import sassToJs from 'sass-to-js';
import { storiesOf } from '@storybook/react';
import { extract } from 'addons/helpers';
import {
	GbPage,
	GbPalette,
	GbTypography,
	GbIconPackage,
	GbBlockCode
} from 'addons';

const palettes  = extract(
	sassToJs( document.getElementById( 'root' ),
	{ pseudoEl: ':after', cssProperty: 'content' } )
);

const typefaces = extract(
	sassToJs( document.getElementById( 'root' ),
	{ pseudoEl: ':before', cssProperty: 'content' } )
);

const iconPackage = require( 'assets/fonts/icon/selection.json' );

const textColors = extract( palettes[3].value );

storiesOf( 'Style', module )
	.add( 'Color', () => (
		<GbPage title="Color">
			<h2>Palette</h2>

			<p><strong>Lorem Ipsum</strong> é simplesmente uma simulação de texto da indústria
			tipográfica e de impressos, e vem sendo utilizado desde o século XVI,
			quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou
			para fazer um livro de modelos de tipos.</p>

			{palettes.map( palette => (
				<GbPalette data={palette} />
			))}

			<h2>Usage</h2>

			<GbBlockCode language="sass">
				color( $color, $variation: base ); // color( primary, light );
			</GbBlockCode>

		</GbPage>
	))
	.add( 'Typography', () => (
		<GbPage title="Typography">
			<p>Lorem Ipsum sobreviveu não só a cinco séculos, como também ao salto para a
			editoração eletrônica, permanecendo essencialmente inalterado.</p>

			<h2>Typefaces</h2>

			{typefaces.map( typeface => (
				<GbTypography data={typeface} />
			))}
		</GbPage>
	))
	.add( 'Icons', () => (
		<GbPage title="Icons">
			<h2>Package</h2>

			<GbIconPackage storage={iconPackage} />

			<h2>Usage</h2>

		</GbPage>
	));
