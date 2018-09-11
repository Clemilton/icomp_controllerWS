<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?php echo htmlspecialchars( $comodo["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>

  </h1>
</section>

<section class="content">

  <div class="row">
  	<div class="col-md-12">


      <div class="col-md-6">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Todos os Devices</h3>
          </div>
          <div class="box-body">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Nome do lugar</th>
                  <th style="width: 240px">&nbsp;</th>
                </tr>
              </thead>
              <tbody>
                <?php $counter1=-1;  if( isset($devicesNotRelated) && ( is_array($devicesNotRelated) || $devicesNotRelated instanceof Traversable ) && sizeof($devicesNotRelated) ) foreach( $devicesNotRelated as $key1 => $value1 ){ $counter1++; ?>

                <tr>
                  <td><?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                  <td><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                   <td>
                      <a href="/admin/comodos/<?php echo htmlspecialchars( $comodo["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/devices/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/addDevice" class="btn btn-primary btn-xs pull-right"><i class="fa fa-arrow-right"></i> Adicionar</a>
                    </td>
                </tr>
                <?php } ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Devices do Comodo</h3>
          </div>
          <div class="box-body">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Nome do lugar</th>
                  <th style="width: 240px">&nbsp;</th>
                </tr>
              </thead>
              <tbody>
                <?php $counter1=-1;  if( isset($devicesRelated) && ( is_array($devicesRelated) || $devicesRelated instanceof Traversable ) && sizeof($devicesRelated) ) foreach( $devicesRelated as $key1 => $value1 ){ $counter1++; ?>

                <tr>
                  <td><?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                  <td><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                   <td>
                      <a href="/admin/comodos/<?php echo htmlspecialchars( $comodo["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/devices/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/removeDevice" class="btn btn-primary btn-xs pull-right"><i class="fa fa-arrow-left"></i> Remover</a>
                    </td>
                </tr>
                <?php } ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->