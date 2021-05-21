"use strict";

( function( $ ) {
  /**
   * @param $scope The Widget wrapper element as a jQuery element
   * @param $ The jQuery alias
   */
  var ToggleHandlerClass = function( $scope, $ ) {
    console.log( $scope );
  };





$( window ).on( 'elementor/frontend/init', function() {

    elementorFrontend.hooks.addAction( 'frontend/element_ready/PressGo.default', function($scope, $){
      if (jQuery(".tgl").is(':checked')) {
        jQuery('.section-1').addClass("hide-sec");
        jQuery('.section-2').removeClass("hide-sec");
      }

      jQuery('.tgl').change(function () {
        jQuery('.section-1,.section-2').toggleClass('hide-sec');



      });

    });
 } );
 } )( jQuery );
