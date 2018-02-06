<?php 
session_start();

include ('../conf.php');

echo "<pre>";
print_r($_POST);
echo "</pre>";

$array_other_data = $_POST['other_data'];
$array_drop_data_v1 = $_POST['drop_data_v1'];
$array_drop_data_v2 = $_POST['drop_data_v2'];

shell_exec('gpio -1 mode '. $kamera  .' out');
shell_exec('gpio -1 mode '. $ventil1  .' out');
shell_exec('gpio -1 mode '. $blitz  .' out');

$blitzdauer = '100000';

$tropfenzahl = count($array_drop_data_v1); //pro Ventil

$firstwait = $array_other_data[0] * 1000;
$lastwait = $array_other_data[1] * 1000;
$content = $firstwait . ';' . $lastwait;

$_SESSION['data'] = $_POST;
$_SESSION['tropfenzahl'] = $tropfenzahl;
$_SESSION['array_other_data'] = $array_other_data;
$_SESSION['array_drop_data_v1'] = $array_drop_data_v1;
$_SESSION['array_drop_data_v2'] = $array_drop_data_v2;

//print_r($_POST);
		
if ($_POST['ventile'] == '1') {
	
	shell_exec('gpio -1 write '. $kamera .' 1');
	usleep($firstwait);
		
for($i = 0; $i < $tropfenzahl; $i++) {
	shell_exec('gpio -1 write '. $ventil1 .' 1');
	//echo $array_drop_data_v1[$i][0] * 1000;
	usleep($array_drop_data_v1[$i][0] * 1000);
		
	shell_exec('gpio -1 write '. $ventil1 .' 0');
	//echo $array_drop_data_v1[$i][1] * 1000;
	usleep($array_drop_data_v1[$i][1] * 1000);
}
	shell_exec('gpio -1 write '. $blitz .' 1');
	usleep($blitzdauer);
	shell_exec('gpio -1 write '. $blitz .' 0');
	usleep($lastwait);
	shell_exec('gpio -1 write '. $kamera .' 0');

	//header('Location: ' . $_SERVER['HTTP_REFERER']);
}

elseif ($_POST['ventile'] == '2') {
	
	shell_exec('gpio -1 write '. $kamera .' 1');
	usleep($firstwait);
				
for($i = 0; $i < $tropfenzahl; $i++) {
	shell_exec('gpio -1 write '. $ventil1 .' 1');
	//echo $array_drop_data_v1[$i][0] * 1000;
	usleep($array_drop_data_v1[$i][0] * 1000);
	shell_exec('gpio -1 write '. $ventil1 .' 0');
	//echo $array_drop_data_v1[$i][1] * 1000;
	usleep($array_drop_data_v1[$i][1] * 1000);
	shell_exec('gpio -1 write '. $ventil2 .' 1');
	//echo $array_drop_data_v2[$i][0] * 1000;
	usleep($array_drop_data_v2[$i][0] * 1000);
	shell_exec('gpio -1 write '. $ventil2 .' 0');
	//echo $array_drop_data_v2[$i][1] * 1000;
	usleep($array_drop_data_v2[$i][1] * 1000);
}
		
	shell_exec('gpio -1 write '. $blitz .' 1');
	usleep($blitzdauer);
	shell_exec('gpio -1 write '. $blitz .' 0');
	usleep($lastwait);
	shell_exec('gpio -1 write '. $kamera .' 0');

	//header('Location: ' . $_SERVER['HTTP_REFERER']);
}
else {
	echo '<center><h1>Fehler</h1></center>';
}
?>