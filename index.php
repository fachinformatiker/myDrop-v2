<?php
session_start();
$data = $_SESSION['data'];
$tropfenzahl = $_SESSION['tropfenzahl'];
$other_data = $_SESSION['array_other_data'];
$drop_data_v1 = $_SESSION['array_drop_data_v1'];
$drop_data_v2 = $_SESSION['array_drop_data_v2'];
?>
<html>
<head>
 <!-- HTML5 -->
<meta charset='utf-8'>
 <!-- HTML 4.x -->
 <meta http-equiv='content-type' content='text/html; charset=utf-8'>
 <meta name='content-language' content='de' />
 <meta name='author'           content='Patrick Szalewicz' />
 <meta name='publisher'        content='SysOp' />
 <meta name='copyright'        content='Patrick Szalewicz' />
 <meta name='keywords'         content='Tropfenfotografie, drop photography, DSLR, Raspberry Pi, DIY, Fotografie, photography, Bremerhaven, Germany, Szalewicz, SysOp' />
 <meta name='description'      content='Tropfenfotografie leicht gemacht. Drop photography made easy.' />
 <meta name='page-topic'       content='myDrop2' />
 <meta name='language'         content='Deutsch' />
 <meta name='revisit'          content='After 2 days' />
 <meta name='robots'           content='INDEX,FOLLOW' />
 <link rel='stylesheet' href='https://unpkg.com/purecss@1.0.0/build/pure-min.css' integrity='sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w' crossorigin='anonymous'>
 <link rel='stylesheet' href='style/style.css'>
 <meta name='viewport' content='width=device-width, initial-scale=1'>
<title>
myDrop2
</title>
</head>
<body>
<script type="text/javascript">
function showLoadingMessage() {
  document.getElementById('content').style.display = 'none';
  
  var message = document.createElement('div');
  message.innerHTML = '<center><h1>Wird gearbeitet, bitte warten!</h1></center>';
  document.body.appendChild(message);
}

var i_v1 = 0;
var i_v2 = 0;
var data = <?php echo json_encode($data, JSON_PRETTY_PRINT) ?>;
var tropfenzahl = <?php echo json_encode($tropfenzahl, JSON_PRETTY_PRINT) ?>;
var other_data = <?php echo json_encode($other_data, JSON_PRETTY_PRINT) ?>;
var drop_data_v1 = <?php echo json_encode($drop_data_v1, JSON_PRETTY_PRINT) ?>;
var drop_data_v2 = <?php echo json_encode($drop_data_v2, JSON_PRETTY_PRINT) ?>;

function incrementv1() {
  i_v1 += 1;
}

function incrementv2() {
  i_v2 += 1;
}

function addfieldFunction_blank() {
	addfieldFunctionv1_blank();
	addfieldFunctionv2_blank();
}

function addfieldFunction() {
	addfieldFunctionv1();
	addfieldFunctionv2();
}

function addfieldFunctionv1_blank() {
  incrementv1();
	
  var r = document.createElement('div');
  var y = document.createElement("INPUT");
  var z = document.createElement("INPUT");
  y.setAttribute("class", "");
  y.setAttribute("type", "number");
  y.setAttribute("placeholder", "Tropfen Dauer (ms)");
  y.setAttribute("value", "");
  z.setAttribute("class", "");
  z.setAttribute("type", "number");
  z.setAttribute("placeholder", "Warten (ms)");
  z.setAttribute("value", "");
  y.setAttribute("name", "drop_data_v1[" + i_v1 + "][0]");
  r.appendChild(y);
  z.setAttribute("name", "drop_data_v1[" + i_v1 + "][1]");
  r.appendChild(z);
  document.getElementById("form-div-v1").appendChild(r);
}

function addfieldFunctionv2_blank() {
  incrementv2();
	
  var r = document.createElement('div');
  var y = document.createElement("INPUT");
  var z = document.createElement("INPUT");
  y.setAttribute("class", "");
  y.setAttribute("type", "number");
  y.setAttribute("placeholder", "Tropfen Dauer (ms)");
  y.setAttribute("value", "");
  z.setAttribute("class", "");
  z.setAttribute("type", "number");
  z.setAttribute("placeholder", "Warten (ms)");
  z.setAttribute("value", "");
  y.setAttribute("name", "drop_data_v2[" + i_v2 + "][0]");
  r.appendChild(y);
  z.setAttribute("name", "drop_data_v2[" + i_v2 + "][1]");
  r.appendChild(z);
  document.getElementById("form-div-v2").appendChild(r);
}

function addfieldFunctionv1() {
  incrementv1();

  var r = document.createElement('div');
  var y = document.createElement("INPUT");
  var z = document.createElement("INPUT");
  y.setAttribute("class", "");
  y.setAttribute("type", "number");
  y.setAttribute("placeholder", "Tropfen Dauer (ms)");
  y.setAttribute("value", drop_data_v1[i_v1][0]);
  z.setAttribute("class", "");
  z.setAttribute("type", "number");
  z.setAttribute("placeholder", "Warten (ms)");
  z.setAttribute("value", drop_data_v1[i_v1][1]);
  y.setAttribute("name", "drop_data_v1[" + i_v1 + "][0]");
  r.appendChild(y);
  z.setAttribute("name", "drop_data_v1[" + i_v1 + "][1]");
  r.appendChild(z);
  document.getElementById("form-div-v1").appendChild(r);
}

function addfieldFunctionv2() {
  incrementv2();
	
  var r = document.createElement('div');
  var y = document.createElement("INPUT");
  var z = document.createElement("INPUT");
  y.setAttribute("class", "");
  y.setAttribute("type", "number");
  y.setAttribute("placeholder", "Tropfen Dauer (ms)");
  y.setAttribute("value", drop_data_v2[i_v2][0]);
  z.setAttribute("class", "");
  z.setAttribute("type", "number");
  z.setAttribute("placeholder", "Warten (ms)");
  z.setAttribute("value", drop_data_v2[i_v2][1]);
  y.setAttribute("name", "drop_data_v2[" + i_v2 + "][0]");
  r.appendChild(y);
  z.setAttribute("name", "drop_data_v2[" + i_v2 + "][1]");
  r.appendChild(z);
  document.getElementById("form-div-v2").appendChild(r);
}
</script>
<center>
<div id='header'>
   <b>myDrop2</b>
</div>
<br><br>
<div id='content'>
<br>
<form action=scripts/action.php class='pure-form pure-form-aligned' onsubmit='showLoadingMessage();' method='post'>
<!-- <form action=scripts/action.php class='pure-form pure-form-aligned' onsubmit='showLoadingMessage();' method='post'> -->
<div id='settings1'>
<br>
  Belichtung starten
  <br><br>
  <input type="number" name="other_data[0]" value="<?php echo htmlspecialchars($other_data[0]); ?>" placeholder="Warten (ms)" />
</div>

<div id='ventile'>
<div id='ventil1'>
   <input type='radio' id='v1' name='ventile' value='1' checked='checked'>
   <label for='v1'><h2>1 Ventil</h2></label>
   <br><br>
   <div id="form-div-v1">
    <input type="number" name="drop_data_v1[0][0]" value="<?php echo htmlspecialchars($drop_data_v1[0][0]); ?>" placeholder="Tropfen Dauer (ms)" />
	<br>
    <input type="number" name="drop_data_v1[0][1]" value="<?php echo htmlspecialchars($drop_data_v1[0][1]); ?>" placeholder="Warten (ms)" />
	<br>
  </div>
</div>
<div id='ventil2'>
   <input type='radio' id='v2' name='ventile' value='2'>
   <label for='v2'><h2>2 Ventile</h2></label>
   <br><br>
   <div id="form-div-v2">
    <input type="number" name="drop_data_v2[0][0]" value="<?php echo htmlspecialchars($drop_data_v2[0][0]); ?>" placeholder="Tropfen Dauer (ms)" />
	<br>
    <input type="number" name="drop_data_v2[0][1]" value="<?php echo htmlspecialchars($drop_data_v2[0][1]); ?>" placeholder="Warten (ms)" />
	<br>
  </div>
</div>
</div>

  <div id='settings2'>
  Blitzen
  <br><br>
  
  <input type="number" name="other_data[1]" value="<?php echo htmlspecialchars($other_data[1]); ?>" placeholder="Warten (ms)" />
  <br><br>
</div>
<div id='run'>
  <button type='submit'>ausführen</button>
<br>
<br>
</div>
</form>

<div class="dash-add">
  <button class="dash-add-button" onclick="addfieldFunction_blank()">[+]</button>

  <button class="dash-add-button" onclick="removefieldFunction()">[-]</button>
</div>

<?php
	if (isset($tropfenzahl)) {
		$i = 1;
		while($i < $tropfenzahl) {
			echo "<script> addfieldFunction(); </script>";
			$i++;
		}
	}
?>

</div>
<div id='footer'>
2018 &copy; <b>Patrick Szalewicz</b> - <a href='http://sysop.top'>SysOp</a>
</div>
</center>
</body>
</html>