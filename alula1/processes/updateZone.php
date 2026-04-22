<?php
include "db.php";

$zoneID = $_POST['id'];
$tag = $_POST['tag'];

$colors = [
    "Crowded" => "#c0392b",
    "Moderate" => "#d4821a",
    "Clear" => "#2e8b57"
];

// 🔴 DELETE case
if ($tag == "No Data") {
    $conn->query("DELETE FROM Tag WHERE ZoneID=$zoneID");
    echo "success";
    exit;
}

// 🔵 ADD or EDIT
$color = $colors[$tag];

// check if tag exists
$check = $conn->query("SELECT * FROM Tag WHERE ZoneID=$zoneID");

if ($check->num_rows > 0) {
    // UPDATE
    $conn->query("UPDATE Tag 
                  SET TagStatus='$tag', TagColor='$color' 
                  WHERE ZoneID=$zoneID");
} else {
    // INSERT
    $conn->query("INSERT INTO Tag (ZoneID, TagStatus, TagColor) 
                  VALUES ($zoneID, '$tag', '$color')");
}

echo "success";
?>