 <!DOCTYPE html>
 <html lang="pl" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Obliczenia</title>
   </head>
   <!-- number format -->
   <body>
     <?php
       if (isset($_POST["button"])) {
         $a=$_POST["a"];
         $a= str_replace(",",".","$a");
         if (!empty($a) AND is_numeric($a)) {
           if ($a>0) {
             $obw=$a*4;
             $pole=$a*$a;
             $obw=number_format($obw, 2);
             $pole=number_format($pole, 2);
             echo <<< odp
             Kwadrat o boku $a ma pole $pole cm<sup>2</sup> i obwód $obw cm.
             odp;
           }

           else echo "Wprowadzono nieprawidłowe dane.";
         }
         else{
           ?>
           <script type="text/javascript">
             history.back();
           </script>
           <?php
         }


     }
      ?>
   </body>
 </html>
