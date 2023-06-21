<?php 
require("database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offre d'emploi</title>
    <link rel=stylesheet href=styleOffreEmploi.css>
    <link rel="shortcut icon" type="image/png" href="logo_Belletable.png">
</head>
<body>
<h1 id="titrePageh1">Liste Des Offre d'Emploi</h1>
<table>
<tr>
    <th>Libellée de l'offre</th>
    <th>Salaire mensuel</th>
    <th>Type de contrat</th>
    <th>Description de l'offre</th>
</tr>
<form action="" method="post">
<?php while($ligne=mysqli_fetch_assoc($res)) { ?>
    <tr>
        <td><?=$ligne["libellee"];?></td>
        <td><?=$ligne["salaire"];?></td>
        <td><?=$ligne["contrat"];?></td>
        <td><?=$ligne["description"];
        if(isset($_SESSION["niveau"])){
             if($_SESSION["niveau"]==1){ echo "<input type='submit' name='".$ligne['ido']."' value='Postuler'>";}}
        if(isset($_SESSION["niveau"])){
             if($_SESSION["niveau"]==2) { echo "<input type='submit' name='".$ligne['ido']."' value='Supprimer'>";}}?></td>
    </tr><?php } ?>
</table></form>

<?php
if(isset($_SESSION["niveau"])){
    if($_SESSION["niveau"]==2){
        echo "<div id='ajouterOffre'><h2>Ajouter une offre d'emploi et son QCM</h2><br>
            <form action='' method='post'>
                <input id='libelleeOffre' type='text' name='libelleeOffre' placeholder='Nom de l&#039offre' required><br>
                <input type='text' name='salaire' placeholder='Salaire mensuel' required><br>
                <select name='contrat'><option value='CDI'>CDI</option><option value='CDD'>CDD</option></select><br>
                <textarea id='descriptionOffre' name='descriptionOffre'rows='5' >Description</textarea><br>
                <input type='submit' name='bout' value='Ajouter'>
            </form></div>";  
       }
}

if(isset($_POST["bout"])){
 $libelleeOffre=$_POST["libelleeOffre"];
 $descriptionOffre=$_POST["descriptionOffre"];
 $salaire=$_POST["salaire"];
 $contrat=$_POST["contrat"];
 $req2="insert into offre_emploi values (null,'".$libelleeOffre."','".$salaire."','".$contrat."','".$descriptionOffre."')";
 $res2=mysqli_query($id,$req2);}
 if(isset($_SESSION["niveau"])){
 if($_SESSION["niveau"]==2) {
foreach($_POST  as $cle=>$valeur){
    if (isset($_POST[$cle])){
        $req3="delete from offre_emploi where ido=".$cle."";
        mysqli_query($id, $req3);
    }}}}
if(isset($_SESSION["niveau"])){
if($_SESSION["niveau"]==1){
    foreach($_POST  as $key=>$value){
        if (isset($_POST[$key])){
            $req4="insert into candidature values (null,".$_SESSION["idu"].",".$key.",now(),null)";
            mysqli_query($id, $req4);
            $req5="select * from offre_emploi where ido=".$key."";
            $res2=mysqli_query($id,$req5);
            $_SESSION["libelleeOffreChoisi"]=mysqli_fetch_assoc($res2)["libellee"];
           }}}}?>
</body>
</html>