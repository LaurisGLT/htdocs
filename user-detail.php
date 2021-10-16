<?php include('common/header.php'); ?>
<?php
	$id=(int)$_GET['userid'];
	$result=get_user_by_id($id);
	
?>
<div class="row">
	<div class="col-md-12">
		<ul class="breadcrumb">
			<li><a href="index.php">Pagrindinis</a></li>
			<li class="active"><?php echo $result['allData']['fname']; ?></li>
		</ul>
	</div>
</div>
		
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-success">
						<div class="panel-heading"><?php echo $result['allData']['fname']; ?></div>
						<div class="panel-body thread-container">
							<table class="table table-bordered">
								<tr>
									<th>Slapyvardis</th>
									<td><?php echo $result['allData']['username']; ?></td>
								</tr>
								<tr>
									<th>El.paštas</th>
									<td><?php echo $result['allData']['email']; ?></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		
<?php include('common/footer.php'); ?>