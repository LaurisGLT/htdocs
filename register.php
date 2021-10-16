<?php include('common/header.php'); ?>
			
			<div class="row">
				<div class="col-md-12">
					<?php
						if(isset($_POST['addUser'])){
							$fname=$_POST['fname'];
							$user=$_POST['user'];
							$email=$_POST['email'];
							$pwd=$_POST['pwd'];
							$cpwd=$_POST['cpwd'];
							$address=$_POST['address'];
							if($pwd==$cpwd && (!empty($pwd) && !empty($user) && !empty($email))){
								// Idėti duomenis į duombazę
								$data=array();
								$data['fname']=$fname;
								$data['user']=$user;
								$data['email']=$email;
								$data['pwd'] = password_hash($pwd, PASSWORD_DEFAULT);
								$data['address']=$address;
								$result=register_user($data);
								if($result['bool']==true){
									echo _success($result['msg']);
								}else{
									echo _warning($result['msg']);
								}
							}else{
								echo _warning('Reikia užpildyti visus privalomus laukus');
							}
						}
					?>
					<div class="panel panel-success">
						<div class="panel-heading">Registracija</div>
						<div class="panel-body">
							<form action="" method="post">
							<table class="table table-bodered">
								<tr>
									<th>Vardas ir Pavardė</th>
									<td><input type="text" class="form-control" name="fname" /></td>
								</tr>
								<tr>
									<th>Slapyvardis <i class="fa fa-asterisk text-danger"></i></th>
									<td><input type="text" class="form-control" name="user" /></td>
								</tr>
								<tr>
									<th>El.paštas <i class="fa fa-asterisk text-danger"></i></th>
									<td><input type="text" class="form-control" name="email" /></td>
								</tr>
								<tr>
									<th>Slaptažodis <i class="fa fa-asterisk text-danger"></i></th>
									<td><input type="password" class="form-control" name="pwd" /></td>
								</tr>
								<tr>
									<th>Patvirtinkite slaptažodį <i class="fa fa-asterisk text-danger"></i></th>
									<td><input type="password" class="form-control" name="cpwd" /></td>
								</tr>
								<tr>
									<th>Adresas</th>
									<td><textarea class="form-control" name="address"></textarea></td>
								</tr>
								<tr>
									<td colspan="2">
										<input type="submit" name="addUser" class="btn btn-warning" value="Prisijungti prie bendruomenės" />
									</td>
								</tr>
								<tr>
									<td colspan="2">
										Jei esate mūsų narys galite <a href="login.php">Prisijungti čia</a>.
									</td>
								</tr>
							</table>
							</form>
						</div>
					</div>
				</div>
			</div>
			
<?php include('common/footer.php'); ?>