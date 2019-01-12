<?php
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

class File {
 /*
 * If you have problem to writes files
 * Set up apache or www-data user/group in files folder
 * chown apache:apache -vR shareyourdoc_folder
 *
 *
 */
  private static $dirFilesRoot = __DIR__."/../files/";
  //private static $dirForUrlRoot = getcwd();
  private static $dateFormat = "-dmY";

  public static function filenameFormat() {
    $procFilename = self::$dirFilesRoot. uniqid() .date(self::$dateFormat);
    $createFilenameUrl = substr($procFilename, -22);
    $filenameNames = array(
      'sysDir' => $procFilename, 
      'url' => $createFilenameUrl
    );

    return $filenameNames;
  }

  public static function createFile($text) {
    //$textConverted = nl2br($text);
    $serverProject = "http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
    $urlAdapt = str_replace("proc.php",  "files/", $serverProject);
  
    $fileFormat = self::filenameFormat();
    $writeFile = file_put_contents($fileFormat['sysDir'], $text);
    $writeFileResults = array(
      'idFile' => $fileFormat['url'],
      'urlResult' => $urlAdapt.$fileFormat['url'],
      'createCode' => $writeFile
    );
    return $writeFileResults;
  }


  public static function showFile($idFile)
  {
    if (empty($idFile)) {
      echo "<h1 class='text-danger'>Insert valid Paste Number</h1>";
    } else {
    $fileTryToRead = self::$dirFilesRoot.$idFile;
    if (file_exists($fileTryToRead)) {
      $fileToRead = fopen($fileTryToRead,'r');
      while ($lineRead = fgets($fileToRead)) {
      echo $lineRead;
    }
    fclose($fileToRead);

    } else {
      echo "<h1 class='text-danger'>Error 404 File Not Found</h1>";
      }
    }
  }

  public static function downloadFile($idFile)
  {
    $fileTryToDownload = self::$dirFilesRoot.$idFile;
    $urlConvert = "../files/".$idFile;

    if (file_exists($fileTryToDownload)) {
      echo $idFile;
    } else {
      echo "File not exists";
    }
  }
}
?>