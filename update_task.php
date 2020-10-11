<?php
include('konekcija_sa_bazom.php');

if($_POST["lista_obaveza_id"])
{
 $data = array(
  ':obavljeno'  => 'Da',
  ':lista_obaveza_id'  => $_POST["lista_obaveza_id"]
 );

 $upit = "
 UPDATE lista_obaveza  
 SET obavljeno = :obavljeno 
 WHERE lista_obaveza_id = :lista_obaveza_id
 ";

 $statement = $connect->prepare($upit);

 if($statement->execute($data))
 {
  echo 'Zavrseno';
 }
}
?>