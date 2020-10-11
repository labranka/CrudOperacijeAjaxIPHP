<?php
include('konekcija_sa_bazom.php');

if($_POST["ime_obaveze"])
{
 $data = array(
  ':korisnik_id'  => $_SESSION['korisnik_id'],
  ':opis' => trim($_POST["ime_obaveze"]),
  ':obavljeno' => 'Ne'
 );

 $upit = "
 INSERT INTO lista_obaveza 
 (korisnik_id, opis, obavljeno) 
 VALUES (:korisnik_id, :opis, :obavljeno)
 ";

 $statement = $connect->prepare($upit);

 if($statement->execute($data))
 {
  $lista_obaveza_id = $connect->lastInsertId();

  echo '<a href="#" class="list-group-item" id="list-group-item-'.$lista_obaveza_id.'" data-id="'.$lista_obaveza_id.'">'.$_POST["ime_obaveze"].' <span class="badge" data-id="'.$lista_obaveza_id.'">X</span></a>';
 }
}
?>