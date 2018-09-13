<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-wrapper">

<section class="content-header">
  <h1>
    <?php echo htmlspecialchars( $device["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>

  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/admin/places">Lugares</a></li>
    <li class="active"><a href="/admin/comandos">Comandos</a></li>
    <li class="active"><a href="/admin/comandos">Cadastrar Comando</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
    <div class="col-md-12">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Novo Comando</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/admin/comandos/create/<?php echo htmlspecialchars( $device["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="name">Nome</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome">
            </div>

            <div class="form-group">
              <label for="name">Tipo</label>
              <select name="type" class="form-control">
              	<option value="<?php echo htmlspecialchars( $device["interface"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $device["interface"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
              </select>
            </div>

        

            <div class="form-group">
              <label for="name">Comando</label>
              <input type="text" class="form-control" id="value" name="value" placeholder="Digite o comando">
            </div>
            <?php $type=$device["interface"]; ?>

            <?php if( $type=='ircode' ){ ?>

            <div class="form-group">
              <label for="name">Protocolo</label>
              <select name="protocol" class="form-control" id="selProtocols">
              	
              </select>
            </div>
            
            <div class="form-group">
              <label for="name">Bits</label>
              <input type="number" class="form-control" id="bits" name="bits" placeholder="Digite a quantidade de bits">
            </div>

            <div class="form-group">
              <label for="tam_rawdata">Tamanho RAW DATA</label>
              <input type="number" class="form-control" id="tam_rawdata" name="tam_rawdata" placeholder="Digite o tamanho do raw data">
            </div>
            <?php } ?>



          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-success">Cadastrar</button>
          </div>
        </form>

        <script type="text/javascript">
          
          
          window.onload = function(){

            route = document.location.origin+"/api/getIrProtocols";
            $.get(route,function(protocolos){
              var sel = $('#selProtocols');
              console.log(sel);
              json_p = JSON.parse(protocolos);
              for(var i = 0 ; i < json_p.length ; i++){
                sel.append('<option value=' + json_p[i].id + '>' + json_p[i].name + '</option>');
                console.log(i)
              }
            });
          }
        </script>
      </div>
    </div>
  </div>

</section>
<!-- /.content -->
</div>