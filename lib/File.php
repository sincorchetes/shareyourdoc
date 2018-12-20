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

  public static function showMarkdownFile($idFile) {
    require_once(__DIR__."/Text.php");
    $fileToRead = fopen(self::$dirFilesRoot.$idFile,'r');
    while ($lineRead = fgets($fileToRead)) {
      echo Text::textToMarkdown($lineRead);
    }
    fclose($fileToRead);
  }

  public static function showFile($idFile)
  {
    //require_once(__DIR__."/Text.php");
    $fileTryToRead = self::$dirFilesRoot.$idFile;
    if (file_exists($fileTryToRead))
    {
      $fileToRead = fopen($fileTryToRead,'r');
      while ($lineRead = fgets($fileToRead)) {
      echo $lineRead;
    }
    fclose($fileToRead);

    }else
    {
      echo "File not exists";
    }

  }

}


?>