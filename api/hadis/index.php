<?php 

include_once '../header.php';
include_once '../koneksi.php';

$limit = $_GET['limit'];

$data = mysqli_query($koneksi,"SELECT * FROM `bukhari` LIMIT $limit");
while($d = mysqli_fetch_array($data)){
  $item[] = array(
    'no' => $d['No'],
    'kitab' => $d['Kitab'],
    'arab' => $d['Arab'],
    'terjemah' => $d['Terjemah'],

  );
}

$json = array(
  'result' => 'success',
  'item' => $item
);

echo json_encode($item);

?>

