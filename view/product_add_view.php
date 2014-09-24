<?php include_once 'header.php'; ?>
<script type="text/javascript">
<!--
var i = 0;
 window.onload = function (){
	
jQuery("button[type='submit']").click(function(){
	var result = true;
	jQuery("form#register :input").each(function(){
		var value = this.value;
		var id = jQuery(this).attr("id");
		if(value.length == 0 && id != "submit"){
			jQuery("#"+id+"Field").addClass("has-error");
			jQuery("#"+id+"Label").html("Campo obrigatório!");
			result = false;
		}  else {
			jQuery("#"+id+"Field").addClass("has-success");
			jQuery("#"+id+"Label").html("");
		}
	});
	return result;
});
};
//-->
</script>
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Cadastrar Produto</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<i class="fa fa-male fa-fw"></i> Novo produto
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
				<?php if ($success):?><div class="alert alert-success"><?php echo $msg?></div>
				<?php else: if($msg>0): ?><div class="alert alert-danger"><?php echo $msg?></div><?php endif; endif;?>
					<form action="index.php?page=product&op=add" method="post" role="form" id="register">

						<div class="form-group" id="nameField">
							<label class="control-label">Nome:<span id="nameLabel"></span></label> <input type="text" id="name" name="name"
								class="form-control">
						</div>
						<div class="form-group" id="amountField">
							<label class="control-label">Quantidade: <span id="amountLabel"></span></label> <input type="text" id="amount" name="amount"
								class="form-control">
						</div>
						<div class="form-group" id="idField">
							<label class="control-label">ID:<span id="idLabel"></span></label> <input type="text" name="id"
								value="<?php echo $lastID?>" id="id" class="form-control" >
						</div>
							
							<div class="form-group" id="valueField">
								<label class="control-label">Valor: <span id="valueLabel"></span></label> <input maxlength="10" type="text" name="value"
									id="value" class="form-control">
							</div>
							
							<button type="submit" id="submit" class="btn btn-default">Cadastrar</button>
					
					</form>
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
	</div>
<?php include_once 'footer.php';?>