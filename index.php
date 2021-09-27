<?php ?>

<?php 
  require_once "logica/edition.php";
  require_once "logica/editionTopic.php";
  require_once "logica/topic.php";

  $editionselected = 0;
  if(isset($_GET['edition'])){
    $editionselected = $_GET['edition'];
  }

  // obtener los valores del select
  $edition = new edition();
  $edition = $edition->consultar();
  // echo $edition[0]->getyear();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.1/css/all.css" />
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css"
    rel="stylesheet">
      <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script 
    src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js"></script>	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-light ">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Nav Bar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Conference
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            <li><a class="dropdown-item" href="#">Call of Papers</a></li>
            <li><a class="dropdown-item" href="#">Important Dates</a></li>
            <li><a class="dropdown-item" href="#">Submission</a></li>
            <li><a class="dropdown-item" href="#">Call of Workshop</a></li>
          </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./index.php?">Workshops</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Committies</a>
          </li>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Program
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            <li><a class="dropdown-item" href="#">Keynote Speakes</a></li>
            <li><a class="dropdown-item" href="#">Accepted Papers</a></li>
          </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Proceedings</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Registration</a>
          </li>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Stats
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            <li><a class="dropdown-item" href="#">All Editions</a></li>
            <li><a class="dropdown-item" href="#">ICAI</a></li>
            <li><a class="dropdown-item" href="#">ICAI Workshops</a></li>
          </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Nuestros Proveedores</a>
          </li>
        </ul>

      </div>
    </div>
  </nav>


  <div class="div-body">
    <div class="input-group mb-3 " style="margin: 10px; left: 20%;">
      <div class="input-group-prepend">
        <label class="input-group-text" for="selectEdition">Edition</label>
      </div>
      <select class="custom-select" id="selectEdition" style="width: 200px">
        <option value=0 <?php if($editionselected == 0) echo "selected" ?> >Select Edition</option>
        <?php 
          if($edition){
            foreach($edition as $edition_item){
        ?>
        <option value="<?php echo $edition_item->getyear() ?>" <?php if($edition_item->getyear() == $editionselected) echo "selected" ?>
        id="<?php echo $edition_item->getyear() ?>"> <?php echo $edition_item->getyear() ?> </option>
        <?php
            }
          }
        ?>
      </select>
    </div>
    
    <?php if($editionselected && $editionselected != 0){
      include "./presentacion/graficas.php";
    } ?>

  </div>

</body>
</html>

<script>
  $("#selectEdition").change(function() {
    let edicion = $("#selectEdition").val();
    if(edicion){
      let url = "index.php?edition=" + edicion;
      location.replace(url);
    }
  });
</script>
