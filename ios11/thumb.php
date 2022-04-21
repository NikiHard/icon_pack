<?php
$src = $_GET['src'];
require '/home/admin/web/api.porting-team.ru/public_html/vk/crop.php';

$url = 'https://api.porting-team.ru/';

$rep = '/home/admin/web/api.porting-team.ru/public_html/';

$thumbout = str_replace ($url, $rep, $src);

$name = basename($thumbout);

$smartcrop_width = 500;
$smartcrop_height = 500;

$filename = "/home/admin/web/api.porting-team.ru/public_html/icon_pack/tmp/".$name;

if (file_exists($filename)) {

//Изображение уже есть, ничего делать не надо

} else {
//Создаем уменьшенную версию
cropImage(
$thumbout,
$filename, $smartcrop_width, $smartcrop_height);

}
$file_extension = strtolower(substr(strrchr($name,"."),1));

switch( $file_extension ) {
    case "gif": $ctype="image/gif"; break;
    case "png": $ctype="image/png"; break;
    case "jpeg":
    case "jpg": $ctype="image/jpeg"; break;
    default:
}

header('Content-type: ' . $ctype);
readfile($filename);
?>
