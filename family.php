<?php // require 'config/config.php';
 
 ?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Room Portal</title>
    <link href="assets/css/dashStyle.css" rel="stylesheet">

  </head>

  <body>

 

   <link href="assets/css/dashStyle.css" rel="stylesheet">
    <!-- Page Content -->
    <div class="container-fluid">
     <div class="row">
       
   

            <?php 
             $con=mysqli_connect('localhost','root','root');
             $ConnectingDB=mysqli_select_db($con,"roomfinder");
    
     
             if (isset($_GET["SearchButton"])) {
                $Search=$_GET["Search"];
                $viewquery="SELECT * FROM roominfo WHERE datetime LIKE '%$Search%' OR city LIKE '%$Search%' OR address LIKE '%$Search%'  OR levelset LIKE '%$Search%' OR rent LIKE '%$Search%'";
              }else{ 
                //if(isset($_POST['city'])){
                //  $viewquery="SELECT * FROM roominfo where city='$_POST['City']'";
               // }else{
                $viewquery="SELECT * FROM roominfo where Catagory='Family'" ;
               // }
                }
                $count=0;
                $execute=mysqli_query($con,$viewquery);
              while($dataRows=mysqli_fetch_array($execute)) {
              $Id=$dataRows["id"];
              $Landlord=$dataRows["landlord"];
              $Address=$dataRows["address"];
          //    $City=$dataRows["city"];r
            //  $State=$dataRows["state"];
          //    $Contact=$dataRows["contact"];
              $Rent=$dataRows["rent"];
         
            //  $Contact=$dataRows["contact"];
              $Info=$dataRows["info"];
              $Image1=$dataRows["image1"];
              $Levelset=$dataRows["levelset"]; 
              $Datetime=$dataRows["datetime"];
              $Address=$dataRows["address"];
              $username = $dataRows["username"];
              $contact = $dataRows["contact"];
            
              ?>          
          <div class="row feedInside">
  
            <div class="col-lg-12 col-sm-12 col-md-12 ">
              <div style="overflow:hidden" class="card">
                <a href="fullpost.php?fullid=<?php echo $Id ;?>">
                  <div style="float: right;" class="col-sm-4" >                    
                  <img  class="img-responsive" style="height: 200px;width:300px; " src="uploadedimg/<?php echo htmlentities($Image1); ?>" alt="">
                 </div>
                <div class="card-body">
                  <h4 class="card-title">
                     Address:<span style="color:black;"> <?php echo htmlentities($Address);?></span>
                  </h4>
                  <h4>Type: <span style="color:black;"><?php echo htmlentities($Levelset); ?> &nbsp;room set</span></h4>
                  <h5>published by: <span style="color:black;"><?php echo htmlentities($username); ?></span></h5>
                  <h5>published on:<span style="color:black;" > <?php echo htmlentities($Datetime); ?></span></h5>
                  <h5>Contact: <span style="color:black;"><?php echo htmlentities($contact); ?></span></h5>
                  <br>
                  <br>
                </div>
                <div class="card-footer">
                 <h4 style="color:black;">
                      Rent <i class="fa fa-rupee"> </i><span> <?php echo htmlentities($Rent); ?> </span>
                  </h4>
                </div>
              </a>  
              </div>
            
             
            
          </div>
        <!--row ends...........................-->
         <!--div class="card w-75">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Button</a>
  </div>
</div-->
          <?php  }//end of while loop ?>
          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

   <?php
include 'includes/footer.php';
?>
  </body>

</html>
