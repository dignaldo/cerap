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
// Fonction : Gestion des paramètres utilisateur
// Nom      : utilisateur.php
// Version  : 0.8.2
// Date     : 24/04/09
// =======================================================================
header ("Content-type: text/html; charset=utf-8");
session_start();
include_once "auth.php";
include_once "admin.php";

if  (!isset($_SESSION["ws"]["langAdmin"])) {
  if (isset($_REQUEST["lang"])) $deflang=$_REQUEST["lang"]; else $deflang=deflang();
  include_once "../lang/$deflang.lang.php";
}
?>

<script language="Javascript">
  visiteurs= new Array();
  
<?php
  // ==== Chargement des données utilisateur ====
  $compteur=0;
  foreach ($visiteurs as $tabl => $tablvar) {
    echo "visiteurs[".$tablvar["idUser"]."]= new Array();\n";
    foreach ($tablvar as $nom => $valeur) {
      echo "visiteurs[".$tablvar["idUser"]."]['".trim($nom)."']= '".trim($valeur)."';\n";
    }
    $compteur++;
  }
  $maxUser= $compteur;
  echo "maxUser = $maxUser;\n";
?>

actuUtilisateur(<?php echo $_SESSION["ws"]["rlutil"]?>)

// Affichage de la partie utilisateur
</script>

<div class="page">
<div class='titre'><?php echo $_SESSION["ws"]["dia"]["userAdmin"];?></div>
<form name="adminUser" method="post" action="">
<table width="100%" border="0" align="center">
  <input type='hidden' name='validation' value='user'>
  <input type='hidden' name='supprime' value='0'>
  <input type='hidden' name='chemin' value='<?php echo $chemin?>'>
  <input type='hidden' name='selUser' value=''>
  <input type='hidden' name='idUser' value=''>  
  <tr><td><b><?php echo $_SESSION["ws"]["dia"]["user"];?></b></td>
        <td><select name="numUser" size="1" style="width:140px" onchange="rlutil=adminUser.numUser.options[adminUser.numUser.selectedIndex].value;actuUtilisateur(rlutil)">
              <option value='-1' <?php echo (($_SESSION["ws"]["rlutil"]==-1)?"selected":"")?>><?php echo $_SESSION["ws"]["dia"]["newUser"];?></option>
              <?php
                  foreach ($visiteurs as $tabl => $tablvar) {
                    echo "<option value='".$tablvar["idUser"]."' ".(($_SESSION["ws"]["rlutil"]==$tablvar["idUser"])?"selected":"").">$tablvar[nomUser]</option>\n";
                  }
              ?>
            </select></td>
        <td><?php echo $_SESSION["ws"]["dia"]["userType"];?></td>
        <td><select name="typeUser" size="1" style="width:140px"  onchange="affinedroits(this.options[this.selectedIndex].value)">
              <option value="1" selected><?php echo $_SESSION["ws"]["dia"]["administrator"];?></option>
          <option value="2"><?php echo $_SESSION["ws"]["dia"]["group"];?></option>
              <option value="3"><?php echo $_SESSION["ws"]["dia"]["user"];?></option>
            </select></td></tr>
    <tr><td><?php echo $_SESSION["ws"]["dia"]["name"];?>        </td><td><input name="nomUser" type="text" value="" style="width:140px" onkeyup="checkCar(this)" onkeydown="checkCar(this)"></td>
        <td></td><td></td></tr>
    <tr><td><?php echo $_SESSION["ws"]["dia"]["email"];?>       </td><td><input name="mailUser" type="text" value="" style="width:140px" onkeyup="checkPath(this)" onkeydown="checkPath(this)"></td>
        <td><?php echo str_replace($_SESSION["ws"]["dia"]["nameShare"],$_SESSION["ws"]["dia"]["user"]." ",$_SESSION["ws"]["dia"]["publicWS"]);?>    </td>
        <td><input name="publicUser" class="checkbox" type="checkbox" value="on" onchange="replacPass(this.value)"></td></tr>
    <tr><td><?php echo $_SESSION["ws"]["dia"]["login"];?>       </td><td><input name="logUser" type="text" value="" style="width:140px"></td></td>
        <td><?php echo $_SESSION["ws"]["dia"]["passwd"];?>      </td><td><input name="passUser" type="password" value="" style="width:140px" onchange="adaptPublic(this.value)"></td></tr>

    <tr><td><b><?php echo $_SESSION["ws"]["dia"]["access"];?></b></td><td colspan=3 style="width:75%">
            <dl style="display:block;">
            <?php $compteur=0; foreach ($serveurs as $tabl => $tablvar) {
               echo "<dt style='float:left;background:#a5b2c9'><input type='checkbox' style='border:0;background:#a5b2c9' name='serveur".$compteur++."' value='".$tabl."'>".$tabl."&nbsp;&nbsp;&nbsp;</dt>"; }
            ?></dl>
    </td></tr>
   </table>

  <table width="100%" border="0" align="center">
    <tr><td><?php echo $_SESSION["ws"]["dia"]["lang"];?></td>
        <td><select name="langUser" size="1" style="width:140px">
          <option value='Auto'>Auto</option>
            <?php $handle = opendir("../lang/");
               while (false !== ($entry = readdir($handle))) {
                 if (strstr($entry,".lang")!==false) { $nomlang = substr($entry,0,strpos($entry,"."));
                   $_REQUEST["name"]=1; include "../lang/$entry"; $_REQUEST["name"]=0;
                   echo "<option value='$nomlang' ".(($nomlang==$_SESSION["ws"]["langAdmin"])?"selected":"").">$nameLanguage</option>\n"; }
               }
               closedir($handle);
            ?>
            </select></td>
        <td><?php echo $_SESSION["ws"]["dia"]["defStyle"];?></td><td><select name="styleUser" size="1" style="width:140px">
            <?php $handle = opendir("../style/");
               while (false !== ($entry = readdir($handle))) {
                 if (strstr($entry,".css")!==false) { $nomcss = substr($entry,0,-4);
                   echo "<option value='$nomcss' ".(($nomcss==1)?"selected":"").">$nomcss</option>\n"; }
               }
               closedir($handle);
            ?>
            </select></td></tr>
    <tr><td><?php echo $_SESSION["ws"]["dia"]["leftPanel"];?></td><td><select name="arboUser" size="1" style="width:140px">
          <option value="0" selected><?php echo $_SESSION["ws"]["dia"]["arbo"];?></option>
          <option value="1"><?php echo $_SESSION["ws"]["dia"]["favoris"];?></option>
          <option value="3"><?php echo $_SESSION["ws"]["dia"]["all"];?></option>
          <option value="2"><?php echo $_SESSION["ws"]["dia"]["none"];?></option>
        </select></td>
        <td><?php echo $_SESSION["ws"]["dia"]["visualis"];?></td><td><select name="visuUser" size="1" style="width:140px">
          <option value="miniatures"><?php echo $_SESSION["ws"]["dia"]["miniature"];?></option>
          <option value="grandes"><?php echo $_SESSION["ws"]["dia"]["bigIcone"];?></option>
          <option value="liste"><?php echo $_SESSION["ws"]["dia"]["liste"];?></option>
          <option value="details"><?php echo $_SESSION["ws"]["dia"]["details"];?></option>
        </select></td></tr>
    <tr><td><?php echo $_SESSION["ws"]["dia"]["webSort"];?></td><td><select name="triUser" size="1" style="width:140px">
          <option value="fichier"><?php echo $_SESSION["ws"]["dia"]["byName"];?></option>
          <option value="valeur"><?php echo $_SESSION["ws"]["dia"]["byValue"];?></option>
          <option value="extension"><?php echo $_SESSION["ws"]["dia"]["byType"];?></option>
          <option value="taille"><?php echo $_SESSION["ws"]["dia"]["bySize"];?></option>
          <option value="modiftri"><?php echo $_SESSION["ws"]["dia"]["byDate"];?></option>
        </select></td>
        <td><?php echo $_SESSION["ws"]["dia"]["webDir"];?></td><td><select name="webUser" size="1" style="width:140px">
          <option value="0"><?php echo $_SESSION["ws"]["dia"]["default"];?></option>
          <option value="1" selected><?php echo $_SESSION["ws"]["dia"]["explore"];?></option>
        </select></td></tr>
    </table></td></tr>

    <tr><td colspan="4"><br/><hr width=570></td></tr>
    <tr><td colspan="4" align="left">
      <table width="570" border="0" align="center">
      <tr><td colspan="4" align="left"><?php echo $_SESSION["ws"]["dia"]["actionAuth"];?></td></tr>
      <tr><td><input type='checkbox' class='checkbox' name='auth1' value="on"> <?php echo $_SESSION["ws"]["dia"]["toRead"];?></td>
          <td><input type='checkbox' class='checkbox' name='auth2' value="on"> <?php echo $_SESSION["ws"]["dia"]["toCreate"];?></td>
          <td><input type='checkbox' class='checkbox' name='auth3' value="on"> <?php echo $_SESSION["ws"]["dia"]["toModify"];?></td>
          <td><input type='checkbox' class='checkbox' name='auth4' value="on"> <?php echo $_SESSION["ws"]["dia"]["toCopy"]."/".$_SESSION["ws"]["dia"]["toMove"];?></td></tr>
      <tr><td><input type='checkbox' class='checkbox' name='auth5' value="on"> <?php echo $_SESSION["ws"]["dia"]["toDelete"];?></td>
          <td><input type='checkbox' class='checkbox' name='auth6' value="on"> <?php echo $_SESSION["ws"]["dia"]["modifyPermission"];?></td>
          <td><input type='checkbox' class='checkbox' name='auth7' value="on"> <?php echo $_SESSION["ws"]["dia"]["comment"];?></td>
          <td><input type='checkbox' class='checkbox' name='auth8' value="on"> <?php echo $_SESSION["ws"]["dia"]["favoris"];?></td>
      </tr></table>

    </td></tr>
    <tr><td colspan="4"><br/><hr width=570></td></tr>
    <tr><td colspan="4">
      <table width="570" border="0" align="center">
        <tr><td colspan="4" align="left"><?php echo $_SESSION["ws"]["dia"]["filterElement"];?> <?php echo $_SESSION["ws"]["dia"]["regexp"];?></td></tr>
        <tr><td colspan="4" align="left"><input name="varsUser" type="text" value="" style="width:570px;color:#777;font-family:Verdana,Arial" onchange="verifhtml(this.value)"></td></tr>
      </table>
  </table><br/><br/>

   <table width="100%" border="0" align="center">
      <tr><td align=left style='height:40px;width:10%'>
        <div class='bouton1' onclick="if (document.adminUser.numUser.value!=-1) { document.adminUser.supprime.value='1'; valid(document.adminUser,'valider.php',retinfosutil); } else infoserreur('<?php echo $_SESSION["ws"]["dia"]["chooseUser"];?>'); "><?php echo $_SESSION["ws"]["dia"]["toDelete"];?></div></td>
        <td style='width:80%'>
            &nbsp;
        </td>
        <td align=right style='height:40px;width:10%'>
        <div class='bouton2' onclick="if (verifListeSrv()===true) { if ((document.adminUser.numUser.value!=-1)||(document.adminUser.nomUser.value!='')) { valid(document.adminUser,'valider.php',retinfosutil); } else infoserreur('<?php echo $_SESSION["ws"]["dia"]["createUser"];?>'); }"><?php echo $_SESSION["ws"]["dia"]["toValid"];?></div>
    </td></tr></table>

</form></div>