const mix = require('laravel-mix');
const SpriteLoaderPlugin = require('svg-sprite-loader/plugin');
const ImageminPlugin = require('imagemin-webpack-plugin').default;
const sortCSSmq = require('sort-css-media-queries');


mix.browserSync('vmmoto');

mix.disableNotifications();
mix.copy( 'resources/assets/images', 'public/images', false );
mix.copy( 'resources/assets/fonts', 'public/fonts', false );
mix.copy( 'resources/assets/favicons', 'public/favicons', false );

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css').sourceMaps().options({
	postCss: [
		require('css-mqpacker')({
			sort: sortCSSmq
		})
	]
});

mix.webpackConfig({
	devtool: "inline-source-map",
	plugins: [
		new SpriteLoaderPlugin({ plainSprite: true }),
		new ImageminPlugin({
			test: /\.(svg)$/i
		})
	],
    module: {
	    rules: [
	    	{
	    		test: /\.svg$/,
	    		use: [{
	    			loader: 'svg-sprite-loader',
	    			options: {
	    				extract: true,
	    				spriteFilename: svgPath => `./svg/sprite.svg`
	    			}
				}]
	    	}
	    ]
    }
});
