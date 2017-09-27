import { configure } from '@storybook/react';

// :: Load theme styles
import '../assets/stylesheets/style.scss';

// :: Load apiki storybook styles
import './assets/stylesheets/storybook.scss';

// :: Load highlight styles theme
import 'highlight.js/styles/atom-one-light.css';

const req = require.context( '../components', true, /\.story\.js$/ );

function loadStories() {
	req.keys().forEach( (filename) => req( filename ) );
}

configure(loadStories, module);
