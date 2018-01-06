<?php
	include ("../conf.php");
	
		$tropfenzahl = 2; //pro Ventil
	
		$x_v1_stack = array("0");
		array_push($x_v1_stack, $_GET['v1_d1'], $_GET['v1_w2'], $_GET['v1_d2'], $_GET['v1_w3']);
		$save_v1_stack = implode(";", $x_v1_stack);
		foreach ($x_v1_stack as $v1_value) {
		$v1_stack[] = $v1_value * 1000; }

		$x_v2_stack = array("0");
		array_push($x_v2_stack, $_GET['v2_d1'], $_GET['v2_w2'], $_GET['v2_d2'], $_GET['v2_w3']);
		$save_v2_stack = implode(";", $x_v2_stack);
		foreach ($x_v2_stack as $v2_value) {
		$v2_stack[] = $v2_value * 1000; }

		$x_firstwait = $_GET['firstwait'];
		$firstwait = $x_firstwait * 1000;
		$x_lastwait = $_GET['lastwait'];
		$lastwait = $x_lastwait * 1000;
		$content = $x_firstwait . ";" . $x_lastwait;
		$x_blitzdauer = "100";
		$blitzdauer = $x_blitzdauer * 1000;
		
		$file = fopen('../settings/my_settings.txt', 'w');
		fwrite($file, $content);
		fclose($file);

		shell_exec("gpio -1 mode ". $kamera  ." out");
		shell_exec("gpio -1 mode ". $ventil1  ." out");
		shell_exec("gpio -1 mode ". $blitz  ." out");
		
		//print_r($_GET);
		
if ($_GET['ventile'] == '1') {
	
		shell_exec("gpio -1 write ". $kamera ." 1");
		usleep($firstwait);
		
		$v1_value = 1;
		
for($i = 1; $i <= $tropfenzahl; $i++) {
		shell_exec("gpio -1 write ". $ventil1 ." 1");
		//echo $v1_stack[$v1_value];
		usleep($v1_stack[$v1_value]);
		$v1_value++;
		shell_exec("gpio -1 write ". $ventil1 ." 0");
		//echo $v1_stack[$v1_value];
		usleep($v1_stack[$v1_value]);
		$v1_value++;
}
		shell_exec("gpio -1 write ". $blitz ." 1");
		usleep($blitzdauer);
		shell_exec("gpio -1 write ". $blitz ." 0");
		usleep($lastwait);
		shell_exec("gpio -1 write ". $kamera ." 0");
	
		$v1_file = fopen('../settings/v1_my_settings.txt', 'w');
		fwrite($v1_file, $save_v1_stack);
		echo $save_v1_stack;
		fclose($v1_file);

		header('Location: ' . $_SERVER['HTTP_REFERER']);
}

elseif ($_GET['ventile'] == '2') {
	
		shell_exec("gpio -1 write ". $kamera ." 1");
		usleep($firstwait);
		
		$v1_value = 1;
		$v2_value = 1;
		
for($i = 1; $i <= $tropfenzahl; $i++) {
		shell_exec("gpio -1 write ". $ventil1 ." 1");
		//echo $v1_stack[$v1_value];
		usleep($v1_stack[$v1_value]);
		$v1_value++;
		shell_exec("gpio -1 write ". $ventil1 ." 0");
		//echo $v1_stack[$v1_value];
		usleep($v1_stack[$v1_value]);
		$v1_value++;
		shell_exec("gpio -1 write ". $ventil2 ." 1");
		//echo $v2_stack[$v2_value];
		usleep($v2_stack[$v2_value]);
		$v2_value++;
		shell_exec("gpio -1 write ". $ventil2 ." 0");
		//echo $v2_stack[$v2_value];
		usleep($v2_stack[$v2_value]);
		$v2_value++;
}
		
		shell_exec("gpio -1 write ". $blitz ." 1");
		usleep($blitzdauer);
		shell_exec("gpio -1 write ". $blitz ." 0");
		usleep($lastwait);
		shell_exec("gpio -1 write ". $kamera ." 0");
	
		$v1_file = fopen('../settings/v1_my_settings.txt', 'w');
		fwrite($v1_file, $save_v1_stack);
		fclose($v1_file);		
	
		$v2_file = fopen('../settings/v2_my_settings.txt', 'w');
		fwrite($v2_file, $save_v2_stack);
		fclose($v2_file);

		header('Location: ' . $_SERVER['HTTP_REFERER']);
}
else {
		echo "<center><h1>Fehler</h1></center>";
}
?>
