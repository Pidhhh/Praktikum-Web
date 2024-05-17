<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["txtName"];
    $date = $_POST["txtDate"];
    $month = $_POST["txtMonth"];
    $year = $_POST["txtYear"];
    $address = $_POST["txtAddress"];
    $city = $_POST["txtCity"];

    echo "Name: " . $name . "<br>";
    echo "Birth Date: " . $date . "/" . $month . "/" . $year . "<br>";
    echo "Address: " . $address . "<br>";
    echo "City: " . $city . "<br>";
}
?>