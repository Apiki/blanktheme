module.exports = {
	dev: {
		expand: true,
        cwd: 'riot',
        src: '**/*.tag',
        dest: '<%= paths.js %>/templates',
        ext: '.js'
	}
}