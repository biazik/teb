<table>
  <tr>
    <td>
      <?php
    foreach ($books as $value) {
      echo $value->title."<br/>";
      echo $value->author."<br/>";
      echo $value->description."<br/>";
    }
     ?>
   </td>
  </tr>
</table>
