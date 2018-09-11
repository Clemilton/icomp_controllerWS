<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-wrapper">

<section class="content-header">
  <h1>
    Lista de Controladores
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/admin/controladores">Controladores</a></li>
    <li class="active"><a href="/admin/controladores/create">Cadastrar</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
    <div class="col-md-12">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Novo Controlador</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" id="form" action="/admin/controladores/create" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="name">Nome</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome">
            </div>
            <div class="form-group">
              <label for="ip_address">IP</label>
              <input type="text" class="form-control" id="ip_address" name="ip_address" placeholder="Digite o IP">
            </div>
          
            <div  class="form-group">
              <label for="interface">Lugar</label>
              <select id="selPlaces" class="form-control" name="places_id" style="margin-bottom: 10px">
                <option value="0"> </option>
                <?php $counter1=-1;  if( isset($places) && ( is_array($places) || $places instanceof Traversable ) && sizeof($places) ) foreach( $places as $key1 => $value1 ){ $counter1++; ?>

                <option value="<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                <?php } ?>

              </select>
            </div>

            <div  class="form-group">
              <label for="interface">Comodo</label>
              <select id="selComodo" class="form-control" name="comodos_id" style="margin-bottom: 10px">
              </select>
            </div>


          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-success" id="bSubmit">Cadastrar</button>
          </div>
        </form>

        <script type="text/javascript">
            var selectPlace = document.getElementById('selPlaces');
          
            
            selectPlace.onclick = function(){
              $("#selComodo").html('');
              opts = selectPlace.options
              option = opts[selectPlace.selectedIndex];
              
              route = document.location.origin+"/api/getComodosPlace/"+option.value;
              //
              $.get(route,function(comodos){
                var selComodo = $('#selComodo');
                json_comodos = JSON.parse(comodos);
                for ( var i =0 ; i < json_comodos.length;i++){
                  console.log(json_comodos[i].name);
                  selComodo.append('<option value=' + json_comodos[i].id + '>' + json_comodos[i].name + '</option>');
                }
              })
              
            }
            //Verificando os campos
            document.getElementById('bSubmit').onclick = function(){
              if($('#name').val()===''){
                alert("Digite o nome ");
                return false;
              }
              if($('#ip_address').val()===''){
                alert("Digite o IP ");
                return false;
              }
              if($('#selPlaces').find(":selected").val() === '0' ){

                alert("Selecione o Lugar");
                return false;
              }
              
               
              
            };
        </script>

      </div>
    </div>
  </div>

</section>
<!-- /.content -->
</div>