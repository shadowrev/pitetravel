<h1>Hotels List</h1>

<table>
  <thead>
    <tr>
      <th>Hot codigo</th>
      <th>Hot nombre</th>
      <th>Hot direccion</th>
      <th>Hot telefono</th>
      <th>Hot web</th>
      <th>Hot email</th>
      <th>Hot valor noche</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($hotels as $hotel): ?>
    <tr>
      <td><a href="<?php echo url_for('hoteltest/edit?hot_codigo='.$hotel->getHotCodigo()) ?>"><?php echo $hotel->getHotCodigo() ?></a></td>
      <td><?php echo $hotel->getHotNombre() ?></td>
      <td><?php echo $hotel->getHotDireccion() ?></td>
      <td><?php echo $hotel->getHotTelefono() ?></td>
      <td><?php echo $hotel->getHotWeb() ?></td>
      <td><?php echo $hotel->getHotEmail() ?></td>
      <td><?php echo $hotel->getHotValorNoche() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('hoteltest/new') ?>">New</a>
