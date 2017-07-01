
<script>
    var map;
    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat:<?php echo $ipLocation['lat']?>, lng: <?php echo $ipLocation['lon']?>},
            zoom: 10
        });
        map.data.loadGeoJson("<?php echo $mapUrl?>")
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDmjQODGkXo-CUXY9y8qW5pZqOHA3IbkMs&callback=initMap"
        async defer></script>

    </body>
</html>
