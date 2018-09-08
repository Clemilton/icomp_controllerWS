<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Usuários
  </h1>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Editar Usuário</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/admin/user/<?php echo htmlspecialchars( $user["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="desname">Nome</label>
              <input type="text" class="form-control" id="desname" name="desname" placeholder="Digite o nome" value="<?php echo htmlspecialchars( $user["desname"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="username">Login</label>
              <input type="text" class="form-control" id="username" name="username" placeholder="Digite o login"  value="<?php echo htmlspecialchars( $user["username"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="telefone">Telefone</label>
              <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="Digite o telefone"  value="<?php echo htmlspecialchars( $user["telefone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="email">E-mail</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Digite o e-mail" value="<?php echo htmlspecialchars( $user["email"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>

            <div id="divPlace" class="form-group">
              <button type="button" class="btn btn-basic" style="margin-bottom: 10px" 
               onclick="addPlace()">Adicionar Lugar</button>
              <select class="form-control" name="place" style="margin-bottom: 10px">
                <?php $counter1=-1;  if( isset($places) && ( is_array($places) || $places instanceof Traversable ) && sizeof($places) ) foreach( $places as $key1 => $value1 ){ $counter1++; ?>

                <option value="<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                <?php } ?>

              </select>
            </div>
            


            <script type="text/javascript">
              num=1
              function addPlace(){
                divPlace = document.getElementById("divPlace");
                
                //var array = ["<?php echo htmlspecialchars( $user["desname"], ENT_COMPAT, 'UTF-8', FALSE ); ?>","Saab","Mercades","Audi"];
                var select = document.createElement("select");
                select.classList.add("form-control");
                select.name="place"+num;
                num=num+1;
                select.style.marginBottom="10px";
                divPlace.appendChild(select);


                var initLoop = document.createTextNode('<?php $counter1=-1;  if( isset($places) && ( is_array($places) || $places instanceof Traversable ) && sizeof($places) ) foreach( $places as $key1 => $value1 ){ $counter1++; ?>');
                select.appendChild(initLoop);

                var option = document.createElement("option");
                option.text="<?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>";
                select.appendChild(option);

                var endLoop = document.createTextNode('<?php } ?>');
                select.appendChild(endLoop);
                                  
              }
            </script>

            <div class="checkbox">
              <label>
                <input type="checkbox" name="typeUser" value="1" <?php if( $user["typeUser"] ='admin' ){ ?>checked<?php } ?>> Acesso de Administrador
              </label>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
        </form>

      </div>
      <h3>Lugares</h3>
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
                <?php $counter1=-1;  if( isset($placesNotRelated) && ( is_array($placesNotRelated) || $placesNotRelated instanceof Traversable ) && sizeof($placesNotRelated) ) foreach( $placesNotRelated as $key1 => $value1 ){ $counter1++; ?>

                <tr>
                  <td><?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                  <td><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                   <td>
                      <a href="/admin/user/<?php echo htmlspecialchars( $user["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/addPlace/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-xs pull-right"><i class="fa fa-arrow-right"></i> Adicionar</a>
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
                <?php $counter1=-1;  if( isset($placesRelated) && ( is_array($placesRelated) || $placesRelated instanceof Traversable ) && sizeof($placesRelated) ) foreach( $placesRelated as $key1 => $value1 ){ $counter1++; ?>

                <tr>
                  <td><?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                  <td><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                   <td>
                      <a href="/admin/user/<?php echo htmlspecialchars( $user["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/removePlace/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-xs pull-right"><i class="fa fa-arrow-left"></i> Remover</a>
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