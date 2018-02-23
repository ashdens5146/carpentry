<?php
require_once("../config.php");
if(!empty($_POST["city"])) {
$sql ="SELECT state_code FROM city_master WHERE city_name='" . $_POST["city"] . "'";
$result = $conn->query($sql);
if(!empty($result)) {
	foreach($result as $state) {

		$sql2 ="SELECT state_name FROM state_master WHERE state_code='" . $state["state_code"] . "'";
$result2 = $conn->query($sql2);
if(!empty($result2)) {
	foreach($result2 as $state) {
		echo $state["state_name"];
			}
		}
	}

?>
<?php } } ?>