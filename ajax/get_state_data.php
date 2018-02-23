
<?php
require_once("../config.php");
if(!empty($_POST["id"])) {
$sql ="SELECT * FROM state_master WHERE id='" . $_POST["id"] . "'";
$result = $conn->query($sql);
//$return_data=array();
if(!empty($result)) {
		$pictures = array();
while ($row = mysqli_fetch_array($result)) {
  $data = array(
    "state_name" => $row['state_name'],
    "state_code"         => $row['state_code'],
    "id"         => $row['id'],
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