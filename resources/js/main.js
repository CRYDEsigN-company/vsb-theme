try {
    window.$ = window.jQuery = require( 'jquery' );
    require( './../../node_modules/bootstrap/dist/js/bootstrap.min.js' );
} catch ( e ) {}

var $ = require( 'jquery-form' );

console.log( 'script inits' );
