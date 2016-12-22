module.exports = {
	target: {
		options: {
			cwd: '../',
			domainPath: 'languages/',
			exclude: ['vendor', 'ghost'],
			type: 'wp-theme',
			potHeaders : {
				poedit: true
			}
		}
	}
};
