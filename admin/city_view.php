
<?php session_start(); ?>
<?php include '../config.php'; 
 if(isset($_POST["submit"]) == 'submit'){
     if(isset($_POST['city_name']))
                {

                    $city_name=$_POST['city_name'];

                    if(empty($city_name)){
                    $error_message="State Name Required";
                    
                    }

                    elseif(!preg_match("/^[a-zA-Z]*$/",$city_name)){

                    $error_message="State Name: Number are not allowed";
                    
                            
                    }elseif(strlen($city_name) >=100){

                    $error_message="State Name should not be greater then 100 characters";
                    
                                    
                    }
                    
                    elseif(strlen($city_name) <=3){

                    $error_message="State Name should not be less then 3 characters";
                    
                                    
                    }
                    $array_form_fields['city_name']=$city_name;
                
                    
                    
                }

                if(isset($_POST['city_code']))
                {

                    $city_code=$_POST['city_code'];

                    if(empty($city_code)){
                    $error_message="State Code Required";
                    
                    }

                    elseif(!preg_match("/^[a-zA-Z]*$/",$city_code)){

                    $error_message="City Code: Number are not allowed";
                    
                            
                    }
                    elseif(strlen($city_code) >=4){

                    $error_message="City Name should not be greater then 4 characters";
                    
                                    
                    }
                    elseif(strlen($city_code) <=1){

                    $error_message="City Code should be greater then 1 characters";
                    
                                    
                    }
                    
                    $array_form_fields['city_code']=$city_code;
                
                    
                    
                }


       if(isset($_POST['state_code']))
                {

                    $state_code=$_POST['state_code'];

                    if(empty($state_code)){
                    $error_message="State Code Required";
                    
                    }

                    elseif(!preg_match("/^[a-zA-Z]*$/",$state_code)){

                    $error_message="State Code: Number are not allowed";
                    
                            
                    }
                    elseif(strlen($state_code) >=4){

                    $error_message="State Code should not be greater then 4 characters";
                    
                                    
                    }
                    elseif(strlen($state_code) <=1){

                    $error_message="State Code should be greater then 1 characters";
                    
                                    
                    }
                    
                    $array_form_fields['state_code']=$state_code;
                
                    
                    
                }

                $_SESSION['FORM_FIELDS']=$array_form_fields;
                            if(empty($error_message))
                        {
                           $sql = "INSERT INTO city_master (id,city_name,city_code,state_code)
VALUES ('','".$city_name."','".$city_code."','".$state_code."')";

if ($conn->query($sql) === TRUE) {
    $_SESSION['CITY_ADD_SUCCESS']="City Added Successfully";
                    
} else {
   $error_message= "Error: " . $sql . "<br>" . $conn->error;
   $_SESSION['ERROR_CITY_ADD']=$error_message;
}
                    
                        }
                        else{
                             $_SESSION['ERROR_CITY_ADD']=$error_message;
                        }         
            


}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>City View</title>

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
    <script src="../js/jquery-2.2.3.min.js"></script>
    <script>
    $(document).ready(function(){
        $("#state_code").keyup(function(){
            $.ajax({
            type: "POST",
            url: "../ajax/read_state_code.php",
            data:'keyword='+$(this).val(),
            
            success: function(data){
                $("#suggesstion-box").show();
                $("#suggesstion-box").html(data);
                $("#state_code").css("background","#FFF");
            }
            });
        });
});

function selectCity(val) {
$("#state_code").val(val);
$("#suggesstion-box").hide();
}
</script>


<!--Script to check city code start-->
 <script>
    function checkcitycode()
{
    var code=$("#city_code").val();
            $.ajax({
            type: "POST",
            url: "../ajax/check_city_code.php",
            data:'code='+code,
            
            success: function(data){
                if(data==1){
                    alert("City Code already Exist. Please try a new one");
                    $("#city_code").focus();
                    $("#city_code").css("background","#ff0000 ");
                    $("form").submit(function(e){
                            e.preventDefault();
                            });
                }
                 else{
                    $("#city_code").css("background","#FFFFFF ");
                }
            }
            });

}

</script>
<!--Script to check city code end-->
</head>
<body>

<?php include 'template/navbar.php' ?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">All Cities Registered</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                            
                                    <?php


                                    $datatable = "city_master"; // Database table name
                $results_per_page = 20; // number of results per page
                        if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
                        $start_from = ($page-1) * $results_per_page;
                        $sql = "SELECT * FROM ".$datatable." ORDER BY ID ASC LIMIT $start_from, ".$results_per_page;
                        $rs_result = $conn->query($sql);
                        ?> 
                        <table class="table table-hover table-striped">
                                                            <thead>
                                                                <th>City Name</th>
                                                                <th>City Code</th>
                                                                <th>State Code</th>
                                                            </thead>
                        <?php 
                         while($row = $rs_result->fetch_assoc()) {
                        ?> 
                                    <tr>
                                    <td><?php echo $row["city_name"]; ?></td>
                                    <td><?php echo $row["city_code"]; ?></td>
                                    <td><?php echo $row["state_code"]; ?></td>

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
                                    echo "<a href='city_view.php?page=".$i."'";
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
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data" name="city_add_form">
                                     <?php if(isset($_SESSION['ERROR_CITY_ADD'])){?>
                            <div class="alert alert-danger">
                              <strong>Sorry!</strong> <?php echo $_SESSION['ERROR_CITY_ADD'];$_SESSION[          'ERROR_CITY_ADD']=NULL;?>
                                                        </div>

                              <?php } ?>


                               <?php if(isset($_SESSION['CITY_ADD_SUCCESS'])){?>
                            <div class="alert alert-success">
                              <strong>Success!</strong> <?php echo $_SESSION['CITY_ADD_SUCCESS'];$_SESSION['CITY_ADD_SUCCESS']=NULL;?>
                                                        </div>
                                        <?php }  ?>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>City Name</label>
                                                <input type="text" class="form-control" name="city_name" id="city_name" placeholder="State Name" required="required" pattern="^[a-zA-Z]{2,100}$" title="City Name cannot be less than 2 characters and only letters allowed and maximum 100 characters" maxlength="100">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">City Code</label>
                                                <input type="text" class="form-control" name="city_code" id="city_code" placeholder="State Code" required="required" onkeyup="checkcitycode();" pattern="^[a-zA-Z]{2,4}$" title="City Code cannot be less than 2 characters and only letters allowed and maximum 4 characters" maxlength="100">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">State Code</label>
                                                <input type="text" class="form-control" name="state_code" id="state_code" placeholder="State Code" autocomplete="off" required="required" pattern="^[a-zA-Z]{2,4}$" title="State Code cannot be less than 2 characters and only letters allowed and maximum 4 characters" maxlength="100" >
                                                <div id="suggesstion-box"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                 <label for="exampleInputEmail1"></label><br>
                                                <button type="submit" onsubmit="checkcitycode();" name="submit" class="form-control btn btn-info btn-fill">Add City</button>
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