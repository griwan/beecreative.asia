<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scaled=1">
  <title>BeeCreative</title>
  <link href="css/bootstrap.min.css" rel="stylesheet" />
  <link href="css/bootstrap-theme.min.css" rel="stylesheet" />
  <link href="shrink.css" rel="stylesheet" />
  <link href="fonts/css/font-awesome.css" rel="stylesheet" />
  <link href="css/agency.css" rel="stylesheet">
<style type="text/css">
  .btn{
    color:white; 
    background-color:transparent;
    border:1px solid white;
    height:50px;
    width:150px;
  }

  .btn:hover{
    background-color:#e6b800;
    color:white;
    transition: background-color 0.5s;
   -webkit-transition:background-color 0.5s;
  }

  .bgImage
  {
    position: fixed;
    left: 0;
    right: 0;
    top: 0;
    z-index: -1;

    background-image: url('img/led.jpg');
    background-size: 100% auto;
    background-repeat: no-repeat; 
    max-width: 100%;
    max-height: 100%; 
    width: 100%;
    height: 100%;

    filter: contrast(120%);

  }

  .content
  {
    position: fixed;
    left: 0;
    right: 0;
    z-index: 9999;
  }


</style>
  
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-91844389-1', 'auto');
  ga('send', 'pageview');

</script>  
  
</head>

<body bgcolor="#eef2d5"> 
  <!--navigation bar -->
<?php include_once ('navigationbar.php'); ?>
<div class="bgImage"></div>

<div class=".content" >
<center>
  
  <div style="padding:20px; position:relative; margin-top: 70px; height: 240px">
    <ul class="list-inline social-buttons">
      <li class="list-inline-item">
        <a href="https://www.instagram.com/explore/locations/882803092/" target="_blank">
          <i class="fa fa-instagram"></i>
        </a>
      </li>
      <li class="list-inline-item">
        <a href="https://www.facebook.com/LetsBeeCreativeNow/" target="_blank"><i class="fa fa-facebook"></i></a>
      </li>
      <li class="list-inline-item">
        <a href="https://www.youtube.com/user/karkhanalabs" target="_blank">
          <i class="fa fa-youtube"></i>
        </a>
      </li>
    </ul>
  </div>
  <h3 style="padding-bottom: 50px; color:white; font-size:60px;  ">
    “FUN CO-CURRICULAR ACTIVITIES FOR MIDDLE SCHOOL”
  </h3>
</center>
</a>
<center>       
  <div class="btngroup" style="padding-bottom: 48px;">
    <a class="navbtn" href="#aboutus"><button class="btn" ><b>About Us</b></button></a>
  </div>                     
</center>
   
<div id="aboutus" style="margin-top:50px;background-color:#f1f2ea;height:100%;border:40px solid white;">
  <center><h1 style="color:#e6b800; ">ABOUT US</h1></center>
    <div style="font-size:18px;" >
    <div class="container"> 
      <center> 
        <p style="text-align: justify;"> 
          BeeCreative is a co-curricular program in which our teachers carry kits and come to your school to teach your students in your own classroom. The classes are hands-on, interactive, and related to the curriculum. The BeeCreative program is currently designed for students between grades 5 and 8. We are expanding the program for lower grades. 
        </p>
        <p style="text-align: justify;">
          BC classes are designed to increase your students’ curiosity about what they learn in regular classes. Thus, the classes are organized into clusters, with each cluster directly linked to a specific part of the curriculum. Our extensively trained teachers are from a diverse range of fields. Given our history and interests, we have many teachers who were once engineers. At the same time, we also have teachers from fields as diverse as social work and management.
        </p>
      </center><br>
    </div>
  </div>
</div>

</div>
 <?php include_once('footer.php'); ?>
<script src="js/jquery.js"></script>
<script src="shrink.js"></script>
<script src="js/bootstrap.min.js"></script>
 
</body>
</html>
