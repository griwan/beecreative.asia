 <?php
    include('dbconnector.php');

    $db_helper = new DBController();

    $query = "SELECT * FROM Teacher_MasterList";
    $teacher = $db_helper->runQuery($query);

    $fileRoot = "teachers/teacher_photos/teacher";

  ?>

 <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scaled=1">
  <title>Home-BeeCreative</title>
  <link href="css/bootstrap.min.css" rel="stylesheet" />
  <link href="css/bootstrap-theme.min.css" rel="stylesheet" />
  <link href="shrink.css" rel="stylesheet" />
  <link href="fonts/css/font-awesome.css" rel="stylesheet" />
  <link href="css/agency.css" rel="stylesheet">
 
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-91844389-1', 'auto');
  ga('send', 'pageview');

</script>
 
</head>

<?php include_once('navigationbar.php');?>

<body>
<br/><br/><br/>
<div class="container">
  <div class="row">
    <div class="col-lg-12 text-center">
      <h2 class="section-heading">Our Amazing Team</h2>
      <h3 class="section-subheading text-muted">Meet our amazing teachers who take the beecreative classes.</h3>
    </div>
  </div>
  <div class="team-member">
    <div class="row">
    <?php 
      foreach($teacher as $teacherData)
      {
        if(!empty($teacherData['Bio'])){
          $fileName = $fileRoot.$teacherData['TeacherID'];
          if(glob($fileName."*"))
          {
            $fileName = glob($fileName."*");
            $fileName = $fileName[0];
            //echo $fileName;
          }
    ?>
    
    <div class="col-sm-4">
      <a href="##" data-toggle="collapse" data-target=".<?php echo $teacherData['FirstName'] ?>"> 
        <img src="<?php echo $fileName;?>" class="img-circle" alt="" style="border:5px solid #d9d9d9;">
      </a>
      <h4><?php echo $teacherData['FirstName']." ".$teacherData['BichakoName']." ".$teacherData['LastName']?></h4>
      <br>
      <div class="collapse <?php echo $teacherData['FirstName']?>">
        <p><?php echo $teacherData['Bio']; ?></p>
      </div>
    </div>
    <?php }}?>
    </div>
  </div>
</div>

<?php include_once('footer.php');?>
  <script src="js/jquery.js"></script>
  <script src="shrink.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
