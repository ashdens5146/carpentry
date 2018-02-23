
<?php session_start(); ?>
<?php include '../config.php'; 
 if(isset($_POST["submit"]) == 'submit'){
     if(isset($_POST['state_name']))
                {

                    $state_name=$_POST['state_name'];

                    if(empty($state_name)){
                    $error_message="State Name Required";
                    
                    }

                    elseif(!preg_match("/^[a-zA-Z ]*$/",$state_name)){

                    $error_message="State Name: Number are not allowed";
                    
                            
                    }elseif(strlen($state_name) >=100){

                    $error_message="State Name should be greater then 100 characters";
                    
                                    
                    }
                    
                    elseif(strlen($state_name) <=3){

                    $error_message="State Name should be less then 3 characters";
                    
                                    
                    }
                    $array_form_fields['state_name']=$state_name;
                
                    
                    
                }

       if(isset($_POST['state_code']))
                {

                    $state_code=$_POST['state_code'];

                    if(empty($state_code)){
                    $error_message="State Code Required";
                    
                    }

                    elseif(!preg_match("/^[a-zA-Z ]*$/",$state_code)){

                    $error_message="State Code: Number are not allowed";
                    
                            
                    }elseif(strlen($state_code) <=1){

                    $error_message="State Code should be greater then 1 characters";
                    
                                    
                    }
                    
                    $array_form_fields['state_code']=$state_code;
                
                    
                    
                }

                $_SESSION['FORM_FIELDS']=$array_form_fields;
                            if(empty($error_message))
                        {
                           $sql = "INSERT INTO state_master (id,state_name,state_code)
VALUES ('','".$state_name."','".$state_code."')";

if ($conn->query($sql) === TRUE) {
    $_SESSION['STATE_ADD_SUCCESS']="State Added Successfully";
                    
} else {
   $error_message= "Error: " . $sql . "<br>" . $conn->error;
   $_SESSION['ERROR_STATE_ADD']=$error_message;
}
                    
                        }
                        else{
                             $_SESSION['ERROR_STATE_ADD']=$error_message;
                        }         
            


}


?>

<!--Script to check Stete code start-->
 <script>
    function checkstatename()
{
    var code=$("#state_name").val();
            $.ajax({
            type: "POST",
            url: "../ajax/check_state_name.php",
            data:'code='+code,
            
            success: function(data){
                if(data==1){
                    alert("City Code already Exist. Please try a new one");
                    $("#state_name").focus();
                    $("#state_name").css("background","#ff0000 ");
                    $("form").submit(function(e){
                            e.preventDefault();
                            });
                }
                 else{
                    $("#state_name").css("background","#FFFFFF ");
                }
            }
            });

}

</script>
<!--Script to check city code end-->

<!--Script to check Stete code start-->
 <script>
    function checkstatecode()
{
    var code=$("#state_code").val();
            $.ajax({
            type: "POST",
            url: "../ajax/check_state_code.php",
            data:'code='+code,
            
            success: function(data){
                if(data==1){
                    alert("City Code already Exist. Please try a new one");
                    $("#state_code").focus();
                    $("#state_code").css("background","#ff0000 ");
                    $("form").submit(function(e){
                            e.preventDefault();
                            });
                }
                 else{
                    $("#state_code").css("background","#FFFFFF ");
                }
            }
            });

}

</script>
<!--Script to check city code end-->

<!--Script to check Stete code start-->
 <script>
    function checkstatename_edit()
{
    var code=$("#state_name_edit").val();
            $.ajax({
            type: "POST",
            url: "../ajax/check_state_name.php",
            data:'code='+code,
            
            success: function(data){
                if(data==1){
                    //alert("City Code already Exist. Please try a new one");
                    $("#state_name_edit").focus();
                    $("#state_name_edit").css("background","#ff0000 ");
                    $("#state_name_edit").text("City Code already Exist. Please try a new one");
                   $("#edit_submit").hide();
                }
               else if(data==0){
                    //alert("City Code already Exist. Please try a new one");
                    $("#state_name_edit").css("background","#FFFFFF ");
                   $("#edit_submit").show();
                }
                 else{
                    $("#state_name_edit").css("background","#FFFFFF ");
                     $("#edit_submit").hide();
                }
            }
            });

}

</script>
<!--Script to check city code end-->


<!--Script to check Stete code start-->
 <script>
    function checkstatecode_edit()
{
    var code=$("#state_code_edit").val();
            $.ajax({
            type: "POST",
            url: "../ajax/check_state_code.php",
            data:'code='+code,
            
            success: function(data){
                if(data==1){
                    //alert("City Code already Exist. Please try a new one");
                    $("#state_code_edit").focus();
                    $("#state_code_edit").css("background","#ff0000 ");
                    $("#state_code_edit").text("City Code already Exist. Please try a new one");
                   $("#edit_submit").hide();
                }
               else if(data==0){
                    //alert("City Code already Exist. Please try a new one");
                    $("#state_code_edit").css("background","#FFFFFF ");
                   $("#edit_submit").show();
                }
                 else{
                    $("#state_code_edit").css("background","#FFFFFF ");
                     $("#edit_submit").hide();
                }
            }
            });

}

</script>
<!--Script to check city code end-->

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>State View</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>
<body>

<?php include 'template/navbar.php' ?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">All STATES Registered</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                            
                                    <?php


                                    $datatable = "state_master"; // Database table name
                $results_per_page = 20; // number of results per page
                        if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
                        $start_from = ($page-1) * $results_per_page;
                        $sql = "SELECT * FROM ".$datatable." ORDER BY ID ASC LIMIT $start_from, ".$results_per_page;
                        $rs_result = $conn->query($sql);
                        ?> 
                        <table class="table table-hover table-striped">
                                                            <thead>
                                                                <th>State Name</th>
                                                                <th>State Code</th>
                                                            </thead>
                        <?php 
                         while($row = $rs_result->fetch_assoc()) {
                        ?> 
                                    <tr>
                                    <td><?php echo $row["state_name"]; ?></td>
                                    <td><?php echo $row["state_code"]; ?></td>
                                    <td><button class="form-control btn-fill" name="edit_link" id="edit_link" onclick="get_state_data();" value="<?php echo $row["id"]; ?>" >EDIT</button></td>
                                    </tr>
                        <?php 
                        }; 
                        ?> 
                        </table>
 
                    
 
                        <?php 
                        $sql = "SELECT COUNT(ID) AS total FROM ".$datatable;
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();
                        $total_pages = ceil($row["total"] / $results_per_page); // calculate total pages with results
                          echo"Page Numbers&nbsp; &nbsp; &nbsp; ";
                        for ($i=1; $i<=$total_pages; $i++) {  // print links for all pages
                                    echo "<a href='state_view.php?page=".$i."'";
                                    if ($i==$page)  echo " class='curPage btn btn-info'";
                                    echo ">".$i."</a> "; 
                        };
                        $conn->close();
 
                        ?>


                            </div>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="card card-plain">
                            <div class="header">
                                <h4 class="title">Table on Plain Background</h4>
                                <p class="category">Here is a subtitle for this table</p>
                            </div>
                                <div class="content">
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                                     <?php if(isset($_SESSION['ERROR_STATE_ADD'])){?>
                            <div class="alert alert-danger">
                              <strong>Sorry!</strong> <?php echo $_SESSION['ERROR_STATE_ADD'];$_SESSION[          'ERROR_STATE_ADD']=NULL;?>
                                                        </div>

                              <?php } ?>


                               <?php if(isset($_SESSION['STATE_ADD_SUCCESS'])){?>
                            <div class="alert alert-success">
                              <strong>Success!</strong> <?php echo $_SESSION['STATE_ADD_SUCCESS'];$_SESSION['STATE_ADD_SUCCESS']=NULL;?>
                                                        </div>
                                        <?php }  ?>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>State Name</label>
                                                <input type="text" class="form-control" name="state_name" id="state_name" placeholder="State Name" required="required" onkeyup="checkstatename();" pattern="^[a-zA-Z]{2,100}$" title="State Name cannot be less than 2 characters and only letters allowed and maximum 100 characters" maxlength="100">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">State Code</label>
                                                <input type="text" class="form-control" name="state_code" id="state_code" placeholder="State Code" required="required" onkeyup="checkstatecode();" pattern="^[a-zA-Z]{2,4}$" title="State Code cannot be less than 2 characters and only letters allowed and maximum 4 characters" maxlength="100">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                 <label for="exampleInputEmail1"></label><br>
                                                <button type="submit" name="submit" onsubmit="checkstatecode(); checkstatename(); " class="form-control btn btn-info btn-fill">Add State</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <?php include 'template/footer.php' ?>
<script type="text/javascript">
    

   function get_state_data()
{
    var id=$("#edit_link").val();
    alert(id);
            $.ajax({
            type: "POST",
            url: "../ajax/get_state_data.php",
            data:'id='+id,
            
            success: function(data){
                var JSONObject = JSON.parse(data);
                for (var i = 0, len = JSONObject.length; i < len; ++i) {
                                        var dt = JSONObject[i];

                        $("#state_name_edit").val(dt.state_name);
                        $("#state_code_edit").val(dt.state_code);
                        $("#id").val(dt.id);
                    }
                       jQuery("#editstate").modal('show');
                       $("#edit_submit").hide(); 
            }
            });

}
</script>
<!-- Modal -->
<div id="editstate" class="modal fade" role="dialog">
  <div class="modal-dialog"> 
    
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">ADD MEMBER</h4>
      </div>
      <form id="update_project_form" action="" method="post" enctype="multipart/form-data">
        <div class="modal-body">
                                            <div class="form-group">
                                                <label>State Name</label>
                                                <input type="text" class="form-control" name="state_name_edit" id="state_name_edit" placeholder="State Name" required="required" onkeyup="checkstatename_edit();checkstatecode_edit();" pattern="^[a-zA-Z]{2,100}$" title="State Name cannot be less than 2 characters and only letters allowed and maximum 100 characters" maxlength="100">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">State Code</label>
                                                <input type="text" class="form-control" name="state_code_edit" id="state_code_edit" placeholder="State Code" required="required" onkeyup="checkstatecode_edit();checkstatename_edit();" pattern="^[a-zA-Z]{2,4}$" title="State Code cannot be less than 2 characters and only letters allowed and maximum 4 characters" maxlength="100">
                                            <input type="hidden" name="id" id="id">
                                            </div>
         </div> 
        <div class="modal-footer">
          <button type="button" onclick="update_state_data();" name="edit_submit" id="edit_submit" class="btn btn-default btn-info btn-fill" >Submit</button>
          
        </div>
      </form>
    </div>
  </div>
</div>



<script type="text/javascript">
    

   function update_state_data()
{
    var id=$("#id").val();
    var state_code_edit=$("#state_code_edit").val();
    var state_name_edit=$("#state_name_edit").val();
            $.ajax({
            type: "POST",
            url: "../ajax/update_state_data.php",
            data:{id: id, code: state_code_edit, name: state_name_edit},
            
            success: function(data){
                jQuery("#editstate").modal('hide');
                alert("DATA UPDATED Successfully");
            }
            });

}
</script>
</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>


</html>