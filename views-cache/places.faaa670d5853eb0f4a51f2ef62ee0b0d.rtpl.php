<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-wrapper">

	<section class="content-header">
		<h1>
			Lista de Lugares
		</h1>
		<ol class="breadcrumb">
			<li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active"><a href="/admin/places">Lugares</a></li>
		</ol>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header">
						<a href="/admin/places/create" class="btn btn-success"> Cadastrar Lugar</a>

						<div class="box-body no-padding">
							<table class="table table-striped">
								<thead>
									<tr>
										<th style="width: 10px">#</th>
										<th>Nome</th>
										<th>Andar</th>
										<th>Endereço</th>
										<th style="width: 60px">Bairro</th>
										<th style="width: 240px">&nbsp;</th>
									</tr>
								</thead>
								<tbody>
									<?php $i=1; ?>

									<?php $counter1=-1;  if( isset($places) && ( is_array($places) || $places instanceof Traversable ) && sizeof($places) ) foreach( $places as $key1 => $value1 ){ $counter1++; ?>

									<tr>
										<td><?php echo htmlspecialchars( $i, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
										<td><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
										<td><?php echo htmlspecialchars( $value1["floor"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
										<td><?php echo htmlspecialchars( $value1["endereco"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
										<td><?php echo htmlspecialchars( $value1["bairro"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
										<td>
											<a href="/admin/places/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a>
										
											<a href="/admin/places/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" class="btn btn-danger btn-xs" onclick="return confirm('Deseja realmente excluir esse usuário?')"><i class="fa fa-trash"></i>Excluir</a>
											<a href="/admin/places/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/comodos" class="btn btn-default btn-xs"><i class="fa fa-hotel"></i>Comodos</a>

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