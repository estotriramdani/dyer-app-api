<?php 

include_once '../header.php';
include_once '../koneksi.php';

$keyword = $_GET['keyword'];
$limit = $_GET['limit'];

$query = "SELECT * FROM bukhari 
              WHERE
            No LIKE '%$keyword%' OR
            Kitab LIKE '%$keyword%' OR
            Arab LIKE '%$keyword%' OR
            Terjemah LIKE '%$keyword%'
            LIMIT $limit
            ";

$data = mysqli_query($koneksi,$query);
while($d = mysqli_fetch_array($data)){
  $item[] = array(
    'no' => $d['No'],
    'kitab' => $d['Kitab'],
    'arab' => $d['Arab'],
    'terjemah' => $d['Terjemah'],

  );
}

// <b>Notice</b>:  Undefined variable: item in <b>C:\xampp\htdocs\dyer-app-api\api\hadis\cari.php</b> on line <b>34</b><br />

// $json = array(
//   'result' => 'success',
//   'item' => $item
// );

echo json_encode($item);

?>

