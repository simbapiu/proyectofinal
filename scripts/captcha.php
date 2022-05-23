<?php
    header("content-type: image/png");

    $imagen = imagecreate(120,60);
    $color_fondo = imagecolorallocate($imagen, 59, 66, 255);
    $color_texto = imagecolorallocate($imagen, 255, 255, 255);

    function generar_caracteres($chars, $length){
        $captcha = null;
        for ($i=0; $i < $length; $i++) { 
            $rand = rand(0, count($chars)-1);
            $captcha .= $chars[$rand];
        }//Fin del for....
        return $captcha;
    }//Fin del function...

    $captcha = generar_caracteres(array(0,1,2,3,4,5,6,7,8,9,"a","b","c","d","f","g","h","i","j","k","l","m","n","o","p","q",
    "r","s","t","u","w","x","y","z"), 5);
    setcookie('captcha', sha1($captcha), time()+60*3);

    imagettftext($imagen, 22, 10, 20, 45, $color_texto, "../font/MorningRainbow.ttf", $captcha);
    imagepng($imagen);
?>