<?php
include('konekcija_sa_bazom.php');

if($_POST["lista_obaveza_id"])
{
 $data = array(
  ':lista_obaveza_id'  => $_POST['lista_obaveza_id']
 );

 $upit = "
 DELETE FROM lista_obaveza  
 WHERE lista_obaveza_id = :lista_obaveza_id
 ";

 $statement = $connect->prepare($upit);

 if($statement->execute($data))
 {
  echo 'Zavrseno';
 }
}

?>
