<?php

//TODO: Write

function postcode_uk_simple($scf_string) {

    $postcodes_csv = "third_party/uk_postcodes.csv.gz"

    if(file_exists($postcodes_csv)) {
        $file_h = gzopen($postcodes_csv);
    }
    else {
        return("OK");
    }



}


?>