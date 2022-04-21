<?php
$dir    = 'wallpaper';
//$files1 = scandir($dir);
$files1 = array_diff(scandir($dir), array('..', '.'));
foreach ($files1 as $key => $value) {

    $array[] = array (

      'author' => 'Apple',
      'url'    => 'http://api.porting-team.ru/icon_pack/ios11/wallpaper/'.$value,
      'thumbUrl' => 'https://api.porting-team.ru/icon_pack/ios11/thumb.php?src=http://api.porting-team.ru/icon_pack/ios11/wallpaper/'.$value,
      'name' => str_replace(array('.jpg', '.png', '_','-'), array('','',' ',' '), preg_replace('/\\s*\\([^()]*\\)\\s*/', '', $value)) # JD326A.jpg
    );
};
$jsonout = json_encode($array, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
echo $jsonout;
 ?>
