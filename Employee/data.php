<?php
// Koneksi ke database
$conn = mysqli_connect('localhost', 'root', '', 'employee');
 
// Mengambil jumlah total data
$sql = "SELECT COUNT(*) FROM employees";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_row($result);
$total = $row[0];
 
// Mengambil data yang diminta
$start = $_GET['start'];
$length = $_GET['length'];
$order_column = $_GET['order'][0]['column'];
$order_dir = $_GET['order'][0]['dir'];
$search_value = $_GET['search']['value'];
 
$sql = "SELECT id, first_name, last_name, position, office, start_date, salary FROM employees WHERE CONCAT(first_name, ' ', last_name) LIKE '%$search_value%'";
$sql .= "ORDER BY " . ($order_column + 1) . " $order_dir LIMIT $start, $length";
$result = mysqli_query($conn, $sql);
 
// Mengubah data ke format JSON
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}
 
$json_data = array(
    "draw" => intval($_GET['draw']),
    "recordsTotal" => intval($total),
    "recordsFiltered" => intval($total),
    "data" => $data
);
 
echo json_encode($json_data);
