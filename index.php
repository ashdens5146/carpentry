<?php
include 'config.php'; 
 if(isset($_POST["submit"]) == 'submit'){
	 if(isset($_POST['fName']))
				{

					$fName=$_POST['fName'];

					if(empty($fname)){
					$error_message="First Name Required";
					
					}

					elseif(!preg_match("/^[a-zA-Z ]*$/",$fName)){

					$error_message="First Name: Number are not allowed";
					
							
					}elseif(strlen($fName) >=30){

					$error_message="First Name should be greater then 30 characters";
					
									
					}
					
					elseif(strlen($fName) <=3){

					$error_message="First Name should be less then 3 characters";
					
									
					}
					$array_form_fields['fName']=$fName;
				
					
					
				}
			
				if(isset($_POST['lName']))

				{			
					$lName=$_POST['lName'];
				
					if(empty($lName)){

					$error_message="Last Name Required";
					
	
					}					
					elseif(!preg_match("/^[a-zA-Z ]*$/", $lName)){


					$error_message="Last Name: Number are not allowed";
					
					
					}
					elseif(strlen($lName) >=30){

					$error_message="Last Name should be greater then 30 characters";
					
					
				}
				elseif(strlen($lName) <=3){

					$error_message="Last Name should be less then 3 characters";
					
					
				}
					$array_form_fields['lName']=$lName;
				
			}
			
			if(isset($_POST['experience'])){			
					
					$experience=$_POST['experience'];
			
					if(empty($experience)){

						$error_message="experience Number Required ";
					}
					
					elseif(!is_numeric($experience)) {
						
					$error_message="experience: Only Numbers are allowed ";
					

					}

					elseif(strlen($experience) > 2){

					$error_message="Experience Number cannot be more then 2 numbers";
					
					}

					elseif(strlen($experience) < 1){

					$error_message="experience cannot be less than 1 numbers";
					
					}

					$array_form_fields['experience']=$experience;					

				}
				if(isset($_POST['dob'])){			
					
					$dob=$_POST['dob'];
				
					if(empty($dob)){
					$error_message="DOB Required ";
					}

					elseif(!preg_match("/^(0[1-9]|[1-2][0-9]|3[0-1])\/(0[1-9]|1[0-2])\/[0-9]{4}$/",$dob)){

					$error_message="Invalid Date Format";
					}
					$array_form_fields['dob']=$dob;

				}
				
				if(isset($_POST['gender'])){			
					
					$gender=$_POST['gender'];
				
					if($gender==''){
					$error_message="Select gender ";
					
					}

					$array_form_fields['gender']=$gender;
				}
				
				if(isset($_POST['primobile'])){			
					
					$primobile=$_POST['primobile'];
			
					if(empty($primobile)){

						$error_message="Primary Mobile Number Required ";
					}
					
					elseif(!is_numeric($primobile)) {
						
					$error_message="Primary Mobile Number: Only Numbers are allowed ";
					

					}

					elseif(strlen($primobile) > 10){

					$error_message="Primary Mobile Number cannot be more then 10 numbers";
					
					}

					elseif(strlen($primobile) < 10){

					$error_message="Primary Mobile Number cannot be less than 10 numbers";
					
					}

					$array_form_fields['primobile']=$primobile;					

				}
				if(isset($_POST['secmobile'])){			
					
					$secmobile=$_POST['secmobile'];
			
					
					if(!is_numeric($secmobile)) {
						
					$error_message="Secondary Mobile Number: Only Numbers are allowed ";
					

					}

					elseif(strlen($secmobile) > 10){

					$error_message="Secondary Mobile Number cannot be more then 10 numbers";
					
					}

					elseif(strlen($secmobile) < 10){

					$error_message="Secondary Mobile Number cannot be less than 10 numbers";
					
					}

					$array_form_fields['secmobile']=$secmobile;					

				}
				
				if(isset($_POST['email'])){			
					
					$email=$_POST['email'];
				
					if (empty($email)) {
						# code...
					$error_message="Email Required";
					
				
					}elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
						# code...

					$error_message="Email Invalid Format";
					
				
					}elseif(strlen($email) >50){

					$error_message="Email should be less then 50 characters";
					
					}
					$array_form_fields['email']=$email;					
				
				}
				
				if(isset($_POST['address'])){			
					
					$address=$_POST['address'];
				
					if(empty($address)){
					$error_message="Organisation Name Required";
					
					}
					elseif(!preg_match("/^[a-zA-Z][a-zA-Z0-9-_\.\, ]*$/", $address)){
						
					$error_message="Address: Only numbers and letters with '_', ',' and '.' allowed";
					

					}elseif(strlen($address) > 300){

					$error_message="Address should not be larger than  300 characters";
					
					}

					$array_form_fields['address']=$address;								
		
				}
				if(isset($_POST['expertise'])){			
					
					$expertise=$_POST['expertise'];
				
					if(empty($expertise)){
					$error_message="Organisation Name Required";
					
					}
					elseif(!preg_match("/^[a-zA-Z][a-zA-Z0-9-_\.\, ]*$/", $expertise)){
						
					$error_message="expertise: Only numbers and letters with '_', ',' and '.' allowed";
					

					}elseif(strlen($expertise) > 250){

					$error_message="expertise should not be larger than  250 characters";
					
					}

					$array_form_fields['expertise']=$expertise;								
		
				}

				if(isset($_POST['pancard'])){			
					
					$pancard=$_POST['pancard'];
				
					if(empty($pancard)){
					$error_message="Pancard Number required ";
					
					}

					$array_form_fields['pancard']=$pancard;
				}
				
				if(isset($_POST['aadhaar'])){			
					
					$aadhaar=$_POST['aadhaar'];
				
					if(empty($aadhaar)){
					$error_message="aadhaar Number required ";
					
					}

					$array_form_fields['aadhaar']=$aadhaar;
				}
				
				if(isset($_POST['curloc'])){			
					
					$curloc=$_POST['curloc'];
				
					if(empty($curloc)){
					$error_message="Currrent Location required ";
					
					}
					
					elseif(!preg_match("/^[a-zA-Z ]*$/", $curloc)){


					$error_message="Currrent Location: Number are not allowed";
					
					
					}
					elseif(strlen($curloc) >=50){

					$error_message="Currrent Location should be less then 50 characters";
					}
					$array_form_fields['curloc']=$curloc;
				}
				
				if(isset($_POST['curstatus'])){			
					
					$curstatus=$_POST['curstatus'];
				
					if(empty($curstatus)){
					$error_message="Currect Status required ";
					
					}
					elseif(!preg_match("/^[a-zA-Z ]*$/", $curstatus)){


					$error_message="Currrent Status: Number are not allowed";
					
					
					}
					elseif(strlen($curstatus) >=25){

					$error_message="Currrent Status should be less then 25 characters";
					}

					$array_form_fields['curstatus']=$curstatus;
				}
				
				if(isset($_POST['locofwork'])){			
					
					$locofwork=$_POST['locofwork'];
				
					if(empty($locofwork)){
					$error_message="Currect Status required ";
					
					}
					elseif(!preg_match("/^[a-zA-Z ]*$/", $locofwork)){


					$error_message="Location Of Work: Number are not allowed";
					
					
					}
					elseif(strlen($locofwork) >250){

					$error_message="Location of Work should be less then 250 characters";
					}

					$array_form_fields['locofwork']=$locofwork;
				}
				
				if(isset($_POST['city'])){			
					
					$city=$_POST['city'];
				
					if(empty($city)){
					$error_message="Currect Status required ";
					
					}
					elseif(!preg_match("/^[a-zA-Z]*$/", $city)){


					$error_message="city: Numbers and space are not allowed";
					
					
					}
					elseif(strlen($city) >80){

					$error_message="City should be less then 80 characters";
					}

					$array_form_fields['city']=$city;
				}
				
				if(isset($_POST['state'])){			
					
					$state=$_POST['state'];
				
					if(empty($state)){
					$error_message="Currect Status required ";
					
					}
					elseif(!preg_match("/^[a-zA-Z ]*$/", $state)){


					$error_message="state: Number are not allowed";
					
					
					}
					elseif(strlen($state) >100){

					$error_message="state should be less then 100 characters";
					}

					$array_form_fields['state']=$state;
				}
				if(isset($_POST['city_manual_flag'])){	
				$city_manual_flag=$_POST['city_manual_flag'];	
				}
				
				
				 $date_without_slashes= substr(str_replace("/", "", $dob),0,4);
				 $fname_sub = substr($fName, 0, 3);
				 $lname_sub = substr($lName, -3);
				 $unique_id = strtoupper($fname_sub.$lname_sub.$date_without_slashes);
				

				//$date_1 = DateTime::createFromFormat( 'd/m/Y', $dob );
				//$dob_2 = $date_1->format( 'Y-m-d' );
				if($_FILES['file']['name']!=''){
				$file_max_weight = 300000000; //limit the maximum size of file allowed (300Mb)

								$ok_ext = array('jpg','JPG','png','jpeg'); // allow only these types of files

								//$destination = mkdir("uploads/". $fName ."/"); // where our files will be stored

								if(!is_dir("uploads/". $unique_id ."/")) {
										mkdir("uploads/". $unique_id ."/");
									}

								$file = $_FILES['file'];


								$filename = explode(".", $file["name"]); 


								$file_name = $file['name']; // file original name

								$file_name_no_ext = isset($filename[0]) ? $filename[0] : null; // File name without the extension

								$file_extension = $filename[count($filename)-1];

								$file_weight = $file['size'];
								
								

								$file_type = $file['type'];



								// If there is no error
								if( $file['error'] == 0 )
									{
    							// check if the extension is accepted
    							if( in_array($file_extension, $ok_ext)):

        						// check if the size is not beyond expected size
        						if( $file_weight <= $file_max_weight ):
								
								$fileNamewithpath=$file_name;
								
								if (!file_exists($fileNamewithpath)):

                				// rename the file
                				$fileNewName = md5( $file_name_no_ext[0].microtime() ).'.'.$file_extension ;
								//$fileNewName=$file['name'];
								
                				// and move it to the destination folder
                				if( move_uploaded_file($file['tmp_name'], "uploads/". $unique_id ."/".$fileNewName) ):
				
										$sql = "INSERT INTO carpenter (id,unique_id,Fname,Lname,Experience,dob,Gender,PrimaryMob,SecodaryMob,email,Address,Expertise,
PANcard,Adhaarno,curlocation,Currentstatus,locforwork,city,state,IDProof,active,city_manual_flag)
VALUES ('','".$unique_id."','".$fName."','".$lName."','".$experience."','".$dob."','".$gender."','".$primobile."','".$secmobile."','".$email."','".$address."'
,'".$expertise."','".$pancard."','".$aadhaar."','".$curloc."','".$curstatus."','".$locofwork."','".$city."','".$state."','".$fileNewName."','0','".$city_manual_flag."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
   echo "Error: " . $sql . "<br>" . $conn->error;
}


                    			//echo" File uploaded !";

                			

                				endif;

							else:
								
								echo '<script language="javascript">';
								echo 'alert("This filename already exist. Please change your File name")';
								echo '</script>';
								exit();


        						endif;
        					else:
								echo '<script language="javascript">';
								echo 'alert("File size is too large")';
								echo '</script>';
           						$message="File size is too large.";
								$_SESSION['ERROR_REMARK_ADD']=$message;
								exit();


        						endif;


    						else:
								echo '<script language="javascript">';
								echo 'alert("File type is not supported")';
								echo '</script>';
								$message="File type is not supported.";
								$_SESSION['ERROR_REMARK_ADD']=$message;
								exit();

    							endif;
							}
				
				}
}


$conn->close();
?>
<!DOCTYPE html>
<html><head>
<title>Carpenter Registration</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Interior Design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
 <link rel="stylesheet" href="css/bootstrap.min.css"> 
<link href="css/custom.css" rel="stylesheet" type="text/css" media="all" />

<!-- js -->
<script src="js/jquery-2.2.3.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
<!-- //js -->
<link href="//fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
<script>
$(document).ready(function(){
	$("#city").keyup(function(){
		$.ajax({
		type: "POST",
		url: "ajax/read_city.php",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$("#city").css("background","#FFF url(images/LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			$("#city").css("background","#FFF");
		}
		});
	});
});

function selectCity(val) {
$("#city").val(val);
$("#suggesstion-box").hide();
}
</script>

</head>
<body>
	<div class="main">
		<h1>Carpenter Registration </h1>
		<p class="agile_para">Please Register.</p>
		<div class="w3_agile_main_grids">
			<section class="slider">
				<div class="flexslider">
					<ul class="slides">
						<li>
							<div class="agileits_w3layouts_main_grid">
								<h3>Registration Form</h3>
								<form action="#" method="post" enctype="multipart/form-data">
									<span>
										<label>First Name</label>
										<input name="fName" type="text" placeholder="Your first Name" required>
									</span>
									<span>
										<label>Last Name</label>
										<input name="lName" type="text" placeholder="Your Last Name" required>
									</span>
									<span>
										<label>Experience</label>
										<input name="experience" type="text" placeholder="Your Experience" required>
									</span>
									<span>
										<label>DOB</label>
										<input name="dob" type="date" placeholder="Your Date Of birth" required>
									</span><br>
									<span>
										<label>Gender</label>
										<select name="gender"  required="">
											<option value="Male">Male</option>
											<option value="Female">Female</option>         
											
										</select>
									</span>
									<span>
										<label>Primary Mobile</label>
										<input name="primobile" type="text" placeholder="Primary Mobile" required>
									</span><br>
									<span>
										<label>Secondary Mobile</label>
										<input name="secmobile" type="text" placeholder="Secondary Mobile" required>
									</span>
                                    <br>
									<span>
										<label>email</label>
										<input name="email" type="email" placeholder="Your Email" required>
									</span>
									<span>
										<label>Address</label>
										<textarea name="address"></textarea>
									</span>
									<span>
										<label>Expertise</label>
										<input name="expertise" type="text" placeholder="Expertise" required>
									</span>
									<span>
										<label>Pancard</label>
										<input name="pancard" type="text" placeholder="Pancard" required>
									</span>
									<span>
										<label>Aadhaar No.</label>
										<input name="aadhaar" type="text" placeholder="Aadhaar No" required>
									</span>
                                    <br>	
									<span>
										<label>Current Loc.</label>
										<input name="curloc" type="text" placeholder="Current Loc" required>
									</span>	
                                    <br>
									<span>
										<label>Current Status.</label>
										<input name="curstatus" type="text" placeholder="Current Status" required>
									</span>	<br>
									<span>
										<label>Location Of Work</label>
										<input name="locofwork" type="text" placeholder="Location Of Work" required>
									</span>	
                                    <br>
                                    <span>
										<label>City</label>
										<input name="city" id="city" onKeyUp="show_state()" type="text" placeholder="City" autocomplete="off" required>
                                        <div id="suggesstion-box" onClick="show_state()"></div>
                                        <p class="colorwhite">City Not listed? Click <button type="button" class="btn" data-toggle="modal" data-target="#myModal">here</button></p>
                                        


									</span>	
                                    <span>
										<label>State</label>
										<input name="state" id="state" type="text" readonly placeholder="State" required>
                                        <input name="city_manual_flag" id="city_manual_flag" type="hidden" value="0">
									</span>	
									<span>
										<label>Upload ID Proof</label>
										<input name="file" id="file" type="file">
									</span>	
									
									<div class="w3_agileits_submit">
										<input type="submit" name="submit" value="submit">
										<input type="reset" value="reset">
									</div>
								</form>
							</div>
						</li>
						
					</ul>
				</div>
			</section>
		</div>
		<div class="agileits_copyright">
			<p>© 2018. All rights reserved</p>
		</div>
	</div>
      <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Enetr City And State</h4>
        </div>
        <div class="modal-body agileits_w3layouts_main_grid">
          <p><span>
				<label>City</label>
				<input name="city_modal" id="city_modal" type="text" placeholder="Enter your city" autocomplete="off" required>

		</span>	</p>
        <br>
          <p><span>
				<label>State</label>
				<input name="state_modal" id="state_modal" type="text" placeholder="Enter your State" autocomplete="off" required>

		</span>	</p>                          
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default" onClick="add_state_city()" data-dismiss="modal">Submit</button>
        </div>
      </div>
    </div>
  </div>

<!-- password -->
	<script type="text/javascript">
		window.onload = function () {
			document.getElementById("password1").onchange = validatePassword;
			document.getElementById("password2").onchange = validatePassword;
		}
		function validatePassword(){
			var pass2=document.getElementById("password2").value;
			var pass1=document.getElementById("password1").value;
			if(pass1!=pass2)
				document.getElementById("password2").setCustomValidity("Passwords Don't Match");
			else
				document.getElementById("password2").setCustomValidity('');	 
				//empty string means no validation error
		}
	</script>
<!-- password -->
<!-- flexSlider -->
	<script defer src="js/jquery.flexslider.js"></script>
	<script type="text/javascript">
		$(window).load(function(){
		  $('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
			  $('body').removeClass('loading');
			}
		  });
		});
	</script>
<!-- //flexSlider -->
<script>
function show_state(){
		var city = $("#city").val();	
		var formData = {city:city};		 

			$.ajax({url: "ajax/read_state.php",
			type: "POST",		
			complete: function(){			  
				//loading_hide();
			},  
			data : formData, success: function(result){	

				
				  $('#state').val(result);
				
				
			}});	


}

</script>


<script>
function add_state_city(){
		$("#city").val($('#city_modal').val());
		
		$("#state").val($('#state_modal').val());
		$("#city_manual_flag").val(1);
		
}

</script>

</body>
</html>