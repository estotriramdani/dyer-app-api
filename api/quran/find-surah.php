<?php 

include_once '../header.php';
include_once '../koneksi.php';

// $limit = $_GET['limit'];
$keyword = $_GET['keyword'];

$data = mysqli_query($koneksi,"SELECT * FROM `daftar_surat` WHERE 
                    id LIKE '%$keyword%' OR 
                    surat_name LIKE '%$keyword%'"
                    );
while($d = mysqli_fetch_array($data)){
  $item[] = array(
    'id' => $d['id'],
    'surat_name' => $d['surat_name'],
    'surat_arabic' => $d['surat_arabic'],
    'surat_terjemah' => $d['surat_terjemah'],
    'jumlah_ayat' => $d['jumlah_ayat'],

  );
}

$json = array(
  'result' => 'success',
  'item' => $item
);

echo json_encode($item);

?>

