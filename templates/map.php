<section class="mapContainer col-8" id="mapId">
        <h5>Location</h5>
        <div id="map"></div>
        

    <?php
        $mapQuery = "SELECT * FROM map";
        $db->setQuery($mapQuery);
        $datas = $db->getItems();
        $data = $datas[0];
        $mapId = $data['id'];
        // print_r($datas);
        
    ?>
        <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVzTaQzz2AA1l4TB_LGoe1O7RP3OdgY34&callback=initMap"></script>

        <script>
                function initMap() {
                var location = { 
                        lat: <?php echo $data['lat']; ?>, 
                        lng: <?php echo $data['lng']; ?> 
                };

                var map = new google.maps.Map(document.getElementById('map'), {
                        zoom: <?php echo $data['zoom']; ?>,
                        center: location
                });

                var marker = new google.maps.Marker({
                        position: location,
                        map: map
                });
                }                
        </script>
</section>