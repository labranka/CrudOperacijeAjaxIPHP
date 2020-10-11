<?php

$connect = new PDO("mysql:host=localhost;dbname=lista_obaveza", "root", "");//PDO-interfejs za pristup bazama podataka

session_start();//Kreira sesiju ili je nastavlja na osnovu identifikatora sesije prosledjenog putem GET ili POST zahteva(ili prenosa pute kolacica)

$_SESSION["korisnik_id"] = "1";

?>