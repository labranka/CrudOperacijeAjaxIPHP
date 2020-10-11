<?php
include('konekcija_sa_bazom.php');//Konekcija sa bazom na index stranici

$upit = "
 SELECT * FROM lista_obaveza 
 WHERE korisnik_id = '".$_SESSION["korisnik_id"]."' 
 ORDER BY lista_obaveza_id DESC
";

$statement = $connect->prepare($upit);//Pravljenje upita za izvrsenje

$statement->execute();//Izvrsavanje selektovanog upita

$rezultat = $statement->fetchAll();

?>

<!DOCTYPE html>
<html>
 <head>
  <title>Moja lista obaveza</title>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
 <script type="text/javascript" src="script.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>

 <body>
   <!-- Za deo pronadji-->
 <div class="container">
   <br>
   <span class="glyphicon glyphicon-search"></span>
     <input type="text" id="search" class="input-lg" placeholder="Pronadji..." />
     
       <br>
       <br />
     <!-- Predlog. -->
   <div id="display"></div>
</div>
   <br>
   <br>
  <br>
  <div class="container">
   <h1 >Moja dnavna lista obaveza</h1>
   <br />
   <div class="panel panel-default">
    <div class="panel-heading">
     <div class="row">
      <div class="col-md-9">
       <h3 class="panel-title">Moje obaveze</h3>
      </div>
      <div class="col-md-3">
       
      </div>
     </div>
    </div>
      <div class="panel-body">
       <form method="post" id="to_do_form">
        <span id="message"></span>
        <!--Pocetak unesi.....................................................-->
        <div class="input-group">
         <input type="text" name="ime_obaveze" id="ime_obaveze" class="form-control input-lg" autocomplete="off" placeholder="Unos obaveze..." />
         <div class="input-group-btn">
          <button type="submit" name="submit" id="submit" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus"></span></button>
         </div>
        </div>
        <br/>
        <!--Kraj unesi............................................................-->
        

       
        
       
       </form>
       <br />
       <div class="list-group">
       <?php
       foreach($rezultat as $row)
       {
        $style = '';
        if($row["obavljeno"] == 'Da')
        {
         $style = 'text-decoration: line-through';//Ako se klikne na obavezu znaci da je ona odradjena pa se precrtava
        }
        echo '<a href="#" style="'.$style.'" class="list-group-item" id="list-group-item-'.$row["lista_obaveza_id"].'" data-id="'.$row["lista_obaveza_id"].'">'.$row["opis"].' <span class="badge" data-id="'.$row["lista_obaveza_id"].'">X</span></a>';
       }
       ?>
       </div>
      </div>
     </div>
  </div>
 </body>
</html>

<script>
 
 $(document).ready(function(){
  /*................Za unos...........................................*/
  $(document).on('submit', '#to_do_form', function(event){
   event.preventDefault();

   if($('#ime_obaveze').val() == '')
   {
    $('#message').html('<div class="alert alert-danger">Unesi obavezu!</div>');
    return false;
   }
   else
   {
    $('#submit').attr('disabled', 'disabled');
    $.ajax({
     url:"dodaj_obavezu.php",
     method:"POST",
     data:$(this).serialize(),
     success:function(data) //Ova funkcija se poziva ako se ajax uspesno izvrsi i ako su uzeti podaci iz baze
     {
      $('#submit').attr('disabled', false);
      $('#to_do_form')[0].reset();
      $('.list-group').prepend(data);
     }
    })
   }
  });
  /*Kraj..............................*/

  $(document).on('click', '.list-group-item', function(){
   var lista_obaveza_id = $(this).data('id');
   $.ajax({
    url:"update_task.php",
    method:"POST",
    data:{lista_obaveza_id:lista_obaveza_id},
    success:function(data)
    {
     $('#list-group-item-'+lista_obaveza_id).css('text-decoration', 'line-through');
    }
   })
  });

  $(document).on('click', '.badge', function(){
   var lista_obaveza_id = $(this).data('id');
   $.ajax({
    url:"obrisi_obavezu.php",
    method:"POST",
    data:{lista_obaveza_id:lista_obaveza_id},
    success:function(data)
    {
     $('#list-group-item-'+lista_obaveza_id).fadeOut('slow');
    }
   })
  });

 });
</script>