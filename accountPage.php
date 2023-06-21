<?php
session_start();
$id = mysqli_connect("localhost","root","","belle_table");
$req="select * from users where idu=".$_SESSION['idu']."";
$res=mysqli_query($id,$req);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon espace</title>
    <link rel=stylesheet href=styleAccountPage.css>
    <link rel="shortcut icon" type="image/png" href="logo_Belletable.png">
</head>
<body>
<h1>Mon espace</h1>
<table>
<tr>
    <th>Pseudo</th>
    <th>Nom</th>
    <th>Prénom</th>
    <th>Adresse mail</th>
</tr>
<?php 
while ($ligne=mysqli_fetch_assoc($res)){ ?>
<tr>
    <td><?=$ligne["pseudo"]?></td>
    <td><?=$ligne["nom"]?></td>
    <td><?=$ligne["prenom"]?></td>
    <td><?=$ligne["mail"]?></td>
</tr><?php } ?>
</table>

<a id='BoutonDeconnexion' href='deconnexion.php'>Deconnexion</a>
</body>
</html>