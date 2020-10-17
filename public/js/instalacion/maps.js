var vMarker
        var map
            map = new google.maps.Map(document.getElementById('map_canvas'), {
                zoom: 14,
                center: new google.maps.LatLng(19.4326296, -99.1331785),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });
            vMarker = new google.maps.Marker({
                position: new google.maps.LatLng(19.4326296, -99.1331785),
                draggable: true
            });
            google.maps.event.addListener(vMarker, 'dragend', function (evt) {
                $("#txtLat").val(evt.latLng.lat().toFixed(6));
                $("#txtLng").val(evt.latLng.lng().toFixed(6));

                map.panTo(evt.latLng);
            });
            map.setCenter(vMarker.position);
            vMarker.setMap(map);

            $("#Direccion2, #Referencia2").change(function () {
                movePin();
            });

            function movePin() {
            var geocoder = new google.maps.Geocoder();
            var textSelectE = $("#Direccion2").val();
            var inputAddress = $("#Referencia2").val() + ' ' + textSelectE;
            geocoder.geocode({
                "address": inputAddress
            }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    vMarker.setPosition(new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng()));
                    map.panTo(new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng()));
                    $("#txtLat").val(results[0].geometry.location.lat());
                    $("#txtLng").val(results[0].geometry.location.lng());
                }

            });
        }