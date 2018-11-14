<?php
if (isset($_GET['distance'])){
include('db.php');
$distance = $_GET['distance'];
$time = time();
$query = 'insert into readings (timestamp, value) values (' . $time . ', ' . $distance . ')';
if (mysqli_query($connection, $query)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($connection);
}
}
else {
    echo "missing values";
}
?>
