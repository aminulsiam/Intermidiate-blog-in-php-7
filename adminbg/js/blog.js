
		// Blog delete  
		function deleteBlog(id)
		{
			
			var id = id;
			swalDelete(id);
		}

		function swalDelete(id)
		{
			swal({
				  title: "Are you sure?",
				  text: "Are you sure want to delete this Blog?",
				  icon: "warning",
				  buttons: true,
				  dangerMode: true,
				})
				.then((willDelete) => {
				  if (willDelete) {
				     $.ajax({
						url     : "check/delete_blog.php",
						method  : "POST",
						data    : {id:id},
						success : function(data){
							$("#"+id).remove();
							swal("Blog has been deleted!", {
						      icon: "success",
						    }); 
						}  
					});
				     return false;
				  } 
			});
		}
	