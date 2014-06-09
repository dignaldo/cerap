<?php
session_start();
define("DISK",$_SERVER["DOCUMENT_ROOT"]."/"); //Dossier pour lequel on veut générer le graphique
$total = round(disk_total_space(DISK)/1024/1024,2); //Récupération de l'espace disque
$free = round(disk_free_space(DISK)/1024/1024,2); //Récupération de l'espace utilisé
$used = $total - $free; //Calcul de l'espace utilisé

//Generate pie chart
define("WIDTH", 500); //Width may break if changed
define("HEIGHT", 220); //Again height may break it when changed
$data[0] = round(($used/$total)*100); //Calcule le pourcentage utilisé
$data[1] = round(($free/$total)*100); //Calcule le pourcentage libre

$img = imagecreate(WIDTH-100, HEIGHT); //Crée l'image

$background = $white = imagecolorallocate($img, 112,128,144); //Défini le fond
$black = imagecolorallocate($img, 0, 0, 0); //Défini la couleur noire

$center_x = (int)WIDTH/2; //Détermine le centre en x
$center_y = (int)HEIGHT/2; //Détermine le centre en y

imagerectangle($img, 0, 0, WIDTH-101, HEIGHT-1, $black); //Draw the backrgound border
$color[0] = imagecolorallocate($img, 159,182,205);
$color[1] = imagecolorallocate($img, 198,226,255);
$last_angle = 0;

//Dessine le camembert en fonction du pourcentage
for($i=0; $i<count($data); $i++) {
	$arclen = (360 * $data[$i]) / 100;
	imagefilledarc($img, $center_x - 120, $center_y, 200, 200, $last_angle, ($last_angle + $arclen), $color[$i],IMG_ARC_PIE);
	$last_angle += $arclen;
}

//Conversion en Giga Octets
imagestring($img, 5, 250, $center + 30, "Used Space: ".$data[0]."%", $color[0]); //Dessine l'espace utilisé
imagestring($img, 5, 250, $center + 60, "Free Space: ".$data[1]."%", $color[1]); //Dessine l'espace libre
imagerectangle($img, 240, $center+10, 390, $center+100, $black);

imagestring($img, 5, $center_x, $center + 160, "Used  : ".round($used/1024,2).$_SESSION["ws"]["dia"]["sizeGiga"], $color[0]);
imagestring($img, 5, $center_x, $center + 180, "Free  : ".round($free/1024,2).$_SESSION["ws"]["dia"]["sizeGiga"], $color[1]);
imagestring($img, 5, $center_x, $center + 200, "Total : ".round($total/1024,2).$_SESSION["ws"]["dia"]["sizeGiga"], $black);

header("Content-Type: image/png"); //Défini le contenu comme étant une image

imagepng($img); //Dessine l'image pour le navigateur
imagedestroy($img); //Libère la ressource

?>