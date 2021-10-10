<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Wynik</title>
    <script type="text/javascript">
      function powrot(){
        history.back();
      }
    </script>
  </head>
  <body>
    <?php
      if(isset($_POST["button"])){
        $brand=$_POST["brand"];
        $model=$_POST["model"];
        $color=$_POST["color"];
        $yop=$_POST["yop"];
        $current_date=date("Y");
        if (empty($brand) OR empty($model) OR empty($color) OR empty($yop)) {
          echo "<script>alert('Nie podano wszystkich danych');</script>";
          echo "<script>history.back();</script>";
        }
        else{
        switch ($brand) {
          case '1':
            echo "<script>alert('Nie podano marki');</script>";
            echo "<script>history.back();</script>";
            break;
          case '2':
            $brand_name="BMW";
            break;
          case '3':
            $brand_name="Volkswagen";
            break;
          case '4':
            $brand_name="Toyota";
            break;
          case '5':
            $brand_name="Subaru";
            break;
          case '6':
            $brand_name="Alfa Romeo";
            break;
          case '7':
            $brand_name="Fiat";
            break;

          default:
          echo "<script>alert('Nie podano marki');</script>";
          echo "<script>history.back();</script>";
            break;
        }
        $car_age=$current_date-$yop;
        if($car_age>20){
          $car_age=$car_age.", przydałoby się je wymienić.</span>";
        }
        echo <<< Auto
        Posiadasz auto marki $brand_name, jest to model $model z $yop roku.<br><br>
        Twoje auto ma już $car_age<br><br>
        Twoje auto jest koloru <span style='color:$color; background-color:$color; border:1px solid black'>OOO</span>, czyli $color.<br><br>
        <input type="button" onclick="powrot()" value="Powrót"/>
        Auto;
      }
    }
     ?>
  </body>
</html>
