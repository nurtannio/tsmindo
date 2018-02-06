<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data product</h3>

  <form id="form-update-product" method="POST">
    <input type="hidden" name="id" value="<?php echo $dataProduct->id; ?>">
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="Nama Product" name="name" aria-describedby="sizing-addon2" value="<?php echo $dataProduct->name; ?>">
      <input type="text" class="form-control" placeholder="Nama Product" name="description" aria-describedby="sizing-addon2" value="<?php echo $dataProduct->description; ?>">
      <input type="file" class="form-control" name="picture" aria-describedby="sizing-addon2">
    </div>
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
      </div>
    </div>
  </form>
</div>