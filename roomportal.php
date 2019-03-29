<?php // require 'config/config.php';
 
 ?>

<!DOCTYPE html>
<html lang="en" >

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
     <link href="https://fonts.googleapis.com/css?family=Kumar+One+Outline" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Rancho&effect=neon" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Rancho&effect=fire-animation" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Faster+One" rel="stylesheet">
    <title>Room Portal</title>
    <link href="assets/css/dashStyle.css" rel="stylesheet">
     <style>
      #nea {
        font-family: 'Kumar One Outline', cursive;
        font-size: 48px;
      }
      #beauti{
        font-family: 'Faster One', cursive;
      }
    </style>
  </head>

  <body >

 <?php include 'includes/navheader.php'; ?>     
      
       
       </ul>
     </div><!-- /.navbar-collapse -->
</nav>

   <link href="assets/css/dashStyle.css" rel="stylesheet">
    <!-- Page Content -->
    <div class="container-fluid">
     <div class="row">
       <div class="jumbotron">
          <center><a href="roomportal.php" id="beauti" ><h1  class="font-effect-fire-animation">Rent_A_Room.com</h1></a></center>
       </div>
     </div>
      <div class="row" >
         <!--start working from here..--?>
        <!-- /.col-lg-3 -->
        <div class="container filter col-lg-3 col-md-3  col-sm-3 nav nav-pills nav-stacked" data-spy="affix" data-offset-top="150" >
           <form action="roomportal.php" class="navbar-form navbar-right">
            <ul>
               
                <li>
                  
                  <!--<select name="City">
                 <?php 
                      $viewquery="SELECT * FROM cities WHERE state_id='39'";
                      $execute1=mysqli_query($con,$viewquery);
                   while($dataRows=mysqli_fetch_array($execute1)) {

                      $ID=$dataRows['id'];
                      $cityname=null;
                      $cityname=$dataRows['name'];
                
               ?>

             <option><?php echo $cityname; ?></option><?php } ?>
            </select> -->
                </li>
               <br>
               <br>
               <br>
               <li>
                 <label>Catagory In Rooms</label><br><br>
                 <button type="button" class="btn btn-outline-success" onclick="girlsorfamily_fun()">Girls Or Family</button>&nbsp;&nbsp;
                  <button type="button"  class="btn btn-outline-success" onclick="boys_fun()">Boys</button>&nbsp;&nbsp;
                  <button type="button" class="btn btn-outline-success" onclick="girls_fun()">Girls</button><br><br>
                  <button type="button" class="btn btn-outline-success" onclick="family_fun()">Family</button>
                  <button type="button" class="btn btn-outline-success" onclick="boysorgirls_fun()">Boys Or Girls</button><br><br>
                 <button type="button" class="btn btn-outline-success" onclick="boysorfamilyfun()">Boys Or Family</button><br><br>
                 
                                 </li>
              <!-- <li>
                   <label>category</label><br>
                   <div class="checkbox">
                      <label><input type="checkbox" value="">Boys</label>
                    </div>
                    <div class="checkbox">
                      <label><input type="checkbox" value="">Girls</label>
                    </div>
                    <div class="checkbox">
                      <label><input type="checkbox" value="">Family</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="">Other></label>
                    </div>
                </li>-->
                <br>
                <li>
                    <label>Search Filter</label><br> 
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search:Rent Price | City" name="Search">
                  </div>
                
               </li><br>
              
               <br>
               <button class="btn btn-default" name="SearchButton">Go</button> 
            </ul>
            </form>

        </div>


        <div class="container feed" >
         <div id="boys_func">
        <div id="girls_func">
         <div id="family_func">
          <div id="boysorgirls_func">
          <div id="boysoffamily_func">
          <div id="girlsorfamily_func">   
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
                $viewquery="SELECT * FROM roominfo";
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
    <!-- </div> --></div> 
    <!-- /.container -->
  </div>
</div>

</div>

</div>
<div class="container" style="height: 50px;"></div>
<div class="row">
 
  <div class="container" class="font-effect-neon"  ><div id="nea"  style="height: 150px;"  ><center class="font-effect-neon" >Renting Room</center></div>
</div>
</div>
    <!-- Footer -->
    
    
    <!-- Bootstrap core JavaScript -->
      <script type="text/javascript">
      function boys_fun(){
      var content='boys_func';
      var hr=new XMLHttpRequest();
      console.log(hr);
      var url="boys.php";
      hr.onreadystatechange=function(){
      if(this.readyState==4  && this.status==200){
        document.getElementById(content).innerHTML = hr.responseText;
        }
      }
      hr.open("GET",url,true);
      hr.send();
    }
   function girls_fun(){
      var content='girls_func';
      var hr=new XMLHttpRequest();
      console.log(hr);
      var url="girls.php";
      hr.onreadystatechange=function(){
      if(this.readyState==4  && this.status==200){
        document.getElementById(content).innerHTML = hr.responseText;
        }
      }
      hr.open("GET",url,true);
      hr.send();
    }
    
    function family_fun(){
      var content='family_func';
      var hr=new XMLHttpRequest();
      console.log(hr);
      var url="family.php";
      hr.onreadystatechange=function(){
      if(this.readyState==4  && this.status==200){
        document.getElementById(content).innerHTML = hr.responseText;
        }
      }
      hr.open("GET",url,true);
      hr.send();
    }
    function boysorfamilyfun(){
      var content='boysoffamily_func';
      var hr=new XMLHttpRequest();
      console.log(hr);
      var url="boys_family.php";
      hr.onreadystatechange=function(){
      if(this.readyState==4  && this.status==200){
        document.getElementById(content).innerHTML = hr.responseText;
        }
      }
      hr.open("GET",url,true);
      hr.send();
    }
    function boysorgirls_fun(){
      var content='boysorgirls_func';
      var hr=new XMLHttpRequest();
      console.log(hr);
      var url="boys_girls.php";
      hr.onreadystatechange=function(){
      if(this.readyState==4  && this.status==200){
        document.getElementById(content).innerHTML = hr.responseText;
        }
      }
      hr.open("GET",url,true);
      hr.send();
    }
    function girlsorfamily_fun(){
      var content='girlsorfamily_func';
      var hr=new XMLHttpRequest();
      console.log(hr);
      var url="family_girls.php";
      hr.onreadystatechange=function(){
      if(this.readyState==4  && this.status==200){
        document.getElementById(content).innerHTML = hr.responseText;
        }
      }
      hr.open("GET",url,true);
      hr.send();
    }
    </script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
   
   <?php
include 'includes/footer.php';
?>
  </body>

</html>
