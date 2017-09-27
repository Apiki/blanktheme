import React from 'react';
import Highlight from 'react-highlight';
import reactElementToJsxString from 'react-element-to-jsx-string';

const GbBlockCode = ({children, language}) => (
	<Highlight className={language}>
		{reactElementToJsxString(
			children
		)}
	</Highlight>
);

export default GbBlockCode;
