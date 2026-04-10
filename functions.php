<?php

function vygenerujPortfolio($dir) {

    $files = glob($dir . "/*.jpg");

    $json = file_get_contents("portfolio.json");
    $data = json_decode($json, true);

    $i = 0;

    echo '<div class="row">';

    foreach ($files as $file) {

        $filename = basename($file);

        echo '<div class="col-25 portfolio text-white text-center" id="portfolio-' . ($i+1) . '">';
        
        echo '<img src="' . $file . '" style="width:100%">';
        
        echo '<div class="portfolio-text">';
        echo $data[$filename] ?? "Bez názvu";
        echo '</div>';

        echo '</div>';

        $i++;

        if ($i % 4 == 0 && $i != 0) {
            echo '</div><div class="row">';
        }
    }

    echo '</div>';
}
?>