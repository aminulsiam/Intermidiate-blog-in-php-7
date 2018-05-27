 

	 // user active and deactive 
	 $(document).ready(function(){
	 	$('tbody').on("click",".userDeactive",function(){
	 		var id = $(this).attr('id');
		 	var status = 0;
		 	jQuery.ajax({
		 		type : "POST",
		 		url  : "check/user_status.php",
		 		data :{
	 				id:id,
	 				status:status
		 		},
		 		success : function(data){
		 			$('.userDeactive'+id).text('active');
		 			$('.userDeactive'+id).addClass('userActive btn-success');
	 				$('.userDeactive'+id).removeClass('userDeactive btn-danger');
		 		} 

		 	});
	 	});
	 	$('tbody').on("click",".userActive",function(){
	 		var id = $(this).attr('id');
		 	var status = 1;
		 	jQuery.ajax({
		 		type : "POST",
		 		url  : "check/user_status.php",
		 		data :{
	 				id:id,
	 				status:status
		 		},
		 		success : function(data){
		 			$('.userActive'+id).text('deactive');
		 			$('.userActive'+id).addClass('userDeactive btn-danger');
	 				$('.userActive'+id).removeClass('userActive btn-success');
		 		} 

		 	});
	 	});

	 	// user image pop up
	 	$('.test-popup-link').magnificPopup({
		  type: 'image',
		});







	 });// document end 


	 	
	 