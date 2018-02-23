
<?php
require_once("../config.php");
if(!empty($_POST["id"])) {
$sql ="SELECT * FROM city_master WHERE id='" . $_POST["id"] . "'";
$result = $conn->query($sql);
//$return_data=array();
if(!empty($result)) {
		$pictures = array();
while ($row = mysqli_fetch_array($result)) {
  $data = array(
    "city_name" => $row['city_name'],
    "city_code"         => $row['city_code'],
    "state_code"         => $row['state_code'],
  );
  $datas[] = $data;
}

echo json_encode($datas);
	}
else{

	echo "No Data Found";
	exit;
}
?>
<?php }  ?>