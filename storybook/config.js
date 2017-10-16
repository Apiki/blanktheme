import { configure } from '@storybook/react';
import { setOptions } from '@storybook/addon-options';

import 'assets/stylesheets/style.scss';
import 'ui/stylesheets/ui.scss';
import 'highlight.js/styles/atom-one-light.css';

setOptions({
	name: 'Project UI',
	url : '#',
	downPanelInRight: false,
	showDownPanel: false,
});

const req = require.context( '../components', true, /\.story\.js$/ );

function loadStories() {
	req.keys().forEach( (filename) => req( filename ) );
}

configure(loadStories, module);
