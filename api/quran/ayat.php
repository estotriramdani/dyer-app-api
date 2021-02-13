<?php 

include_once '../header.php';
include_once '../koneksi.php';

// $limit = $_GET['limit'];
$surah = $_GET['surah'];
$ayat = $_GET['ayat'];

$data = mysqli_query($koneksi,"SELECT * FROM `quran_id` WHERE suraId = $surah AND verseId = $ayat");
while($d = mysqli_fetch_array($data)){
  $item[] = array(
    'id' => $d['id'],
    'suraId' => $d['suraId'],
    'verseId' => $d['verseId'],
    'ayahText' => $d['ayahText'],
    'indoText' => $d['indoText'],
    'readText' => $d['readText'],
  );
}

$json = array(
  'result' => 'success',
  'item' => $item
);

echo json_encode($item);

?>

