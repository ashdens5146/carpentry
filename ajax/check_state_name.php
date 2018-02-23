<?php
require_once("../config.php");
if(!empty($_POST["code"])) {
$sql ="SELECT state_name FROM state_master WHERE state_name='" . $_POST["code"] . "'";
$result = $conn->query($sql);

if(mysqli_num_rows($result)>0){
	echo 1;
}
else{
	echo 0;
exit();
}
?>
<?php }  ?>