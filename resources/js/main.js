try {
    window.$ = window.jQuery = require( 'jquery' );
    require( './../../node_modules/bootstrap/dist/js/bootstrap.min.js' );
} catch ( e ) {}

console.log( 'script inits' );
