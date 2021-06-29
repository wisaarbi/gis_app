@extends('layouts.app', ['activePage' => 'map', 'titlePage' => __('Map')])

@section('content')
<div id="map">
    <div id="mapid" style="height: 100%; width: 100%"></div>
</div>
<style>
    /*Legend specific*/
    .legend {
        padding: 6px 8px;
        font: 14px Arial, Helvetica, sans-serif;
        background: white;
        background: rgba(255, 255, 255, 0.8);
        /*box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);*/
        /*border-radius: 5px;*/
        line-height: 24px;
        color: #555;
    }
    .legend h4 {
        text-align: center;
        font-size: 16px;
        margin: 2px 12px 8px;
        color: #777;
    }

    .legend span {
        position: relative;
        bottom: 3px;
    }

    .legend i {
        width: 18px;
        height: 18px;
        float: left;
        margin: 0 8px 0 0;
        opacity: 0.7;
    }

    .legend i.icon {
        background-size: 18px;
        background-color: rgba(255, 255, 255, 1);
    }

</style>
@endsection

@push('js')
<script>

    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    var mymap = L.map('mapid').setView([-6.995016, 110.418427], 12);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 18,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/light-v9',
        tileSize: 512,
        zoomOffset: -1
    }).addTo(mymap);
    /* GeoJSON Polygon */

    var kasuslakalantas = L.geoJson(null, {
        style: function (feature) {
            var totalKasus = feature.properties.meninggal + feature.properties.lukaBerat + feature.properties.lukaRingan
            if (totalKasus <= 200000) {
                return {
                    opacity: 1,
                    color: 'white',
                    weight: 2.0,
                    fillOpacity: 0.8,
                    fillColor: 'rgb(240, 255, 0)'
                }
            }
            else if (totalKasus >= 200001 && totalKasus <= 400000) {
                return {
                    opacity: 1,
                    color: 'white',
                    weight: 2.0,
                    fillOpacity: 0.8,
                    fillColor: 'rgb(255, 206, 0)'
                }
            }
            else if (totalKasus >= 400001 && totalKasus <= 600000) {
                return {
                    opacity: 1,
                    color: 'white',
                    weight: 2.0,
                    fillOpacity: 0.8,
                    fillColor: 'rgb(255, 154, 0)'
                }
            }
            else if (totalKasus >= 600001 && totalKasus <= 800000) {
                return {
                    opacity: 1,
                    color: 'white',
                    weight: 2.0,
                    fillOpacity: 0.8,
                    fillColor: 'rgb(255, 90, 0)'
                }
            }
            else if (totalKasus > 800001) {
                return {
                    opacity: 1,
                    color: 'white',
                    weight: 2.0,
                    fillOpacity: 0.8,
                    fillColor: 'rgb(255, 0, 0)'
                }
            }
        },
        onEachFeature: function (feature, layer) {
            var content = "<div class='card'>" +
                "<div class='card-header alert-primary text-center p-1'><strong>Provinsi Jawa Tengah<br>Wilayah " + feature.properties.dak_nkab + "</strong></div>" +
                "<div class='card-body p-0'>" +
                "<table class='table table-responsive-sm m-0'>" +
                "<tr class='text-secondary'><th> Meninggal</th><th>" + feature.properties.meninggal + "</th></tr>" +
                "<tr class='text-secondary'><th> Luka Berat</th><th>" + feature.properties.lukaBerat + "</th></tr>" +
                "<tr class='text-secondary'><th> Luka Ringan</th><th>" + feature.properties.lukaRingan + "</th></tr>" +
                "<tr class='text-secondary'><th> Kerugian Material</th><th>" + numberWithCommas(Math.round(feature.properties.kerugianMaterial / 1000)) + "K" + "</th></tr>" +
                "</table>" +
                "</div>";
            layer.on({
                mouseover: function (e) {
                    var layer = e.target;
                    layer.setStyle({
                        weight: 1,
                        color: "gray",
                        opacity: 1,
                        fillColor: "#00FFFF",
                        fillOpacity: 0.8,
                    });
                    kasuslakalantas.bindTooltip("Wilayah " + feature.properties.dak_nkab + "<br>Jumlah kasus: " + numberWithCommas(feature.properties.meninggal + feature.properties.lukaBerat + feature.properties.lukaRingan),
                        {sticky: true});
                },
                mouseout: function (e) {
                    kasuslakalantas.resetStyle(e.target);
                },
                click: function (e) {
                    kasuslakalantas.bindPopup(content);
                }
            });
        }
    });
    $.getJSON("geojson_polygon.php", function (data) {
        kasuslakalantas.addData(data);
        mymap.addLayer(kasuslakalantas);
        mymap.fitBounds(kasuslakalantas.getBounds());
    });

    /*Legend specific*/
    var legend = L.control({ position: "bottomleft" });

    legend.onAdd = function(map) {
        var div = L.DomUtil.create("div", "legend");
        div.innerHTML += "<h4>Legenda</h4>";
        div.innerHTML += '<i style="background: #F0FF00"></i><span>1 - 200000 Kasus</span><br>';
        div.innerHTML += '<i style="background: #FFCE00"></i><span>200001 - 400000 Kasus</span><br>';
        div.innerHTML += '<i style="background: #FF9A00FF"></i><span>400001 - 600000 Kasus</span><br>';
        div.innerHTML += '<i style="background: #FF5A00FF"></i><span>600001 - 800000 Kasus</span><br>';
        div.innerHTML += '<i style="background: #FF0000FF"></i><span>> 800000 Kasus</span><br>';
        return div;
    };
    legend.addTo(mymap);
</script>
@endpush
