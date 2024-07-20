<?php
$redis = new Redis();
$redis->connect('127.0.0.1', 6379);

// $parkingLot = [
//     [1, 1, 1, 1],
//     [1, 0, 1, 1],
//     [1, 1, 0, 7]
// ];


$rows = 3;
$cols = 4;

// $parkingLot = [];
// for ($i = 0; $i < $rows; $i++) {
//     $parkingLot[$i] = array_fill(0, $cols, 0);
// }

$parkingLot = array_fill(0, $rows, array_fill(0, $cols, 90));

$me= 'SDSUUU';
print_r($parkingLot);

$redis->set($me, json_encode($parkingLot));



// $retrievedData = $redis->get('parking_lot');
// $decodedData = json_decode($retrievedData, true);

// print_r($decodedData);

// $decodedData[1][1] = 76;
// $redis->set('parking_lot', json_encode($decodedData));

// $updatedData = $redis->get('parking_lot');
// $updatedDecodedData = json_decode($updatedData, true);
// print_r($updatedDecodedData);

$redis->close();
