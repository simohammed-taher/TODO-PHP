<!DOCTYPE html>
<html lang="en">
<!-- https://www.toptal.com/designers/htmlarrows/symbols/ -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">    

</head>
<body>
    <?php include_once 'database.php'?>
    <?php include_once 'nav.php'?>    
    
    <div class="row g-3 align-items-center my-2 rounded-3">
    <div  class="border border-primary p-2 my-5 mx-auto w-75">

    <?php 
    if(isset($_POST['ajouter'])){
        $title =htmlspecialchars($_POST['title']);
        if(!empty($title)){
            $sqlState=$pdo->prepare("INSERT INTO items VALUES(null,?)");
            $result =$sqlState->execute([$title]);
            ?>
            <div class="alert alert-success" role="alert">
the title submited : <span class="fw-bolder"><?php echo $title ?></span></div> 
            <?php
        }else{
            ?>
<div class="alert alert-danger" role="alert">
the <span class="fw-bolder">title</span> is mandatori</div>            <?php
        }
    }
    ?>





    <h4>Ajouter tache :</h4>
    <form method="post" >
  <div class="col-auto">
    <label for="title" class="col-form-label">Title*</label>
  </div>
  <div class="col-auto">
    <input type="text" id="title" value="<?php echo @$title ?>" name="title" class="form-control" aria-describedby="passwordHelpInline">
  </div>
  <div class="col-auto">
    <span id="titleHelpInline" class="form-text">
      le titre de la tache,
    </span>
  </div>
  <div class="con-auto">
    <input class="btn btn-primary rounded-3 my-2" type="submit" value="Add" name="ajouter">
  </div>
  <?php 
  $sqlState =$pdo -> query("SELECT * FROM todo.items");
  $items=$sqlState->fetchAll(PDO::FETCH_OBJ);
  ?>
  <table class="table">
  <tbody>
    <?php 
    foreach($items as $key => $item){
        ?>
        <tr>
            <td>
            <span class="badge rounded-pill bg-primary"><?php echo $item -> id ?></span>    
            </td>
            <td><?php echo $item ->title ?></td>
            <td><form method="post">
                <input type="hidden" name="id" value="<?php echo $item->id ?>">
            <input class="btn btn-primary" type="submit" value="&#9997;"  name="modifier" >
            <input class="btn btn-danger"  type="submit" value="&#10008;" name="supprimer">
            </form></td>
        </tr>
        <?php    
    }
    ?>
  </tbody>
</table>
    </form>
    </div>
</div>
</body>
</html>
