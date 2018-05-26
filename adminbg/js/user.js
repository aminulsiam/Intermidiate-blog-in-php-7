 

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
		 			$('.userDeactive').text('active');
		 			$('.userDeactive').addClass('userActive btn-success');
	 				$('.userDeactive').removeClass('userDeactive btn-danger');
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
		 			$('.userActive').text('deactive');
		 			$('.userActive').addClass('userDeactive btn-danger');
	 				$('.userActive').removeClass('userActive btn-success');
		 		} 

		 	});
	 	});
	 });


	 	
	 