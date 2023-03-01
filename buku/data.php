<?php
// konfigurasi koneksi ke database
$host = "localhost"; // alamat server database
$username = "root"; // username database
$password = ""; // password database
$dbname = "silverstripe_2"; // nama database

// membuat koneksi ke database
$conn = mysqli_connect($host, $username, $password, $dbname);

// mengecek apakah koneksi berhasil atau tidak
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// filter
$filter = isset($_GET['filter']) ? $_GET['filter'] : '';

// search
$search = isset($_GET['search']) ? $_GET['search'] : '';

// pagination
$limit = isset($_GET['limit']) ? $_GET['limit'] : 10;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// query untuk menghitung jumlah total data
$sqlCount = "SELECT COUNT(*) as count FROM buku WHERE 1=1";

if (!empty($filter)) {
    $sqlCount .= " AND ClassName = '{$filter}'";
}

if (!empty($search)) {
    $sqlCount .= " AND (Title LIKE '%{$search}%' OR Author LIKE '%{$search}%')";
}

$resultCount = mysqli_query($conn, $sqlCount);
$count = mysqli_fetch_assoc($resultCount)['count'];

// query untuk mengambil data dengan filter, search, dan pagination
$sql = "SELECT ClassName, ID, LastEdited, Created, Title, Author, PublishedDate, Publisher FROM buku WHERE 1=1";

if (!empty($filter)) {
    $sql .= " AND ClassName = '{$filter}'";
}

if (!empty($search)) {
    $sql .= " AND (Title LIKE '%{$search}%' OR Author LIKE '%{$search}%')";
}

$sql .= " ORDER BY LastEdited DESC LIMIT {$offset}, {$limit}";

// mengeksekusi query dan menyimpan hasilnya ke dalam variabel $result
$result = mysqli_query($conn, $sql);

// membuat array kosong untuk menyimpan data
$data = array();

// mengambil data dari setiap baris hasil query dan menyimpannya ke dalam array $data
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

// menghitung jumlah halaman
$totalPages = ceil($count / $limit);

// mengembalikan data dalam format JSON
echo json_encode(array(
    "data" => $data,
    "count" => $count,
    "totalPages" => $totalPages
));
