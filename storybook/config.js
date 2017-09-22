import { configure } from '@storybook/react';
import './assets/assets.js';

const req = require.context( '../components', true, /\.story\.js$/ )

function loadStories() {
	req.keys().forEach( (filename) => req( filename ) )
}

configure(loadStories, module);
