<?php

$path = $argv[1] ?? __DIR__;
function controlPath($dir): string
{
    count(glob("$dir/*")) === 0 ? $control = (int)readline("Böyle bir dizin yok veya dizin boş. Mevcut dizin kullanılsın mı? \n 1: EVET \n 2: Çıkış \n") : false;
    if (isset($control)):
        if ($control === 1):
            return __DIR__;
        elseif ($control === 2):
            exit();
        else:
            echo "Lütfen 1 veya 2 giriniz.\n";
            controlPath($dir);
        endif;
    else:
        return $dir;
    endif;
}

$path = controlPath($path);




