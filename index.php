<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'work';
$p;
$result;

$conn = mysqli_connect($host, $user, $password, $dbname);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$p='<p class="success">Vous êtes connecté</p>';

$RadioButton1;
$RadioButton2;
$RadioButton3;
$ResultasRadioButton ;
if (isset($_POST["scanner"])) {
$RadioButton1= $_POST["color"];
$RadioButton2= $_POST["leatherColor"];
$RadioButton3= $_POST["function"];
  
  $scanner = $_POST["scanner"];
  $query = "SELECT * FROM data WHERE `scanner` = '$scanner'";
  $result = mysqli_query($conn, $query);
  $queryRadioButton = "SELECT * FROM data WHERE `Couleur bois` = '$RadioButton1' AND `Couleur cuir` = '$RadioButton2'AND `Mat function` = '$RadioButton3'";
  $resultRdioButton = mysqli_query($conn, $queryRadioButton);
  }
$queryScannerAll = "SELECT `scanner` from data";
$resultqueryScanner = mysqli_query($conn, $queryScannerAll);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="index.css">

  <title>Verifier</title>
</head>
<style>
  
   .custom-table {
        border-collapse: collapse;
        width: 100%;
        border-radius: 8px;
        
      }
      
      .custom-table th, .custom-table td {
        border: 2px solid #ccc;
        padding: 8px;
        text-align: left;
        
      }
      
      .custom-table th {
          background-color:  black;
        background-color: #e6e6e6;
      }
</style>
<body>
  
  <head>
  <!-- <nav>
  <a href="index.html" class="active">Home</a>
  <a href="data.html">Data</a>
  <a href="search.html">Rechercher</a>
  <a href="add.html">Ajout</a>
  <a href="logout.html" style="float:right">Deconnexion</a>
</nav> -->
  </head>
  <p><?php echo $p ?></p>
  <main>
    <form action="index.php" method="post">
    <div class="groupeRadio inline-block">
    <div class="group inline-block">
  <legend>Scanner</legend>
  <input type="search" id="scanner" name="scanner" placeholder="Scanner..." required="required">
  <input type="submit" value="Verifier">
  <input type="reset" >
</div>
  <div class="group inline-block">
    <legend>Choix de couleur</legend>
    <div>
        <input type="radio" id="WURZELNESS" name="color" value="WURZELNESS FONDENTE" checked>
        <label for="WURZELNESS">WURZELNESS FONDENTE</label>
    </div>
    <div>
        <input type="radio" id="PAPPELMASER" name="color" value="PAPPELMASER SCHIEFER">
        <label for="PAPPELMASER">PAPPELMASER SCHIEFER</label>
    </div>
    <div>
        <input type="radio" id="KLAVIERLACK" name="color" value="KLAVIERLACK SCHWARZ">
        <label for="KLAVIERLACK">KLAVIERLACK SCHWARZ</label>
    </div>
</div>
<div class="group inline-block">
    <legend>Leather color</legend>
    <div>
        <input type="radio" id="SCHWARZ" name="leatherColor" value="SCHWARZ" checked>
        <label for="SCHWARZ">SCHWARZ</label>
    </div>
    <div>
        <input type="radio" id="MACCIATOBEIGE" name="leatherColor" value="MACCIATOBEIG">
        <label for="MACCIATOBEIGE">MACCIATOBEIGE</label>
    </div>
    <div>
        <input type="radio" id="KRISTALLWEISS" name="leatherColor" value="KRISTALLWEISS">
        <label for="KRISTALLWEISS">KRISTALLWEISS</label>
    </div>
    <div>
        <input type="radio" id="MAGMAGRAU" name="leatherColor" value="MAGMAGRAU">
        <label for="MAGMAGRAU">MAGMAGRAU</label>
    </div>
</div>

<div class="group inline-block">
    <legend>Choix de fonction</legend>
   
    <div>
        <input type="radio" id="HOD" name="function" value="HOD">
        <label for="HOD">HOD</label>
    </div>
    <div>
        <input type="radio" id="HEAT" name="function" value="HEA">
        <label for="HEAT">HEAT</label>
    </div>
    <div>
        <input type="radio" id="FUL" name="function" value="FUL">
        <label for="FUL">FUL</label>
    </div>
    <div>
        <input type="radio" id="HEAT+HOD" name="function" value="HEAT+HOD" checked>
        <label for="HEAT+HOD">Heat+HOD</label>
    </div>
</div>


</div>
</form>

<table class="custom-table">
  <?php
  $text1=" ";
  $text2=" ";
  $text3=" ";
  $BackgroundCloreWOOD = " ";
  $BackgroundCloreLeather = " ";
  $BackgroundCloreMATfonction = " ";
  $MatFunctionRadioButton = " ";
  $CouleurCuirRadioButton=" ";
  $CouleurBoisRadioButton = " ";
  $TextCarre = " ";
  $ColreCarre = " ";
  if ($result->num_rows > 0 || $resultRdioButton->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
      $RefScanner = $row['Partnumber'];
      $CouleurBoisScanner = $row['Couleur bois'];
      $CouleurCuirScanner = $row['Couleur cuir'];
      $MatFunctionScanner = $row['Mat function'];


    }


    while ($rowRadioButton = $resultRdioButton->fetch_assoc()) {
      $RefSRadioButton = $rowRadioButton['Partnumber'];
      $CouleurBoisRadioButton = $rowRadioButton['Couleur bois'];
      $CouleurCuirRadioButton = $rowRadioButton['Couleur cuir'];
      $MatFunctionRadioButton = $rowRadioButton['Mat function'];


    }
    if($MatFunctionRadioButton == $MatFunctionScanner){
      $text3 = "Matched";
      $BackgroundCloreMATfonction = "background-color: green;";
    }else{
      $text3 = "Not Matched";
      $BackgroundCloreMATfonction = "background-color: red;";
    }
    if($CouleurBoisRadioButton == $CouleurBoisScanner){
      $text1 = "Matched";
      $BackgroundCloreWOOD = "background-color: green;";
    }else{
      $text1 = "Not Matched";
      $BackgroundCloreWOOD = "background-color: red;";
    }
    if($CouleurCuirRadioButton == $CouleurCuirScanner){
      $text2 = "Matched";
      $BackgroundCloreLeather = "background-color: green;";
    }else{
      $text2 = "Not Matched";
      $BackgroundCloreLeather = "background-color: red;";
    }
    if($text1=="Matched" && $text2=="Matched" && $text3=="Matched" ){
      $TextCarre = "Matched";
      $ColreCarre = "background-color: green;";
    }else{
      $TextCarre = "Not Matched";
      $ColreCarre = "background-color: red;";
    }
  }
   ?>
  <div  style="float: left; width:45%; padding: 0px; margin: 0px; " >
    <strong style="text-align: center ; width: 100%">Tous les scanner</strong>
   <div class="inline-block group" style="overflow: scroll ;height: 100px;">
   <?php 
    if($resultqueryScanner->num_rows >0 ){
      $i=1;
      while($rowss=$resultqueryScanner->fetch_assoc()){
        $i++;
       echo '<div style="text-align: center">' . $rowss['scanner'] . '</div>';
       if($i>25){
         break;
       }
       
      }
    }
    ?>
  </div>
  </div>
   <div class="inline-block group" style="float: right; width: 45%; padding: 0px; margin: 0px; text-align: center; height: 100px; <?php  echo $ColreCarre?>;">
   
   <p style=" text-align: centre ;width:100%;"> <?php echo $TextCarre ?></p>
   </div>
  
  <tr>
    <td >WOOD</td>
    <td style="<?php echo $BackgroundCloreWOOD ?>"><?php echo $text1 ?></td>
  </tr>
  <tr>
    <td >Leather</td>
    <td style="<?php echo $BackgroundCloreLeather ?>"><?php echo $text2 ?></td>
  </tr>
  <tr>
    <td >MAT fonction</td>
    <td style="<?php echo $BackgroundCloreMATfonction ?>"><?php echo $text3 ?></td>
  </tr>
</table>


  </main>
</body>
</html>
