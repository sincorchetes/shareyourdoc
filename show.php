<!-- 
/************************************************
 *  Author: Álvaro Castillo
 *  
 *  This library contains third party code.
 *  For example PHP Markdown class.
 *  Twitter: @sincorchetes
 *  GitHub: @sincorchetes
 *  GitLab: @sincorchetes
 *
 *
 *
 ************************************************/
-->
<?php
  require_once(__DIR__."/lib/File.php");
  $getCode = @$_POST["readFile"];
?>
<!DOCTYPE html>
<html>
  <head>
    <!-- Bootstrap project CSS files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-grid.min.css">
    <!-- Custom CSS file -->
    <link rel="stylesheet" href="assets/css/navbar.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php">Share your doc</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="See more">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <form action="show.php" method="post" class="form-inline">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="readFile">
          <button class="btn btn-primary my-2 my-sm-0" type="submit">Search Your Paste Code</button>
        </form>
      </div>
  </nav>
    
  <div class="container">
    <div class="row">
      <div class="col-sm-12 py-5">
        <h1>Paste code: <?php echo $_POST["readFile"];?></h1>
      </div>
      <div class="col-sm-12">
        <div class="text-right"><a href="files/<?php File::downloadFile($getCode);?>">Download RAW</a></div>
      </div>
      <div class="col-sm-12">
        <div class="card">
         <div class="card-body">
          <?php 
            echo "<pre>",File::showFile($getCode),"</pre>";
          ?>
        </div>
      </div>
      </div>
    </div>
  </div>
  <footer class="footer">
      <div class="container">
        <span class="text-center text-muted">Share your data is licensed by under GPLv2.0 terms ~ Copyright <a href="https://github.com/sincorchetes" target="_blank">Álvaro Castillo</a></span>
      </div>
    </footer>
  </body>
  <!-- jQuery Project JS -->
  <script src="assets/js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap Project JS files -->
  <script src="assets/js/bootstrap.min.js"></script>
  <!-- Custom mine js -->
  <script src="assets/js/downloadFile.js"></script>
</html>
