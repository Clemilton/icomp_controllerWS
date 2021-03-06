<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-wrapper">

<section class="content-header">
  <h1>
    <?php echo htmlspecialchars( $comando["name_device"], ENT_COMPAT, 'UTF-8', FALSE ); ?>

  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/admin/places">Lugares</a></li>
    <li class="active"><a href="/admin/comandos">Comandos</a></li>
    <li class="active"><a href="/admin/comandos">Atualizar Comando</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
    <div class="col-md-12">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Editar Comando</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/admin/comandos/<?php echo htmlspecialchars( $comando["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/update" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="name">Nome</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome" value="<?php echo htmlspecialchars( $comando["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>

            <div class="form-group">
              <label for="name">Tipo</label>
              <select name="type" class="form-control">
              	<option value="<?php echo htmlspecialchars( $comando["type"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $comando["type"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
              </select>
            </div>

            <div class="form-group">
              <label for="name">Device</label>
              <select name="devices_id" class="form-control">
              	<option value="<?php echo htmlspecialchars( $comando["devices_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $comando["name_device"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
              </select>
            </div>

            <div class="form-group">
              <label for="name">Comando IR</label>
              <input type="text" class="form-control" id="value" name="value" placeholder="Digite o comando IR" value="<?php echo htmlspecialchars( $comando["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>

            <div class="form-group">
              <label for="name">Protocolo</label>
              <select name="protocol" class="form-control">
              	<option value="nec">NEC</option>
              	<option value="sony">SONY</option>
              	<option value="rc5">rc5</option>
              	<option value="rc6">rc6</option>
              	<option value="samsung">SAMSUNG</option>
              	<option value="raw">RAW DATA</option>
              </select>
            </div>

            <div class="form-group">
              <label for="name">Bits</label>
              <input type="number" class="form-control" id="bits" name="bits" placeholder="Digite a quantidade de bits" value="<?php echo htmlspecialchars( $comando["bits"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>



          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-success">Atualizar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</section>
<!-- /.content -->
</div>