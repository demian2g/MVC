<?php
/** @var PDO $db */
$db = $data;

$sql = "
    SELECT * FROM map
";

$all_clients = $db->query($sql)->fetchAll();
$result = [];$addss = [];
foreach ($all_clients as $client) {

    if (!in_array($client['yandex'], $addss)) {
        $addss[] = $client['yandex'];
        $result[] = $client;
    }
}

foreach ($result as $point) {
    $array[] = '['.$point['lat']. ', '. $point['lng'].']';
}
?>

<?php
//exit;
//foreach ($result as $location) {
//    $query = 'https://geocode-maps.yandex.ru/1.x/?geocode='.$location.'&format=json&results=1';
//
//    $resp_json = file_get_contents($query);
//    $resp = json_decode($resp_json);
//    $pos = $resp->response->GeoObjectCollection->featureMember[0]->GeoObject->Point->pos;
//    $address = $resp->response->GeoObjectCollection->featureMember[0]->GeoObject->name;
//
//    $coord = explode(' ', $pos);
//
//    $sql = "INSERT INTO map (address, yandex, lat, lng) VALUES ('".$location."', '".$address."', '".$coord[1]."', '".$coord[0]."'); ";
//
////    echo $sql; exit;
//    $db->query($sql)->execute();
//
//    echo $location. ' - ' . $address . ' ' .$pos . '<br>';
//}?>
<script>
    <?php include 'js/map.js'; ?>
</script>
<div id="map"></div>

