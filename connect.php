<?php
$name = $_POST['name'];
$phone = $_POST['phone'];
$flatNo = $_POST['flatNo'];
$doorNo = $_POST['doorNo'];
$street = $_POST['street'];
$area = $_POST['area'];
$city = $_POST['city'];
$district = $_POST['district'];
$pincode = $_POST['pincode'];
$email = $_POST['email'];

$conn = new mysqli('localhost', 'root', '', 'test2');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO registration (name, phone, flatNo, doorNo, street, area, city, district, pincode, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssisssssis", $name, $phone, $flatNo, $doorNo, $street, $area, $city, $district, $pincode, $email);
    $stmt->execute();
    echo "Registration successful";
    $stmt->close();
    $conn->close();
}
?>
