<?php
session_start([
    'cookie_lifetime' => 3600,
]);
$data=$_SESSION['data'];
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
<script src="scripts/jquery.js"></script>
</head>
<body>
<script>
function showLoadingMessage() {
  document.getElementById('content').style.display = 'none';
  
  var message = document.createElement('div');
  message.innerHTML = '<center><h1>Wird gearbeitet, bitte warten!</h1></center>';
  document.body.appendChild(message);
}
function checkRemove() {
    if ($('div.d1_drops').length == 1) {
        $('#remove').hide();
    } else {
        $('#remove').show();
    }
};
$(document).ready(function() {
    checkRemove()
    $('#add').click(function() {
        $('div.d1_drops:last').after($('div.d1_drops:first').clone());
        $('div.d2_drops:last').after($('div.d2_drops:first').clone());
        checkRemove();
    });
    $('#remove').click(function() {
        $('div.d1_drops:last').remove();
        $('div.d2_drops:last').remove();
        checkRemove();
    });
});
</script>

<script>
var data=<?php echo json_encode($data);?>;
</script>

<center>
<div id='header'>
   <b>myDrop2</b>
</div>
<br><br>
<div id='content'>
<br>
<button id='add'>[ + ]</button>
<button id='remove'>[ - ]</button>
<form action=scripts/action.php class='pure-form pure-form-aligned' onsubmit='showLoadingMessage();' method='post'>
<!-- <form action=scripts/action.php class='pure-form pure-form-aligned' onsubmit='showLoadingMessage();' method='post'> -->
<div id='settings1'>
<br>
  Belichtung starten
  <br><br>
  <label>Warten (ms) <input name='firstwait' type='number'></label>
</div>

<div id='ventile'>
<div id='ventil1'>
   <input type='radio' id='v1' name='ventile' value='1' checked='checked'>
   <label for='v1'><h2>1 Ventil</h2></label>
   <br><br>
   <div class='d1_drops'>
  <label>Tropfen 1 Dauer (ms) <input name='d1_drop[]' type='number'></label>
  <br><br>
  <label>Warten (ms) <input name='d1_wait[]' type='number'></label>
   <br><br>
  </div>
</div>
<div id='ventil2'>
   <input type='radio' id='v2' name='ventile' value='2'>
   <label for='v2'><h2>2 Ventile</h2></label>
   <br><br>
   <div class='d2_drops'>
  <label>Tropfen 1 Dauer (ms) <input name='d2_drop[]' type='number'></label>
  <br><br>
  <label>Warten (ms) <input name='d2_wait[]' type='number'></label>
  <br><br>
  </div>
</div>

</div>

<div id='settings2'>
  Blitzen
  <br><br>
  <label>Warten (ms) <input name='lastwait' type='number'></label>
  <br><br>
  Belichtung stoppen
  <br><br>
</div>
<div id='run'>
  <button type='submit'>ausführen</button>
<br>
<br>
</div>
</form>
<?php 
if (!isset($_SESSION['visited'])) {
   echo "Du hast diese Seite noch nicht besucht";
   $_SESSION['visited'] = true;
} else {
   echo "Du hast diese Seite zuvor schon aufgerufen";
}
?>
</div>
<div id='footer'>
2018 &copy; <b>Patrick Szalewicz</b> - <a href='http://sysop.top'>SysOp</a>
</div>
</center>
</body>
</html>
