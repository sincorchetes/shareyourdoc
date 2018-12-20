<!-- This page was written by Alvaro Castillo <sincorchetes <at> gmail <dot> com -->
  <!DOCTYPE html>
<html>
  <head>
  </head>
  <body>
    <h1>Paste your code for share </h1>
    <form action="proc.php" method="post">
      <textarea name="code"></textarea>
      <input type="submit">
    </form>
    <h1>Read file...</h1>
    <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
      <input type="text" name="readFile">
      <input type="submit">
  </form>
    <?php 
    require_once(__DIR__."/lib/File.php");
      $getCode = $_POST["readFile"];
      File::showFile($getCode);
    ?>
  </body>
</html>