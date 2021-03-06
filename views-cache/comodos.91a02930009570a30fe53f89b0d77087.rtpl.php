<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-wrapper">

	<section class="content-header">
		<h1>
			Comandos
		</h1>
		<ol class="breadcrumb">
			<li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active"><a href="/admin/devices">Devices</a></li>
		</ol>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header">
						<div class="box-body no-padding">
							<label for="name">Selecione o lugar</label>
      				<select id="selPlaces" class="form-control" name="places_id" style="margin-bottom: 10px">
        				<option value="0"> </option>
        				<?php $counter1=-1;  if( isset($places) && ( is_array($places) || $places instanceof Traversable ) && sizeof($places) ) foreach( $places as $key1 => $value1 ){ $counter1++; ?>

        					<option value="<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" ><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
        				<?php } ?>

      				</select>
						</div>
				
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header">
						<a href="#" class="btn btn-success" id="btnCreate"> Cadastrar Comodo</a>

						<div class="box-body no-padding">
							<table class="table table-striped">
								<thead>
									<tr>
										<th style="width: 10px">#</th>
										<th>Comodo</th>
										<th>Nick mqtt</th>
										<th style="width: 300px">&nbsp;</th>
									</tr>
								</thead>
								<tbody id="bodyTable">
									
								</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>




	<script type="text/javascript">
		var selPlaces = document.getElementById('selPlaces');
		selPlaces.onclick = function(){
			option = selPlaces.options[selPlaces.selectedIndex];
			if(option.value==0){
				$('#btnCreate').attr('href','#');
			}else{
				$('#btnCreate').attr('href','/admin/comodos/create/'+option.value);
			}
			route = document.location.origin+"/api/getComodosPlace/"+option.value;
			$.get(route,function(comodos){
				$('#bodyTable').html('');
      	json_comodos = JSON.parse(comodos);
      	console.log(json_comodos);
    		for (var i = 0 ; i< json_comodos.length ; i++){
    			var j =  i+1;
    			$("#bodyTable").append( "<tr id=tr"+json_comodos[i].id+"></tr>");
    			$("#tr"+json_comodos[i].id).append("<td>"+j+"</td>");
    			$("#tr"+json_comodos[i].id).append("<td>"+json_comodos[i].name+"</td>");
    			$("#tr"+json_comodos[i].id).append("<td>"+json_comodos[i].nick_mqtt+"</td>");
    			var x = $("<td></td>");
      		var editar = $("<a class='btn btn-primary btn-xs' > <i class='fa fa-edit'></i> Editar</a>");
      		var remover = $("<a class='btn btn-danger btn-xs' > <i class='fa fa-trash'></i>Remover</a>");
      		var devices = $("<a class='btn btn-default btn-xs' > <i class='fa fa-tv'></i>Adicionar Devices</a>"); 
      		editar.css("margin",1);
      		remover.css("margin",1);
      		devices.css("margin",1);
      		remover.click(function(){
      			return confirm('Deseja excluir esse comando?');
      		});
      		editar.attr("href", "/admin/comodos/"+json_comodos[i].id+"/place/"+json_comodos[i].id_places);
      		remover.attr("href", "/admin/comodos/delete/"+json_comodos[i].id);
      		devices.attr("href","/admin/comodos/"+json_comodos[i].id+"/devices");
      		x.append(editar);
      		x.append(remover);
      		x.append(devices);
      		$("#tr"+json_comodos[i].id).append(x);
        }
			});
		}
	</script>
</section>
</div>