<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">    

</head>
<body>

        <?php
                 if(!isset($_POST['id'])){
                    header('location: index.php');
                 }
         require_once 'database.php';
         include_once 'nav.php';

         $id = $_POST['id'];
         $sqlState = $pdo->prepare('SELECT * FROM items WHERE id=?');
         $sqlState -> execute([$id]);
         $item=$sqlState->fetch(PDO::FETCH_OBJ);
         if(isset($_POST['modifier2'])){
            echo 'ok';
         }
        ?>

<h4>Modifier tache :</h4>
    <form method="post" >
        <input type="text" name="id" value="<?php echo $item->i ?>">
  <div class="col-auto">
    <label for="title" class="col-form-label">Title*</label>
  </div>
  <div class="col-auto">
    <input type="text" id="title" value="<?php echo @$title ?>" name="title" class="form-control" aria-describedby="titleHelpInline" value="<?php echo $item->title ?>">
  </div>
  <div class="col-auto">
    <span id="titleHelpInline" class="form-text">
      le titre de la tache,
    </span>
  </div>
  <div class="con-auto">
    <input class="btn btn-primary rounded-3 my-2" type="submit" value="Modifier" name="modifier2">
  </div>
</body>
</html>