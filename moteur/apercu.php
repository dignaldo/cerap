<?php
/************************************************************************/
/*                                WEBSHARE                              */
/************************************************************************/
//
// Copyright (c) 2009 by Virginie Vivancos
// http://www.webshare.fr
//
// This program is free software. You can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation; either version 2 of the License.
//
// =======================================================================
// Fonction : Affiche l'aperçu d'une image
// Nom      : apercu.php
// Version  : 0.8.2
// Date     : 24/04/09
// =======================================================================
header ("Content-type: text/html; charset=utf-8");
session_start();
include_once "auth.php";
include_once "fonctions.php";
$l_mysql = new class_mysql();
$l_mysql->connect();

verifie($_REQUEST["url"]);
$urlImg= str_replace("+","%2B",$_REQUEST["url"]);

echo "<form name='formlisteimg'>";
      $nomSrv= $_SESSION["ws"]["serveurActif"];
      $racine= $_SESSION["ws"]["$nomSrv"]["rootServeur"];
      $chemin= $_SESSION["ws"]["$nomSrv"]["repServeur"];
      $url   = basename($urlImg);
      $rep   = blindeChemin($_SESSION["ws"]["cheminActif"]."/".$_SESSION["ws"]["dossierActif"]);
      $compteur=0; $valimg=1;
      
      if ($_SESSION["ws"]["$nomSrv"]["typeServeur"]=="1") {
      // En local
        if ($handle = opendir($rep)) {
          while (false !== ($file = readdir($handle))) {
            if (!@is_dir("$rep/$file") && (preg_match($_SESSION["ws"]["varsUser"], $file)==0)) {
              $point= strrpos($file, "."); $extension= substr($file,intval($point)+1);
              if (preg_match($typeImgReco,$extension)==1) {
                if (convertUTF8($file)==$url) {
                  $valimg=$compteur;
                  $droitimg= gestion(@fileperms("$rep/$file"));
                }

                $droitsimg= gestion(@fileperms("$rep/$file"));
                echo "<input type='hidden' name='listeimg' value=\"".convertUTF8(blindeChemin($_SESSION["ws"]["dossierActif"]."/".$file))."\">\n";
                echo "<input type='hidden' name='droitimg' value=\"".$droitsimg."\">\n";
                $compteur++; }
            }
          }  
          closedir($handle);
        }

      } else {
      // En FTP
        $_SESSION["ws"]["$nomSrv"]["connexion"]=connexionFTP($nomSrv);
        if (($contents = ftp_rawlist($_SESSION["ws"]["$nomSrv"]["connexion"], $rep))!==FALSE) {
          foreach($contents as $file) {    
           if (preg_match("/^[.]{2}$|^[.]{1}$/", $file)==0) {
        
             $info = array();
             $vinfo = preg_split("/[\s]+/", $file, 9);
             if ($vinfo[0] !== "total") {
               $fileperms     = $vinfo[0];
               $filename      = $vinfo[8];
             }        
             $point= strrpos($filename, "."); $extension= substr($filename,intval($point)+1);
             if ((strpos($fileperms,"d")===FALSE)&&(preg_match($typeImgReco,$extension)==1)) {
               if ($filename==$url) {
                 $valimg=$compteur;
                 $droitimg= gestionFTP($fileperms);
               }
               
               $droitsimg= gestionFTP($fileperms);
               echo "<input type='hidden' name='listeimg' value='".convertUTF8(blindeChemin($_SESSION["ws"]["dossierActif"]."/".$filename))."'>\n";
               echo "<input type='hidden' name='droitimg' value=\"".$droitsimg."\">\n";
               $compteur++; }
            }
          }  
        }
      
      }
      
      echo "<input type='hidden' name='numimg' value='$valimg'>\n";
      echo "<input type='hidden' name='maximg' value='$compteur'>\n";

 echo "</form>";
?>

<div id='cadrpic' onmouseover="startWheel(); if (attenteClic===false) { iciPerm='<?php echo $droitimg; ?>';iciType='wspict';memoPerm='<?php echo $droitimg; ?>';memoType='wspict'; }"
                  onmouseout= "stopWheel(); if (attenteClic===false) { iciType='defaut'; }">
</div>
<div id='loadingImg' style='position:relative;visibility:visible;text-align:center'>
  <img src='<?php echo $_SESSION["ws"]["cheminImg"]?>loading2.gif'>
  <br /><?php echo $_SESSION["ws"]["dia"]["loading"]; ?>
</div>
<div id='exifpic' onmouseover="iciPerm='<?php echo $droitimg; ?>';iciType='wspict';memoPerm='<?php echo $droitimg; ?>';memoType='wspict';" onmouseout="iciType='defaut';">
  <div id='close_exif'><img src='<?php echo $_SESSION["ws"]["cheminImg"]?>close.<?php echo $_SESSION["ws"]["formatExt"]?>' onclick='cacheExif()'></div>
</div>
</div>
<?php
  $tabLog= array("4","1",$_SESSION["ws"]["dia"]["pictPreview"]." ".$url,$_SESSION["ws"]["nomUser"],$_SESSION["ws"]["dossierActif"],$url,"");
  $l_mysql->logAction($tabLog);
  $l_mysql->disconnect();
?>