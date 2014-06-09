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
// Fonction : XSL d'affichage de l'arborescence des dossiers
// Nom      : format.xsl.php
// Version  : 0.8.2
// Date     : 24/04/09
// =======================================================================
session_start();
header('Content-Type: application/xml');
echo '<'.'?xml version="1.0" encoding="UTF-8"'.'?>';
include_once "../fonctions.php";

?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" version="4.0" encoding="UTF-8" indent="yes"
                doctype-public="-//W3C//DTD XHTML 1.0 Transitional//EN"
                doctype-system="declarations.dtd"
    />
<xsl:template match="/" name="document">
<xsl:apply-templates/>
  </xsl:template>

  <xsl:template match="repArbre">
    <xsl:apply-templates select="contArbre" />
  </xsl:template>

  <xsl:template match="contArbre">
    <xsl:variable name="cnx" select="cnx"/>
    <xsl:variable name="serveur" select="serveur"/>
    <xsl:variable name="espacetotal" select="espacetotal"/>
    <xsl:variable name="espacelibre" select="espacelibre"/>
    <xsl:variable name="espaceutil"  select="espaceutil"/>
    <xsl:variable name="protect"     select="protect"/>
    <xsl:variable name="num"         select="num"/>
    
    <xsl:variable name="total">
        <xsl:if test="($espacetotal &gt; 0) and ($espacetotal &lt; 1024)"><xsl:value-of select="number(espacetotal)"/> <?php echo $_SESSION["ws"]["dia"]["octet"]?></xsl:if>
        <xsl:if test="($espacetotal &gt;= 1024) and ($espacetotal &lt; 1048576)"><xsl:value-of select="format-number(number(espacetotal) div number(1024),'#.00')"/> K<?php echo $_SESSION["ws"]["dia"]["octet"]?></xsl:if>
        <xsl:if test="($espacetotal &gt;= 1048576) and ($espacetotal &lt; 1073741824)"><xsl:value-of select="format-number(number(espacetotal) div number(1048576),'#.00')"/> M<?php echo $_SESSION["ws"]["dia"]["octet"]?></xsl:if>
        <xsl:if test="($espacetotal &gt;= 1073741824)"><xsl:value-of select="format-number(number(espacetotal) div number(1073741824),'#.00')"/> G<?php echo $_SESSION["ws"]["dia"]["octet"]?></xsl:if>
    </xsl:variable>
    
    <xsl:variable name="libre">
        <xsl:if test="($espacelibre &gt; 0) and ($espacelibre &lt; 1024)"><xsl:value-of select="number(espacelibre)"/> <?php echo $_SESSION["ws"]["dia"]["octet"]?></xsl:if>
        <xsl:if test="($espacelibre &gt;= 1024) and ($espacelibre &lt; 1048576)"><xsl:value-of select="format-number(number(espacelibre) div number(1024),'#.00')"/> K<?php echo $_SESSION["ws"]["dia"]["octet"]?></xsl:if>
        <xsl:if test="($espacelibre &gt;= 1048576) and ($espacelibre &lt; 1073741824)"><xsl:value-of select="format-number(number(espacelibre) div number(1048576),'#.00')"/> M<?php echo $_SESSION["ws"]["dia"]["octet"]?></xsl:if>
        <xsl:if test="($espacelibre &gt;= 1073741824)"><xsl:value-of select="format-number(number(espacelibre) div number(1073741824),'#.00')"/> G<?php echo $_SESSION["ws"]["dia"]["octet"]?></xsl:if>
    </xsl:variable>

    <xsl:variable name="util">
        <xsl:if test="($espaceutil &gt; 0) and ($espaceutil &lt; 1024)"><xsl:value-of select="number(espaceutil)"/> <?php echo $_SESSION["ws"]["dia"]["octet"]?></xsl:if>
        <xsl:if test="($espaceutil &gt;= 1024) and ($espaceutil &lt; 1048576)"><xsl:value-of select="format-number(number(espaceutil) div number(1024),'#.00')"/> K<?php echo $_SESSION["ws"]["dia"]["octet"]?></xsl:if>
        <xsl:if test="($espaceutil &gt;= 1048576) and ($espaceutil &lt; 1073741824)"><xsl:value-of select="format-number(number(espaceutil) div number(1048576),'#.00')"/> M<?php echo $_SESSION["ws"]["dia"]["octet"]?></xsl:if>
        <xsl:if test="($espaceutil &gt;= 1073741824)"><xsl:value-of select="format-number(number(espaceutil) div number(1073741824),'#.00')"/> G<?php echo $_SESSION["ws"]["dia"]["octet"]?></xsl:if>
    </xsl:variable>
        
    <xsl:variable name="detail">
      <xsl:choose>
        <xsl:when test="($espacelibre &gt;= 0)"> - <?php echo $_SESSION["ws"]["dia"]["used"]?> : <xsl:value-of select="$util"/>, <?php echo $_SESSION["ws"]["dia"]["free"]?> : <xsl:value-of select="$libre"/>, <?php echo $_SESSION["ws"]["dia"]["total"]?> : <xsl:value-of select="$total"/>
        </xsl:when>
        <xsl:otherwise>
        </xsl:otherwise>
      </xsl:choose>
    </xsl:variable>

   <div id='blocSrv{$serveur}'>
    <div class='rubrique' style='width:100%' title='<?php echo $_SESSION["ws"]["dia"]["nameShare"]?> {$serveur} {$detail}'  onmouseover='clicDiv=1;elementOver(this,"Arbo{$serveur}{$num}")' onmouseout='clicDiv=0; elementOut(this);'>
    <xsl:choose>
      <xsl:when test="($protect != 1)">
        <img src='<?php echo $_SESSION["ws"]["cheminImg"]?>verrou1.<?php echo $_SESSION["ws"]["formatExt"]?>' style='float:right;margin:2px' />
      </xsl:when>
      <xsl:otherwise>
      </xsl:otherwise>
    </xsl:choose>
    <img src='{$cnx}' />
    <b><xsl:value-of select="serveur"/> </b> </div>
    <xsl:apply-templates select="brc" /><br/>
   </div>
    
  </xsl:template>

  <xsl:template match="brc">
    <xsl:variable name="lnk" select="lnk"/>
    <xsl:variable name="nom" select="nom"/>
    <xsl:variable name="ext" select="ext"/>
    <xsl:variable name="lab" select="lab"/>
    <xsl:variable name="prm" select="prm"/>
    <xsl:variable name="pro" select="pro"/>
    <xsl:variable name="url" select="url"/>
    <xsl:variable name="num" select="num"/>
    <xsl:variable name="web" select="web"/>
    <xsl:variable name="srv" select="ancestor::contArbre/serveur"/>

  <div style="width:100%;overflow:hidden">
   <div style="width:100%;overflow:hidden;white-space:nowrap" class="repArbre" onmouseover='clicDiv=1;elementOver(this,"Arbo{$srv}{$num}")' onmouseout='clicDiv=0; elementOut(this);'>
      <div id="divInfoArbo{$srv}{$num}" style="display:none">
        tabFileInfo.fileInfoArbo<xsl:value-of select='srv'/><xsl:value-of select='num'/>= {
          num : "Arbo<xsl:value-of select='srv'/><xsl:value-of select='num'/>",
          lnk : "<xsl:value-of select='lnk'/>",
          nom : "<xsl:value-of select='nom'/>",
          ext : "<xsl:value-of select='ext'/>",
          lab : "<xsl:value-of select='lab'/>",
          tai : "<xsl:value-of select='tai'/>",
          prm : "<xsl:value-of select='prm'/>",
          pro : "<xsl:value-of select='pro'/>",
          dtm : "<xsl:value-of select='dtm'/>",
          web : "<xsl:value-of select='web'/>",
          fav : "<xsl:value-of select='fav'/>",
          srv : "<xsl:value-of select='srv'/>"
        };
     </div>

    <div style="visibility:visible;position:absolute;"></div>
    <xsl:if test='(prm = "R") or (prm = "RW")'>
      <xsl:choose>
      <xsl:when test="child::brc">
        <img id="arrid{$srv}{$lnk}" src='<?php echo $_SESSION["ws"]["cheminImg"]?>plus.<?php echo $_SESSION["ws"]["formatExt"]?>' onclick='devoile("divid{$srv}{$lnk}","arrid{$srv}{$lnk}",0)'/>
      </xsl:when>
      <xsl:otherwise>
        <img src='<?php echo $_SESSION["ws"]["cheminImg"]?>fondvide.<?php echo $_SESSION["ws"]["formatExt"]?>' />
      </xsl:otherwise>
    </xsl:choose>
      <xsl:choose>
        <xsl:when test="(url = 'url')">
          <span class='lien' onclick='if (altClick==0) initAction("")'>
          <img id="urlid{$srv}{$lnk}" src='<?php echo $_SESSION["ws"]["cheminImg"]?>minilien.<?php echo $_SESSION["ws"]["formatExt"]?>' width='22' height='22'/>
          <u onmouseover='this.className="lienover"' onmouseout='this.className="lien"'>
            <xsl:value-of select="nom"/>
          </u>
          </span>
        </xsl:when>
        <xsl:otherwise>
          <span class='lien' onclick='if (altClick==0) initAction("")'>
          <img id="imgid{$srv}{$lnk}" src='<?php echo $_SESSION["ws"]["cheminImg"]?>miniclose.<?php echo $_SESSION["ws"]["formatExt"]?>'/>
          <u onmouseover='this.className="lienover"' onmouseout='this.className="lien"'>
            <xsl:value-of select="nom"/>
          </u>
          </span>
        </xsl:otherwise>
        </xsl:choose>
    <xsl:if test='(prm = "R") and ("1" = "<?php echo $_SESSION["ws"]["typeUser"]?>")'>
      <img src='<?php echo $_SESSION["ws"]["cheminImg"]?>verrou1.<?php echo $_SESSION["ws"]["formatExt"]?>' alt='<?php echo $_SESSION["ws"]["dia"]["readOnly"]?>'/>
    </xsl:if>
      <br/>
    </xsl:if>

    <xsl:if test='(prm = "N")'>
      <img src='<?php echo $_SESSION["ws"]["cheminImg"]?>fondvide.<?php echo $_SESSION["ws"]["formatExt"]?>'/>
        <img src='<?php echo $_SESSION["ws"]["cheminImg"]?>miniclose.<?php echo $_SESSION["ws"]["formatExt"]?>'/>
        <u>
          <xsl:value-of select="nom"/>
        </u>
      <img src='<?php echo $_SESSION["ws"]["cheminImg"]?>verrou3.<?php echo $_SESSION["ws"]["formatExt"]?>' alt='<?php echo $_SESSION["ws"]["dia"]["locked"]?>'/>
      <br/>
    </xsl:if>

    <xsl:if test='(prm = "W")'>
      <img src='<?php echo $_SESSION["ws"]["cheminImg"]?>fondvide.<?php echo $_SESSION["ws"]["formatExt"]?>'/>
        <img src='<?php echo $_SESSION["ws"]["cheminImg"]?>miniclose.<?php echo $_SESSION["ws"]["formatExt"]?>'/>
        <u>
          <xsl:value-of select="nom"/>
        </u>
      <img src='<?php echo $_SESSION["ws"]["cheminImg"]?>verrou2.<?php echo $_SESSION["ws"]["formatExt"]?>' alt='<?php echo $_SESSION["ws"]["dia"]["writeOnly"]?>'/>
      <br/>
    </xsl:if>
    
    <xsl:if test='(prm = "T")'>
      <span class='lien' onclick='if (altClick==0) initAction("")' style='white-space: normal'>
          <table style='text-align:left'>
            <tr><td style='height:24px;vertical-align:middle'>
              <img id="arrid{$srv}{$lnk}" src='<?php echo $_SESSION["ws"]["cheminImg"]?>plus.<?php echo $_SESSION["ws"]["formatExt"]?>' align='left' style='margin-top:4px;margin-right:5px'/>
            </td>
            <td style='height:24px;vertical-align:middle'>
              <u onmouseover='this.className="lienover"' onmouseout='this.className="lien"' style='width:150px;white-space: normal;'>
                <xsl:value-of select="nom"/>
              </u>
            </td></tr>
          </table>
      </span>
    </xsl:if>
    
   </div>

    <div id="divid{$srv}{$lnk}" class='masque'>
      <xsl:if test="child::brc">
        <xsl:apply-templates select="brc" />
      </xsl:if>
    </div>
  </div>

  </xsl:template>

  <xsl:template match="repAdresse">
   <span id="autoshow" style="display:none">
      ...
   </span>
   <xsl:for-each select="dossier">
    <xsl:variable name="action" select="action"/>
    <xsl:variable name="lien" select="lien"/>
    <xsl:variable name="visu" select="visu"/>
    <xsl:variable name="nom" select="nom"/>

    <xsl:choose>
    <xsl:when test="following::dossier">

    <span class="autohide">
    <img src='<?php echo $_SESSION["ws"]["cheminImg"]?>{visu}'/>
    <xsl:choose>
      <xsl:when test='(action = "none")'>
      <u>
        <xsl:value-of select="nom"/>
      </u>
      </xsl:when>
      <xsl:otherwise>
        <span class='lien' onmouseover='iciNom="{$nom}"; iciLien="{$lien}"; iciType="adresse"; iciPro="dossier";' onclick='naviguer("{$lien}")' onmouseout='iciNom=""; iciType="defaut";'>
        <u onmouseover='this.className="lienover"' onmouseout='this.className="lien"'>
          <xsl:value-of select="nom"/>
        </u>
        </span>
      </xsl:otherwise>
    </xsl:choose>
    </span>

    </xsl:when>
    <xsl:otherwise>

    <img src='<?php echo $_SESSION["ws"]["cheminImg"]?>{visu}'/>
    <xsl:choose>
      <xsl:when test='(action = "none")'>
      <u>
        <xsl:value-of select="nom"/>
      </u>
      </xsl:when>
      <xsl:otherwise>
        <span class='lien' onmouseover='iciNom="{$nom}"; iciLien="{$lien}"; iciType="adresse"; iciPro="dossier";' onclick='naviguer("{$lien}")' onmouseout='iciNom=""; iciType="defaut";'>
        <u onmouseover='this.className="lienover"' onmouseout='this.className="lien"'>
          <xsl:value-of select="nom"/>
        </u>
        </span>
      </xsl:otherwise>
    </xsl:choose>

    </xsl:otherwise>
    </xsl:choose>

   </xsl:for-each>
  </xsl:template>

</xsl:stylesheet>
