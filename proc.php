<?php
/************************************************
 *  Author: Álvaro Castillo <sincorchetes <at> gmail <dot> com
 *  
 *  This library contains third party code.
 *  For example PHP Markdown class.
 *  
 *
 *
 *
 ************************************************/


require_once(__DIR__."/lib/File.php");
require_once(__DIR__."/lib/Text.php");

$getCode = $_POST['code'];
$workFile = File::createFile($getCode);
?>

<!DOCTYPE html>
<html>
  <head>
  </head>
  <body>
    <h1><?php echo $workFile['idFile'];?></h1>
    <code><?php echo $getCode; ?></code>
  </body>
</html>