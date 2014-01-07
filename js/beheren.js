/*
=======================================================================
= 						Plaintech beheren.js 						  =
=					  	under construction							  =
=======================================================================
*/

/*
* al basic variables
*/

	var CPU = 1;
	var CPUSPEED = 1.6;
	var memory = 512;
	var HHD = 20;
	var IPAdres = '192.168.1.1';
	var status = 'running';

/*
* Function that autoload al basic info form the Virual machines
*/

window.onload = function basicSystemInfo(){
	$( '.status' ).append( status );
	$( '.CPU' ).append( CPU );
	$( '.CPUSPEED' ).append( CPUSPEED+"GHz" );
	$( '.memory' ).append( memory +"MB" );
	$( '.HHD' ).append( HHD+"GB" );
	$( '.IPAdres' ).append( IPAdres );
}