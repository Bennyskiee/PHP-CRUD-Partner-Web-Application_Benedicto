
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

<body>

<?php
        require('config/config.php');
        require('config/db.php');

        $results= 10;
        $query = "SELECT * FROM rent";
        $result = mysqli_query($conn, $query);
        $number_of_result = mysqli_num_rows($result);
        $number_of_page = ceil($number_of_result / $results);

       
        if(!isset($_GET['page'])){
            $page = 1;
        }else{
            $page = $_GET['page'];
        }

        $page_first_ = ($page-1) * $results;
        $query = "SELECT rent.rent_id, rent.vehicle_id, rent.customer_id, rent.rent_start, rent.rent_end FROM rent
                  WHERE rent.rent_id = rent.rent_id ORDER BY rent.rent_id ASC LIMIT $page_first_, $results";
        $result = mysqli_query($conn, $query);
        $rents = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_close($conn);
    ?>

<div class="wrapper">
        <div class="sidebar" data-image="assets/img/car.png">
           
        <div class="sidebar-wrapper">  
        <?php include('include/sidebar.php'); ?>
   
        </div>
        </div>
        <div class="main-panel">
        <?php include('include/navbar.php'); ?>
            
        <div class="content">
        <div class="container-fluid">
        <div class="section">
            </div>
                <div class = "row">
                <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">
                <br/>
                <div class="col-md-12">
                <a href="rent_add.php">
                    <button type="submit" class="btn btn-dark btn-fill pull-right">Add Rented</button>
                        </a>
                        </div>
                        <div class="card-header ">
                        <h4 class="card-title">RENTED VEHICLE</h4>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped">
                        <thead>
                            <th>Rent ID</th>
                            <th>Customer ID</th>
                            <th>Vehicle ID</th>                    
                            <th>Rent Start</th>
                            <th>Rent End</th>
                            
                           
                        </thead>
                            <tbody>
                        <?php foreach($rents as $rent) : ?>
                            <tr>
                            <td><?php echo $rent['rent_id']; ?></td>
                            <td><?php echo $rent['customer_id']; ?></td>
                            <td><?php echo $rent['vehicle_id']; ?></td>
                            <td><?php echo $rent['rent_start']; ?></td>
                            <td><?php echo $rent['rent_end']; ?></td> 
                            

                            <td>
                            <a href="rent_edit.php?id=<?php echo $rent['rent_id']; ?>" style="padding-right: 20px;">
                            <button type="submit" class ="btn btn-primary btn-fill pull-right ">Edit</button>
                            </a>

                             <a href="rent_delete.php?rent_id=<?php echo $rent['rent_id']; ?>">
                            <button type="submit" class ="btn btn-danger btn-fill pull-right">Delete</button>
                            </a>
                            
                        </td>
                        
                            </tr>
                        <?php endforeach ?>
                            </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                    </div>
                    <?php
                        for($page=1; $page <= $number_of_page; $page++){
                        echo '<a href = "client.php?page='. $page .'" style="margin-right: 3px">' . $page . '</a>';
                        }
                    ?> 
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
