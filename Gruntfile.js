module.exports = function(grunt) {
	require('load-grunt-tasks')(grunt);
	require('time-grunt')(grunt);

	var options = {
		config : {
			src : 'grunt-tasks/*.js'
		},
		paths : {
			style : 'assets/stylesheets',
			js    : 'assets/javascripts'
		}
	};

	var configs = require('load-grunt-configs')(grunt, options);

	grunt.initConfig(configs);

	grunt.registerTask('default', ['concurrent:dev']);
	grunt.registerTask('deploy', ['concurrent:dist', 'uglify']);
};