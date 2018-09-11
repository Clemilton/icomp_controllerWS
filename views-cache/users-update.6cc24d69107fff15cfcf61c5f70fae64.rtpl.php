<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Editar Usuário
  </h1>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-primary">
        
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
      
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->