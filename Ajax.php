<?php
include "db.php";
//Uzimanje vrednosti navedene u search
if (isset($_POST['search'])) {
   $Name = $_POST['search'];
   $Query = "SELECT opis FROM lista_obaveza WHERE opis LIKE '%$Name%' LIMIT 5";
   $ExecQuery = MySQLi_query($con, $Query);
//Kreiranje neuredjene liste rezultata
   echo '
<ul>
   ';
   while ($Result = MySQLi_fetch_array($ExecQuery)) {
       ?>
   <!--  Pozivanje funkcije fill u java scriptu-->
   <li onclick='fill("<?php echo $Result['Name']; ?>")'>
   <a>
   <!-- Assigning searched result in "Search box" in "search.php" file. -->
       <?php echo $Result['opis']; ?>
   </li></a>
   <?php
}}
?>
</ul>