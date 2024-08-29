<?php
if(isset($_POST['download'])){
$file ="G:/xamp/htdocs/php/studentproject/".$_POST['path'];
echo $file;
if(file_exists($file)){
// Set headers to download file
header('Content-Type:application/octet-stream');
header('Content-Disposition: attachment;filename="'.basename($file).'"');
header('Content-Length: ' .filesize($file));
flush();
readfile($file);
exit;
}else{
echo "File does not exist.";
}
}
?>