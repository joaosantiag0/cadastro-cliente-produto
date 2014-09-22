<?php include_once 'header.php';?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Principal</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-gear fa-fw"></i> Funcionamento do sistema
                            
                                
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        	Por favor, utilize o menu ao lado para inserir, modificar e remover usuários e produtos do sistema.
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-pie-chart fa-fw"></i> Estatísticas do sistema. 
                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <?php if($totalUsers > 0 || $totalProducts > 0):?>
                        <?php  if ($totalUsers > 0):?>
                           <i class="fa fa-group"></i> <?php echo  $totalUsers?> usuários cadastrados no sistema<br /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                           Último usuário cadastrado: <?php echo $lastUser?><br /><br />
                        <?php endif;
                        	if($totalProducts > 0):?>
                           <i class="fa fa-shopping-cart"></i> <?php echo $totalProducts?> produtos cadastrados no sistema<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                           Último produto cadastrado: <?php echo  $lastProduct?><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                           Preço total de todos os produtos: <?php echo $totalProductsValue?><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                           Quantidade total de produtos cadastrados: <?php echo  $totalProductsAmount?>
                        <?php endif;
                        	else: ?>
                        Não foi possivel carregar as estatísticas pois ainda não há nada cadastrado!
                        <?php endif; ?>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    
                   
                </div>
                <!-- /.col-lg-8 -->
             </div>
   <?php include_once 'footer.php';?>