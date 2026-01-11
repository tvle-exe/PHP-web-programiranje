<?php

function ducan($stanje = "otvoren") {
    echo "Ducan je $stanje";
}

// Trenutno vrijeme i dan
$vrijeme = new DateTime();
$sat = (int)$vrijeme->format("H");
$dan = $vrijeme->format("N"); // 1 (pon) - 7 (ned)
$datum = $vrijeme->format("m-d");

// Popis državnih praznika
$praznici = [
    "01-01", // Nova godina
    "05-01", // Praznik rada
    "06-22", // Dan antifašističke borbe
    "08-05", // Dan pobjede
    "12-25"  // Božić
];

// Provjera praznika
if (in_array($datum, $praznici)) {
    ducan("zatvoren (praznik)");
}

// Nedjelja
elseif ($dan == 7) {
    ducan("zatvoren");
}

// Subota
elseif ($dan == 6) {
    if ($sat >= 9 && $sat < 14) {
        ducan();
    } else {
        ducan("zatvoren");
    }
}

// Radni dan (pon–pet)
else {
    if ($sat >= 8 && $sat < 20) {
        ducan();
    } else {
        ducan("zatvoren");
    }
}

?>
