<?php
    include("MenuPage.php");
    
    session_start();
    $id = mysqli_connect("localhost","root","","belle_table");
    if(isset($_POST["bout"]))
    { 
        $mdp=hash("sha256",$_POST["mdp"]);
        $pseudo=$_POST["pseudo"];
        $req="select * from users where pseudo='".$pseudo."' and mdp='".$mdp."'";
        $resultat=mysqli_query($id,$req);
        if(mysqli_num_rows($resultat)>0){
            $ligne=mysqli_fetch_assoc($resultat);   
            $_SESSION["pseudo"] = $pseudo;
            $_SESSION["niveau"] = $ligne["niveau"];
            $_SESSION["idu"] = $ligne["idu"];
            header("Location:index.php");
        }else{
            $erreur = "Attention votre mot de passe ou votre pseudo est incorrect!";}   
    }?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="shortcut icon" type="image/png" href="logo_Belletable.png">
    <link rel="stylesheet" href="styleFormConnect.css">
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Glitch&display=swap" rel="stylesheet">
</head>
<body>


<div class="container">

<h1>FORMULAIRE DE CONNEXION</h1><hr>

<form action="" method="post">
    <?php
        if(isset($erreur)){
            echo $erreur;}
    ?>
    <br>
    <img src="person_FILL.png" alt="OUT"><input type="text" name="pseudo" placeholder = "Entrez votre pseudo :"input><br>
    <img src="lock_FILL.png" alt="OUT"><input type= "password" name="mdp" placeholder = "Entrez votre mot de passe :" input><br>
    
    <div class="btns">
        <img src="login_FILL.png" alt="OUT"><button type= "submit" class="btnInscription" name="bout" value = "Connexion" >Connexion</button>
        <a href="inscriptionj.php">S'inscrire</a>
    </div>

</form>

</div>
<?php include("footer.php"); ?>






    
</body>
</html>