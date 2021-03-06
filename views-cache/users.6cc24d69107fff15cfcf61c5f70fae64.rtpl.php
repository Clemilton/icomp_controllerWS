<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-wrapper">

	<section class="content-header">
		<h1>
			Lista de Usuários
		</h1>
		<ol class="breadcrumb">
			<li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active"><a href="/admin/users">Usuários</a></li>
		</ol>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header">
						<a href="/admin/users/create" class="btn btn-success"> Cadastrar Usuário</a>

						<div class="box-body no-padding">
							<table class="table table-striped">
								<thead>
									<tr>
										<th style="width: 10px">#</th>
										<th>Nome</th>
										<th>E-mail</th>
										<th>Login</th>
										<th style="width: 60px">Admin</th>
										<th style="width: 240px">&nbsp;</th>
									</tr>
								</thead>
								<tbody>
									<?php $i=1; ?>

									<?php $counter1=-1;  if( isset($users) && ( is_array($users) || $users instanceof Traversable ) && sizeof($users) ) foreach( $users as $key1 => $value1 ){ $counter1++; ?>

									<tr>
										<td><?php echo htmlspecialchars( $i, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
										<td><?php echo htmlspecialchars( $value1["desname"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
										<td><?php echo htmlspecialchars( $value1["email"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
										<td><?php echo htmlspecialchars( $value1["username"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
										<td><?php if( $value1["typeUser"]=='admin' ){ ?>Sim<?php }else{ ?>Não<?php } ?></td>
										<td>
											<a href="/admin/user/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a>
											<a href="/admin/user/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/password" class="btn btn-default btn-xs"><i class="fa fa-unlock"></i>Alterar a senha</a>
											<a href="/admin/user/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" class="btn btn-danger btn-xs" onclick="return confirm('Deseja realmente excluir esse usuário?')"><i class="fa fa-trash"></i>Excluir</a>
											<a href="/admin/user/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/addPlaces" class="btn btn-default btn-xs"><i class="fa fa-home"></i>Adicionar Lugares</a>

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
</div>