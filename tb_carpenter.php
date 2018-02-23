<?php
require('config.php');

$sql = "SELECT * FROM carpenter";

$result = mysqli_query($conn,$sql)or die(mysqli_error());

echo "<table border='2px'>";
echo "<tr><th>Unique iD</th><th>Fname</th><th>Lname</th><th>Experience</th>
		<th>dob</th><th>Gender</th><th>PrimaryMob</th><th>SecodaryMob</th>
		<th>email</th><th>Address</th><th>Expertise</th><th>PANcard</th>
		<th>Adhaarno</th><th>curlocation</th><th>Currentstatus</th><th>locforwork</th>
		<th>city</th><th>state</th><th>IDProof</th><th>active flag</th>	<th>City Manual Entry</th>	
	</tr>";

while($row = mysqli_fetch_array($result)) {
    $unique_id = $row['unique_id'];
    $Fname = $row['Fname'];
    $Lname = $row['Lname'];
    $Experience = $row['Experience'];
    $dob = $row['dob'];
    $Gender = $row['Gender'];
    $PrimaryMob = $row['PrimaryMob'];
    $SecodaryMob = $row['SecodaryMob'];
    $email = $row['email'];
    $Address = $row['Address']; 
    $Expertise = $row['Expertise'];
    $PANcard = $row['PANcard']; 
    $Adhaarno = $row['Adhaarno'];
    $curlocation = $row['curlocation'];   
    $Currentstatus = $row['Currentstatus'];   
    $locforwork = $row['locforwork'];   
    $city = $row['city'];   
    $state = $row['state'];   
    $IDProof = $row['IDProof'];   
    $active = $row['active'];   
    $city_manual_flag = $row['city_manual_flag'];                                                       
    echo "<tr><td>".$unique_id."</td><td>".$Fname."</td><td>".$Lname."</td><td>".$dob."</td>
    <td>".$dob."</td><td>".$Gender."</td><td>".$PrimaryMob."</td><td>".$SecodaryMob."</td>
		<td>".$email."</td><td>".$Address."</td><td>".$Expertise."</td><td>".$PANcard."</td>
		<td>".$Adhaarno."</td><td>".$curlocation."</td><td>".$Currentstatus."</td><td>".$locforwork."</td>
		<td>".$city."</td><td>".$state."</td><td>".$IDProof."</td><td>".$active."</td>	<td>".$city_manual_flag."</td>

    </tr>";
} 

echo "</table>";
mysqli_close($conn);
?>