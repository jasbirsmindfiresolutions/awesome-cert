(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

	$(document).ready(function(){

		var username = '';
		 $('.awsm-cert-form').submit(function(event){
		 	event.preventDefault();  
		 	username = $(this).find('.awsm-cert-username').val();

		 	if(username){
		 		$(this).hide();
		 		$('.awsm-cert-video').show();
		 	}

		 })

		 var canvas = document.getElementById("awsmCertCanvas");
		 var context = canvas.getContext("2d");
		 var imageObj = new Image();
		 //imageObj.crossOrigin="anonymous";


		 $('#awsm-cert-skip-video').click(function(){
		 	$('.awsm-cert-video').remove();
		 	$('.awsm-cert-create-certificate').show();

		 	context.fillText(username, 10, 20);
		 	$("#awsm-cert-download-certificate").attr('href', canvas.toDataURL('image/png'));
		 })

		     
	     imageObj.onload = function(){
	     	//context.imageSmoothingEnabled = false;
		 	//context.clearRect(0, 0, canvas.width, canvas.height);
		 	context.font = "10pt Arial";
		 	context.fillStyle = 'red';
		 	context.drawImage(imageObj, 0, 0, imageObj.width, imageObj.height, 0, 0, canvas.width, canvas.height);
	     };
	     imageObj.src = AWSM_CERT_PHP_VAR_OBJ.awesome_certificate;
	     //imageObj.src = 'https://cdn.sstatic.net/Sites/stackoverflow/company/img/logos/so/so-icon.svg';

	}) // document ready ends

})( jQuery );
