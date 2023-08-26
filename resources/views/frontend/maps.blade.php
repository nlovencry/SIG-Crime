@extends('frontend/layouts.template')

@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="contact" class="contact">

        <div class="container">
            <div class="row" data-aos="fade-up">
                <div class="hasilKlastering">
                    <legend class="font-weight-bold border-radius-5px width-200px padding-5px bg-color-f55858 color-ffffff">
                        <p class="text-white text-center margin-0 font-weight-bold">Parameter</p>
                    </legend>
                    <table class="mt-4 mb-4">
                        <tbody>
                            <tr>
                                <td>Jumlah Cluster</td>
                                <td class="pr-2 pl-2">:</td>
                                <td>{{ $jumlah_centroid }}</td>
                            </tr>
                            <tr>
                                <td>Jumlah Iterasi</td>
                                <td class="pr-2 pl-2">:</td>
                                <td>{{ $jumlah_iterasi }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <legend class="font-weight-bold border-radius-5px width-200px padding-5px bg-color-f55858 color-ffffff">
                        <p class="text-white text-center margin-0 font-weight-bold">Hasil</p>
                    </legend>
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>Cluster</th>
                                <th>Daerah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                                $sort = [];
                            @endphp
                            @foreach ($index_arr as $key => $value)
                                <tr>
                                    <td style="text-align: center;">
                                        <b>{{ $no++ }}</b>
                                    </td>
                                    <td>
                                        <b>
                                            @php
                                                $i = $value - 1;
                                                $sortKecamatan = [];
                                                for ($j = 0; $j < count($multi_cluster[$i]); $j++) {
                                                    $k = $multi_cluster[$i][$j];
                                                    $sortKecamatan[] = $kecamatan[$k]->nama;
                                                    echo implode(', ', (array) $kecamatan[$k]->nama);
                                                    echo ', ';
                                                }
                                                $sort[] = $sortKecamatan;
                                            @endphp
                                        </b>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>

                <div id="map"></div>
            </div>
        </div>

    </section>
    <!-- End Hero -->
    <style>
        #map {
            width: 100%;
            height: 60vh;
        }

        .info {
            padding: 6px 8px;
            font: 12px/14px Arial, Helvetica, sans-serif;
            background: white;
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
        }

        .info h4 {
            margin: 0 0 5px;
            color: #777;
        }

        .legend {
            text-align: left;
            line-height: 18px;
            color: #555;
        }

        .legend i {
            width: 16px;
            height: 16px;
            float: left;
            margin-right: 8px;
            opacity: 0.7;
        }
    </style>

    <script>
        var peta1 = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        });

        var vector_kecamatan = L.layerGroup();

        @foreach ($data_kecamatan as $data)
            @php
                $warna = ['#e20200', '#f9eb00', '#03cc3d'];
                $warnaIndex = 0;
                foreach ($sort as $index => $s) {
                    if (in_array($data->nama, $s)) {
                        if ((count($sort) == 1 && $index == 0) || (count($sort) == 2 && $index == 1)) {
                            $warnaIndex = 2;
                        } else {
                            $warnaIndex = $index;
                        }
                    }
                }
            @endphp
            L.geoJSON({!! $data->geojson !!}, {
                style: {
                    color: 'black',
                    fillColor: '{{ $warna[$warnaIndex] }}',
                    fillOpacity: 1.0,
                    weight: 1
                },
                pointToLayer: function(feature, latlng) {
                    console.log(latlng);
                    return L.circleMarker(latlng, geojsonMarkerOptions);
                }
            }).addTo(vector_kecamatan);
        @endforeach

        var kecamatan = L.layerGroup();

        var blueIcon = new L.Icon({
            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-blue.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        });

        var map = L.map('map', {
            center: [-8.264371593833262, 113.6321026467762],
            zoom: 10,
            layers: [peta1, vector_kecamatan]
        });

        @foreach ($data_kec as $data)
            var marker = L.marker([{{ $data->latitude }}, {{ $data->longitude }}], {
                icon: blueIcon
            }).bindPopup(
                '<b class="text-sm">{{ $data->nama }}</b><br><span>Curat : {{ $data->curat }}, Curas : {{ $data->curas }}, Curanmor : {{ $data->curanmor }}</span>'
            ).addTo(map);
        @endforeach

        var baseMaps = {
            "Map": peta1
        };

        L.control.layers(baseMaps).addTo(map);

        var legend = L.control({
            position: 'bottomright'
        });

        legend.onAdd = function(map) {
            var div = L.DomUtil.create('div', 'info legend leaflet-control br {clear: both;}'),
                grades = {
                    'Sangat Rawan': '<i style="background:#e20200"></i> Rawan',
                    'Sedang': '<i style="background:#f9eb00"></i> Sedang',
                    'Aman': '<i style="background:#03cc3d"></i> Aman'
                },
                labels = [],
                from, to;

            for (var grade in grades) {
                labels.push(grades[grade]);
            }

            div.innerHTML = labels.join('<br>');
            return div;
        };
        legend.addTo(map);
    </script>


    {{-- Pengenalan --}}
@endsection