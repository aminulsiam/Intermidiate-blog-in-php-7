
	// CHECK CATEGORY AVAILAVILITY
		function checkAvailability()
		{
			var category = $('#category').val().trim();

			jQuery.ajax({
				type : "POST",
				url  : "check/check_category.php",
				data : {category:category},

				success : function(data){
					if (data == 1) {
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
			swalDelete(id);
		}

		function swalDelete(id)
		{
			swal({
				  title: "Are you sure?",
				  text: "Are you sure want to delete this category?",
				  icon: "warning",
				  buttons: true,
				  dangerMode: true,
				})
				.then((willDelete) => {
				  if (willDelete) {
				     $.ajax({
						url     : "check/delete_category.php",
						method  : "POST",
						data    : {id:id},
						success : function(data){
							$("#"+id).remove();
							swal("Category has been deleted!", {
						      icon: "success",
						    }); 
						}  
					});
				     return false;
				  } 
			});
		}
			  
