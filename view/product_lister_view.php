<?php include_once 'header.php'; ?>
<script type="text/javascript">
<!--
 window.onload = function (){
	jQuery(".removeButton").on('click',function (){
		var del = confirm("Deseja realmente excluir o produto "+jQuery(this).data('product')+"?");
		if(del){
			window.location = 'index.php?page=product&op=del&id='+jQuery(this).data('id');
		}
	});
};
//-->
</script>
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Listar produtos</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<i class="fa fa-male fa-fw"></i>Produtos Cadastrados
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
				<?php if ($success):?><div class="alert alert-success"><?php echo $msg?></div>
				<?php else: if (strlen($msg)>0):?><div class="alert alert-danger"><?php echo $msg?></div><?php endif; endif;?>
				<form action="index.php?page=product&op=search" method="post"
						role="form">
						<div class="form-group input-group">
							<input type="text" class="form-control" name="query" placeholder="Pesquisar um produto..."> <span
								class="input-group-btn">
								<button class="btn btn-default" type="submit">
									<i class="fa fa-search"></i>
								</button>
							</span>
						</div>
					</form>
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th>ID</th>
									<th>Nome</th>
									<th>Quantidade</th>
									<th>Valor</th>
									<th>Editar</th>
									<th>Remover</th>
								</tr>
							</thead>
							<tbody>
						<?php foreach ($allProducts as $product):?>
							<tr>
									<td><?php echo $product->id?>
								
									
									
									
									<td><?php echo $product->name?></td>
									<td><?php echo $product->amount?></td>
									<td>R$ <?php echo $product->value?></td>
									<td><a
										href="index.php?page=product&op=edit&id=<?php echo $product->keyP?>"><i
											class="fa fa-edit fa-2x" style="color: green"></a></i></td>
									<td><a href="javascript:;"
										data-product="<?php echo $product->name?>"
										data-id="<?php echo $product->keyP?>" class="removeButton"><i
											class="fa fa-trash fa-2x" style="color: red"></a></i></td>
								</tr>
						<?php endforeach;?>
						</tbody>
							<tfoot>
								<tr>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>Quantidade total</th>
									<th>Valor Total</th>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td><?php echo $totalAmount?></td>
									<td>R$ <?php echo $totalValue?></td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
	</div>
<?php include_once 'footer.php';?>