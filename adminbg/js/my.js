
	// CHECK CATEGORY AVAILAVILITY
		function checkAvailability()
		{
			var category = $('#category').val().trim();
			jQuery.ajax({
				url  : "check/check_category.php",
				data : {category:category},
				type : "text",
				success : function(data){
					if (data==0) {
						var msg = '<span style="color:red;font-weight:bold;"> This Categoryname is already Used.Please try to another one </span>';
						$('#category_availability').html(msg);
						$('#btn').attr('disabled',true);
					}else{
						var msg = '<span class="text-success" style="font-weight:bold;"> This categoryname is available.</span>';
						$('#category_availability').html(msg);
						$('#btn').removeAttr('disabled');
					}
					
				}
			});
		}

	// CATEGORY DELETE 
		function deleteCategory(id)
		{
			var id = id;
			$.ajax({
				url     : "check/delete_category.php",
				method  : "POST",
				data    : {id:id},
				success : function(data){
					$('#delete').html(data);
				}  
			});
		}

