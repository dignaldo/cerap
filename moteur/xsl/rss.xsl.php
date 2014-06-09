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
// Fonction : XSL d'affichage de flux RSS
// Nom      : rss.xsl.php
// Version  : 0.8.2
// Date     : 24/04/09
// =======================================================================
session_start();
header('Content-Type: application/xml');
echo '<'.'?xml version="1.0" encoding="UTF-8"'.'?>';
?>
<xsl:stylesheet version="1.0"
  xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
  xmlns:dc="http://purl.org/dc/elements/1.1/">
<xsl:output method="html" version="4" encoding="UTF-8" indent="yes" />
<xsl:template match="channel">
  <html>
    <head>
    <title><xsl:value-of select="title" /></title>
  <link rel="STYLESHEET" type="text/css" href="../style/Standard.css"/>
    <link rel="stylesheet" href="../style/<?php echo $_SESSION["ws"]["styleUser"]?>.css" type="text/css"/>
    </head>
    <body style='overflow:auto;text-align:center'>
     <div style='width:100%;margin:10px;text-align:left;'>
      <a href="{image/link}" target="_blank"><img src="{image/url}" alt="{image/title}" title="{description}" border="0" width="{image/width}" height="{image/height}" align="left" style='margin-right:8px'/></a>
      <h2><a href="{link}"><b><xsl:value-of select="title" /></b></a></h2><br/>
      <div style="padding-left:40px;width:90%">
        <b><xsl:value-of select="description" /></b><br/><br/>
      </div>
      <xsl:call-template name="item" />
     </div>
  </body>
  </html>
</xsl:template>

<xsl:template match="item" name="item">
  <xsl:for-each select="item">
    <div class="rubrique" style="padding-left:8px;width:95%">
      <table style="width:100%"><tr><td>
        <a href="{link}" target="_blank" style="color:#000"><b><xsl:value-of select="title" /></b></a>
      </td><td align="right">
        <h6><xsl:value-of select="pubDate" /></h6>
      </td></tr></table>
    </div>
    <div style="padding-left:40px;width:90%">
      <xsl:value-of select="description" /><br />
      <div align="right"><a href="{link}" target="_blank"  style="color:#000"><b><img src='../<?php echo $_SESSION["ws"]["cheminImg"]?>infolien.<?php echo $_SESSION["ws"]["formatExt"]?>'/> Lire la suite</b></a></div><br />
    </div>
    <br />

  </xsl:for-each>
</xsl:template>
</xsl:stylesheet>
