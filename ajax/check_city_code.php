<?php
require_once("../config.php");
if(!empty($_POST["code"])) {
$sql ="SELECT city_code FROM city_master WHERE city_code='" . $_POST["code"] . "'";
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