<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-wrapper">

	<section class="content-header">
		<h1>
			<?php echo htmlspecialchars( $place["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>

		</h1>
		<ol class="breadcrumb">
			<li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active"><a href="/admin/places">Lugares</a></li>
			<li class="active"><a href="/admin/places"><?php echo htmlspecialchars( $place["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
		</ol>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header">
						<a href="/admin/places/<?php echo htmlspecialchars( $place["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/comodos/create" class="btn btn-success"> Cadastrar Comodo</a>

						<div class="box-body no-padding">
							<table class="table table-striped">
								<thead>
									<tr>
										<th style="width: 10px">#</th>
										<th>Nome</th>
									
										<th style="width: 300px">&nbsp;</th>
									</tr>
								</thead>
								<tbody>
									<?php $i=1; ?>

									<?php $counter1=-1;  if( isset($comodos) && ( is_array($comodos) || $comodos instanceof Traversable ) && sizeof($comodos) ) foreach( $comodos as $key1 => $value1 ){ $counter1++; ?>

									<tr>
										<td><?php echo htmlspecialchars( $i, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
										<td><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
										
										<td>
											<a href="/admin/places/<?php echo htmlspecialchars( $place["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/comodos/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a>
										


											<a href="/admin/places/<?php echo htmlspecialchars( $place["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/comodos/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" class="btn btn-danger btn-xs" onclick="return confirm('Deseja realmente excluir esse usuário?')"><i class="fa fa-trash"></i>Excluir</a>
											
											<a href="/admin/places/<?php echo htmlspecialchars( $place["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/comodos/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/devices" class="btn btn-default btn-xs"><i class="fa fa-hotel"></i>Adicionar Device</a>

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