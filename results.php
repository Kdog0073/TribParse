<html>
  
<style type= "text/css">
  .center
  {margin-left:auto;
margin-right:auto;}
  html
  	{background-image:url("http://www.thelittlenerd.com/wp-content/uploads/2012/04/Colored-Drawn-LoL-Mundo-Wallpaper.jpg");
  	background-attachment:fixed;
  	background-size:cover;
  	background-color:#06090D;}
  body 
  	{
  	color:#eeefff;}
  h1 
  	{text-align:center;
  	font-family: 'Fremont';
  	font-size: 50px;

 	background: -webkit-linear-gradient(100deg,#333300,#FFCC00,#B26B00
,#E6B800, #A18100,#333300);
   	-webkit-background-clip: text;
    -webkit-text-fill-color: transparent;



  }
  #contain { }
  #defeat { width: 50%; } 
  #victory {margin-left:50%;} 
  .clear {clear:both;} 
  
  transparent-style{

    opacity: 0.5;

}
  h2 
  	{text-align:center;color:#ffffff;}
  table.padding
  	{padding-right:50px;
    padding-left:50px;}
		h3{font-size: 20px; color:#CC1100;}
	h4{ font-size: 20px; color:#0099CC;}
  script
  	
table { 
color: #333; /* Lighten up font color */
    /*font-family: Helvetica, Arial, sans-serif; *//* Nicer font */
    font-family:'Fremont';    
}

th {
background: #F3F3F3; /* Light grey background */
font-weight: bold; /* Make sure they're bold */
}

td {
background: #BC9C59; /* Lighter grey background */
text-align: center; /* Center our text */
}
  .btn {
	-moz-box-shadow:inset 0px 0px 13px 0px #f0847a;
	-webkit-box-shadow:inset 0px 0px 13px 0px #f0847a;
	box-shadow:inset 0px 0px 13px 0px #f0847a;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #ff1a00), color-stop(1, #7a1414) );
	background:-moz-linear-gradient( center top, #ff1a00 5%, #7a1414 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff1a00', endColorstr='#7a1414');
	background-color:#ff1a00;
	-webkit-border-top-left-radius:4px;
	border-top-left-radius:4px;
	-webkit-border-top-right-radius:4px;
	border-top-right-radius:4px;
	-webkit-border-bottom-right-radius:4px;
	border-bottom-right-radius:4px;
	-webkit-border-bottom-left-radius:4px;
	border-bottom-left-radius:4px;
	text-indent:0;
	border:1px solid #d63324;
	display:inline-block;
	color:#ffffff;
	font-family: 'Fremont';
	font-size:18px;
	font-weight:bold;
	font-style:normal;
	height:53px;
	line-height:53px;
	width:129px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #3d3534;
}
.btn:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #7a1414), color-stop(1, #ff1a00) );
	background:-moz-linear-gradient( center top, #7a1414 5%, #ff1a00 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#7a1414', endColorstr='#ff1a00');
	background-color:#7a1414;
}.btn:active {
	position:relative;
	top:1px;
}
/* This button was generated using CSSButtonGenerator.com */
</style>
<body>
    
 <h1>Filtered Results</h1>
  <br>
</body>
<center>	
<h2>Key:</h2>	
<h3>Losing Team's Most Used Words</h3>
<h4>Winning Team's Most Used Words</h4> 
</center>  

  <center><div id="cloud"></div> </center>
<!--<div id="contain"> 
   <div id="defeat"><h3>Losing Teams' Top Words </h3></div> 
 <div id="victory"><h3>Winning Teams' Top Words</h3></div> 
  </div> 
<br class="clear">
-->
 
 <script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>
     <script src="clouds.js"> </script>

 <body>
   <div id="wordcloud">

   </div>
   
<div id="wordcloud">
 
   </div>
<h1>   
  <div id="wordcloud">
<script>
  var fillRed = d3.scale.linear()
            .domain([0, 1])
            .range(["#CC1100", "#CC1100"]);
  var fillBlue = d3.scale.linear()
            .domain([0, 1])
            .range(["#0099CC", "#0099CC"]);
 
  var frequency_list = [{"text":"i","size":127},{"text":"you","size":100},{"text":"lol","size":59},{"text":"me","size":38},{"text":"mia","size":38},{"text":"we","size":35},{"text":"my","size":29},{"text":"mid","size":29},{"text":"gg","size":29},{"text":"top","size":29},{"text":"dont","size":28},{"text":"go","size":27},{"text":"report","size":26},{"text":"bot","size":25},{"text":"why","size":22},{"text":"bad","size":19},{"text":"team","size":19},{"text":"fuck","size":18},{"text":"noob","size":18},{"text":"fucking","size":17},{"text":"wtf","size":16},{"text":"guys","size":15},{"text":"gj","size":14},{"text":"good","size":14},{"text":"need","size":13}]
  
  d3.layout.cloud().size([400, 400])
      .words(frequency_list)
      .padding(5)
      .rotate(function() { return ~~(Math.random() * 60) +15; })
      .font("Fremont")
      .fontSize(function(d) { return d.size; })
      .on("end", drawDefeat)
      .start();

  function drawDefeat(words) {
    d3.select("#cloud").append("svg")
        .attr("width", 400)
        .attr("height", 400)
      .append("g")
        .attr("transform", "translate(200,200)")
      .selectAll("text")
        .data(words)
      .enter().append("text")
        .style("font-size", function(d) { return d.size + "px"; })
        .style("font-family", "Fremont")
        .style("fill", function(d, i) { return fillRed(i); })
        .attr("text-anchor", "middle")
        .attr("transform", function(d) {
          return "translate(" + [d.x, d.y] + ")rotate(" + d.rotate + ")";
        })
        .text(function(d) { return d.text; });
  }
  
 var frequency_list = [{"text":"i","size":128},{"text":"you","size":106},{"text":"u","size":70},{"text":"no","size":42},{"text":"we","size":38},{"text":"this","size":38},{"text":"gg","size":36},{"text":"top","size":24},{"text":"mid","size":26},{"text":"mia","size":24},{"text":"report","size":24},{"text":"why","size":22},{"text":"team","size":18},{"text":"bad","size":18},{"text":"fuck","size":16},{"text":"gj","size":16},{"text":"like","size":16},{"text":"fucking","size":16},{"text":"wtf","size":16},{"text":"good","size":16},{"text":"noob","size":14},{"text":"shit","size":12},{"text":"help","size":10},{"text":"please","size":10},{"text":"ty","size":10},{"text":"win","size":10},{"text":"push","size":10}]
  d3.layout.cloud().size([400, 400])
      .words(frequency_list)
      .padding(5)
      .rotate(function() { return ~~(Math.random() * 60) +15; })
      .font("Fremont")
      .fontSize(function(d) { return d.size; })
      .on("end", drawVictory)
      .start(); 
    function drawVictory(words) {
    d3.select('#cloud').append("svg")
        .attr("width", 400)
        .attr("height", 400)
      .append("g")
        .attr("transform", "translate(200,200)")
      .selectAll("text")
        .data(words)
      .enter().append("text")
        .style("font-size", function(d) { return d.size + "px"; })
        .style("font-family", "Fremont")
        .style("fill", function(d, i) { return fillBlue(i); })
        .attr("text-anchor", "middle")
        .attr("transform", function(d) {
          return "translate(" + [d.x, d.y] + ")rotate(" + d.rotate + ")";
        })
        .text(function(d) { return d.text; });
  }
  
</script>
   </div>
   </h1>
	</body>

<?php

ini_set('mysql.connect_timeout', "60" );
// Create connection
$con=mysqli_connect('lolchat467.cctjgzciewn4.us-east-1.rds.amazonaws.com','chatmaster','herdinglolchats','lolchat467','3306');

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


//echo "hey";
  /**if(!empty($_POST['Champion'])) {
    foreach($_POST['Champion'] as $check) {
      
    }
    **/
$checkboxes = isset($_POST['Champion']) ? $_POST['Champion'] : array();
$champstr= "Champion like 'haha'" ;
foreach($checkboxes as $value) {
    // here you can use $value
  //echo $value;
  //concatenate all champions into huge OR statement for mysql. -- this will be the WHERE clause
  //where can take in strings apparently
  $champstr.=" OR Champion Like "."'$value"."%'";
  	
}
$champstr.=";" ;
#echo $champstr;


/** extra table
#and GameType = 'Classic'
#and where Champion= 
#and Time(TotalGameTime) > '00:10:00' and Time(TotalGameTime) < '00:30:00'
#and Champion  LIKE '%[All]%'
#and Time(ChatTime) > '00:20:00' and Time(ChatTime) < '00:40:00'
**/

// Create table
$sql="DROP TABLE IF EXISTS temp1;
Create Table temp1 as (SELECT * FROM League_Data2 LIMIT 10000);
drop table if exists filteredVictories;
create table filteredVictories Select * from temp1 
where Result= 'Victory'
 ";

$sql.=" AND ".$champstr;

$sql.=" SET SQL_SAFE_UPDATES = 0;

DROP FUNCTION IF EXISTS stringSplit;
CREATE FUNCTION stringSplit(
x VARCHAR(255),
delim VARCHAR(12),
pos INT)
RETURNS VARCHAR(255)
RETURN REPLACE(SUBSTRING(SUBSTRING_INDEX(x, delim, pos),
LENGTH(SUBSTRING_INDEX(x, delim, pos -1)) + 1), delim, '');



DROP FUNCTION IF EXISTS `substrCount`;
DELIMITER $$

CREATE /*DEFINER=`root`@`localhost`*/ FUNCTION `substrCount`(s VARCHAR(255), ss VARCHAR(255)) RETURNS tinyint(3) unsigned
READS SQL DATA
BEGIN
DECLARE count TINYINT(3) UNSIGNED;
DECLARE offset TINYINT(3) UNSIGNED;
DECLARE CONTINUE HANDLER FOR SQLSTATE '02000' SET s = NULL;
SET count = 0;
SET offset = 1;
REPEAT
IF NOT ISNULL(s) AND offset > 0 THEN
SET offset = LOCATE(ss, s, offset);
IF offset > 0 THEN
SET count = count + 1;
SET offset = offset + 1;
END IF;
END IF;
UNTIL ISNULL(s) OR offset = 0 END REPEAT;
RETURN count;
END$$
DELIMITER ;


DROP TABLE IF EXISTS results;
/*start with an empty table with the unique words. then search through the splitter table for freq*/
CREATE TABLE results
(
	words  varchar(255),
	freq int not null default 0
	,primary key (words)
);

DROP PROCEDURE  IF EXISTS `splitter`;
DELIMITER $$

/*CREATE DEFINER=`root`@`localhost`*/
Create PROCEDURE `splitter`(x varchar(255), delim varchar(12))
BEGIN

SET @Valcount = substrCount(x,delim)+1;
SET @v1=0;
/*drop table if exists splitResults;
create 
table splitResults (splitter varchar(255));*/
WHILE (@v1 < @Valcount) DO
set @val = stringSplit(x,delim,@v1+1);
#call p_record_word_freq((@val));
#INSERT INTO splitResults (splitter) VALUES (@val);

/*word count */
INSERT into results (words,freq) values(@val,1) 
on DUPLICATE KEY update words=values(words),freq=freq+1
;
SET @v1 = @v1 + 1;
END WHILE;

END$$


/* reset delimiter */
DELIMITER ;

/*processes messages from the LoL data, and makes a new table where each entry = 1 word*/

DROP PROCEDURE IF EXISTS PROCESSMESSAGES; 
DELIMITER ;;
CREATE PROCEDURE PROCESSMESSAGES()
BEGIN
DECLARE n INT DEFAULT 0;
DECLARE i INT DEFAULT 0;
SELECT COUNT(*) FROM filteredVictories INTO n;
SET i=0;
WHILE i<n DO
	/*selects ONE word, specifically on row i. Limit i, 1 means 
	it gets word starting from row i, and limits it to 1 */
	call splitter((SELECT Message FROM filteredVictories Limit i,1), ' ');
	/*calls splitter on every message row, with delimiter ' ' */
	
	SET i = i + 1;
END WHILE;
/*after processing messages, creates the result table */
/*SELECT * From splitResults2;*/

/*SELECT DISTINCT words INTO results from data1;*/
#INSERT INTO results (words) 
#SELECT DISTINCT splitter from splitresults;

End;
;;
DELIMITER ;




/*SELECT * INTO OUTFILE 'C:/CS467/messages.txt'

	LINES TERMINATED BY ' '
FROM splitResults; */


DELIMITER ;


/* manual splitting
CALL splitter('nice nice work work guys', ' ');
Call splitter('hate you so much much', ' ');
*/
call PROCESSMESSAGES();";


  
//echo $sql;

// Execute query

if (mysqli_multi_query($con,$sql)) {
  //echo "Done";
} else {
  echo "Error creating table: " . mysqli_error($con);
}
//mysqli_close($con);

	mysqli_query($con,"select * from results Limit 1");
	//echo "end";
?>   
  <center><button class="btn" onclick="window.location.href = 'index.php'" id="load_button"> Back </button>  </center>
</html>



  
  