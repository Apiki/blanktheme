import React from 'react';

const style = {
	component: {
		display: 'flex',
		flexWrap: 'wrap',
		fontFamily: 'inherit',
		justifyContent: 'space-between',
		width: 95,
	},

	fill: {
		boxShadow: 'inset 0 0 3px rgba(0, 0, 0, .5)',
		borderRadius: 35,
		cursor: 'pointer',
		height: 35,
		position: 'relative',
		width: 35,
	},

	info: {
		display: 'flex',
		flexWrap: 'wrap',
		height: 35,
		fontFamily: 'inherit',
		width: 50,
	},

	text: {
		border: 'none',
		display: 'block',
		flexGrow: 1,
		fontFamily: 'inherit',
		fontSize: 14,
		outline: 0,
	}
};

const hex = Object.assign(
	{},
	style.text,
	{
		color: '#909090',
		fontSize: 12
	}
);

const Color = (props) => (
	<div style={ style.component }>
		<div style={ Object.assign( style.fill, { background: '#07a' } ) }></div>

		<div style={ style.info }>
			<span style={ style.text }>base</span>
			<span style={ hex } >#07a</span>
		</div>
	</div>
);

export default Color;
