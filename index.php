<?php include('common/header.php'); ?>
<?php
	$result=get_topics();
?>
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-success">
						<div class="panel-heading">Skiltys <span class="badge"><?php echo $result['totalResult']; ?></span></div>
						<div class="panel-body">
							<table class="table table-bordered table-striped">
								<tr>
									<th>Skiltys</th>
									<th>Temos</th>
								</tr>
								<?php
									if($result['totalResult']>0){
										foreach($result['allData'] as $data){
											$threads=count_total_threads($data['topic_id']);
											
								?>
								<tr>
									<td><a href="threads.php?topicid=<?php echo $data['topic_id']; ?>&title=<?php echo $data['title']; ?>"><?php echo $data['title']; ?></a></td>
									<td><a href="threads.php?topicid=<?php echo $data['topic_id']; ?>&title=<?php echo $data['title']; ?>"><?php echo $threads['total']; ?></a></td>
								</tr>
							<?php } }else{ ?>
							<tr>
								<td colspan="2"><?php echo _warning('Nerasta įrašų'); ?></td>
							</tr>
							<?php } ?>
							</table>
						</div>
					</div>
				</div>
			</div>
		
<?php include('common/footer.php'); ?>