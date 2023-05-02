<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <title>calculator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> 
  </head>
<body style="background-color: #323946;">
<h1 style="color: white;">Calculator Sederhana</h1>
   <?php 
        $b1 = [1,2,3,'+',4,5,6,'-',7,8,9,'*',0,'.','/','='];
        $b2 = ['c'];
        $tombol = '';
        if(isset($_POST['tombol']) && in_array($_POST['tombol'],$b1)){
            $tombol = $_POST['tombol'];
        }
        $hitungan = '';
        if(isset($_POST['hitungan']) && preg_match('~^(?:[\d.]+[* /+-]?)+$~',$_POST['hitungan'],$out)){
            $hitungan = $out[0];
        }
        $tampilan = $hitungan.$tombol;
        if($tombol=='c'){
            $tampilan='';
        }elseif($tombol == '='&& preg_match('~^\d*\.?\d+(?:[*/+-]\d*\.?\d+)*$~',$hitungan)){
            $tampilan.=eval("return $hitungan;");
        }
        echo"<div class='calc'>";
        echo"<form method='POST'>";
        echo"<div class='card'>";
        echo"<div class='card-body'>";
        echo"<input class='form-control inpt' type='text' name='hitungan' value='$tampilan' palaceholder='0'>";
        echo"<div class='card-number'>";

        foreach(array_chunk($b1,5) as $chunk){
            foreach($chunk as $button){
                echo"<button",(sizeof($chunk)!=4?" ":""), "name='tombol' value='$button'
                class = 'btn btn-success butn'>$button</button>";
            }
        }
        foreach($b2 as $clear){
            echo "<button name = 'tombol value ='$clear' class='btn btn-primary butn-clear'>$clear</button>";
        }
        echo"</div>";
        echo"</div>";
        echo"</div>";
        echo"</form>";
   ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>