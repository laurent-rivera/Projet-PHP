<?php
session_start();
include("classe/DbConnect.php");
include("classe/User.php");
$user = new User($_SESSION['id_session']);
$db_connect = new DbConnect();
$users = $db_connect->GetAllUsers();
?>

<table>
    <tr>
        <th>Prénom</th>
        <th>Nom</th>
        <th>Pseudo</th>
        <th>Email</th>
        <th>Droits</th>
        <th>Actif</th>
    </tr>
<?php
foreach ($users as $row) {
    echo "<tr>";
    echo "<th>".$row->prenom."</th>";
    echo "<th>".$row->nom."</th>";
    echo "<th>".$row->pseudo."</th>";
    echo "<th>".$row->email."</th>";
    echo "<th>".$row->droit."</th>";
    echo "<th>".$row->active."</th>";
    echo "</tr>";
}
?>
</table>