$(document).ready(function() {
	'use strict';
	$('.water').css("display","none");
	$('.overlay').css("display","none");
	  $( ".main-des .Request" ).click(function() {
		$('.water').css("display","block");
		event.preventDefault();
		$.get( "https://fakestoreapi.com/products/1", function(data) {
			$('.water').css("display","none");
			alert( "success" );
			$('.request').css("display","none");
			$('.response').css("display","block");
			})
			.fail(function() {
			$('.water').css("display","none");
			alert( "error" );
			});
  });
  $( ".main-mob .Request2" ).click(function() {
	$('.water').css("display","block");
	event.preventDefault();
	$.get( "https://fakestoreapi.com/products/1", function(data) {
		$('.water').css("display","none");
		alert( "success" );
		$('.request2').css("display","none");
		$('.response2').css("display","block");
		})
		.fail(function() {
		$('.water').css("display","none");
		alert( "error" );
		});
});
	  $(".new-request" ).click(function() {
			$('.request').css("display","block");
			$('.response').css("display","none");
			$('.request2').css("display","block");
			$('.response2').css("display","none");
	  });

	//   $( "new-request" ).click(function() {
	// 		$('.request').css("display","block");
	// 		$('.response').css("display","none");
	//   });
	
});