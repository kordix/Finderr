<?php

session_start();

if (!isset($_SESSION['zalogowany'])) {
    header('location:/views/login.php');
}


?>

<!DOCTYPE html>
<html>

<head>
  <title>Upload plików</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<style>
  label{
    font-weight:bold;
  }
  #messages{
    color:red;
    font-weight:bold;
  }

  #uploadnavitem{
    font-weight:bold;
    border:1px gray solid;
    color: rgba(0,0,0,.7);
  }
</style>
</head>

<body>


  <div class="container mt-5">
    <p id="messages"></p>
    <div>
      <a href="/" style="margin-right:50px;font-size:20px;text-decoration:none;font-family:arial">Main page</a>
      <br><br>
      <form action="/api/upload.php" method="post" enctype="multipart/form-data" id="myForm" autocomplete="off" onsubmit="return mySubmitFunction(event)">
    
        <div class="mb-2">
          <label for=""> Dodaj plik:</label>
          <input type="file" name="fileToUpload" id="fileToUpload">
          <input type="submit" value="Upload Image">
        </div>
      </form>
    </div>
 

  <script>
    function mySubmitFunction(event){
      event.preventDefault();

      // event.target.submit();

      if(!fileToUpload.files.length){
        document.querySelector('#messages').innerHTML = 'WYBIERZ PLIK!';
        return;
      }
  

      
      document.getElementsByTagName('form')[0].submit();
    
      }


  </script>
</body>

  <?php
  define('SITE_ROOT', realpath(dirname(__FILE__)));


  // include('dir.php');

  @$folder = $_POST['folder'];

  $folder = 'dupa';
  $folder = $_SESSION['login'];


if (count($_FILES) == 0) {
    return;
}

   $target_dir = "../images/";
   $target_file = $target_dir . $folder . '/'. basename($_FILES["fileToUpload"]["name"]);
   
   $uploadOk = 1;
   $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

   $path =$target_dir . $folder . '/';
   $num = count(glob($path . "/*")) + 1;
   

   $target_file = $target_dir . $folder . '/'. basename($num.'.'.$imageFileType);



  // Check if image file is a actual image or fake image
  if (isset($_POST["submit"])) {
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if ($check !== false) {
          echo "Jest obrazek - " . $check["mime"] . ".";
          $uploadOk = 1;
      } else {
          // echo "File is not an image.";
          $uploadOk = 1;
      }
  }

  // Check if file already exists
  if (file_exists($target_file)) {
      echo "JEST JUŻ PLIK O TEJ NAZWIE W TYM FOLDERZE <br>";
      $uploadOk = 0;
  }

  // Check file size
  if ($_FILES["fileToUpload"]["size"] > 7000000) {
      echo "PLIK JEST ZA DUŻY";
      $uploadOk = 0;
  }

  if ($uploadOk == 0) {
      echo "Sorry, plik nie został zuploadowany \r\n";
  // if everything is ok, try to upload file
  } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
          echo "Plik " . basename($_FILES["fileToUpload"]["name"]) . " został wrzucony. \r\n";
      } else {
          echo "Sory, wystąpił jakiś błąd";
      }
  }

  ?>

</div>