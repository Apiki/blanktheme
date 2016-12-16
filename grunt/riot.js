module.exports = {
	options: {
		concat: true
	},
	dev: {
		src: 'riot/**/*.tag',
		dest: '<%= paths.js %>/templates/tags.js'
	}
}