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
          <h3 class="box-title">Novo Lugar</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/admin/places/create" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="name">Nome</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome">
            </div>
            <div class="form-group">
              <label for="floor">Andar</label>
              <input type="text" class="form-control" id="floor" name="floor" placeholder="Digite o andar">
            </div>
            <div class="form-group">
              <label for="endereco">Endereço</label>
              <input type="tel" class="form-control" id="endereco" name="endereco" placeholder="Digite o Endereço">
            </div>
            <div class="form-group">
              <label for="bairro">Bairro</label>
              <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Digite o bairro">
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