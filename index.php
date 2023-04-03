<html>
	<head>
		<title>Upload multiple files simultaneously</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="js/jquery-3.5.1.min.js"></script>
                <script src="js/bootstrap.bundle.minm.js"></script>
	<script>
$(document).ready(function(){
	var i=1;
	$('#add').click(function(){
		i++;
		$('#dynamic_field').append('<tr id="row'+i+'"><td><input class="form-control" type="file" accept="image/*" name="name[]" placeholder="Choose file" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
	});
	
	$(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id"); 
		$('#row'+button_id+'').remove();
	});
	

              $("#add_name").on('submit',(function(e) {
 e.preventDefault();
  $.ajax({
         url: 'name.php',
   type: "POST",
   data:  new FormData(this),
   contentType: false,
         cache: false,
   processData:false,
   beforeSend : function()
   {
    //$("#preview").fadeOut();
    $("#err").fadeOut();
   },
   success: function(data)
      {
    if(data=='invalid')
    {
     // invalid file format.
     $("#err").html("Invalid File !").fadeIn();
    }
    else
    {
     // view uploaded file.
    
     alert(data);
     $('#add_name')[0].reset();
     
    }
      },
     error: function(e) 
      {
    $("#err").html(e).fadeIn();
      }          
    });
 }));
      
        
        
});
</script>
	
	</head>
	<body>
		<div class="container">
			<br />
			<br />
			<h2 align="center"><a href="#" title="Dynamically Add or Remove input fields in PHP with JQuery">Upload multiple files simultaneously</a></h2><br />
			<div class="form-group">
                            <form id="add_name" action="name.php" method="post" enctype="multipart/form-data">
				
					<div class="table-responsive">
						<table class="table table-bordered" id="dynamic_field">
							<tr>
								<td><input class="form-control" type="file" accept="image/*" name="name[]" placeholder="Enter your Name" class="form-control name_list"/></td>
								<td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
							</tr>
						</table>
                                             <button name="submit" id="submit" class="btn btn-info"> <span class="fas fa-plus"></span> Add</button>
						
					</div>
				</form>
			</div>
		</div>
	</body>
</html>





