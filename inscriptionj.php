<?php
 $id = mysqli_connect("localhost","root","","belle_table");
if(isset($_POST["bout"])){
    $pseudo= $_POST["pseudo"];
    $mdp= hash("sha256",$_POST["mdp"]);
    $mdp2=hash("sha256",$_POST["mdp2"]);
    $req="select * from users where pseudo='".$pseudo."'";
    $resultat=mysqli_query($id,$req);
    if(mysqli_num_rows($resultat)>0){
        $doublon_pseudo="Attention ce pseudo existe déjà!";
    }else if($mdp!=$mdp2){
        $doublon_mdp="Attention les mots de passe ne correspondent pas!";
    }
    else{
        $req2="insert into users values (null,'".$pseudo."','".$_POST["nom"]."','".$_POST["prenom"]."','".$_POST["mail"]."','".$mdp."',1)";
        $resultat2=mysqli_query($id,$req2);
        echo "Inscription validée";
        header("refresh:3;url=formConnectj.php");
    }


}
?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="shortcut icon" type="image/png" href="logo_Belletable.png">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Glitch&display=swap" rel="stylesheet">
</head>
<body>

<h1>INSCRIPTION</h1>

<form action="" method="post">
    
    <?php if(isset($doublon_mdp))echo "".$doublon_mdp."<br>";?>
    <?php if(isset($doublon_pseudo))echo "".$doublon_pseudo."<br>";?>

    <div class="container">
        <img src="person_FILL.png" alt="OUT"><input class="placeholderBox" type="text" name="pseudo" placeholder= "Entrer un pseudo" required><br>
        <img src="person_FILL.png" alt="OUT"><input type="text" name="nom" placeholder= "Entrer votre nom" required><br>
        <img src="person_FILL.png" alt="OUT"><input type="text" name="prenom" placeholder= "Entrer votre prenom" required><br>
        <img src="contact_mail.png" alt="OUT"><input type="text" name="mail" placeholder= "Entrer votre adresse mail" required><br>
        <img src="lock_FILL.png" alt="OUT"><input type="password" name="mdp" placeholder= "Entrer un mot de passe" required><br>
        <img src="lock_FILL.png" alt="OUT"><input type="password" name="mdp2" placeholder= "Confirmer le mot de passe" required><br>
    </div>

    <div class="btns">
        <img src="login_FILL.png" alt="OUT"><button type="submit" name= "bout" class="btnInscription" value= "Inscription">Inscription</button>
    </div>

</form>
    
</body>
</html>