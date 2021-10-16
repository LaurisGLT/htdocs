<?php include('common/header.php'); ?>
<?php
	$result=get_threads_by_user($_SESSION['userData']['user_id']);
?>
			
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-success">
						<div class="panel-heading">Mano Profilis</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-3">
									<?php include('user-left-side.php'); ?>
								</div>
								<!-- Vartotojo temos -->
								<div class="col-md-9">
									<table class="table table-bordered table-striped">
										<tr class="warning">
											<th>Skiltis</th>
											<th>Tema</th>
											<th>Paskelbta</th>
										</tr>
										<?php
										if($result['bool']==true){
											foreach($result['allData'] as $data){
												$topicDetail=get_topic_by_id($data['topic_id']);
												
											?>
											<tr>
												<td><?php echo $topicDetail['allData']['title']; ?></td>
												<td><?php echo $data['title']; ?></td>
												<td><?php echo $data['add_time']; ?></td>
											</tr>
											<?php
										}
										}else{
											?>
											<tr>
												<td colspan="3">Nerasta įrašų!</td>
											</tr>
											<?php
										}
										?>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		
<?php include('common/footer.php'); ?>