module.exports = {
	dev: {
		options: {
			proxy: exec('wp option get siteurl', {silent:true}).stdout,
			files: ['style.css', 'assets/javascripts/built.js', '**/*.php'],
			watchTask: true,
			logConnections: true,
			notify: true,
			port: 8080
		}
	}
};
