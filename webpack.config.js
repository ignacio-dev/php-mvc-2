module.exports = {
	entry: './public/js/src/script.js',
	output: {
		path: __dirname + '/public/js/dist',
		filename: 'script.bundle.js'
	},
	module: {
		rules: [{
			exclude: '/node_modules',
			loader: 'babel-loader'
		}]
	},
	watch: true
};