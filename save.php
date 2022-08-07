<?php

$files = glob("$path/*");
echo "Dizin: $path\n";
echo "Dizin oluşturma tarihi " . date ("F d Y H:i:s.", filectime($path) + 10800) . "\n";
echo "Dizin değiştirme tarihi " . date ("F d Y H:i:s.", filemtime($path) + 10800) . "\n";
echo  "----------------------------\n";
foreach ($files as $file):
    $fileName = basename($file);
    $arr = [
        "Adı" => $fileName,
        "Dosya oluşturma tarihi" => date ("F d Y H:i:s.", filectime($file) + 10800),
        "Dosya değiştirme tarihi" => date ("F d Y H:i:s.", filemtime($file) + 10800),
        "Dosya boyutu" => filesize($file) . " bytes",
        "Dosya tipi" => filetype($file) === "dir" ? "Klasör" : "Dosya"
    ];
    foreach ($arr as $key => $value):
        echo "$key: $value\n";
    endforeach;
    /* write to file */
    $file = fopen("saveat-" . basename($path) . ".txt", "a+");
    $iter = 0;
    foreach ($arr as $key => $value):
        if ($iter === 0):
            fwrite($file, $key . ": " . $value . "\n");
        else:
            fwrite($file, "    - " . $key . ": " . $value . "\n");
        endif;
        $iter++;
    endforeach;
    fclose($file);
endforeach;

clearstatcache();