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
// Fonction : Effectue une transformation XSLT
// Nom      : xslt.php
// Version  : 0.8.2
// Date     : 24/04/09
// =======================================================================
session_start();
include_once "auth.php";
include_once "fonctions.php";
$_REQUEST["cle"]=$_SESSION["ws"]["uniqKey"];
$nomSrv= $_SESSION["ws"]["serveurActif"];
$chemin= $_SESSION["ws"]["cheminActif"].$_SESSION["ws"]["dossierActif"]."/";
$sortie= '';

if (PHP_VERSION >= 5) {
    // Emulate the old xslt library functions
    function xslt_create() {
        return new XsltProcessor();
    }

    function xslt_process($xsltproc,
                          $xml_arg,
                          $xsl_arg,
                          $xslcontainer = null,
                          $args = null,
                          $params = null) {
        // Start with preparing the arguments
        $xml_arg = str_replace('arg:', '', $xml_arg);
        $xsl_arg = str_replace('arg:', '', $xsl_arg);

        // Create instances of the DomDocument class
        $xml = new DomDocument;
        $xsl = new DomDocument;

        // Load the xml document and the xsl template
        $xml->loadXML($args[$xml_arg]);
        $xsl->loadXML($args[$xsl_arg]);

        // Load the xsl template
        $xsltproc->importStyleSheet($xsl);

        // Set parameters when defined
        if ($params) {
            foreach ($params as $param => $value) {
                $xsltproc->setParameter("", $param, $value);
            }
        }

        // Start the transformation
        $processed = $xsltproc->transformToXML($xml);

        // Put the result in a file when specified
        if ($xslcontainer) {
            return @file_put_contents($xslcontainer, $processed);
        } else {
            return $processed;
        }

    }

    function xslt_free($xsltproc) {
        unset($xsltproc);
    }
}


switch ($_REQUEST["xmltype"]) {
  case "repGalerie":
     ob_start();
    include "xsl/$_REQUEST[xmlstyle].xsl.php";
    $out_xsl = ob_get_contents();
    ob_end_clean();

    ob_start();
    include "naviguer.php";
    $out_xml = ob_get_contents();
    ob_end_clean();
    $out_xml = preg_replace("/(<repAdresse>.*<\/repAdresse>)/", "", $out_xml);
  break;
  case "repAdresse":
       ob_start();
      include "xsl/format.xsl.php";
      $out_xsl = ob_get_contents();
    ob_end_clean();

    ob_start();
    include "naviguer.php";
    $out_xml = ob_get_contents();
    ob_end_clean();
    $out_xml = preg_replace("/(<repGalerie>.*<\/repGalerie>)/", "", $out_xml);
  break;
  case "repArbre":
     ob_start();
      include "xsl/format.xsl.php";
      $out_xsl = ob_get_contents();
    ob_end_clean();

    ob_start();
    include "explorer.php";
    $out_xml = ob_get_contents();
    ob_end_clean();
  break;
}


$xp = xslt_create();
if (PHP_VERSION < 5) xslt_set_encoding($xp, 'UTF-8');

// read the files into memory
$xsl_string = $out_xsl;
$xml_string = $out_xml;

// set the argument buffer
$arg_buffer = array('/xml' => $xml_string, '/xsl' => $xsl_string);

// process the two files to get the desired output
if (($sortie = xslt_process($xp, 'arg:/xml', 'arg:/xsl', NULL, $arg_buffer))) echo $sortie;
?>