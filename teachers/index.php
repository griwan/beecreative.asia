<?php
  session_start();
  include_once('dbconnector.php');

  if(!isset($_SESSION['login_user']))
  {
    header("location: ../login/");
  }
  else if($_SESSION['privilege'] != 2 )
  {
    header("location: ../login/");
  }

  $db_handler = new DBController();
  $teacherName = "";
  $bio = "";
  if($_SESSION['teacherid'] == 0)
    $teacherName = $_SESSION['login_user'];
  else
  {
    $query = "SELECT FirstName, Bio FROM Teacher_MasterList WHERE TeacherID = ".$_SESSION['teacherid'];
    $result = $db_handler->runQuery($query);
    
    foreach ($result as $data)
    {
      $teacherName = $data['FirstName'];
      $bio = $data['Bio'];
    }
  }

  $path = "teacher_photos/";
  $fileName = "teacher".$_SESSION['teacherid'];
  $fileExists = 0;
  if(glob("teacher_photos/$fileName.*"))
  {
    $fileExists = 1;
    $fileName = glob($path.$fileName."*");
    $fileName = $fileName[0];
  }
  else
  {
    $fileExists = 0;
    $fileName = $path."nophoto.jpg";
  }

  //include the teacherKeyPair.php that contains the class
  //and functions required for processing in this page
  include('teacherKeyPair.php');

  //get the teacher id using the get method (passed using get method)
  $teacherID = $_SESSION['teacherid'];

  //query to get the data from schooldelivery table where leadteacherid is $teacherID
  $query = "SELECT * FROM SchoolDelivery WHERE LeadTeacherID = $teacherID"; 
  //get the values from the query as array and stor in leadDelivery
  $leadDelivery = $db_handler->runQuery($query);

  //query to get the data from schooldelivery table where supportteacherid is $teacherID
  $query = "SELECT * FROM SchoolDelivery WHERE SupportTeacherID = $teacherID";
  //get the values from the query as array and store in supportDelivery
  $supportDelivery = $db_handler->runQuery($query);

  //query to get the data from contentmasterlist table
  $query = "SELECT * FROM Content_MasterList";
  //get the values from the query as array and store in contentList
  $contentList = $db_handler->runQuery($query);

  //query to get the first name from teacher masterlist table where teacherid = $teacherID
  $query = "SELECT * FROM Teacher_MasterList WHERE TeacherID = $teacherID";
  //get the values from the query as array and store in teacher
  $teacher = $db_handler->runQuery($query);

  //query to get the all data from school master list
  $query = "SELECT * FROM School_MasterList";
  //get the values from the query as array and store in school
  $school = $db_handler->runQuery($query);

  //initialize the tecaherName variable
  $teacherName = "";

  //get the first name of the teacher
  foreach($teacher as $teacherData){
    $teacherName = $teacherData['FirstName'];
    break;
  }

  //initialization of variables
  $keyPair = array();
  $objCount = 0;
  $schoolName = $contentName = "";

  if(!empty($leadDelivery)){
    //main loop to run through lead delivery data
    foreach($leadDelivery as $leadDeliveryData)
    {

      //loop to find the school name
      foreach($school as $schoolData){
      
        if($leadDeliveryData['SchoolID'] == $schoolData['SchoolID']){
          $schoolName = $schoolData['SchoolName'];
          break;
        }
      
      }

      //loop to find the content name
      foreach($contentList as $contentData){

        if($leadDeliveryData['ContentID'] == $contentData['ContentID'])
        {
          $contentName = $contentData['ContentName'];
          break;
        }

      } 

      //create the object
      $keyPair[$objCount++] = new TeacherKeyPair($schoolName, $contentName);
    }
  }

  if(!empty($supportDelivery)){
    //main loop to run through support delivery data
    foreach($supportDelivery as $supportDeliveryData){

      //loop to find the school name
      foreach($school as $schoolData){
      
        if($supportDeliveryData['SchoolID'] == $schoolData['SchoolID']){
          $schoolName = $schoolData['SchoolName'];
          break;
        }
      
      }

      //loop to find the content name
      foreach($contentList as $contentData){

        if($supportDeliveryData['ContentID'] == $contentData['ContentID'])
        {
          $contentName = $contentData['ContentName'];
          break;
        }

      }

      //create the object
      $keyPair[] = new TeacherKeyPair($schoolName, $contentName);
      //count the number of objects created
      $objCount++;
    }
  }

  for($objectIndex = 0; $objectIndex < $objCount; $objectIndex++)
  {
    if(!$keyPair[$objectIndex]->getChecked())
    {
      //the first object is counted as 1
      $keyPair[$objectIndex]->found();

      //loop for searching next objects
      for($searchIndex = $objectIndex+1; $searchIndex < $objCount; $searchIndex++)
      {
        //check if the two objects are same
        if($keyPair[$objectIndex]->search() == $keyPair[$searchIndex]->search())
        {
          //if they are same, set the next object's check flag to true
          $keyPair[$searchIndex]->setChecked();
          //increment the count in the primary object
          $keyPair[$objectIndex]->found();
        }
      }
    }

  }

?>
<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scaled=1">
  <title>Profile-Teacher Portal</title>
  <link href="css/bootstrap.min.css" rel="stylesheet" />
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.dataTables.min.js"></script>
  <script src="js/dataTables.bootstrap.min.js"></script>
  <script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
  </script>
</head>
<body> 

<?php include_once('navigation.php');?>
	
<div class="container">
  <div>
    <div class="jumbotron">
		  <h1> Welcome <?php echo $teacherName;?>!</h1>
    </div>
    <div class="row">
      <div class="jumbotron col-md-7 col-xs-12" style="padding-top: 2px; padding-bottom: 2px; padding-right: 2px; padding-left: 2px;">
        <div class="container">
          <center><h3>My Delivery Details</h3></center>
          <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>School</th>
                <th>Content</th>
                <th>Number of Sessions</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                for($i=0; $i<$objCount; $i++)
                {
                  if(!$keyPair[$i]->getChecked()){
              ?>
              <tr>
                <td><?php echo $keyPair[$i]->getSchool();?></td>
                <td><?php echo $keyPair[$i]->getContent();?></td>
                <td><?php echo $keyPair[$i]->getDeliveryCount();?></td>
              </tr>

              <?php
                  }
                }
                unset($keyPair);
              ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="col-md-1"></div>
      <div class="jumbotron col-md-4 col-xs-12" style="padding-top: 20px; padding-bottom: 20px; padding-left: 20px; padding-right: 20px;">
        <div class="row">
          <div class="col-md-12 col-xs-12">
            <center>
              <img src="<?= $fileName;?>" width=200 height=200>
            </center>
          </div>
          <div class="col-md-12 col-xs-12">
            <h2>Bio</h2><br>
            <?= $bio;?>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include_once('footer.php');?>
</div>
</body>
</html>