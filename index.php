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
    
 <h1>League of Legends Chat Analyzer</h1>
  <br>
</body>








<body>
  <center>
<script type="text/javascript" src="http://fgnass.github.com/spin.js/spin.js"></script>
<script>
  var spinner;
  function startLoading()
{
  document.getElementById("load_button").hidden=true;
  //document.getElementById("stop_load").hidden=false;
  var opts = {
    lines: 13, // The number of lines to draw
    length: 20, // The length of each line
    width: 10, // The line thickness
    radius: 30, // The radius of the inner circle
    corners: 1, // Corner roundness (0..1)
    rotate: 0, // The rotation offset
    direction: 1, // 1: clockwise, -1: counterclockwise
    color: '#FFF', // #rgb or #rrggbb or array of colors
    speed: 1, // Rounds per second
    trail: 60, // Afterglow percentage
    shadow: false, // Whether to render a shadow
    hwaccel: false, // Whether to use hardware acceleration
    className: 'spinner', // The CSS class to assign to the spinner
    zIndex: 2e9, // The z-index (defaults to 2000000000)
    top: '20%', // Top position relative to parent
    left: '10%' // Left position relative to parent
  };  

var target = document.getElementById("loader");
 spinner = new Spinner(opts).spin(target);

}

function stopLoading()
{
  spinner.stop();
  document.getElementById("load_button").hidden=false;
  //document.getElementById("stop_load").hidden=true;
}

</script>
      <p id="loader"></p>
  </center>
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
  /**
   d3.layout.cloud().size([300, 300])

      .padding(5)
      .rotate(function() { return ~~(Math.random() * 2) * 45; })
      .font("Fremont")
      .fontSize(function(d) { return d.size; })
      .on("end", drawFake)
      .start();
  **/
  /** function drawFake(words) {
    d3.select("body").append("svg")
        .attr("width", 275)
        .attr("height", 300)
      .append("g")
        .attr("transform", "translate(150,150)")
      .selectAll("text")
        .data(words)
      .enter().append("text")
        .style("font-size", function(d) { return d.size + "px"; })
        .style("font-family", "Fremont")
        .style("fill", function(d, i) { return fill(i); })
        .attr("text-anchor", "middle")
        .attr("transform", function(d) {
          return "translate(" + [d.x, d.y] + ")rotate(" + d.rotate + ")";
        })
        .text(function(d) { return d.text; });
        
	}
 **/
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


  
<form action="results.php" method="post">

  


  
<body><center>
<table align="center" class="padding">
  <tr><td style="text-align:center">Game Type</td><td style="text-align:center">Chat Type</td></tr>
<tr><td>
<select>
  <option name="gametype" value="All">All</option>
  <option name="gametype" value="Classic">Classic</option>
  <option name="gametype" value="Dominion">Dominion</option>
  <option name="gametype" value="Proving Grounds">Proving Grounds</option>
</select>
</td><td>
<select>
  <option name="chattype" value="all">Both</option>
  <option name="chattype" value="teamchat">Team Chat</option>
  <option name="chattype" value="allchat">All Chat</option>
</select>
</td></tr>
</table>
</center></body>
<br>
 



 
  <body>
  <center>
  <meta charset="utf-8">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  <script>
  $(function() {
    $( "#slider-length" ).slider({
      range: true,
      min: 0,
      max: 80,
      values: [ 0, 80 ],
      slide: function( event, ui ) {
        $( "#totalLength" ).val( ui.values[ 0 ] + " min - " + ui.values[ 1 ] + " min" );
      }
    });
    $( "#totalLength" ).val( $( "#slider-length" ).slider( "values", 0 ) +
      " min - " + $( "#slider-length" ).slider( "values", 1 ) + " min" );
  });
  </script>
 
<p>
  <label for="totalLength">Game Length:</label>
  <input type="text" id="totalLength" style="border:0; background:Black; color:White; font-weight:bold;">
</p>
 
    <div id="slider-length" style="width:500px"></div>
  
<span id="time"></span>
  </center>
  </body>
  <br>
  
  
  

  
  <body>
  <center>
  <meta charset="utf-8">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  <script>
  $(function() {
    $( "#slider-chat" ).slider({
      range: true,
      min: 0,
      max: 80,
      values: [ 0, 80 ],
      slide: function( event, ui ) {
        $( "#chatLength" ).val( ui.values[ 0 ] + " min - " + ui.values[ 1 ] + " min" );
      }
    });
    $( "#chatLength" ).val( $( "#slider-chat" ).slider( "values", 0 ) +
      " min - " + $( "#slider-chat" ).slider( "values", 1 ) + " min" );
  });
  </script>
    
  <p>
  <label for="chatLength">Chat Time:</label>
  <input type="text" id="chatLength" style="border:0; background:Black; color:White; font-weight:bold;">
</p>
 
    <div id="slider-chat" style="width:500px"></div>
  
<span id="time"></span>
  <br>
  </center>
  </body>
  




<body>
<center>
  <input  type="submit" name="Submit" class="btn" />
   <!-- <button class="btn" onclick="window.location.href = 'league2.php'" id="load_button"> Submit</button> -->
    <!--<button class="btn" style="visibility:hidden" onclick="stopLoading()" id="stop_load"> Stop loader, temp button </button> -->

</center>
</body>  
  <br>
  




<body> 
<center>
  <script language="JavaScript">
function toggle(source) {
  checkboxes = document.getElementsByName("Champion[]");
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}
</script>

  <input type="checkbox" onClick="toggle(this)" checked><font color="White">Toggle All</font><br/>
  <div style="width:600px;height:300px;line-height:3em;overflow:auto;padding:5px;">
  <center>
    <table border="3" cellpadding="10">
      <tr>
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/AatroxSquare.png" alt="Aatrox" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Aatrox" checked></center></td>
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/AhriSquare.png" alt="Ahri" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Ahri" checked></center></td>
      	<td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/AkaliSquare.png" alt="Akali" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Akali" checked></center></td>
      	<td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/AlistarSquare.png" alt="Alistar" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Alistar" checked></center></td>
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/AmumuSquare.png" alt="Amumu" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Amumu" checked></center></td>
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/AniviaSquare.png" alt="Anivia" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Anivia" checked></center></td>
      	<td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/AnnieSquare.png" alt="Annie" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Annie" checked></center></td>
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/AsheSquare.png" alt="Ashe" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Ashe" checked></center></td>
      </tr>
      <tr>
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/BlitzcrankSquare.png" alt="Blitzcrank" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Blitzcrank" checked></center></td>
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/BrandSquare.png" alt="Brand" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Brand" checked></center></td>
      	<td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/BraumSquare.png" alt="Braum" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Braum" checked></center></td>
      	<td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/CaitlynSquare.png" alt="Caitlyn" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Caitlyn" checked></center></td>
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/CassiopeiaSquare.png" alt="Cassiopeia" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Cassiopeia"checked></center></td>
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/ChoGathSquare.png" alt="ChoGath" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="ChoGath" checked></center></td>
      	<td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/CorkiSquare.png" alt="Corki" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Corki" checked></center></td>
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/DariusSquare.png" alt="Darius" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Darius" checked></center></td>
      </tr>      
      <tr>
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/DianaSquare.png" alt="Diana" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Diana" checked></center></td>
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/DravenSquare.png" alt="Draven" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Draven" checked></center></td>
      	<td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/DrMundoSquare.png" alt="DrMundo" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="DrMundo" checked></center></td>
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/EliseSquare.png" alt="Elise" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Elise" checked></center></td>
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/EvelynnSquare.png" alt="Evelynn" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Evelynn" checked></center></td>
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/EzrealSquare.png" alt="Ezreal" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Ezreal" checked></center></td>
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/FiddlesticksSquare.png" alt="Fiddlesticks" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Fiddlesticks" checked></center></td>
      	<td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/FioraSquare.png" alt="Fiora" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Fiora" checked></center></td>
      </tr>      
      <tr>
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/FizzSquare.png" alt="Fizz" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Fizz" checked></center></td>
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/GalioSquare.png" alt="Galio" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Galio" checked></center></td>
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/GangplankSquare.png" alt="Gangplank" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Gangplank" checked></center></td>
      	<td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/GarenSquare.png" alt="Garen" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Garen" checked></center></td>
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/GragasSquare.png" alt="Gragas" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Gragas" checked></center></td>
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/GravesSquare.png" alt="Graves" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Graves" checked></center></td>
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/HecarimSquare.png" alt="Hecarim" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Hecarim" checked></center></td>
      	<td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/HeimerdingerSquare.png" alt="Heimerdinger" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Heimerdinger" checked></center></td>
      </tr>
      <tr>
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/IreliaSquare.png" alt="Irelia" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Irelia" checked></center></td>
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/JannaSquare.png" alt="Janna" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Janna" checked></center></td>
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/JarvanIVSquare.png" alt="JarvanIV" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="JarvanIV" checked></center></td>
      	<td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/JaxSquare.png" alt="Jax" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Jax" checked></center></td>
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/JayceSquare.png" alt="Jayce" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Jayce" checked></center></td>
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/JinxSquare.png" alt="Jinx" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Jinx" checked></center></td>
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/KarmaSquare.png" alt="Karma" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Karma" checked></center></td>
      	<td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/KarthusSquare.png" alt="Karthus" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Karthus" checked></center></td>
      </tr>
      <tr>
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/KassadinSquare.png" alt="Kassadin" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Kassadin" checked></center></td>
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/KatarinaSquare.png" alt="Katarina" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Katarina" checked></center></td>
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/KayleSquare.png" alt="Kayle" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Kayle" checked></center></td>
      	<td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/KennenSquare.png" alt="Kennen" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Kennen" checked></center></td>
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/KhaZixSquare.png" alt="KhaZix" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="KhaZix" checked></center></td>
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/KogMawSquare.png" alt="KogMaw" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="KogMaw" checked></center></td>
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/LeBlancSquare.png" alt="LeBlanc" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="LeBlanc" checked></center></td>
      	<td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/LeeSinSquare.png" alt="LeeSin" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="LeeSin" checked></center></td>
      </tr>
      <tr>
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/LeonaSquare.png" alt="Leona" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Leona" checked></center></td>
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/LissandraSquare.png" alt="Lissandra" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Lissandra" checked></center></td>
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/LucianSquare.png" alt="Lucian" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Lucian" checked></center></td>
      	<td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/LuluSquare.png" alt="Lulu" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Lulu" checked></center></td>
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/LuxSquare.png" alt="Lux" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Lux" checked></center></td>       
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/MalphiteSquare.png" alt="Malphite" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Malphite" checked></center></td>
      	<td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/MalzaharSquare.png" alt="Malzahar" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Malzahar" checked></center></td>
		<td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/MaokaiSquare.png" alt="Maokai" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Maokai" checked></center></td>
      </tr>
      <tr>
		<td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/MasterYiSquare.png" alt="MasterYi" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="MasterYi" checked></center></td>       
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/MissFortuneSquare.png" alt="MissFortune" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="MissFortune" checked></center></td>
      	<td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/MordekaiserSquare.png" alt="Mordekaiser" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Mordekaiser" checked></center></td>
      	<td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/MorganaSquare.png" alt="Morgana" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Morgana" checked></center></td>
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/NamiSquare.png" alt="Nami" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Nami" checked></center></td>       
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/NasusSquare.png" alt="Nasus" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Nasus" checked></center></td>
      	<td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/NautilusSquare.png" alt="Nautilus" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Nautilus" checked></center></td>
		<td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/NidaleeSquare.png" alt="Nidalee" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Nidalee" checked></center></td>
      </tr>  
      <tr>
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/NocturneSquare.png" alt="Nocturne" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Nocturne" checked></center></td>       
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/NunuSquare.png" alt="Nunu" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Nunu" checked></center></td>
      	<td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/OlafSquare.png" alt="Olaf" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Olaf" checked></center></td>
		<td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/OriannaSquare.png" alt="Orianna" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Orianna" checked></center></td>
  		<td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/PantheonSquare.png" alt="Pantheon" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Pantheon" checked></center></td>       
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/PoppySquare.png" alt="Poppy" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Poppy" checked></center></td>
      	<td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/QuinnSquare.png" alt="Quinn" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Quinn" checked></center></td>
		<td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/RammusSquare.png" alt="Rammus" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Rammus" checked></center></td>
      </tr>
      <tr>
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/RenektonSquare.png" alt="Renekton" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Renekton" checked></center></td>       
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/RengarSquare.png" alt="Rengar" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Rengar" checked></center></td>
      	<td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/RivenSquare.png" alt="Riven" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Riven" checked></center></td>
      	<td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/RumbleSquare.png" alt="Rumble" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Rumble" checked></center></td>
		<td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/RyzeSquare.png" alt="Ryze" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Ryze" checked></center></td>       
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/SejuaniSquare.png" alt="Sejuani" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Sejuani" checked></center></td>
      	<td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/ShacoSquare.png" alt="Shaco" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Shaco" checked></center></td>
		<td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/ShenSquare.png" alt="Shen" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Shen" checked></center></td>
      </tr>
      <tr>
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/ShyvanaSquare.png" alt="Shyvana" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Shyvana" checked></center></td>       
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/SingedSquare.png" alt="Singed" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Singed" checked></center></td>
      	<td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/SionSquare.png" alt="Sion" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Sion" checked></center></td>
      	<td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/SivirSquare.png" alt="Sivir" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Sivir" checked></center></td>
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/SkarnerSquare.png" alt="Skarner" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Skarner" checked></center></td>       
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/SonaSquare.png" alt="Sona" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Sona" checked></center></td>
      	<td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/SorakaSquare.png" alt="Soraka" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Soraka" checked></center></td>
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/SwainSquare.png" alt="Swain" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Swain" checked></center></td>
      </tr>
      <tr>
		<td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/SyndraSquare.png" alt="Syndra" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Syndra" checked></center></td>       
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/TalonSquare.png" alt="Talon" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Talon" checked></center></td>
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/TaricSquare.png" alt="Taric" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Taric" checked></center></td>      
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/TeemoSquare.png" alt="Teemo" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Teemo" checked></center></td>	 
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/ThreshSquare.png" alt="Thresh" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Thresh" checked></center></td>       
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/TristanaSquare.png" alt="Tristana" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Tristana" checked></center></td>
      	<td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/TrundleSquare.png" alt="Trundle" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Trundle" checked></center></td>
		<td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/TryndamereSquare.png" alt="Tryndamere" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Tryndamere" checked></center></td>
      </tr>
      <tr>
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/TwistedFateSquare.png" alt="TwistedFate" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="TwistedFate" checked></center></td>       
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/TwitchSquare.png" alt="Twitch" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Twitch" checked></center></td>
      	<td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/UdyrSquare.png" alt="Udyr" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Udyr" checked></center></td>
		<td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/UrgotSquare.png" alt="Urgot" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Urgot" checked></center></td>
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/VarusSquare.png" alt="Varus" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Varus" checked></center></td>       
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/VayneSquare.png" alt="Vayne" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Vayne" checked></center></td>
      	<td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/VeigarSquare.png" alt="Veigar" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Veigar" checked></center></td>
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/VelKozSquare.png" alt="Vel'Koz" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Vel'Koz" checked></center></td>	 
      </tr>
      <tr>
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/ViSquare.png" alt="Vi" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Vi" checked></center></td>       
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/ViktorSquare.png" alt="Viktor" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Viktor" checked></center></td>
      	<td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/VladimirSquare.png" alt="Vladimir" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Vladimir" checked></center></td>
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/VolibearSquare.png" alt="Volibear" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Volibear" checked></center></td>	 
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/WarwickSquare.png" alt="Warwick" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Warwick" checked></center></td>       
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/WukongSquare.png" alt="Wukong" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Wukong" checked></center></td>
      	<td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/XerathSquare.png" alt="Xerath" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Xerath" checked></center></td>
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/XinZhaoSquare.png" alt="XinZhao" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="XinZhao" checked></center></td>
      </tr>
      <tr>
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/YasuoSquare.png" alt="Yasuo" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Yasuo" checked></center></td>
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/YorickSquare.png" alt="Yorick" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Yorick" checked></center></td>
      	<td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/ZacSquare.png" alt="Zac" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Zac" checked></center></td>
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/ZedSquare.png" alt="Zed" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Zed" checked></center></td>	 
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/ZiggsSquare.png" alt="Ziggs" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Ziggs" checked></center></td>
        <td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/ZileanSquare.png" alt="Zilean" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Zilean" checked></center></td>
      	<td><center><img src="http://i31.photobucket.com/albums/c375/Gem322/LoL%20Chats/ZyraSquare.png" alt="Zyra" height="42" width="42"><br><input type="checkbox" name="Champion[]" value="Zyra" checked></center></td>
      </tr>      
    </table>


 </center>
  </div></center>
  
 
  </body>
</form>   
</html>
