import React from 'react';
import Clipboard from 'clipboard';

const IconsBook = (props) => {
	const data   = props.data.icons;
	const prefix = props.data.preferences.fontPref.prefix;
	// const clipboard = new Clipboard( '.icon' );

	return(
		<div>
			<ul className="gb-list-icons gb-list">
				{data.map( (icon) => (
					<li className="icon" data-clipboard-text={ prefix + icon.properties.name } key={ icon.properties.name }><i className={ prefix + icon.properties.name }></i></li>
				))}
			</ul>

			<div className="gb-message">Copied to clipboard</div>
		</div>
	);
};

export default IconsBook;
