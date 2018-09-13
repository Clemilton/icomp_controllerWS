<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-wrapper">

<section class="content-header">
  <h1>
    Lista de Lugares
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/admin/places">Lugares</a></li>
    <li class="active"><a href="/admin/places/create">Cadastrar</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
    <div class="col-md-12">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Editar Lugar</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/admin/places/<?php echo htmlspecialchars( $place["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="name">Nome</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome" value="<?php echo htmlspecialchars( $place["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="floor">Andar</label>
              <input type="text" class="form-control" id="floor" name="floor" placeholder="Digite o andar" value="<?php echo htmlspecialchars( $place["floor"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="endereco">Endereço</label>
              <input type="tel" class="form-control" id="endereco" name="endereco" placeholder="Digite o Endereço" value="<?php echo htmlspecialchars( $place["endereco"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="bairro">Bairro</label>
              <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Digite o bairro" value="<?php echo htmlspecialchars( $place["bairro"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>

            <div class="form-group">
              <label for="nick_mqtt">Nick Mqtt</label>
              <input type="text" class="form-control" id="nick_mqtt" name="nick_mqtt" placeholder="Digite o nick" value="<?php echo htmlspecialchars( $place["nick_mqtt"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            


          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-success">Salvar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</section>
<!-- /.content -->
</div>