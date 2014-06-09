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
// Fonction : Définit des fonctions globales
// Nom      : fonctions.php
// Version  : 0.8.2
// Date     : 24/04/09
// =======================================================================

    if (preg_match("/MSIE/i" , $_SERVER["HTTP_USER_AGENT"])==1)       $navig="IE";
elseif (preg_match("/Chrome/i",$_SERVER["HTTP_USER_AGENT"])==1)       $navig="CH";
elseif (preg_match("/KHTML/i" ,$_SERVER["HTTP_USER_AGENT"])==1)       $navig="KH";
elseif (preg_match("/opera/i" ,$_SERVER["HTTP_USER_AGENT"])==1)       $navig="OP";
elseif (preg_match("/^Mozilla\//i", $_SERVER["HTTP_USER_AGENT"])==1)  $navig="MO";
                                                                 else $navig="NS";
if ($navig=="IE") $instr= "client"; else $instr= "offset";
if ($navig=="IE") $filtre='filter:alpha(opacity=0)';
             else $filtre='opacity:0';

exec("convert -version", $out);
$libraryImg="gd";
if (preg_match("/ImageMagick/",$out[1])==1) $libraryImg="ic";
//if (extension_loaded("imagick")) $libraryImg="im";

if ($libraryImg=="gd") $typeImgReco="/png|jpeg|jpg|gif/i";
else $typeImgReco="/png|jpeg|jpg|bmp|gif|cur|dcr|dib|emf|eps|ico|pdf|ps|psd|svg|tga|tif|ai/i";
              
   // Fonctions de corrections de mise en forme des noms et liens
   function blindeNom($v_in) {
     $v_out = str_replace("&","&amp;",$v_in);
     convertUTF8($v_out);
     return $v_out;
   }

   function blindeLien($v_in) {
     $v_in  = utf8_encode(htmlspecialchars($v_in));
     $v_out = str_replace(array("%2F","%2F%2F","//","///","\\"),"/",$v_in);
     return $v_out;
   }

   function blindeChemin($v_in) {
     $v_out = str_replace(array("%2F","%2F%2F","//","///","\\"),"/",$v_in);
     return $v_out;
   }

   function blindeAffichage($v_in) {
     $v_out =  utf8_encode(str_replace("&","%26",$v_in));
     return $v_out;
   }

   // Retourne la racine serveur quelquesoit la configuration
   function getDocumentRoot() {
     if (!isset($_SERVER["DOCUMENT_ROOT"])||empty($_SERVER["DOCUMENT_ROOT"])) {
       $pathRoot= blindeChemin(isset($_SERVER["PATH_TRANSLATED"])?$_SERVER["PATH_TRANSLATED"]:realpath($_SERVER["SCRIPT_FILENAME"]));
       $pathFile= blindeChemin(isset($_SERVER["SCRIPT_NAME"])?$_SERVER["SCRIPT_NAME"]:$_SERVER["PHP_SELF"]);
       if (empty($pathFile)) $pathFile= blindeChemin($_SERVER["ORIG_PATH_INFO"]);
       $docRoot= str_replace ($pathFile,"",$pathRoot)."/";
     } else {
       $docRoot= $_SERVER["DOCUMENT_ROOT"]; 
     }
     return $docRoot;
   }

   // Retourne la racine script quelquesoit la configuration
   function getScriptRoot() {
     $pathRoot= dirname(blindeChemin(isset($_SERVER["PATH_TRANSLATED"])?$_SERVER["PATH_TRANSLATED"]:realpath($_SERVER["SCRIPT_FILENAME"])));
     return $pathRoot;
   }
   
   // Vérifie que le chemin ne contient pas de lien vers le niveau supérieur
   function verifie($nomChemin) {
     if (!isset($nomChemin)||empty($nomChemin)||(strstr(html_entity_decode($nomChemin),"..")!==false)||preg_match($_SESSION["ws"]["varsUser"],html_entity_decode($nomChemin)))
       { echo $_SESSION["ws"]["dia"]["noOperation"]; exit(); }
   }

  // Retourne les droits d'un fichier ou d'un dossier selon l'utilisateur
  function gestion($perms) {

   $iciPerm="";
    switch ($_SESSION["ws"]["typeUser"]) {

    case 1:
    // Propriétaire
     if (($perms & 0x0100)&&($_SESSION["ws"]["auth1"]=="on")) $iciPerm.= 'R';
     if (($perms & 0x0080)&&($_SESSION["ws"]["auth3"]=="on")) $iciPerm.= 'W';
    break;

    case 2:
     // Groupe
     if (($perms & 0x0100)&&($perms & 0x0020)&&($_SESSION["ws"]["auth1"]=="on")) $iciPerm.= 'R';
     if (($perms & 0x0080)&&($perms & 0x0010)&&($_SESSION["ws"]["auth3"]=="on")) $iciPerm.= 'W';
    break;

    case 3: default:
     // Tous
     if (($perms & 0x0100)&&($perms & 0x0004)&&($_SESSION["ws"]["auth1"]=="on")) $iciPerm.= 'R';
     if (($perms & 0x0080)&&($perms & 0x0002)&&($_SESSION["ws"]["auth3"]=="on")) $iciPerm.= 'W';
    break;
    }

    if (empty($iciPerm)) $iciPerm="N";
    return $iciPerm;

  }

  // Retourne les droits FTP d'un fichier ou d'un dossier selon l'utilisateur
  function gestionFTP($perms) {

   $iciPerm="";
    switch ($_SESSION["ws"]["typeUser"]) {
    case 1:
    // Propriétaire
     if ((substr($perms,1,1)=="r")&&($_SESSION["ws"]["auth1"]=="on")) $iciPerm.= 'R';
     if ((substr($perms,2,1)=="w")&&($_SESSION["ws"]["auth3"]=="on")) $iciPerm.= 'W';
    break;

    case 2:
     // Groupe
     if ((substr($perms,4,1)=="r")&&($_SESSION["ws"]["auth1"]=="on")) $iciPerm.= 'R';
     if ((substr($perms,5,1)=="w")&&($_SESSION["ws"]["auth3"]=="on")) $iciPerm.= 'W';
    break;

    case 3: default:
     // Tous
     if ((substr($perms,7,1)=="r")&&($_SESSION["ws"]["auth1"]=="on")) $iciPerm.= 'R';
     if ((substr($perms,8,1)=="w")&&($_SESSION["ws"]["auth3"]=="on")) $iciPerm.= 'W';
    break;
    }

    if (empty($iciPerm)) $iciPerm="N";
    return $iciPerm;
  }

   // Dézippe un fichier
   function dezipper($nomElement,$nomDestination) {

      include_once "zip.lib.php";
      $zip = zip_open(blindeChemin($nomElement));

      if ($zip) {
        while ($zip_entry = zip_read($zip)) {
          $filepath=str_replace("%2F", "/",urlencode(dirname(zip_entry_name($zip_entry))));
          $filename=urlencode(basename(zip_entry_name($zip_entry)));
          $filepath=str_replace("+", " ",preg_replace('~%([0-9a-f])([0-9a-f])~ei', 'ascToUtf8(hexdec("\\1\\2"))', $filepath));
          $filename=str_replace("+", " ",preg_replace('~%([0-9a-f])([0-9a-f])~ei', 'ascToUtf8(hexdec("\\1\\2"))', $filename));

          $taille= zip_entry_filesize($zip_entry);

          if (!is_dir(blindeChemin($nomDestination."/".$filepath))) mkdir (blindeChemin($nomDestination."/".$filepath));
           if (isset($filename)&&!empty($filename)&&(strstr(html_entity_decode($filename),"..")===false)&&!preg_match($_SESSION["ws"]["varsUser"],html_entity_decode($filename))) {
            if ($taille!=0) {
              if (zip_entry_open($zip, $zip_entry, "r")) {
              if (!$handle = @fopen(blindeChemin("$nomDestination/$filepath/".$filename), 'w+'))
                return " msginfo=\"".$_SESSION["ws"]["dia"]["cantOpen"]." (".blindeChemin("$nomDestination/$filepath/$filename").")\";";
              if (@fwrite($handle, zip_entry_read($zip_entry, zip_entry_filesize($zip_entry))) === FALSE)
                return " msginfo=\"".$_SESSION["ws"]["dia"]["cantwrite"]." (".blindeChemin("$nomDestination/$filepath/$filename").")\";";
              @fclose($handle);
              zip_entry_close($zip_entry);
            }
           }
          }

        }
        zip_close($zip);
     }
   }

  $erreur="";
  $old_error_handler = set_error_handler("myErrorHandler");

  // Fonction de gestion des erreurs
  function myErrorHandler($errno, $errstr, $errfile, $errline) {
    global $erreur;
        if ((preg_match("/Permission denied/", $errstr))==1) $erreur= @$_SESSION["ws"]["dia"]["prohibited"];
    elseif ((preg_match("/File exist/", $errstr))==1)        $erreur= @$_SESSION["ws"]["dia"]["fileExist"];
                                                        else $erreur= @$_SESSION["ws"]["dia"]["identProblem2"];
                                                        $erreur= $errstr;
  }

  // Fonction de retour de la langue du navigateur
  function deflang() {
    switch(strtolower(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,2))) {
      case "us" : $deflang='English';   break;
      case "en" : $deflang='English';   break;
      case "fr" : $deflang='Francais';  break;
      case "ja" : $deflang='Japanese';  break;
      case "jp" : $deflang='Japanese';  break;
      case "de" : $deflang='Deutsch';   break;
      case "pt" : $deflang='Portugues'; break;
      case "br" : $deflang='Portugues'; break;
      case "es" : $deflang='Spanish';   break;
      case "ca" : $deflang='Catalan';   break;
      case "zh" : $deflang='Chinese';   break;
      case "ko" : $deflang='Korean';    break;
      default   : $deflang='English';   break;
    }
    return $deflang;
  }

  // Fonction de connexion à un serveur FTP
  function connexionFTP($nomFTP) {
    $conn_id = @ftp_connect($_SESSION["ws"]["$nomFTP"]["adrServeur"]);
    $login_result = @ftp_login($conn_id, $_SESSION["ws"]["$nomFTP"]["logServeur"], base64_decode($_SESSION["ws"]["$nomFTP"]["passServeur"]));
    if ((!$conn_id) || (!$login_result)) return false;
                                  else { return $conn_id; }
  }

  // Fonction de chargement d'un fichier distant
  function ftp_get_contents($ftp_stream, $remote_file, $mode, $resume_pos=null){
    $name_file= basename($remote_file);
    @ftp_get($ftp_stream, blindeChemin($_SESSION["ws"]["tempDir"]."/".$name_file), $remote_file, FTP_BINARY);
    $contenu= @file_get_contents(blindeChemin($_SESSION["ws"]["tempDir"]."/".$name_file));
    @unlink (blindeChemin($_SESSION["ws"]["tempDir"]."/".$name_file));
    return $contenu;
  }

  // Fonction de chargement d'un fichier distant ligne par ligne
  function ftp_file_contents($ftp_stream, $remote_file, $mode, $resume_pos=null){
    $name_file= basename($remote_file);
    @ftp_get($ftp_stream, blindeChemin($_SESSION["ws"]["tempDir"]."/".$name_file), $remote_file, FTP_BINARY);
    $contenu= @file(blindeChemin($_SESSION["ws"]["tempDir"]."/".$name_file));
    @unlink (blindeChemin($_SESSION["ws"]["tempDir"]."/".$name_file));
    return $contenu;
  }
  
  // Fonction de récupération des informations d'un fichier sur serveur FTP
  function ftp_recup_fileinfo($nomSrv,$cheminGlobal) {

    $_SESSION["ws"]["$nomSrv"]["connexion"]=connexionFTP($nomSrv);
    $cheminFichier= blindeChemin($_SESSION["ws"]["$nomSrv"]["rootServeur"].dirname($cheminGlobal));
    $permGlob= "RW";
    $tabInfos= array();

    if (($contents = ftp_rawlist($_SESSION["ws"]["$nomSrv"]["connexion"], $cheminFichier))!==FALSE) {
      foreach($contents as $entry) {

        $info = array();
        $vinfo = preg_split("/[\s]+/", $entry, 9);

        if ( (preg_match($_SESSION["ws"]["varsUser"], $vinfo[8])==0) && (trim($vinfo[8])==basename($cheminGlobal)) ) {
          if ($vinfo[0] !== "total") {
            $info['chmod'] = trim($vinfo[0]);
            $info['num']   = trim($vinfo[1]);
            $info['owner'] = trim($vinfo[2]);
            $info['group'] = trim($vinfo[3]);
            $info['size']  = trim($vinfo[4]);
            $info['month'] = trim($vinfo[5]);
            $info['day']   = trim($vinfo[6]);
            $info['time']  = trim($vinfo[7]);
            $info['name']  = trim($vinfo[8]);
          }
        
          $tabInfos["iciPerm"] =gestionFTP($info['chmod']);
          $tabInfos["modif"]   =$info['day']." ".$info['month']." ".$info['time'];

          if (strpos($info['chmod'],"d")!==FALSE) {
                 $tabInfos["proto"]  ="dossier";
                 $tabInfos["taille"] =0; }
          else { $tabInfos["proto"]  ="local";
                 $tabInfos["taille"] =$info['size']; }

          if (strpos($info['chmod'],"l")!==FALSE) {
            $symLink=explode(" ->", $info['name']);
            $info['name']=$symLink[0];
          }
          return $tabInfos;
        }
      }
    }
    return false;
  }

  // Conversion en UTF8
  function convertUTF8($str) {
    if (!function_exists('mb_convert_encoding')) return $str;
    else {
      if ($str === mb_convert_encoding(mb_convert_encoding($str, "UTF-32", "UTF-8"), "UTF-8", "UTF-32"))
           return $str;
      else return mb_convert_encoding($str,"UTF-8");
    }
  }

  // Convertion de l'unicode javascript vers l'UTF8
  function jsToUtf8($val) {
    return preg_replace("/%u([0-9ABCDEFabcdef]{3,5})/e", 'html_to_utf8("\\1")', urldecode($val));
  }

  // Convertion de l'extended ASCII vers l'UTF8
  function ascToUtf8($val) {

    $convertTable= array(
      "128"=>"Ç", "129"=>"ü", "130"=>"é", "131"=>"â", "132"=>"ä", "133"=>"à", "135"=>"ç", "136"=>"ê", "137"=>"ë", "138"=>"è", "139"=>"ï",
      "140"=>"î", "141"=>"ì", "142"=>"Ä", "143"=>"Å", "144"=>"É", "145"=>"æ", "146"=>"Æ", "147"=>"ô", "148"=>"ö", "149"=>"ò", "150"=>"û",
      "151"=>"ù", "152"=>"ÿ", "153"=>"Ö", "154"=>"Ü", "160"=>"á", "161"=>"í", "162"=>"ó", "163"=>"ú", "164"=>"ñ", "165"=>"Ñ", "167"=>"°", "248"=>"°");
    return $convertTable[$val];
  }

  // Turns a string of unicode characters into an array of ordinal values,
  // Even if some of those characters are multibyte.
  function unistr_to_ords($str, $encoding = 'UTF-8'){
    $str = mb_convert_encoding($str,"UCS-4BE",$encoding);
    $ords = array();

    // Visit each unicode character
    for($i = 0; $i < mb_strlen($str,"UCS-4BE"); $i++){
      // Now we have 4 bytes. Find their total numeric value.
      $s2 = mb_substr($str,$i,1,"UCS-4BE");
      $val = unpack("N",$s2);
      $ords[] = $val[1];
    }
      return($ords);
  }

  // Fonction de conversion des caractères tapés par l'utilisateur
  // pour insertion dans le nom de fichier même si le serveur est incompatible
  function convCar($str) {
    if (function_exists('mb_convert_encoding')) {
      $result = unistr_to_ords($str); $nomCorrige="";

      foreach ($result as $valCar) {
        if ($valCar<=255) $nomCorrige.=chr($valCar);
                     else $nomCorrige.="%u".dechex($valCar); }
                     
           return utf8_encode($nomCorrige);
    } else return $str;
  }

  function html_to_utf8($data) {
    $data= hexdec($data);
    if ($data > 127) {
      $i = 5;
      while (($i--) > 0) {
        if ($data != ($a = $data % ($p = pow(64, $i)))) {
          $ret = chr(base_convert(str_pad(str_repeat(1, $i + 1), 8, "0"), 2, 10) + (($data - $a) / $p));
          for ($i; $i > 0; $i--)
            $ret .= chr(128 + ((($data % pow(64, $i)) - ($data % ($p = pow(64, $i - 1)))) / $p));
            break; }
      }
    } else $ret = "&#$data;";
    return $ret;
  }

  // Conversion des tailles de fichiers
  function conversion($val) {
    $val = trim($val);
    $last = strtolower($val{strlen($val)-1});
    switch($last) {
      case 'g': $val *= 1024;
      case 'm': $val *= 1024;
      case 'k': $val *= 1024; break;
    }
    return $val;
  }


  // Fonction de coloration syntaxique
  function ColorPhpCode($Code) {

    $Color['html']    = '#00000';
    $Color['comment'] = '#008080';
    $Color['default'] = '#0000BB';
    $Color['keyword'] = '#007700';  
    $Color['string']  = '#FF4000';

    $ret = highlight_string($Code, true);

    $in = array(
      '`</?code>`i',
      '`<(?:font color="|span style="color: )' .ini_get('highlight.html')   . '">(.+?)</(?:font|span)>`si',
      '`<(?:font color="|span style="color: )' .ini_get('highlight.comment'). '">(.+?)</(?:font|span)>`si',
      '`<(?:font color="|span style="color: )' .ini_get('highlight.default'). '">(.+?)</(?:font|span)>`si',
      '`<(?:font color="|span style="color: )' .ini_get('highlight.keyword'). '">(.+?)</(?:font|span)>`si',
      '`<(?:font color="|span style="color: )' .ini_get('highlight.string') . '">(.+?)</(?:font|span)>`si',
      '` `si'
    );

    $out = array(
      '',
      '<span class="html">$1</span>',
      '<span style="color:' .$Color['comment']. '">$1</span>',
      '<span style="color:' .$Color['default']. '">$1</span>',
      '<span style="color:' .$Color['keyword']. '">$1</span>',
      '<span style="color:' .$Color['string' ]. '">$1</span>',
      ' '
    );
  
    $ret= preg_replace($in, $out, $ret);
    $pieces= explode("<br />",$ret); $numLigne=1;
    $ret  = "<table border=0 cellspacing=0 cellpadding=0>\n";
    foreach ($pieces as $valeur)
      $ret.= "<tr><td class='cl'>".$numLigne++."</td><td class='cd'>&nbsp;".$valeur."</td></tr>\n";
      $ret .= "</table>";
    return $ret;
  }

  
// ==== Gestion de la base MySQL ====

class class_mysql {
  var	$private_connect;  
  var	$private_errmsg;     

  // ==== Le constructeur ====
  function class_mysql() {
  }

  // ==== Teste la connexion ====
  function test() {
    return @mysql_ping($this->private_connect);
  }

  // ==== Crée la connexion mysql ====
  function connect() {
    if (empty($this->private_connect) || !$this->test()) {
      if (($this->private_connect=mysql_connect($_SESSION["ws"]["serveurBase"], $_SESSION["ws"]["loginBase"], base64_decode($_SESSION["ws"]["passBase"])))!==false) {
        mysql_select_db($_SESSION["ws"]["tableBase"]);
        mysql_query("SET NAMES 'utf8'");
        return true;
     	} else return false;
    }
    
  }

  // ==== Retourne le résultat d'une requête ====
  function request_result($l_query) {
    if (!$this->test()) $l_mysql->connect();
      if (!empty($l_query) && (($l_ret=@mysql_query($l_query))!==false) ) {

          $l_result = Array();
          while ($l_row = @mysql_fetch_array($l_ret)) {
            foreach ($l_row as $l_key => $l_value) {
              $p_http[$l_key]= $l_value;
            }
            $l_result[] = $p_http;
          }
          @mysql_free_result($l_ret);
          return $l_result;
      } else {
          return false;
      }
  }

  // ==== Effectue une requête sans réponse ====
  function request($l_query) {
    if (!$this->test()) $l_mysql->connect();
      if (!empty($l_query) && ((@mysql_query($l_query))!==false) )
           return true;
      else return false;
  }

  // ==== Blinde les données mySQL ====
  function blinde_param($p_param) {
    foreach ($p_param as $l_key => $l_value) {
      if (is_string($l_value) && ($l_value == "")) $p_http[$l_key] = "";
      elseif (is_string($l_value)) $p_http[$l_key] = mysql_real_escape_string(stripslashes($l_value));
      elseif (is_array($l_value))  $p_http[$l_key] = $this->blinde_param($l_value);
    }
    return $p_http;
  }

  // ==== Déconnexion ====
  function disconnect() {
      @mysql_close($this->private_connect);
  }
  
  // ==== Erreur ====
  function error() {
      $private_errmsg= "L'erreur renvoyée par mySQL est : ".@mysql_error($this->private_connect)."\n";
      return $private_errmsg;
  }

  // ==== Log des actions ====
  function logAction($tabLog) {
    if ($_SESSION["ws"]["activeLog"]==1) {
      $tabLog["idaction"]= $tabLog["0"];
      $tabLog["idresult"]= $tabLog["1"];
      $tabLog["username"]= $tabLog["3"];
      $tabLog["content"] = $tabLog["6"];
      $tabLog["verbose"] = jsToUtf8($tabLog["2"]);
      $tabLog["path"]    = jsToUtf8($tabLog["4"]);
      $tabLog["file"]    = jsToUtf8($tabLog["5"]);

      $ipadr=$_SERVER['REMOTE_ADDR'];
      if ($this->test()) {
        $tabLog = $this->blinde_param($tabLog);

        // ==== Ajout de l'action dans la base de données de log ====
        $request= "INSERT INTO wslog (idaction,idresult,iddate,verbose,username,path,file,content,ipadr)
                   VALUES('$tabLog[idaction]','$tabLog[idresult]','".date("Y-m-d H:i:s")."',
                   '$tabLog[verbose]','$tabLog[username]','$tabLog[path]','$tabLog[file]',
                   '$tabLog[content]','$ipadr')";
        $result = $this->request($request);
        
      } elseif (isset($_SESSION["ws"]["repLog"])) {
      
        // ==== Ajout de l'action dans le fichier texte de log ====
        if (($dest = fopen($_SESSION["ws"]["repLog"]."logs-".date("Ymd").".txt", "a+")) === FALSE) $erreur=1; else { $erreur = 0;
           fwrite ($dest,date("Y-m-d H:i:s")." \ ".$tabLog["username"]." ($ipadr) : ".$tabLog["verbose"]." \n");
           fclose ($dest);
        }
      }
    }
  }

  // ==== Met à jour les informations d'un fichier ====
  function updateFileInfo($tabFile) {

      if ($this->test()) {
        $tabFile = $this->blinde_param($tabFile);
        // ==== Met à jour le fichier dans la base de données ====
        $request= "UPDATE wsfiles SET idServeur= '$tabLog[idServeur]', nomServeur= '$tabLog[nomServeurF]',
          path= '$tabLog[cheminF]', file= '$tabLog[nomF]',
          WHERE nomServeur LIKE '$tabLog[nomServeurD]' AND path LIKE '$tabLog[cheminD]' AND file LIKE '$tabLog[nomD]' ";
        $result = $this->request($request);
      }
  }
  
}
?>