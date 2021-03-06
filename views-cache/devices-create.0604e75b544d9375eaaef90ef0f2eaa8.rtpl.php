<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-wrapper">

<section class="content-header">
  <h1>
    Lista de Devices
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/admin/devices">Devices</a></li>
    <li class="active"><a href="/admin/devices/create">Cadastrar</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
    <div class="col-md-12">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Novo Device</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/admin/devices/create" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="name">Nome</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome">
            </div>
            <div class="form-group">
              <label for="mark">Marca</label>
              <input type="text" class="form-control" id="mark" name="mark" placeholder="Digite a marca">
            </div>
            <div class="form-group">
              <label for="model">Model</label>
              <input type="tel" class="form-control" id="model" name="model" placeholder="Digite o Modelo">
            </div>
            <div  class="form-group">
              <label for="interface">Interface</label>
              <select class="form-control" name="interface" style="margin-bottom: 10px">
                <option value="ircode">Infravermelho</option>
                <option value="serial">Serial</option>
                <option value="serial">Url</option>
              </select>
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