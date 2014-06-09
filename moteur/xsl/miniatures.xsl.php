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
// Fonction : XSL d'affichage des dossiers en mode miniatures
// Nom      : miniatures.xsl.php
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

  <xsl:template match="repGalerie">
   <xsl:variable name="commentGlobal" select="commentGlobal"/>
   <xsl:if test='(commentGlobal != "")'>
     <div class="headerDetails">
        <xsl:value-of select='commentGlobal'/>
     </div>
   </xsl:if>

   <div id="divFileInfo" style="display:none">
   <xsl:for-each select="ent">
    <xsl:variable name="nom" select="nom"/>
    <xsl:variable name="num" select="num"/>
    <xsl:variable name="lnk" select="lnk"/>
    <xsl:variable name="vis" select="vis"/>
    <xsl:variable name="tai" select="tai"/>
    <xsl:variable name="ext" select="ext"/>
    <xsl:variable name="lab" select="lab"/>
    <xsl:variable name="prm" select="prm"/>
    <xsl:variable name="cmt" select="cmt"/>
    <xsl:variable name="fav" select="fav"/>
    <xsl:variable name="dtm" select="dtm"/>
    <xsl:variable name="pro" select="pro"/>
    <xsl:variable name="web" select="web"/>
    tabFileInfo.fileInfo<xsl:value-of select='num'/>= {
      num : "<xsl:value-of select='num'/>",
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
   </xsl:for-each>
   </div>

  <ul class='v1' name="dragLayer" id="dragLayer">

   <xsl:for-each select="ent">
    <xsl:variable name="nom" select="nom"/>
    <xsl:variable name="num" select="num"/>
    <xsl:variable name="lnk" select="lnk"/>
    <xsl:variable name="vis" select="vis"/>
    <xsl:variable name="tai" select="tai"/>
    <xsl:variable name="ext" select="ext"/>
    <xsl:variable name="lab" select="lab"/>
    <xsl:variable name="prm" select="prm"/>
    <xsl:variable name="cmt" select="cmt"/>
    <xsl:variable name="fav" select="fav"/>
    <xsl:variable name="lck" select="lck"/>
    <xsl:variable name="dtm" select="dtm"/>
    <xsl:variable name="pro" select="pro"/>
    <xsl:variable name="web" select="web"/>
    <xsl:if test='(pro = "sup")'>
       <script language="javascript">boutonUp="<xsl:value-of select='lnk'/>";</script>
    </xsl:if>
    <xsl:variable name="action">
      <xsl:choose>
        <xsl:when test='(prm = "R") or (prm = "RW")'>
          initAction("")
        </xsl:when>
      <xsl:otherwise>
        rien()
        </xsl:otherwise>
      </xsl:choose>
    </xsl:variable>

    <li class='cible' onclick='if (altClick==0) {$action}' onmouseover='elementOver(this,{$num})' onmouseout='elementOut(this)'>
     <u>
      <div class='caseimg'>

       <xsl:if test='(pro != "url")'>
         <xsl:choose>
           <xsl:when test="contains(vis,'http')">
            <img src='{vis}' title="{$nom}" style="width:64px;"/>
           </xsl:when>
         <xsl:otherwise>
          <xsl:if test='(ext != "ico")'>
           <xsl:if test="contains(vis,'moteur/pic') and (fav != '1') and (ext!='jpg') and (ext!='jpeg') and (ext!='gif') and (ext!='png') and (ext!='JPG') and (ext!='JPEG') and (ext!='GIF') and (ext!='PNG')">
            <img src="<?php echo $_SESSION["ws"]["cheminIcn"]?>minis/{ext}.png" class="prevType"/>
          </xsl:if>
            <img src='<?php echo $_SESSION["ws"]["cheminIcn"]?>{vis}' title="{$nom}"/>
          </xsl:if>
          <xsl:if test='(ext = "ico")'>
            <img src='<?php echo $_SESSION["ws"]["cheminIcn"]?>{vis}' title="{$nom}" style="width:32px;height:32px;margin:16px"/>
         </xsl:if>
           </xsl:otherwise>
         </xsl:choose>
       </xsl:if>
       
       <xsl:if test='(pro = "url")'>
         <xsl:choose>
           <xsl:when test="contains(vis,'http')">
             <img src='{vis}' title="{$nom}" style="max-width:100px"/>
           </xsl:when>
           <xsl:otherwise>
             <img src='{vis}' title="{$nom}" />
           </xsl:otherwise>
         </xsl:choose>
        </xsl:if>

       <xsl:if test='(fav = "1")'>
             <img src="<?php echo $_SESSION["ws"]["cheminImg"]?>fav.<?php echo $_SESSION["ws"]["formatExt"]?>"  title='<?php echo $_SESSION["ws"]["dia"]["favoris"]?>' class="favo" />
       </xsl:if>
       
      </div>
     </u>
     
      <div class='nom'>
        <u>
       <xsl:if test='(lck = "1")'>
             <img src="<?php echo $_SESSION["ws"]["cheminImg"]?>panneau.<?php echo $_SESSION["ws"]["formatExt"]?>"  title='<?php echo $_SESSION["ws"]["dia"]["fileInUse"]?>' style='margin-right:5px'/>
       </xsl:if>
        <xsl:if test='(prm = "R") and ("1" = "<?php echo $_SESSION["ws"]["typeUser"]?>")'>
              <img src='<?php echo $_SESSION["ws"]["cheminImg"]?>verrou1.<?php echo $_SESSION["ws"]["formatExt"]?>' title='<?php echo $_SESSION["ws"]["dia"]["readOnly"]?>'/>
        </xsl:if>
        <xsl:if test='(prm = "W")'>
              <img src='<?php echo $_SESSION["ws"]["cheminImg"]?>verrou2.<?php echo $_SESSION["ws"]["formatExt"]?>' title='<?php echo $_SESSION["ws"]["dia"]["writeOnly"]?>' />
        </xsl:if>
        <xsl:if test='(prm = "N")'>
              <img src='<?php echo $_SESSION["ws"]["cheminImg"]?>verrou3.<?php echo $_SESSION["ws"]["formatExt"]?>' title='<?php echo $_SESSION["ws"]["dia"]["locked"]?>' />
        </xsl:if>
        <xsl:choose>
          <xsl:when test="contains(nom,'%u')">
            <xsl:value-of select="substring(nom,0,60)"/>
            <xsl:if test='(string-length(nom) &gt; 59)'>...</xsl:if>
          </xsl:when>
          <xsl:otherwise>

          <xsl:choose>
            <xsl:when test='(cmt != "") or (pro = "url") or (prm != "RW")'>
              <xsl:value-of select="substring(nom,0,8)"/>
              <xsl:if test='(string-length(nom) &gt; 7)'>...</xsl:if>
            </xsl:when>
            <xsl:otherwise>
              <xsl:value-of select="substring(nom,0,10)"/>
              <xsl:if test='(string-length(nom) &gt; 9)'>...</xsl:if>
            </xsl:otherwise>
          </xsl:choose>
        
          </xsl:otherwise>
        </xsl:choose>
        </u>
        <xsl:if test='(cmt != "")'>
        <img src='<?php echo $_SESSION["ws"]["cheminImg"]?>infocomment.<?php echo $_SESSION["ws"]["formatExt"]?>' title='{$cmt}' onmouseover="altClick=1;" onmouseout="altClick=0;" onclick="memoContext();montrerCommentaire(iciLien);return false;"/>
        </xsl:if>
        <xsl:if test='(pro = "url")'>
            <img src='<?php echo $_SESSION["ws"]["cheminImg"]?>infolien.<?php echo $_SESSION["ws"]["formatExt"]?>' title="{$web}"/>
        </xsl:if>
      </div>

      <div class='extension'>
        <xsl:if test='(pro = "url") and (ext != "url")'>
          <?php echo $_SESSION["ws"]["dia"]["linkTo"]?> <xsl:value-of select="ext"/>
        </xsl:if>
        <xsl:if test='(pro = "url") and (ext = "url")'>
          <?php echo $_SESSION["ws"]["dia"]["webSite"]?>
        </xsl:if>
        <xsl:if test='(pro = "local")'>
          <xsl:value-of select="ext"/>
        </xsl:if>
        <xsl:if test='(pro = "dossier")'>
          <?php echo $_SESSION["ws"]["dia"]["rep"]?>
        </xsl:if>
        <xsl:if test='(pro = "sup")'>
          <?php echo $_SESSION["ws"]["dia"]["niveauSup"]?>
        </xsl:if>

        <xsl:if test='($tai &gt; 0) and (ext != "")'>
          <span class='dotsep'> • </span>
        </xsl:if>

        <xsl:if test="($tai &gt; 0) and ($tai &lt; 1024)">
          <xsl:value-of select="number(tai)"/> <?php echo $_SESSION["ws"]["dia"]["octet"]?>
        </xsl:if>
        <xsl:if test="($tai &gt;= 1024) and ($tai &lt; 1048576)">
          <xsl:value-of select="format-number(number(tai) div number(1024),'#.00')"/> K<?php echo $_SESSION["ws"]["dia"]["octet"]?>
        </xsl:if>
        <xsl:if test="($tai &gt;= 1048576) and ($tai &lt; 1073741824)">
          <xsl:value-of select="format-number(number(tai) div number(1048576),'#.00')"/> M<?php echo $_SESSION["ws"]["dia"]["octet"]?>
        </xsl:if>
        <xsl:if test="($tai &gt;= 1073741824)">
          <xsl:value-of select="format-number(number(tai) div number(1073741824),'#.00')"/> G<?php echo $_SESSION["ws"]["dia"]["octet"]?>
        </xsl:if>
     
        <span id="accessMc{$num}" style="display:none">
          <img src='<?php echo $_SESSION["ws"]["cheminImg"]?>menuContext.<?php echo $_SESSION["ws"]["formatExt"]?>' onclick="setTimeout('reloadContext()',20)" title="<?php echo $_SESSION["ws"]["dia"]["menuContext"]?>"/>
        </span>
      </div>

    </li>
   </xsl:for-each>
   </ul>
  </xsl:template>

</xsl:stylesheet>
