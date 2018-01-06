<?php
	include ("scripts/include_variables.php");
?>
<html>
<head>
 <!-- HTML5 -->
<meta charset="utf-8">
 <!-- HTML 4.x -->
 <meta http-equiv="content-type" content="text/html; charset=utf-8">
 <meta name="content-language" content="de" />
 <meta name="author"           content="Patrick Szalewicz" />
 <meta name="publisher"        content="SysOp" />
 <meta name="copyright"        content="Patrick Szalewicz" />
 <meta name="keywords"         content="Tropfenfotografie, drop photography, DSLR, Raspberry Pi, DIY, Fotografie, photography, Bremerhaven, Germany, Szalewicz, SysOp" />
 <meta name="description"      content="Tropfenfotografie leicht gemacht. Drop photography made easy." />
 <meta name="page-topic"       content="myDrop2" />
 <meta name="language"         content="Deutsch" />
 <meta name="revisit"          content="After 2 days" />
 <meta name="robots"           content="INDEX,FOLLOW" />
 <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
 <link rel="stylesheet" href="style/style.css">
 <meta name="viewport" content="width=device-width, initial-scale=1">
<title>
myDrop2
</title>
</head>
<body>
<center>
<div id="header">
   <b>myDrop2</b>
</div>
<br><br>
<div id="content">
<form action=scripts/action.php class="pure-form pure-form-aligned">
<div id="settings1">
<br>
  Belichtung starten
  <br><br>
  <label>Warten (ms) <input name="firstwait" type="number" value="<?php echo $content[0]; ?>"></label>
</div>

<div id="ventile">

<div id="ventil1">
   <input type="radio" id="v1" name="ventile" value="1" checked="checked">
   <label for="v1"><h2>1 Ventil</h2></label>
   <br><br>
  <label>Tropfen 1 Dauer (ms) <input name="v1_d1" type="number" value="<?php echo $v1_content[1]; ?>"></label>
  <br><br>
  <label>Warten (ms) <input name="v1_w2" type="number" value="<?php echo $v1_content[2]; ?>"></label>
   <br><br>
  <label>Tropfen 2 Dauer (ms) <input name="v1_d2" type="number" value="<?php echo $v1_content[3]; ?>"></label>
  <br><br>
  <label>Warten (ms) <input name="v1_w3" type="number" value="<?php echo $v1_content[4]; ?>"></label>
</div>
<div id="ventil2">
   <input type="radio" id="v2" name="ventile" value="2">
   <label for="v2"><h2>2 Ventile</h2></label>
   <br><br>
  <label>Tropfen 1 Dauer (ms) <input name="v2_d1" type="number" value="<?php echo $v2_content[1]; ?>"></label>
  <br><br>
  <label>Warten (ms) <input name="v2_w2" type="number" value="<?php echo $v2_content[2]; ?>"></label>
  <br><br>
  <label>Tropfen 2 Dauer (ms) <input name="v2_d2" type="number" value="<?php echo $v2_content[3]; ?>"></label>
  <br><br>
  <label>Warten (ms) <input name="v2_w3" type="number" value="<?php echo $v2_content[4]; ?>"></label>
</div>

</div>

<div id="settings2">
  Blitzen
  <br><br>
  <label>Warten (ms) <input name="lastwait" type="number" value="<?php echo $content[1]; ?>"></label>
  <br><br>
  Belichtung stoppen
  <br><br>
</div>
<div id="run">
  <button type="submit">ausführen</button>
<br>
<br>
</div>
</form>
</div>
<div id="footer">
2018 &copy; <b>Patrick Szalewicz</b> - <a href="http://sysop.top">SysOp</a>
</div>
</center>
</body>
</html>
