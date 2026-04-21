<?php
include "db.php";

$id = $_POST['id'];
$tag = $_POST['tag'];

$sql = "UPDATE zone SET TagStatus='$tag' WHERE ZoneID=$id";

if ($conn->query($sql)) {
    echo "success";
} else {
    echo "error";
}
?>
