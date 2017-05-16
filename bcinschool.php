<?php
  include_once('Mobile-Detect/Mobile_Detect.php');
  $detect = new Mobile_Detect();
  $mobile = $detect->isMobile();
?>

<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scaled=1">
          <title>WHY BC?</title>
      <link href="css/bootstrap.min.css" rel="stylesheet" />
      <link href="css/bootstrap-theme.min.css" rel="stylesheet" />
       <link href="fonts/css/font-awesome.css" rel="stylesheet" />
       <link href="css/agency.css" rel="stylesheet"> 
      <link href="shrink.css" rel="stylesheet" />
 <style type="text/css">

</style>
</head>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-91844389-1', 'auto');
  ga('send', 'pageview');

</script>

<body>

<?php include_once('navigationbar.php'); ?>
              
  <div class="row" id="whyBC" style="margin-top: <?php echo $mobile?"40%":"6%"; ?>;">
    <div class="container" style="background-color:#f1f2ea; 
      <?php echo $mobile ? "width: 80%": "width: 90%;"; ;?>">
      <center><h2>WHY BEECREATIVE?</h2></center>
        <hr style="border-color: white;">
        <div class="col-md" style="font-size:18px;">
          <p>For Principal, School Leaders, Teachers and Parents,</p>

          <p style="text-align: justify;">You know better than I do that a great school is about more than just test results. Good schools deliver good marks in board exams. But great schools deliver good marks and much more. Great schools know that their students need 21st century skills to prepare them for what comes after their degrees, whether the SLC or a PhD. Through many hours of conversations with school leaders, I know that many schools in Nepal want to innovate their teaching and learning methods. </p>

          <p style="text-align: justify;">These schools also know that innovation is not a solo project. They need the support of experts to introduce innovative ideas into their curriculum. In the 21st century, we need to think of schools as platforms which allow our children to access specialist educators from across disciplines. Through our BeeCreative program, Karkhana provides specialists who will make your science, computing, OBT and math education joyful and exciting. 
          </p>
          <p style="text-align: justify;">
          BeeCreative (BC) is a co-curricular program designed to bring stimulating hands-on experiences into the classroom. These experiences do not replace the regular curriculum, instead they enhance it. BC raises students’ curiosity about what they learn in their regular Science, Computing, OBT and Math classes. By getting students excited about these topics, BC increases their willingness to learn in regular classes. BeeCreative creates classes that are interactive, practical but still curricular. 
          </p>
          <p style="text-align: justify;">
          I often describe the BeeCreative program through an analogy. To grow into healthy adults, children need nutritious meals. For us in Nepal, that  meal would be some lovingly prepared ‘dal’, ‘bhat’, and ‘tarkari’. Yet, we all know that just eating dal, bhat, tarkari everyday can get boring. That is why we invented ‘achaar’ - to make meals more interesting and increase our willingness to eat necessary nutritious food.
          </p>
          <p style="text-align: justify;">
          Think of BeeCreative as achaar for Science, Math, OBT and Computing classes. Your regular curricular classes are the dal, bhat and tarkari that all students need. We provide the achaar to make sure they eat their full share of dal-bhat-tarkari. Our experience shows that the BeeCreative achaar will make your students more eager to learn in their regular classes. 
          </p>
          <p style="text-align: justify;">
          As you get to know our work you will discover a long list of reasons to implement the BeeCreative package. But the best reason you will find is that students love our classes. And as principals and teachers in our partner schools will tell you, their students look forward to Karkhana classes all week.I hope you will find enough reasons to consider this program for your school. Please be ensured we are with you in this journey of change.   
          </p>

          <br>
          <p>Pavitra Gautam</p>
          <p>CEO, Karkhana</p>
        </div>
    </div>
  </div>
  <br>
     
<?php include_once('footer.php'); ?>
<script src="js/jquery.js"></script>
<script src="shrink.js"></script>
<script src="js/bootstrap.min.js"></script>
 
</body>
</html>