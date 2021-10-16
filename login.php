<?php include('common/header.php'); ?>
	
			<div class="row">
				<div class="col-md-12">
					<?php
					$con=mysqli_connect('localhost','root','','forum');
						if(isset($_POST['loginUser'])){
							$username=$_POST['username'];
							$pwd=$_POST['pwd'];
							if(empty($username) || empty($pwd)){
								echo _warning('Užpildykite privalomus laukus!');
							}else{
								$data=array();
								$data['username']=$username;
								$data['pwd']=$pwd;
								$result=user_login($data);
								if($result['bool']==true){
									$_SESSION['userData']=$result['allData'];
									header("location:index.php");
								}else{
									echo _warning($result['msg']);
								}
							}
						}
					?>
					<div class="panel panel-success">
						<div class="panel-heading">Prisijungimas</div>
						<div class="panel-body">
							<form method="post" action="">
							<table class="table table-bodered">
								<tr>
									<th>Slapyvardis <i class="fa fa-asterisk text-danger"></i></th>
									<td><input type="text" name="username" class="form-control" /></td>
								</tr>
								<tr>
									<th>Slaptažodis <i class="fa fa-asterisk text-danger"></i></th>
									<td><input type="password" name="pwd" class="form-control" /></td>
								</tr>
								<tr>
									<td colspan="2">
										<input type="submit" name="loginUser" class="btn btn-warning" value="Prisijungti" />
									</td>
								</tr>
								<tr>
									<td colspan="2">
										Jei esate naujas vartotojas galite <a href="register.php">užsiregistruoti čia</a>.
									</td>
								</tr>
							</table>
							</form>
						</div>
					</div>
				</div>
			</div>
		
<?php include('common/footer.php'); ?>