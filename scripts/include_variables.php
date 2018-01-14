<?php
$file = 'settings/my_settings.txt';
$handle = fopen($file, 'r');
$contents = fread($handle, filesize($file));
$content = explode(';', $contents);
fclose($handle);
$arrlength = count($content) -1;

$v1_file = 'settings/v1_my_settings.txt';
$v1_handle = fopen($v1_file, 'r');
$v1_contents = fread($v1_handle, filesize($v1_file));
$v1_content = explode(';', $v1_contents);
fclose($v1_handle);
$v1_arrlength = count($v1_content) -1;

$v2_file = 'settings/v2_my_settings.txt';
$v2_handle = fopen($v2_file, 'r');
$v2_contents = fread($v2_handle, filesize($v2_file));
$v2_content = explode(';', $v2_contents);
fclose($v2_handle);
$v2_arrlength = count($v2_content) -1;
?>