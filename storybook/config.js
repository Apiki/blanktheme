import { configure } from '@storybook/react';
import '../assets/stylesheets/style.scss';
import './assets/bootstrap.css';
import 'highlight.js/styles/github-gist.css';

const req = require.context( '../components', true, /\.story\.js$/ )

function loadStories() {
	req.keys().forEach( (filename) => req( filename ) )
}

configure(loadStories, module);
