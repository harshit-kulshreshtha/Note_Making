<?php

		$localhost = "localhost"; #localhost
		$dbusername = "root"; #username of phpmyadmin
		$dbpassword = "root";  #password of phpmyadmin
		$dbname = "note_making";  #database name
		
		$conn = new mysqli($localhost,$dbusername,$dbpassword,$dbname);
		 
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}
		    $para=$_POST["para"];
		    $title=$_POST["title"];
		    $open=$_POST["open"];
		   	
		if($para!="")
		{	
		  $file=fopen("/home/harshit/Documents/".$title,"w+") or die("Unable to open file!");
			fwrite($file, $para);
		    	fclose($file);
		   
		$sql = "INSERT into store_notes(title,content) VALUES('$title','$para')";
		 if(mysqli_query($conn,$sql))
		 	echo "File Sucessfully uploaded";
		else
			echo "Error";
			

		}
		else
		{
				
		$sql = "SELECT * FROM store_notes where title='$open'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) 
		{
				
	    		while($row = $result->fetch_assoc())
			{
	    			 echo '<textarea class="form-control"  rows="2">'.$row['content'].'</textarea>';
			}
			
		}
 		else {
  			echo "0 results";
		}
			$conn->close();		
		}

?>	 
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1500px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
  </style>
</head>
</body>
<footer class="container-fluid">
  <p>Footer Text</p>
</footer>

</body>
</html>



