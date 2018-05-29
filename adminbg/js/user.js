 

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
		 			$('#row_'+id+' .userDeactive').text('active');
		 			$('#row_'+id+' .userDeactive').addClass('userActive btn-success');
	 				$('#row_'+id+' .userDeactive').removeClass('userDeactive btn-danger');
		 		} 
		 		//not working 
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
		 			$('#row_'+id+' .userActive').text('deactive');
		 			$('#row_'+id+' .userActive').addClass('userDeactive btn-danger');
	 				$('#row_'+id+' .userActive').removeClass('userActive btn-success');
		 		} 

		 	});
	 	});


	 	// user image pop up
	 	$('.test-popup-link').magnificPopup({
		  type: 'image',
		});







	 });// document end 


	 	
	 