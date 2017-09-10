
( function( $ ) {

  //Update site footer copyright in real time...
  wp.customize( 'copyright_text', function( value ) {
    value.bind( function( newval ) {
      $( '#copyright-info' ).html( newval );
    } );
  } );

  
  
} )( jQuery );