<?php include_once 'header.php'; ?>
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Editar dados de Usuário</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<i class="fa fa-male fa-fw"></i> Editar usuário
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
				<?php if ($success):?><div class="alert alert-success"><?php echo $msg?></div>
				<?php else: if ($msg > 0):?><div class="alert alert-error"><?php echo $msg?></div><?php endif; endif;?>
					<form action="index.php?page=user&op=edit&id=<?php echo $keyP?>" method="post"
						role="form" id="register">

						<div class="form-group" id="idField">
							<label class="control-label">ID:<span id="idLabel"></span></label> <input
								value="<?php echo $id?>" type="text" name="id" id="id"
								class="form-control">
						</div>
						<div class="form-group" id="nameField">
							<label class="control-label">Nome:<span id="nameLabel"></span></label>
							<input value="<?php echo $name?>" type="text" id="name"
								name="name" class="form-control">
						</div>
						<div class="form-group" id="emailField">
							<label class="control-label">Email: <span id="emailLabel"></span></label>
							<input value="<?php echo $email?>" type="text" id="email"
								name="email" class="form-control">
						</div>
						<div class="form-group" id="birthdayField">
							<label class="control-label">Aniversário: <span
								id="birthdayLabel"></span></label> <input value="<?php echo $birthday ?>" maxlength="10"
								type="text" name="birthday" id="birthday" class="form-control">
						</div>
						<div class="form-group" id="passwordField">
							<label class="control-label">Senha:<span id="passwordLabel"></span></label>
							<input type="password" name="password" class="form-control"
								id="password">
								Por medida de segurança, não guardamos a senha, por favor, insira manualmente.
						</div>
						<input type="hidden" name="keyP" value="<?php echo $keyP?>">
						<button type="submit" id="submit" class="btn btn-default">Cadastrar</button>

					</form>
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
	</div>
<?php include_once 'footer.php';?>