<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Benny's Rental</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assets/css/demo.css" rel="stylesheet" />
</head>
<?php
        require "config/config.php";
        require "config/db.php";


        $id = $_GET['id'];
        $query_Id = "SELECT * FROM vehicle WHERE vehicle_id=$id";
        $result_Id = mysqli_query($conn, $query_Id);

        if(count(array($result_Id))==1){
            $vehicle = mysqli_fetch_array($result_Id);
            $vehicle_id  = $vehicle['vehicle_id'];
            $vehicle_model  = $vehicle['vehicle_model'];
            $vehicle_type = $vehicle['vehicle_type'];
            $color = $vehicle['color'];
            $plate  = $vehicle['plate'];
            $vehicle_status  = $vehicle['vehicle_status'];

        }
        
        mysqli_free_result($result_Id);

        $query = "SELECT vehicle_id From vehicle";
        $customer = mysqli_query($conn, $query);

        if(isset($_POST['submit'])){
            
            $vehicle_id = mysqli_real_escape_string($conn, $_POST['vehicle_id']);
            $customer_id = mysqli_real_escape_string($conn, $_POST['customer_id']);
            $vehicle_model = mysqli_real_escape_string($conn, $_POST['vehicle_model']);
            $vehicle_type = mysqli_real_escape_string($conn, $_POST['vehicle_type']);
            $color = mysqli_real_escape_string($conn, $_POST['color']);
            $plate = mysqli_real_escape_string($conn, $_POST['plate']);
            $vehicle_status = mysqli_real_escape_string($conn, $_POST['vehicle_status']);
            
          
            $query = "UPDATE vehicle SET vehicle_id = '$vehicle_id', vehicle_model = '$vehicle_model', vehicle_type = '$vehicle_type', color = '$color', plate = '$plate', vehicle_status = '$vehicle_status' WHERE vehicle_id = $id";
            header("Location: http://localhost/solo/vehicle.php");

            if(mysqli_query($conn, $query)){
            }else{
                echo "ERROR: " . mysqli_error($conn); 
            }

            mysqli_close($conn);  
            
        }

    ?>

<body>
   
    <div class="wrapper">
        <div class="sidebar"data-color="purple" data-image="assets/img/cars.png">
      
            <div class="sidebar-wrapper">
               <?php include('include/sidebar.php');?>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <?php include('include/navbar.php');?>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="section">
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Edit Vehicle</h4>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
                                        <div class="row">
                                        <div class="col-md-4 pr-1">
                                                <div class="form-group">
                                                    <label>VEHICLE ID</label>
                                                    <input type="text" class="form-control" name="vehicle_id" value="<?php echo $vehicle_id; ?>" >
                                                </div>
                                            </div>
                                        <div class="col-md-4 pr-1">
                                                <div class="form-group">
                                                    <label>VEHICLE MODEL</label>
                                                    <input type="text" class="form-control" name="vehicle_model" value="<?php echo $vehicle_model; ?>" >
                                                </div>
                                            </div>
                                            <div class="col-md-4 pr-1">
                                                <div class="form-group">
                                                    <label>VEHICLE TYPE</label>
                                                    <input type="text" class="form-control" name="vehicle_type" value="<?php echo $vehicle_type; ?>" >
                                                </div>
                                            </div>
                                            <div class="col-md-4 pr-1">
                                                <div class="form-group">
                                                    <label>VEHICLE COLOR</label>
                                                    <input type="text" class="form-control" name="color" value="<?php echo $color; ?>" >
                                                </div>
                                            </div>
                                            <div class="col-md-4 pr-1">
                                                <div class="form-group">
                                                    <label>VEHICLE PLATE</label>
                                                    <input type="text" class="form-control" name="plate" value="<?php echo $plate; ?>" >
                                                </div>
                                            </div>
                                            <div class="col-md-4 pr-1">
                                                <div class="form-group">
                                                    <label>VEHICLE RENT STATUS</label>
                                                    <input type="text" class="form-control" name="vehicle_status"  value="<?php echo $vehicle_status; ?>" >
                                                </div>
                                            </div>

                                        </div>       
                                        <button type="submit" name="submit" class="btn btn-success btn-fill pull-right">Save</button>
                                       <div class="clearfix"></div>
                                </form>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="footer">
                <div class="container-fluid">
                    <nav>
                        
                    <p class="copyright text-center">
                            © BENNY RENTALS,   
                          Rent car for your needed vehicle
                        </p>
                    </nav>
                </div>
            </footer>
        </div>
    </div>
    
</body>
<!--   Core JS Files   -->
<script src="assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="assets/js/plugins/bootstrap-switch.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Chartist Plugin  -->
<script src="assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>

</html>