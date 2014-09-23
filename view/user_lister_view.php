<?php include_once 'header.php'; ?>
<script type="text/javascript">
<!--
 window.onload = function (){
	jQuery("#removeButton").on('click',function (){
		var del = confirm("Deseja realmente excluir o usuário "+jQuery(this).data('user')+"?");
		if(del){
			window.location = 'index.php?page=user&op=del&id='+jQuery(this).data('id');
		}
	});
};
//-->
</script>
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Listar usuários</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<i class="fa fa-male fa-fw"></i>Usuários Cadastrados
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
				<?php if ($success):?><div class="alert alert-success"><?php echo $msg?></div><?php endif;?>
				<?php if ($error):?><div class="alert alert-danger"><?php echo $msgErr?></div><?php endif;?>
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th>ID</th>
								<th>Nome</th>
								<th>Email</th>
								<th>Aniversário</th>
								<th>Senha</th>
								<th>Editar</th>
								<th>Remover</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($allUsers as $user):?>
							<tr>
								<td><?php echo $user->id?>
								<td><?php echo $user->name?></td>
								<td><?php echo $user->email?></td>
								<td><?php echo $user->birthday?></td>
								<td><strong>Codificada</strong></td>
								<td><a href="index.php?page=user&op=edit&id=<?php echo $user->keyP?>"><i class="fa fa-edit fa-2x" style="color: green"></a></i></td>
								<td><a href="javascript:;" id="removeButton" data-user="<?php echo $user->name?>" data-id="<?php echo $user->keyP?>"><i class="fa fa-trash fa-2x" style="color: red"></a></i></td>
							</tr>
						<?php endforeach;?>
						</tbody>
					</table>
					</div>
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
	</div>
<?php include_once 'footer.php';?>