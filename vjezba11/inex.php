<?php

// Funkcija koja provjerava je li broj prost
function jeProst($broj) {

    // Prosti brojevi moraju biti veći od 1
    if ($broj <= 1) {
        return false;
    }

    // Provjera djeljivosti
    for ($i = 2; $i <= sqrt($broj); $i++) {
        if ($broj % $i == 0) {
            return false;
        }
    }

    return true;
}

// Ispis prostih brojeva manjih od 100
echo "Prosti brojevi manji od 100:<br>";

for ($i = 2; $i < 100; $i++) {
    if (jeProst($i)) {
        echo $i . " ";
    }
}

?>
