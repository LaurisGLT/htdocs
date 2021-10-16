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
					
								<div class="col-md-9">
									<?php
										if(isset($_POST['changePass'])){
											$new=$_POST['pwd'];
											$cnew=$_POST['cpwd'];
											if($new==$cnew){
												$new=password_hash($new, PASSWORD_DEFAULT);
												$res=change_password($new);
												if($res['bool']){
													echo _success('Slaptažodis pakeistas');
												}
											}else{
												echo _warning('Slaptažodžiai nesutampa');
											}
										}
									?>
									<form action="" method="post">
										<table class="table table-bordered">
											<tr>
												<th>Naujas slaptažodis</th>
												<td><input type="password" name="pwd" class="form-control" /></td>
											</tr>
											<tr>
												<th>Patvirtinti naują slaptažodį</th>
												<td><input type="password" name="cpwd" class="form-control" /></td>
											</tr>
											<tr>
												<td colspan="2" align="right">
													<input type="submit" name="changePass" class="btn btn-warning" value="Atnaujinti" />
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