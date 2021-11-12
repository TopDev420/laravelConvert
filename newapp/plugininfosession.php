
<?php
	
	$servername="localhost";
	$username="datasyder_datasyder";
	$password="datasyder@123";
	$dbname="datasyder_leads";
	$flagarr=array("logininfo"=>'false');
	
	$conn=new mysqli($servername,$username,$password,$dbname);

		$sql="SELECT * FROM loginsession";
		
	    $result=$conn->query($sql);
	    if($result->num_rows > 0){
	        $row=$result->fetch_assoc();
			$data2=json_encode($row);
        	echo $data2; 
	    }
	    else {
        	echo json_encode($flagarr);
	    }
 
?>
