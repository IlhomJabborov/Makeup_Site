
<?php

// $servername = "localhost";
// $username = "postgres";
// $port = "5432";
// $password = "904001005j";
// $database = "makiyaj";
// try {
//   $conn = new PDO("pgsql:host=$servername;dbname=$database", $username, $password);
//   // set the PDO error mode to exception
//   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//   echo "Connected successfully";
// } catch(PDOException $e) {
//   echo "Connection failed: " . $e->getMessage();
// }
$host = 'localhost'; // host nomi
$port = '5432'; // port raqami
$dbname = 'makiyaj'; // ma'lumotlar ombori nomi
$user = 'postgres'; // foydalanuvchi nomi
$password = '904001005j'; // parol

// Bog'lanishni o'rnatish
$dsn = "pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password";

try {
    // PDO obyekti yaratish va bog'lanishni o'rnatish
    $dbh = new PDO($dsn);
    echo "Bog'lanish muvaffaqiyatli amalga oshirildi.";
} catch (PDOException $e) {
    echo "Bog'lanishda xatolik yuz berdi: " . $e->getMessage();
}
?>
