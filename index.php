<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta name="GENERATOR" content="Notepad">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="description" content="Lake of the Ozarks Shootout Results">
<meta name="keywords" content="shootout,results,loto,lake of the ozarks,boat racing">
<link href="/tablecloth/tablecloth.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="/tablecloth/tablecloth.js"></script>
<?php include 'config.php';?>
<title>Results - <?php echo $SITE_NAME;?></title>
</head>

<body>
<center>
<?php include 'b1.php';?>
</center>
<?php

$con = mysql_connect("localhost", $DB_USER, $DB_PASS)or die("Connect Error: ".mysql_error());
mysql_select_db($DB_NAME,$con);
# $con = mysql_connect("localhost", "shootout", "shootout")or die("Connect Error: ".mysql_error());
# mysql_select_db("shootout",$con);
#$result = mysql_query("SELECT competitors.boat_class,competitors.driver_first,competitors.driver_last,max(speeds.speed),date_format(speeds.timestamp, \'%m-%d-%y %h:%i:%s %p\' ) AS timeformat FROM competitors, speeds WHERE competitors.competitor_id = speeds.competitor_id GROUP BY competitors.competitor_id",$con);

#$sqlmaxspeed = ("SELECT * FROM speeds ORDER BY speed DESC LIMIT 1");
#$resultmaxspeed = mysql_query($sqlmaxspeed);
#$maxspeednum = mysql_numrows($resultmaxspeed);

#if ($maxspeednum > 0) {
#$maxspeedcompid = mysql_result($resultmaxspeed,0,"competitor_id");
#$maxrunid = mysql_result($resultmaxspeed,0,"run_id");
#}


$sql = 'SELECT competitors.boat_class, competitors.boat_number,competitors.driver_first, competitors.driver_last,speeds.speed, date_format( speeds.timestamp, \'%m-%d-%y %h:%i:%s %p\' ) AS timeformat'
. ' FROM competitors, speeds'
. ' WHERE competitors.competitor_id = speeds.competitor_id'
. ' ORDER BY speeds.speed DESC LIMIT 1';
$result = mysql_query($sql);
echo "<hr>";
$num = 0;
$num = mysql_numrows($result);
#echo "<table border='1' cellpadding='0' cellspacing='0' style='border-collapse: collapse' bordercolor='#111111' width='97%' id='AutoNumber1'>";
#$i = 0;
#while ($i < $num) {
$boat_class = mysql_result($result,0,"competitors.boat_class");
$boat_number = mysql_result($result,0,"competitors.boat_number");
$driver_first = mysql_result($result,0,"competitors.driver_first");
$driver_last = mysql_result($result,0,"competitors.driver_last");
$speed = mysql_result($result,0,"speeds.speed");
$timeformat = mysql_result($result,0,"timeformat");
#}
echo "<br>";
echo "<center>";
echo "Shootout 2015 Current TOP SPEED";
echo "<br>";
echo "$driver_first $driver_last"; 
echo "<br>";
echo "$boat_class - $boat_number";
echo "<br>";
echo "$speed MPH";
echo "<br>";
echo "</center>";
#echo "<td><center>Class:</td><td>$boat_class-$boat_number</td><td> $speed MPH </td><td> $driver_first</td><td> $driver_last</td><td> Run Time: $timeformat </td> </center>";
#++$i;
#echo "</tr>";
#}
#echo "</table>";
#echo "<hr>";
mysql_close($con);
?>

<br><br><hr>
Shootout 2015 Results
<br><br>
<b>This site will NOT BE LIVE with 2015 results until race day.  Any information you see on this page is not accurate or real, and is for testing purposes only.  Please stay tuned for LIVE results soon!  </b>
<br>
<br>
Welcome to the Lake of the Ozarks Shootout 2015 LIVE results page!
<br>
Please choose one of the links below to see up to the minute Shootout results!
<br>
<p>&nbsp;</p>
<table border='1' width='100%'>
<tr>
<th width='8%'><p align='center'>No.</th><th width='20%'><p align='center'>Result</th>
</tr>
<tr>
<td width='8%'><p align='center'>1</td><td width='20%'><a href="byclass.php">Scores grouped by class</a></td>
</tr>
<tr>
<td width='8%'><p align='center'>2</td><td width='20%'><a href="bycompetitor.php">Scores grouped by competitor name</a></td>
</tr>
<tr>
<td width='8%'><p align='center'>3</td><td width='20%'><a href="overalltop.php">ALL Scores Fastest on top</a></td>
</tr>
<tr>
<td width='8%'><p align='center'>4</td><td width='20%'><a href="classtop.php">Winners of Each Class</a></td>
</tr>

</table>
<br><hr>
The Lake of the Ozarks Shootout is being held on August 29th and 30th, 2015.  
<br><br>
There are many events happening during Shootout weekend.  For the latest information, schedules, registration, and much more, visit:
<br>
<a href="http://www.lakeoftheozarksshootout.org">http://www.lakeoftheozarksshootout.org</a>  The main information page for the Shootout!
<br><br>
The Lake of the Ozarks Shootout is the largest unsanctioned boat race in the United States and has been voted as the number 1 boat race/shootout in the Country by the Powerboat Magazine Readers for the last two years.  It has also been listed by  Powerboat Magazine as one of the 8 "must see" boating events.  New radar guns in 2012 proved to be extremely accurate for the racers.
<br><br>
Lake of the Ozarks Shootout being held at Captain Ron's Bar & Grill August 22-30th, 2015 will bring the top racers and off shore racing power boats topping 244 MPH. The largest unsanctioned boat race in the midwest with over 100 racers and 100,000 spectators. Proceeds will benefit the Lake Area Rescue Teams,  and other charitable organizations! 
<br>
</body>

</html>
