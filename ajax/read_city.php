<?php
require_once("../config.php");
if(!empty($_POST["keyword"])) {
$sql ="SELECT city_name FROM city_master WHERE city_name like '" . $_POST["keyword"] . "%' ORDER BY city_name LIMIT 0,6";
$result = $conn->query($sql);
if(!empty($result)) {
?>
<ul id="city-list">
<?php
foreach($result as $city) {
?>
<li onClick="selectCity('<?php echo $city["city_name"]; ?>');"><?php echo $city["city_name"]; ?></li>
<?php } ?>
</ul>
<?php } } ?>