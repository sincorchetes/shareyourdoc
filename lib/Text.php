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

class Text {

  public static function loadMarkdown() {
    require_once(__DIR__."/../thirdparty/Parsedown.php");
    return new Parsedown;
  }

  public static function textToMarkdown($txt) {
    $requestingText = self::loadMarkdown();
    $textToProcessing = $requestingText->text($txt);
    return $textToProcessing;
  }

  public static function lineToMarkdown($txt) {
    $requestingText = self::loadMarkdown();
    $textToProcessing = $requestingText->text($txt);
    return $textToProcessing;
  }


}


?>