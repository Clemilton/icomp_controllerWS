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
							<label for="name">Selecione o device</label>
      				<select id="selDevice" class="form-control" name="places_id" style="margin-bottom: 10px">
        				<option value="0"> </option>
        				<?php $counter1=-1;  if( isset($devices) && ( is_array($devices) || $devices instanceof Traversable ) && sizeof($devices) ) foreach( $devices as $key1 => $value1 ){ $counter1++; ?>

        					<option value="<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
        				<?php } ?>

      				</select>
						</div>
				
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary" style="display: none" id="box">
					<div class="box-header with-border	">
						<h2 class="box-title" id="titleDevice">Ola</h2>
					</div>
					<form role="form" action="" method="post" id="form">
						<div class="box-body ">
							
							<div class="form-group">
            		<label for="name">Nome</label>
            		<input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome do comando">
          		</div>

          		<div class="form-group">
            		<label for="name">Selecione o tipo</label>
            		<select class="form-control" id="selType" name="type">
            			<option value="0"></option>
            			<option value="ircode">Infravermelho</option>
            			<option value="serial">Serial</option>
            			<option value="url">URL</option>
            		</select>
          		</div>

          		<div id="fieldsComands" style="display:none">
          			<div class="form-group">
            			<label for="name">Descrição</label>
            			<input type="text" class="form-control" id="description" name="description" placeholder="Digite a descrição do Comando">
          			</div>

          			<div class="form-group" style="" id="typeIR">
            			<label for="name">Protoloco</label>
            			<select class="form-control" id="protocol" name="protocol">
            				<option value="nec">NEC</option>
            				<option value="sony">SONY</option>
            				<option value="rc5">RC5</option>
            				<option value="rc6">RC6</option>
            				<option value="samsung">SAMSUNG</option>
            				<option value="raw">RAW</option>
            			</select>
          			</div>
          		</div>



            </div>
					</form>
							
				</div>
			</div>
		</div>

		<script type="text/javascript">
			var selDevice = document.getElementById('selDevice');
			selDevice.onclick = function(){
				$('#form')[0].reset();
				opts = selDevice.options;
        option = opts[selDevice.selectedIndex];
        
        if(option.value==0){
        	$('#box').css("display","none");
        	$('#fieldsComands').css("display","none");
        }else{
	        $('#box').css("display","");
	        $('#titleDevice').text("Comando("+option.text+")");
	        $('#form').attr('action', '/admin/comandos/create/'+option.value);
	        $('#fieldsComands').css("display","none");
      	}
			}

			var selType  = document.getElementById('selType');

			selType.onclick = function(){

				opts = selType.options;
				option = opts[selType.selectedIndex];
				if(option.value==='0'){
					$('#fieldsComands').css("display","none");
					console.log('OI');
				}else if (option.value=='ircode'){
					$('#fieldsComands').css("display","");
				}else{
					$('#fieldsComands').css("display","");
					$('#typeIR').css("display","none");
				}
				
			}




		</script>
</section>
</div>