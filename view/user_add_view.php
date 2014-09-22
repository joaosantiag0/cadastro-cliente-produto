<?php include_once 'header.php'; ?>
<script type="text/javascript">
<!--
 window.onload = function (){
jQuery("#birthday").keypress(function (e){
	if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
		return false;
    }
	jQuery("#birthday").keyup(function (e){
	var value = this.value.length;
	if(value == 2 || value == 5) jQuery(this).val(this.value+"/");
	
});
});

jQuery("#email").keypress(function(){
	var testeEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
	if(!testeEmail.test(this.value)){
		jQuery("#emailField").addClass("has-error");
		jQuery("#emailLabel").html("Campo obrigatório!");
	} else {
		jQuery("#emailField").removeClass("has-error").addClass("has-success");
		jQuery("#emailLabel").html(" ");
	}
});	
jQuery("button[type='submit']").click(function(){
	var result = true;
	jQuery("form#register :input").each(function(){
		result = true;
		var value = this.value;
		var id = jQuery(this).attr("id");
		if(value.length == 0 && id != "submit"){
			jQuery("#"+id+"Field").addClass("has-error");
			jQuery("#"+id+"Label").html("Campo obrigatório!");
			result = false;
		} else {
			result =  true;
		}
	});
	console.log(result);
	return result;
});
};
//-->
</script>
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Cadastrar usuário</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<i class="fa fa-male fa-fw"></i> Novo usuário
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
				<?php if ($success):?><div class="alert alert-success"><?php echo $msg?></div><?php endif;?>
				<?php if ($error):?><div class="alert alert-error"><?php echo $msgErr?></div><?php endif;?>
					<form action="index.php?page=user&op=add" method="post" role="form" id="register">

						<div class="form-group" id="nameField">
							<label class="control-label">Nome:<span id="nameLabel"></span></label> <input type="text" id="name" name="name"
								class="form-control">
						</div>
						<div class="form-group" id="emailField">
							<label class="control-label">Email: <span id="emailLabel"></span></label> <input type="text" id="email" name="email"
								class="form-control">
						</div>
						<div class="form-group" id="idField">
							<label class="control-label">ID:<span id="idLabel"></label> <input type="text" name="id"
								value="<?php echo $lastID?>" id="id" class="form-control" >
						</div>
							
							<div class="form-group" id="birthdayField">
								<label class="control-label">Aniversário: <span id="birthdayLabel"></span></label> <input maxlength="10" type="text" name="birthday"
									id="birthday" class="form-control">
							</div>
							<div class="form-group" id="passwordField">
								<label class="control-label">Senha:<span id="passwordLabel"></span></label> <input type="password" name="password"
									class="form-control" id="password">
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