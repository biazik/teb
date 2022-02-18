<table>
  <tr>
    <th>Brand</th>
    <th>Model</th>
    <th>Price</th>
    <th>Color</th>
  </tr>
  <?php foreach ($cars as $value): ?>
    <tr>

      <td><a href="?brand=<?php echo $value->brand; ?>"><?php echo $value->brand; ?></a></td>
      <td><?php echo $value->model; ?></td>
      <td><?php echo $value->price; ?></td>
      <td><a href="?color=<?php echo $value->color; ?>"><?php echo $value->color; ?></a></td>
    </tr>
  <?php endforeach; ?>
</table>
