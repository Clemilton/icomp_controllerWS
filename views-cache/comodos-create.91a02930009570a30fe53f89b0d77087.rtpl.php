<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-wrapper">

<section class="content-header">
  <h1>
    <?php echo htmlspecialchars( $place["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>

  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/admin/places">Lugares</a></li>
    <li class="active"><a href="/admin/places/<?php echo htmlspecialchars( $place["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/comodos"><?php echo htmlspecialchars( $place["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
    <li class="active"><a href="/admin/places/<?php echo htmlspecialchars( $place["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/comodos/create">Cadastrar</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
    <div class="col-md-12">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Novo Comodo</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/admin/places/<?php echo htmlspecialchars( $place["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/comodos/create" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="name">Nome</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome">
            </div>
            <div class="form-group">
              <label for="nick_mqtt">Nick Mqtt</label>
              <input type="text" class="form-control" id="nick_mqtt" name="nick_mqtt" placeholder="Digite o nick">
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-success">Cadastrar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</section>
<!-- /.content -->
</div>