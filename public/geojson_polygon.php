<?php
$lakalantasJateng = file_get_contents("material/json/lakalantas_jateng.json");
$kasusKabKota = json_decode($lakalantasJateng, TRUE);

$geoJsonJateng = file_get_contents("material/geojson/id-jateng.geojson");
$pointKabKotaJateng = json_decode($geoJsonJateng, TRUE);

foreach ($pointKabKotaJateng['features'] as $key => $first_value) {
    foreach ($kasusKabKota as $second_value) {
        if($first_value['properties']['dak_nkab']==$second_value['attributes']['wilayah']){
            $pointKabKotaJateng['features'][$key]['properties']['meninggal'] = $second_value['attributes']['meninggal'];
            $pointKabKotaJateng['features'][$key]['properties']['lukaBerat'] = $second_value['attributes']['lukaBerat'];
            $pointKabKotaJateng['features'][$key]['properties']['lukaRingan'] = $second_value['attributes']['lukaRingan'];
            $pointKabKotaJateng['features'][$key]['properties']['kerugianMaterial'] = $second_value['attributes']['kerugianMaterial'];
        } else {

        }
    }
}
$combined_output = json_encode($pointKabKotaJateng);

header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
echo $combined_output;
?>
