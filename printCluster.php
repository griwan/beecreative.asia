<?php
    //include('session.php');
    include('dbconnector.php');

  
    $db_helper = new DBController();

    $cmid = $_GET['cmid'];

    $query = "SELECT * FROM ClusterMaster WHERE CMID=$cmid";
    $clusterResult = $db_helper->runQuery($query);

    $query = "SELECT * FROM ContentClusterLink WHERE CMID=$cmid";
    $contentCluster = $db_helper->runQuery($query);

    $query = "SELECT * FROM Content_MasterList";
    $contentList = $db_helper->runQuery($query);

    $creativity=$collaboration=$communication=
        $criticalThinking=$handsOn=0;

    $contentCount=0;

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cluster Details</title>
     <link href="css/bootstrap.min.css" rel="stylesheet" />
      <link href="css/bootstrap-theme.min.css" rel="stylesheet" />
       <link href="shrink.css" rel="stylesheet" />
       <link href="fonts/css/font-awesome.css" rel="stylesheet" />
       <link href="css/agency.css" rel="stylesheet">
<style>
    h1{
        color:#800080;
    }
	.mainDiv{
		height: 100%;
		width:: 100%;
        padding-top:65px;  
	}
	.tie_criteria{
		width:100%;
	}
	.curricularClass{
		width:40%;
		position:absolute;
		margin-left: 10%;
	}
	.criteriaClass{
	width: 30%;
	margin-left:24.3%;
	position: relative;
	left: 35%;
	top: 10%;
	}
	.tagClass{
		width:80%;	
	}
	.descriptionClass{
		width:80%;
	}
	.courseClass{
		width:80%;
	}
    .curricularLabel{
        font-size: 1.2em;
        color: #ffffff;
        font-weight: bold;
        background: #804080;
        padding: 2%;
    }
    .criteriaLabel{
        font-size: 1.2em;
        color: #ffffff;
        font-weight: bold;
        background: #804080;
        padding: 3%;
    }
    label{
        font-size: 1.2em;
        color: #ffffff;
        font-weight: bold;
        background: #804080;
        padding: 1%;
        font-family: "Monospace";
    }
    hr{
        background-color: #804080;
        height: 2px;
        color: #804080;
    }
    p{
        font-size: 1.1em;
    }
    .progress{
              width:230px;             
             }
    .progress-bar{
                  background-image:none;
                  background-color:#804080;
                 }         
</style>

</head>

<body>
<?php include_once('navigationbar.php'); ?>
	<div class="mainDiv">
    <center>
    	<?php foreach($clusterResult as $clusterData){?>
        <div class="clusterClass">
        	<center>
            	<h1>
                	<?php echo $clusterData['ClusterName'];?>
                </h1>
            </center>
        </div>
    
    	<div class="descriptionClass" align="left">
        	<label>DESCRIPTION</label>
            <hr>
            <p class="descriptionInfo">
                <?php echo $clusterData['Description'];?>
            </p>
        </div>
        
        <div class="courseClass" align="left">
        	<label>COURSE STRUCTURE</label>
            <hr>
            <p class="courseInfo">
                <?php
                if(!empty($contentCluster))
                {
                    foreach($contentCluster as $clusterLinks)
                    {
                        foreach ($contentList as $contentData){
                            if($contentData['ContentID'] == $clusterLinks['CID'])
                            {
                                echo "<b>".$contentData['ContentName'].":</b> ".$contentData['LearningObjective']." <br><br>";
                                $creativity+=$contentData['Creativity'];
                                $collaboration+=$contentData['Collaboration'];
                                $criticalThinking+=$contentData['Critical Thinking'];
                                $communication+=$contentData['Communication'];
                                $handsOn+=$contentData['Hands-on'];
                                $contentCount++;                            }
                        }
                    }
                }
                ?>
            </p>
        </div>
        
      <div class="tie_criteria" align="left">
        	<div class="curricularClass">
            	<label class="curricularLabel">CURRICULAR TIES</label>
                <hr>
                <p class="curricularInfo">
                    <?php
                        if(!empty($clusterData['ScienceTie']))
                        {
                            echo "<b>Science:</b> <br>".$clusterData['ScienceTie']."<br>";
                        }
                        if(!empty($clusterData['MathTie']))
                        {
                            echo "<b>Math:</b> <br>".$clusterData['MathTie']."<br>";
                        }
                        if(!empty($clusterData['LanguageTie']))
                        {
                            echo "<b>English:</b> <br>".$clusterData['LanguageTie']."<br>";
                        }
                        if(!empty($clusterData['ComputerTie']))
                        {
                            echo "<b>Computer:</b> <br>".$clusterData['ComputerTie']."<br>";
                        }
                        if(!empty($clusterData['OBTTie']))
                        {
                            echo "<b>Occupation, Business and Technology:</b> <br>".$clusterData['OBTTie']."<br>";
                        }
                        if(!empty($clusterData['OtherTies']))
                        {
                            echo "<b>Other Ties:</b> <br>".$clusterData['OtherTies']."<br>";
                        }
                    ?>
                </p>
            </div>
            <?php 
$coll=round(($collaboration/$contentCount)*100,2);
$comm=round(($communication/$contentCount)*100,2);
$crit=round(($criticalThinking/$contentCount)*100,2);
$hand=round(($handsOn/$contentCount)*100,2);
$creat= round(($creativity/$contentCount)*100,2);           ?>
          <div class="criteriaClass">
           	  <label class="criteriaLabel">KARKHANA CRITERIA</label>
              <hr>
              <p>
              <b>Creativity:</b><div class="progress" style="margin-top:-32px; margin-left:125px;">  
  <div class="progress-bar" role="progressbar" style="width:<?php echo $creat; ?>%" aria-valuenow="<?php echo $creat; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $creat; ?>%</div>
</div>
                <b>Collaboration:</b> <div class="progress" style="margin-top:-22px; margin-left:125px;">  
  <div class="progress-bar" role="progressbar" style="width:<?php echo $coll; ?>%" aria-valuenow="<?php echo $coll; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $coll;?></div>
</div>
                <b>Communication:</b><div class="progress" style="margin-top:-22px; margin-left:125px;">  
  <div class="progress-bar" role="progressbar" style="width:<?php echo $comm; ?>%" aria-valuenow="<?php echo $comm; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $comm;?></div>
</div>
                <b>Critical Thinking:</b><div class="progress" style="margin-top:-22px; margin-left:125px;">  
  <div class="progress-bar" role="progressbar" style="width:<?php echo $crit; ?>%" aria-valuenow="<?php echo $crit; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $crit;?></div>
</div>
                <b>Hands-On:</b><div class="progress" style="margin-top:-22px; margin-left:125px;">  
  <div class="progress-bar" role="progressbar" style="width:<?php echo $hand; ?>%" aria-valuenow="<?php echo $hand; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $hand;?></div>
</div>
              </p>
           </div> 
          </div>
        </div>
        <?php }?>
    </center>
    </div>
    <script src="js/jquery.js"></script>
<script src="shrink.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>