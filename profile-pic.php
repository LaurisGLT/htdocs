<?php include('common/header.php'); ?>
			
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-success">
						<div class="panel-heading">Mano Profilis</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-3">
									<?php include('user-left-side.php'); ?>
								</div>
								<!-- nuotraukos pridėjimas -->
								<div class="col-md-9">
									<?php
										if(isset($_POST['changePic'])){
											$img=$_FILES['img']['name'];
											$tmpImg=$_FILES['img']['tmp_name'];
											if(move_uploaded_file($tmpImg,'uploads/'.$img)){
												$res=change_profile_pic($_SESSION['userData']['user_id'],$img);
												if($res['bool']==true){
													echo _success($res['msg']);
												}else{
													echo _warning($res['msg']);
												}
											}else{
												echo _warning('Nuotrauka nepakeista!');
											}
										}
										$profilePic=get_user_profile_pic($_SESSION['userData']['user_id']);
							
									?>
									<form action="" method="post" enctype="multipart/form-data">
										<table class="table table-bordered">
											<tr>
												<th>Nuotrauka</th>
												<td>
													<input type="file" name="img" />
													<p><img width="70" src="uploads/<?php echo $profilePic['allData']['img']; ?>" /></p>
													<input type="hidden" name="img" value="<?php echo $profilePic['allData']['img']; ?>" />
												</td>
											</tr>
											<tr>
												<td colspan="2" align="right">
													<input type="submit" name="changePic" class="btn btn-warning" value="Atnaujinti	" />
												</td>
											</tr>
										</table>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	
<?php include('common/footer.php'); ?>