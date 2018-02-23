<?php
require_once("../config.php");
if(!empty($_POST["keyword"])) {
$sql ="SELECT state_code FROM state_master WHERE state_name like '" . $_POST["keyword"] . "%' ORDER BY state_name LIMIT 0,6";
$result = $conn->query($sql);
if(!empty($result)) {
?>
<ul id="city-list">
<?php
foreach($result as $state) {
?>
<li onClick="selectCity('<?php echo $state["state_code"]; ?>');"><?php echo $state["state_code"]; ?></li>
<?php } ?>
</ul>
<?php } } ?>