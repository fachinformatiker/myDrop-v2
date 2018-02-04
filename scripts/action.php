<?php
session_start();
$_SESSION['data'] = $_POST;

include ('../conf.php');
	
	$d1_array_drop = $_POST['d1_drop'];
	$d1_array_wait = $_POST['d1_wait'];
	$d2_array_drop = $_POST['d2_drop'];
	$d2_array_wait = $_POST['d2_wait'];

		$tropfenzahl = count($d1_array_drop); //pro Ventil
	
		$firstwait = $_POST['firstwait'] * 1000;
		$lastwait = $_POST['lastwait'] * 1000;
		$content = $firstwait . ';' . $lastwait;
		$blitzdauer = '100000';

		shell_exec('gpio -1 mode '. $kamera  .' out');
		shell_exec('gpio -1 mode '. $ventil1  .' out');
		shell_exec('gpio -1 mode '. $blitz  .' out');
		
		//print_r($_POST);
		
if ($_POST['ventile'] == '1') {
	
		shell_exec('gpio -1 write '. $kamera .' 1');
		usleep($firstwait);
		
for($i = 0; $i < $tropfenzahl; $i++) {
		shell_exec('gpio -1 write '. $ventil1 .' 1');
		//echo $d1_array_drop[$i] * 1000;
		usleep($d1_array_drop[$i] * 1000);
		shell_exec('gpio -1 write '. $ventil1 .' 0');
		//echo $d1_array_wait[$i] * 1000;
		usleep($d1_array_wait[$i] * 1000);
}
		shell_exec('gpio -1 write '. $blitz .' 1');
		usleep($blitzdauer);
		shell_exec('gpio -1 write '. $blitz .' 0');
		usleep($lastwait);
		shell_exec('gpio -1 write '. $kamera .' 0');

		header('Location: ' . $_SERVER['HTTP_REFERER']);
}

elseif ($_POST['ventile'] == '2') {
	
		shell_exec('gpio -1 write '. $kamera .' 1');
		usleep($firstwait);
				
for($i = 0; $i < $tropfenzahl; $i++) {
		shell_exec('gpio -1 write '. $ventil1 .' 1');
		//echo $d1_array_drop[$i] * 1000;
		usleep($d1_array_drop[$i] * 1000);
		shell_exec('gpio -1 write '. $ventil1 .' 0');
		//echo $d1_array_wait[$i] * 1000;
		usleep($d1_array_wait[$i] * 1000);
		shell_exec('gpio -1 write '. $ventil2 .' 1');
		//echo $d2_array_drop[$i] * 1000;
		usleep($d2_array_drop[$i] * 1000);
		shell_exec('gpio -1 write '. $ventil2 .' 0');
		//echo $d2_array_wait[$i] * 1000;
		usleep($d2_array_wait[$i] * 1000);
}
		
		shell_exec('gpio -1 write '. $blitz .' 1');
		usleep($blitzdauer);
		shell_exec('gpio -1 write '. $blitz .' 0');
		usleep($lastwait);
		shell_exec('gpio -1 write '. $kamera .' 0');

		header('Location: ' . $_SERVER['HTTP_REFERER']);
}
else {
		echo '<center><h1>Fehler</h1></center>';
}
?>
