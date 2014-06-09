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
// Fonction : Démonstration d'utilisation en Iframe
// Nom      : iframe.php
// Version  : 0.8.2
// Date     : 24/04/09
// =======================================================================
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>CERAP</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="shortcut icon" href="style/favicon2.ico" type="image/ico" />
</head>
<body style='background:#666'>
<table style='width:100%;height:100%'><tr><td style='vertical-align:middle;text-align:center'>
  <h1>Exemple d'utilisation de Webshare en Iframe</h1>
  <h3>Ouverture automatique d'un compte existant (paramètre "mode=auto")</h3>
  <iframe id="exemple" name="exemple" src="index.php?actif=ok&login=root&pass=root&mode=auto" width="80%" height="500" frameborder="0" allowtransparency="false"></iframe>
</td></tr></table>
</body>
</html>