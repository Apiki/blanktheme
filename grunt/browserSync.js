module.exports = {
	dev: {
		options: {
			proxy: 'localhost/ghost-full',
			files: ['style.css', 'assets/javascripts/built.js', '**/*.php'],
			watchTask: true,
			logConnections: true,
			notify: true,
			port: 8080
		}
	}
};