<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lugares
  </h1>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
      

      <div class="col-md-6">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Todos os Lugares</h3>
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
                <?php $i=1; ?>

                <?php $counter1=-1;  if( isset($placesNotRelated) && ( is_array($placesNotRelated) || $placesNotRelated instanceof Traversable ) && sizeof($placesNotRelated) ) foreach( $placesNotRelated as $key1 => $value1 ){ $counter1++; ?>

                <tr>

                  <td><?php echo htmlspecialchars( $i, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                  <td><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                   <td>
                      <a href="/admin/user/<?php echo htmlspecialchars( $user["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/addPlace/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-xs pull-right"><i class="fa fa-arrow-right"></i> Adicionar</a>
                    </td>
                </tr>
                <?php $i=$i+1; ?>

                <?php } ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Lugares do usuario <?php echo htmlspecialchars( $user["desname"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
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
                <?php $i=1; ?>

                <?php $counter1=-1;  if( isset($placesRelated) && ( is_array($placesRelated) || $placesRelated instanceof Traversable ) && sizeof($placesRelated) ) foreach( $placesRelated as $key1 => $value1 ){ $counter1++; ?>

                <tr>
                  <td><?php echo htmlspecialchars( $i, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                  <td><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                   <td>
                      <a href="/admin/user/<?php echo htmlspecialchars( $user["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/removePlace/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-xs pull-right"><i class="fa fa-arrow-left"></i> Remover</a>
                    </td>
                </tr>
                <?php $i=$i+1; ?>

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