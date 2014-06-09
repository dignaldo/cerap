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
// Fonction : Gestion des paramètres serveur
// Nom      : serveur.php
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
  serveurs = new Array(); actuSrv= 0;

<?php
  $testServ=1; $listeTriImp= array();

  // ==== Chargement des données serveur ====
  $compteur=0; $newServeur=0;
  foreach ($serveurs as $tabl => $tablvar) {
    echo "serveurs[".$tablvar["idServeur"]."]= new Array();\n";
    foreach ($tablvar as $nom => $valeur) {
      echo "serveurs[".$tablvar["idServeur"]."]['".trim($nom)."']= '".trim($valeur)."';\n";
    }
    $listeTri = explode(",",$tablvar["triServeur"]);
    $listeTriImp[$compteur]=$tablvar["idServeur"];
    if ($tablvar["idServeur"]>=$newServeur) $newServeur=$tablvar["idServeur"];
    $compteur++;
  }
  $cmpServeur= count($listeTri);
  $maxServeur= $compteur; if ($compteur!=0) $newServeur++;
  echo "maxServeur = $maxServeur;\n";
  echo "newServeur = $newServeur;\n";
  
  if (($cmpServeur!=$maxServeur)||(count(array_diff($listeTri,$listeTriImp))>0)) $listeTri=$listeTriImp;
?>

actuServeur(<?php echo $_SESSION["ws"]["rlserv"]?>);

// Affichage de la partie serveur
</script>

<div class="page">
<div class='titre'><?php echo $_SESSION["ws"]["dia"]["serverAdmin"];?></div>
<form name="adminServ" method="post" action="">
  <table width="100%" border="0" align="center">
  <input type='hidden' name='validation' value='serveur'>
  <input type='hidden' name='supprime' value='0'>
  <input type='hidden' name='chemin' value='<?php echo $chemin?>'>
  <input type='hidden' name='selServeur' value=''>
  <input type='hidden' name='idServeur' value=''>
  <input type='hidden' name='newPass' value='0'>
    <tr><td><b><?php echo $_SESSION["ws"]["dia"]["nameShare"];?></b></td>
        <td><select name="numServeur" size="1" style="width:140px" onchange="rlserv=adminServ.numServeur.options[adminServ.numServeur.selectedIndex].value;actuServeur(rlserv);miseenvaleur(adminServ.typeServeur.options[adminServ.typeServeur.selectedIndex].value)">
              <option value='-1' <?php echo (($_SESSION["ws"]["rlserv"]==-1)?"selected":"")?>><?php echo $_SESSION["ws"]["dia"]["newServer"];?></option>
              <?php 
                for ($compte=0; $compte<$maxServeur; $compte++) {
                  foreach ($serveurs as $tabl => $tablvar) {
                      if ($listeTri[$compte]==$tablvar["idServeur"]) { $nomTri=$tablvar["nomServeur"];
                      echo "<option value='".$listeTri[$compte]."' ".(($_SESSION["ws"]["rlserv"]==$listeTri[$compte])?"selected":"").">$nomTri</option>\n"; }
                  }
                }
              ?>
            </select></td>
        <td><?php echo $_SESSION["ws"]["dia"]["serverType"];?></td>
        <td><select name="typeServeur" size="1" style="width:140px" onchange="miseenvaleur(adminServ.typeServeur.options[adminServ.typeServeur.selectedIndex].value)">
              <option value='1' selected><?php echo $_SESSION["ws"]["dia"]["local"];?></option>
              <?php if (function_exists("ftp_connect")) { ?><option value='2'>FTP</option><?php } ?>
            </select></td></tr>
    <tr><td><?php echo $_SESSION["ws"]["dia"]["name"];?>       </td><td><input name="nomServeur"   type="text" value="" style="width:140px" onkeyup="checkCar(this)" onkeydown="checkCar(this)"></td>
        <td><?php echo $_SESSION["ws"]["dia"]["serverFtp"];?>  </td><td><input name="adrServeur"   type="text" value="" style="width:140px;background:#FBEDD4" onchange="corrigeAdr(this)"  onkeyup="checkPath(this)" onkeydown="checkPath(this)"></td></tr>
    <tr><td><?php echo $_SESSION["ws"]["dia"]["serverRoot"];?> </td><td><input name="rootServeur"  type="text" value="" style="width:140px" onkeyup="checkPath(this)" onkeydown="checkPath(this)"></td>
        <td><?php echo $_SESSION["ws"]["dia"]["loginFtp"];?>   </td><td><input name="logServeur"   type="text" value="" style="width:140px;background:#FBEDD4" ></td></tr>
    <tr><td><?php echo $_SESSION["ws"]["dia"]["virtualRoot"];?></td><td><input name="repServeur"   type="text" value="" style="width:140px" onkeyup="checkPath(this)" onkeydown="checkPath(this)"></td>
        <td><?php echo $_SESSION["ws"]["dia"]["passFtp"];?>    </td><td><input name="passServeur"  type="password" value="" style="width:140px;background:#FBEDD4" onchange="document.adminServ.newPass.value='1'"></td></tr>
    <tr><td><?php echo $_SESSION["ws"]["dia"]["defaultRoot"];?></td><td><input name="startServeur" type="text" value="" style="width:140px" onkeyup="checkPath(this)" onkeydown="checkPath(this)"></td>
        <td><?php echo $_SESSION["ws"]["dia"]["portFtp"];?>    </td><td><input name="portServeur"  type="text" value="" style="width:140px;background:#FBEDD4" ></td></tr>
    <tr><td><?php echo $_SESSION["ws"]["dia"]["webRoot"];?>    </td>
        <td colspan="3"><input name="webServeur"  type="text" value="" style="width:300px;"  onkeyup="checkPath(this)" onkeydown="checkPath(this)"></td></tr>
    <tr><td colspan="2"><?php echo $_SESSION["ws"]["dia"]["protectRep"];?> </td>
        <td><input type='checkbox' class='checkbox' name='protectIndex' value='1'> index.html </td><td>
            <input type='checkbox' class='checkbox' name='protectHtacc' value='1'> .htaccess  </td></tr>
    <tr><td colspan="2" rowspan="3"><?php echo $_SESSION["ws"]["dia"]["serverPosition"];?> :
            <div style="width:120px"><ul id="list">
            <?php  $liste="";
            
              for ($compte=0; $compte<$maxServeur; $compte++) {
                foreach ($serveurs as $tabl => $tablvar) {
                    if ($listeTri[$compte]==$tablvar["idServeur"]) $nomTri=$tablvar["nomServeur"];
                }
                $liste.= $serveurs[$nomTri]["idServeur"].",";
                echo "<li class='sortlist' id='item_".$serveurs[$nomTri]["idServeur"]."'>"
                  .$serveurs[$nomTri]["nomServeur"]."</li>";
              }
              $liste = substr($liste,0,strlen($liste)-1);
              
            ?></ul>
            <input type="hidden" name="triServeur" id="triServeur" value="<?php echo $liste; ?>">
        </div></td>
        <td colspan="2"><input type='checkbox' class='checkbox' name='binServeur' value='1'><?php echo $_SESSION["ws"]["dia"]["activeBin"];?></td></tr>
        <td colspan="2"><input type='checkbox' class='checkbox' name='publicServeur' value='1'><?php echo $_SESSION["ws"]["dia"]["shareAvailable"];?></td></tr>
    <tr><td colspan="2"><input type='checkbox' class='checkbox' name='protectServeur' value='1'><?php echo $_SESSION["ws"]["dia"]["protectShare"];?></td></tr>
    <tr><td>&nbsp;</td><td colspan="3"><br/>
          <div id="msgtest" style="width:380px;height:20px;cursor:pointer" onclick="if ((document.adminServ.numServeur.value!=-1)||(document.adminServ.nomServeur.value!='')) valid(document.adminServ,'checkconnexion.php',resulttest)">
            <span id="colortest" class="colorsq">&nbsp;</span> &nbsp;<?php echo $_SESSION["ws"]["dia"]["shareTest"]; ?>
            </div><br/>
    </td></tr>
    <tr><td colspan="1" align=left style='height:40px'>
        <div class='bouton1' onclick="if (document.adminServ.numServeur.value!=-1) { document.adminServ.supprime.value='1'; valid(document.adminServ,'valider.php',retinfosserv); }  else infoserreur('<?php echo $_SESSION["ws"]["dia"]["chooseServer"];?>'); "><?php echo $_SESSION["ws"]["dia"]["toDelete"];?></div></td>
        <td colspan="2"></td>
        <td colspan="1" align=right style='height:40px'>
        <div class='bouton2' onclick="if ((document.adminServ.numServeur.value!=-1)||(document.adminServ.nomServeur.value!='')) { valid(document.adminServ,'valider.php',retinfosserv); } else infoserreur('<?php echo $_SESSION["ws"]["dia"]["createServer"];?>'); "><?php echo $_SESSION["ws"]["dia"]["toValid"];?></div></td></tr>
    <tr><td colspan="4"><div id="infoCheckCar">
      <?php echo $_SESSION["ws"]["dia"]["msgInfo2"]." ".$_SESSION["ws"]["dia"]["msgInfo3"];?>
      </div>
    </td></tr></table>
</form>
</div>