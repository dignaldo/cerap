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
// Fonction : Authentification de l'accès à l'explorateur
// Nom      : auth.php
// Version  : 0.8.2
// Date     : 24/04/09
// =======================================================================

  @session_start();
  // Authentification : Test de certaines variables contenant obligatoirement des informations
  if (empty($_SESSION["ws"]["listeServeur"][0]) || empty($_SESSION["ws"]["typeUser"]))
    { header("Location: index.php"); exit(); }

?>