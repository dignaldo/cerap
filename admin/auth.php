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
// Fonction : Authentification de l'accès à l'administration
// Nom      : auth.php
// Version  : 0.8.2
// Date     : 24/04/09
// =======================================================================

  @session_start();
  $chemin_pass = "../wspasswd/.htpasswd";
  
  // Identification par login
  if (isset($_REQUEST["login"])&&isset($_REQUEST["pass"])) {
    $login= trim($_REQUEST["login"]);
    $pass = trim($_REQUEST["pass"]);
           
    $content= trim(file_get_contents($chemin_pass));
    list($gl,$gp)= explode(":",$content);
    if (($gl==$login)&&($gp==$pass)) {
      $_SESSION["ws"]["authentif"]=1;
      echo "ok";
    }
  }
  // Pas de protection par htpasswd
  if (!is_file($chemin_pass)) {
      $_SESSION["ws"]["authentif"]=1; 
  }
  
  // Authentification 
  if (!isset($_SESSION["ws"]["authentif"])||($_SESSION["ws"]["authentif"]!=1)) exit;

?>