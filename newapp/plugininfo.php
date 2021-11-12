
<?php
	
	$servername="localhost";
	$username="datasyder_datasyder";
	$password="datasyder@123";
	$dbname="datasyder_leads";
	
	$conn=new mysqli($servername,$username,$password,$dbname);
	$sql="SELECT * FROM businesscontacts WHERE elink LIKE '".$_GET["hosturl"]."'";	
	$result=$conn->query($sql);
	
	if($result->num_rows > 0){
		$row=$result->fetch_assoc();
		echo json_encode($row);
		}
	else {
	    $sql="SELECT * FROM businesscontacts WHERE elink LIKE '".$_GET["hosturl"]."/'";	
	$result=$conn->query($sql);
	    
	if($result->num_rows > 0){
		$row=$result->fetch_assoc();
		echo json_encode($row);
		}
    else {
	    $sql="SELECT * FROM businesscontacts WHERE elink LIKE 'za.".$_GET["hosturl"]."'";	
	$result=$conn->query($sql);
	    
	if($result->num_rows > 0){
		$row=$result->fetch_assoc();
		echo json_encode($row);
		}
		else {
	    $sql="SELECT * FROM businesscontacts WHERE elink LIKE 'za.".$_GET["hosturl"]."/'";	
	$result=$conn->query($sql);
	    
	if($result->num_rows > 0){
		$row=$result->fetch_assoc();
		echo json_encode($row);
		}
		else {
	    $sql="SELECT * FROM businesscontacts WHERE elink LIKE 'zw.".$_GET["hosturl"]."'";	
	$result=$conn->query($sql);
	    
	if($result->num_rows > 0){
		$row=$result->fetch_assoc();
		echo json_encode($row);
		}
		else {
	    $sql="SELECT * FROM businesscontacts WHERE elink LIKE 'zw.".$_GET["hosturl"]."/'";	
	$result=$conn->query($sql);
	    
	if($result->num_rows > 0){
		$row=$result->fetch_assoc();
		echo json_encode($row);
		}
	else{
	$flagarr=array("CompanyName"=>'');
	echo json_encode($flagarr);
	}}}}}}

?>
