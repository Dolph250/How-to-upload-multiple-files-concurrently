<?php
$connect = mysqli_connect("localhost", "root", "", "test_db");
            if(!empty($_FILES['name']))
    {
         $valid_extensions = array('jpeg', 'jpg', 'png', 'jfif'); // valid extensions
    $path = 'Thumbs/'; // upload directory
    $number = count($_FILES["name"]['name']);
    for($i=0; $i<$number; $i++)
	{
    $img = $_FILES['name']['name'][$i];
    $tmp = $_FILES['name']['tmp_name'][$i];
    // get uploaded file's extension
    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
    // can upload same image using rand function
    $final_image = rand(1000,1000000).$img;
    // check's valid format
    if(in_array($ext, $valid_extensions)) 
    { 
    $path = $path.strtolower($final_image); 
     move_uploaded_file($tmp,$path);
     
    } 
  
    }
    $send = json_encode($_FILES["name"]['name']);
    $sql = $connect->query("INSERT INTO tbl_name(namearr) VALUES('$send')");
	if($sql)		
        {
            echo json_encode($_FILES["name"]['name']);
        }
 else {
     echo $connect->error;
 }
    
    }
    else
    {
        echo "empty";
    }
    