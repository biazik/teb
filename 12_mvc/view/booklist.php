<table>
  <tr>
    <th>Tytuł</th>
    <th>Autor</th>
    <th>Opis</th>
  </tr>
      <?php
    foreach ($books as $value):
      ?>
      <tr>
        <td><a href="?book=<?php echo $value->title?>"><?php echo $value->title; ?></a></td>
        <td><?php echo $value->author; ?></td>
        <td><?php echo $value->description; ?></td>
      </tr>
    <?php
  endforeach;
     ?>
</table>
