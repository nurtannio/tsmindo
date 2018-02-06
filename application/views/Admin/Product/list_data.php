<?php
  $no = 1;
  foreach ($dataProduct as $product) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $product->name; ?></td>
      <td><?php echo $product->description; ?></td>
      <td><img class="profile-user-img img-responsive" src="<?php echo base_url(); ?>assets/admin/img/<?php echo $product->picture; ?>" alt="Product picture"></td>
      <td class="text-center" style="min-width:230px;">
          <button class="btn btn-warning update-dataProduct" data-id="<?php echo $product->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
          <button class="btn btn-danger konfirmasiHapus-product" data-id="<?php echo $product->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
      </td>
    </tr>
    <?php
    $no++;
  }
?>