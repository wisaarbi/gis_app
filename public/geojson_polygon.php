<?php
$lakalantasJakarta = file_get_contents("material/json/lakalantas_jakarta.json");
$kasusKota = json_decode($lakalantasJakarta, TRUE);

$geoJsonKotaJakarta = file_get_contents("material/geojson/id-jk.min.geojson");
$pointKotaJakarta = json_decode($geoJsonKotaJakarta, TRUE);

foreach ($pointKotaJakarta['features'] as $key => $first_value) {
    foreach ($kasusKota as $second_value) {
        if($first_value['properties']['name']==$second_value['attributes']['name']){
            $pointKotaJakarta['features'][$key]['properties']['Kasus_Under_9'] = $second_value['attributes']['jumlahKasusUnder9'];
            $pointKotaJakarta['features'][$key]['properties']['Kasus_Under_15'] = $second_value['attributes']['jumlahKasusUnder15'];
            $pointKotaJakarta['features'][$key]['properties']['Kasus_Under_30'] = $second_value['attributes']['jumlahKasusUnder30'];
            $pointKotaJakarta['features'][$key]['properties']['Kasus_Under_40'] = $second_value['attributes']['jumlahKasusUnder40'];
            $pointKotaJakarta['features'][$key]['properties']['Kasus_Under_50'] = $second_value['attributes']['jumlahKasusUnder50'];
            $pointKotaJakarta['features'][$key]['properties']['Kasus_Over_51'] = $second_value['attributes']['jumlahKasusOver51'];
        } else {

        }
    }
}
$combined_output = json_encode($pointKotaJakarta);

header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
echo $combined_output;
?>
