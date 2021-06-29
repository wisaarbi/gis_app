@extends('layouts.app', ['activePage' => 'map', 'titlePage' => __('Map')])

@section('content')
<div id="map">
    <div id="mapid" style="height: 100%; width: 100%"></div>
</div>
@endsection

@push('js')
<script>
    var mymap = L.map('mapid').setView([-6.200000, 106.816666], 12);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 18,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1
    }).addTo(mymap);
    /* GeoJSON Polygon */

    var kasuslakalantas = L.geoJson(null, {
        style: function (feature) {
            return {
                opacity: 1,
                color: 'gray',
                weight: 1.0,
                fillOpacity: 0.8,
                fillColor: 'rgb(37, 150, 210)'
            }
        },
        onEachFeature: function (feature, layer) {
            var content = "<div class='card'>" +
                "<div class='card-header alert-primary text-center p-1'><strong>Kota Jakarta<br>" + feature.properties.name + "</strong></div>" +
                "<div class='card-body p-0'>" +
                "<table class='table table-responsive-sm m-0'>" +
                "<tr><th><i class='far fa-sad-tear'></i> 0-9 Tahun</th><th>" + feature.properties.Kasus_Under_9 + "</th></tr>" +
                "<tr class='text-success'><th><i class='far fa-smile'></i> 9 - 15 Tahun</th><th>" + feature.properties.Kasus_Under_15 + "</th></tr>" +
                "<tr class='text-danger'><th><i class='far fa-frown'></i> 16 - 30 Tahun</th><th>" + feature.properties.Kasus_Under_30 + "</th></tr>" +
                "<tr class='text-danger'><th><i class='far fa-frown'></i> 31 - 40 Tahun</th><th>" + feature.properties.Kasus_Under_40 + "</th></tr>" +
                "<tr class='text-danger'><th><i class='far fa-frown'></i> 41 - 50 Tahun</th><th>" + feature.properties.Kasus_Under_50 + "</th></tr>" +
                "<tr class='text-danger'><th><i class='far fa-frown'></i> > 51 Tahun</th><th>" + feature.properties.Kasus_Over_51 + "</th></tr>" +
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
                    kasuslakalantas.bindTooltip("Kota. " + feature.properties.name + "<br>Jumlah kasus: " + (feature.properties.Kasus_Under_9 + feature.properties.Kasus_Under_15 + feature.properties.Kasus_Under_30 + feature.properties.Kasus_Under_40 + feature.properties.Kasus_Under_50 + feature.properties.Kasus_Over_51),
                        {sticky: true});
                },
                mouseout: function (e) {
                    kasuslakalantas.resetStyle(e.target);
                    mymap.closePopup();
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
</script>
@endpush
