 <?php
require 'includes/form_handlers/register_handler.php';
require 'includes/form_handlers/login_handler.php';

  include 'includes/headsection.php';
   include 'includes/navheader.php'; ?>
       <form action="index.php" class="navbar-form navbar-right">
          <div class="form-group">
            <input type="text" class="form-control " placeholder="Search" name="Search">
          </div>
          <button class="btn-btn-default" name="SearchButton">Go</button>
        </form>
     </div><!-- /.navbar-collapse -->
</nav>
<br>
    <br>
    
     <div class="container">
      <?php  if (isset($_GET["SearchButton"])) {
                $Search=$_GET["Search"];
                $viewquery="SELECT * FROM social WHERE datetime LIKE '%$Search%' OR jobtype LIKE '%$Search%' OR   datetime LIKE '%$Search%' ";
              }?>
      <div style="margin-top: 20px;" class="row">
        <div class="col-sm-4">
       <a href="roomportal.php">
        
          <img class="img-circle img-responsive" src="images/ineedjob.jpg" alt="">
          <center><h3>One little change in world 
            <small>when their will not a unemployee in any house</small>
          </h3>
          <p>A lot of people find jobs here.</p></center>
       
        </a>
        </div>
         <div class="col-sm-4">
      <a href="#">
       
          <img class="img-circle img-responsive" src="images/formar2.jpg" alt="">
          <center><h3>Now formar can sold or buy stuffs with 
            <small>fair price</small>
          </h3>
          <p>Find buyer and solder near you</p></center>
       
        </a>
        </div>
        <div class="col-sm-4">
       <a href="#">
       
          <img class="img-circle img-responsive" src="images/smartvillage.jpg" alt=""><br>
         <center><h3>other services
            <small>other</small>
          </h3>
          <p>now the villeges will not be a villege now they should call smart villeges</p></center>
      
       </a>
       </div>
      </div>

    </div>
    
   <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>
    <?php 
    include 'includes/footer.php';
?>
  </body>

</html>
