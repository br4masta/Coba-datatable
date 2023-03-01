<?php
// konfigurasi koneksi database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "silverstripe_2";

// membuat koneksi database
$conn = new mysqli($servername, $username, $password, $dbname);

// mengecek koneksi database
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// mengambil data dari database
$start = isset($_GET['start']) ? $_GET['start'] : 0;
$length = isset($_GET['length']) ? $_GET['length'] : 10;
$search = isset($_GET['search']['value']) ? $_GET['search']['value'] : '';
$order_column = isset($_GET['order'][0]['column']) ? $_GET['order'][0]['column'] : 0;
$order_dir = isset($_GET['order'][0]['dir']) ? $_GET['order'][0]['dir'] : 'asc';

// membangun query untuk filtering dan sorting
$where = '';
if (!empty($search)) {
    $where = " WHERE (Title LIKE '%$search%' OR Author LIKE '%$search%' OR Publisher LIKE '%$search%' OR PublishedDate LIKE '%$search%') ";
}
$order_by = '';
if ($order_column == 0) {
    $order_by = " ORDER BY ClassName $order_dir ";
} elseif ($order_column == 1) {
    $order_by = " ORDER BY ID $order_dir ";
} elseif ($order_column == 2) {
    $order_by = " ORDER BY LastEdited $order_dir ";
} elseif ($order_column == 3) {
    $order_by = " ORDER BY Created $order_dir ";
} elseif ($order_column == 4) {
    $order_by = " ORDER BY Title $order_dir ";
} elseif ($order_column == 5) {
    $order_by = " ORDER BY Author $order_dir ";
} elseif ($order_column == 6) {
    $order_by = " ORDER BY PublishedDate $order_dir ";
} elseif ($order_column == 7) {
    $order_by = " ORDER BY Publisher $order_dir ";
}

$sql_count = "SELECT COUNT(*) as count FROM buku $where";
$result_count = $conn->query($sql_count);
$row_count = $result_count->fetch_assoc();
$count = $row_count['count'];

$sql = "SELECT ClassName, ID, LastEdited, Created, Title, Author, PublishedDate, Publisher FROM buku $where $order_by LIMIT $start, $length";
$result = $conn->query($sql);

// memformat data untuk DataTables
$data = array();
while ($row = $result->fetch_assoc()) {
  $data[] = $row;
}

// mengirimkan data ke DataTables
$response = array(
  "draw" => isset($_GET['draw']) ? intval($_GET['draw']) : 0,
  "recordsTotal" => $count,
  "recordsFiltered" => $count,
  "data" => $data
);

echo json_encode($response);

// menutup koneksi database
$conn->close();
?>
