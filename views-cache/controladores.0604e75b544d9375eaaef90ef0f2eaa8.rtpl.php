<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-wrapper">

	<section class="content-header">
		<h1>
			Lista de Controladores
		</h1>
		<ol class="breadcrumb">
			<li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active"><a href="/admin/controladores">Controladores</a></li>
		</ol>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header">
						<a href="/admin/controladores/create" class="btn btn-success"> Cadastrar Controladores</a>

						<div class="box-body no-padding">
							<table class="table table-striped">
								<thead>
									<tr>
										<th style="width: 10px">#</th>
										<th>Nome</th>
										<th>IP</th>
										<th>Lugar</th>
										<th >Comodo</th>
										<th style="width: 240px">&nbsp;</th>
									</tr>
								</thead>
								<tbody>
									<?php $counter1=-1;  if( isset($controladores) && ( is_array($controladores) || $controladores instanceof Traversable ) && sizeof($controladores) ) foreach( $controladores as $key1 => $value1 ){ $counter1++; ?>

									<tr>
										<td><?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
										<td><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
										<td><?php echo htmlspecialchars( $value1["ip_address"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
										<td><?php echo htmlspecialchars( $value1["name_lugar"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
										<td>
											<?php echo htmlspecialchars( $value1["name_comodo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>

										</td>
										<td>
											<a href="/admin/controladores/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a>
										
											<a href="/admin/controladores/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" class="btn btn-danger btn-xs" onclick="return confirm('Deseja realmente excluir esse controlador?')"><i class="fa fa-trash"></i>Excluir</a>
											

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
</div>