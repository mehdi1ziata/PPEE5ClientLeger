<?php
session_start(); 
$id = mysqli_connect("localhost","root","","belle_table");
$req="select * from offre_emploi order by libellee";
$res=mysqli_query($id,$req);
?>