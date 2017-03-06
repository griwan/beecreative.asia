<div class="container">
  <div class="navbar navbar-default navbar-fixed-top">
    <div class="container"> 
      <a class="navbar-brand" href="">Bee Creative</a>
        <button class="navbar-toggle" data-toggle="collapse" data-target=".navbarHeaderCollapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        
        <div class="collapse navbar-collapse navbarHeaderCollapse">

          <ul class="nav navbar-nav navbar-right">
            <li class=""><a href="index.php">Profile</a></li>
            <li class="dropdown" ><a class="dropdown-toggle" data-toggle="dropdown" href="#">Delivery info<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="schoolDeliveryInfo.php">School Delivery</a></li>
                <li><a href="bcteacher.php">Teacher Delivery</a></li>
                <li><a href="content.php">Content Delivery</a></li>
              </ul>
            </li>
        
            <li class="dropdown" ><a class="dropdown-toggle" data-toggle="dropdown" href="#">BC Schools<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="schoollist.php">School Info</a></li>
                <li><a href="teachercontact.php">Teacher Contact</a></li>
              </ul>
            </li>
            <li><a href="../newTest" target="_blank">Feedback</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-left">
            <?php if(isset($_SESSION['login_user'])){ ?>
            <form action="logout.php">
            <li class="form-inline">
              <div class="form-group">
                <input type="submit" class="btn btn-danger" value="Logout">
              </div>
            </li>
            </form>
            <?php } ?>

          </ul>
        </div>
    </div>
  </div>
</div>
