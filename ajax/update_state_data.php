<?php
require_once("../config.php");

$sql ="UPDATE state_master SET state_name='" . $_POST["name"] . "', state_code='" . $_POST["code"] . "'  WHERE id='" . $_POST["id"] . "'";
$result = $conn->query($sql);

?>
<?php  ?>