<section class="container" id="mapId">
        <h5>Map</h5>
        <div id="map"></div>

        <?php
                $mapQuery = "SELECT * FROM map";
                $db->setQuery($mapQuery);
                $datas = $db->getItems();
                $data = $datas[0];
                $mapId = $data['id'];
        
        ?>
        <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=<?php echo $data['api_key']; ?>&callback=initMap"></script>

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

        <form action="includes/inc.mapEdit.php" method="POST">
                <label for="lat">Latitude</label>
                <input type="text" name="lat" value="<?php echo $data['lat']; ?>">

                <label for="lng">Longitude</label>
                <input type="text" name="lng" value="<?php echo $data['lng']; ?>">

                <label for="zoom">Zoom</label>
                <input type="number" name="zoom" value="<?php echo $data['zoom']; ?>">

                <input type="submit" name="mapEdit" value="Edit" class="btn btn-primary btn-sm">

        </form>
</section>
<br><hr>