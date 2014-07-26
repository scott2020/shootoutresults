<HTML>

<HEAD>
<META HTTP-EQUIV="Content-Language" CONTENT="en-us">
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=windows-1252">
<META NAME="GENERATOR" CONTENT="Microsoft FrontPage 5.0">
<META NAME="ProgId" CONTENT="FrontPage.Editor.Document">
<TITLE>Shootout Class Winners</TITLE>
<link href="../tablecloth/tablecloth.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="../tablecloth/tablecloth.js"></script>
</HEAD>

<BODY>

<h2> Winners of each Class </h2>


Current as of <?=date( "F d, Y  H:i T.")?><br>

<?php
include '../config.php';
include('../register_globals.php');
register_globals();


$con = mysql_connect("localhost", $DB_USER, $DB_PASS)or die("Connect Error: ".mysql_error());
mysql_select_db($DB_NAME,$con);

#  $con = mysql_connect("localhost", "shootout", "shootout")or die("Connect Error: ".mysql_error());
#   mysql_select_db("shootout",$con);

$sql = 'SELECT DISTINCT boat_class'
        . ' FROM `competitors` ORDER BY boat_class ASC';
        
$result = mysql_query($sql);

echo "<hr>";


$num = 0;
$num = mysql_numrows($result);


$i = 0;

echo "<table border='1' width='95%'>";
	echo "<tr>";
	echo "<th width='10%'>Class</th><th width='13%'><p align='center'>Speed</th><th width='24%'><p align='center'>Driver</th><th width='5%'><p align='center'>Boat No</th><th width='20%'>Run Time</th>";
	echo "</tr>";
	echo "</table>";
	
echo "<table border='1' width='95%'>";


while ($i < $num) {
	$boat_class = mysql_result($result,$i,"boat_class");

#	echo "Boat Class is $boat_class <br>";

    $sqlmaxspeed = ("SELECT * FROM speeds WHERE boat_class ='$boat_class' ORDER BY speed DESC LIMIT 1");

	$resultmaxspeed = mysql_query($sqlmaxspeed);
	
	$maxspeednum = mysql_numrows($resultmaxspeed);

	#echo "Resultmaxspeed = $resultmaxspeed with $maxspeednum ROWS<BR>";

	if ($maxspeednum > 0) {

	$maxspeedcompid = mysql_result($resultmaxspeed,0,"competitor_id");
	$maxrunid = mysql_result($resultmaxspeed,0,"run_id");

	#echo "Max sql is : $sqlmaxspeed <BR>";
	#echo "Max run ID : $maxrunid<BR>";
	#echo "Max for dicki class $boat_class is competitor $maxspeedcompid <br><br>";


#	$sqlmaxspeed = ("SELECT speeds.competitor_id, MAX(speeds.speed) AS topspeed FROM speeds GROUP BY speeds.speed");
#	$resultmaxspeed = mysql_query($sqlmaxspeed);
#	$maxspeedcompid = mysql_result($resultmaxspeed,$i,"competitor_id");

#	echo "Max for class $boat_class is competitor $maxspeedcompid <br><br>";


#   $sql2 = ("SELECT competitors.boat_class,competitors.boat_number,competitors.driver_first,competitors.driver_last,competitors.owner_first,competitors.owner_last,MAX(speeds.speed) AS topspeed,date_format(speeds.timestamp, '%m-%d-%y %h:%i:%s %p') AS timeformat FROM competitors, speeds WHERE competitors.boat_class = '$boat_class' AND competitors.competitor_id=speeds.competitor_id GROUP BY competitors.boat_class");

	$sql2 = ("SELECT competitors.boat_class,competitors.boat_number,competitors.driver_first,competitors.driver_last,competitors.owner_first,competitors.owner_last, speeds.speed,date_format(speeds.timestamp, '%m-%d-%y %h:%i:%s %p') AS timeformat FROM competitors, speeds WHERE competitors.competitor_id=$maxspeedcompid AND speeds.run_id=$maxrunid");

	#echo "second qruit is : $sql2 <BR><BR>";

 $result2 = mysql_query($sql2); 
 
   $num2 = 0;
   $num2 = mysql_numrows($result2);
 

    $j = 0;
    while ($j < $num2) {
           
         $speed = mysql_result($result2,$j,"speeds.speed");
		   $driver_first = mysql_result($result2,$j,"competitors.driver_first");
		   $driver_last = mysql_result($result2,$j,"competitors.driver_last");
          $owner_first = mysql_result($result2,$j,"competitors.owner_first");
         $owner_last = mysql_result($result2,$j,"competitors.owner_last");
		   $boat_number = mysql_result($result2,$j,"competitors.boat_number");
		   $timeformat = mysql_result($result2,$j,"timeformat");

	       	 
	   echo "<tr>";
	   echo "<td width='10%'>$boat_class</td><td width='13%'><p align='center'>$speed</td><td width='24%'>$driver_first $driver_last</td><td width='5%'><p align='center'>$boat_number</td><td width='20%'>$timeformat</td>";
	 echo "</tr>";

	++$j;

	}
	
	}

	else {

	#	echo "no run... for $boat_class<br><br>";

	
   
  }

++$i;



}


echo "</table>";



echo "<hr>";
mysql_close($con);



?>

<A HREF="../index.php">Back to Main Menu</A>


</BODY>

</HTML>