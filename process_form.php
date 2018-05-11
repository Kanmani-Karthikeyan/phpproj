
<html>
  <head>
	<title>Cancellation Details</title>
  <head>

  <body>
	<?php 
	     $name  = $_POST['realname'];
		 $pass  = $_POST['mypassword']; 

		 //read the contents of our password file.
		 $myFile = "password.txt";
		 $fh = fopen($myFile, 'r');
		 $data = fgets($fh);
		 fclose($fh);
		 print "<br>";

		 //now we need to split our line of data from the text
		 //file so that we can do the comparison.

		 //split the text into an array
		 $text = explode(":",$data);

		 //assign the data to variables
		 $good_name = $text[0];
		 $good_pass = $text[1];
		 print "<br>";

		 //compare the strings
		 if( $name === $good_name && $pass === $good_pass){
			echo "<h1> Login Successfull! </h1>	";
			
	     }
		 else{
			 exit(" <h1> Login Unsuccessfull</h1> ");
		 }
	  ?>	
	 
		<br>
		<FORM NAME= form1 ACTION=connect.php METHOD=POST>
		</br><style style="text/css">
    body {
	
  background-image: url("http://www.wallpaperdx.com/photo/school-bus-wallpaper-1366-768.jpg");
  background-position: 10% 50%;
  background-repeat: repeat;
       }
	   </style>
	        
	         
	         </br></br></br></br>
	         <b><h1>Cancelled Route: <INPUT TYPE=TEXT NAME="croute"></h1></b> 
	         <b><h1>Alternate Route: <INPUT TYPE=TEXT NAME="aroute"></h1> </b></br></br>
	         <P><INPUT TYPE=SUBMIT NAME="action1" VALUE="SEND MAIL" >
			 <P><INPUT TYPE=SUBMIT NAME="action2" VALUE="SEND TEXT" >
			 </br></br></br>
			 </FORM>
			 
  
      
	  
  </body>
</html>