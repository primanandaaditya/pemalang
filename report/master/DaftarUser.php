<?php

$tipe=$_GET['tipe'];
include "../../config.php";
include "../template_".$tipe."/top.php";

echo '<td colspan="2"><table id="ftable">';
echo '<tr id="ftr">';
echo '<td id="ftd">No.</td>';
echo '<td id="ftd">Username</td>';
echo '<td id="ftd">Email</td>';
echo '</tr>';

$sql = "select * from users order by username";
$stmt = $db->query($sql);
$i=0;

while ($users = $stmt->fetch(PDO::FETCH_ASSOC)){
    $i = $i + 1;
    echo '<tr id="ftr">';
    echo '<td id="ftd">'.$i.'</td>';
    echo '<td id="ftd">'.$users["username"].'</td>';
    echo '<td id="ftd">'.$users["email"].'</td>';
    echo '</tr>';
}

echo '</table></td>';
include "../template_".$tipe."/bottom.php";

?>