<?php
	// DB con
session_start();
$con=mysqli_connect('localhost','root','','forum');

// error_reporting(0);

// Debug
function _t($data){
	echo '<pre>';
	print_r($data);
	echo '</pre>';
}

// Įspėjimų žinučių formatai
function _warning($str){
	echo '<p class="alert alert-warning">'.$str.'</p>';
}

function _success($str){
	echo '<p class="alert alert-success">'.$str.'</p>';
}

function _error($str){
	echo '<p class="alert alert-danger">'.$str.'</p>';
}

// Path
function get_path(){
	$res=array();
	$res['siteUrl']='http://localhost';
	return $res;
}
$path=get_path();


/* =========== Skiltys List =========== */
function get_topics(){
	$res=array();
	global $con;
	$query=mysqli_query($con,"SELECT * FROM topics");
	if(mysqli_num_rows($query)>0){
		$res['totalResult']=mysqli_num_rows($query);
		while($data=mysqli_fetch_assoc($query)){
			$res['allData'][]=$data;
		}
	}else{
		$res['totalResult']=mysqli_num_rows($query);
	}
	return $res;
}

// Visos temos
function get_threads(){
	$res=array();
	global $con;
	$query=mysqli_query($con,"SELECT * FROM threads");
	if(mysqli_num_rows($query)>0){
		$res['totalResult']=mysqli_num_rows($query);
		while($data=mysqli_fetch_assoc($query)){
			$res['allData'][]=$data;
		}
	}else{
		$res['totalResult']=mysqli_num_rows($query);
	}
	return $res;
}

// Visos potemės
function get_posts(){
	$res=array();
	global $con;
	$query=mysqli_query($con,"SELECT * FROM posts");
	if(mysqli_num_rows($query)>0){
		$res['totalResult']=mysqli_num_rows($query);
		while($data=mysqli_fetch_assoc($query)){
			$res['allData'][]=$data;
		}
	}else{
		$res['totalResult']=mysqli_num_rows($query);
	}
	return $res;
}

// **
// Forumo funkcijos
// **

// Skilčių skaičiavimas
function count_total_topics(){
	global $con;
	$query=mysqli_query($con,"SELECT COUNT(*) as total FROM posts");
	$res=mysqli_fetch_assoc($query);
	return $res;
}

// Temų skaičiavimas
function count_totalthreads(){
	global $con;
	$query=mysqli_query($con,"SELECT COUNT(*) as total FROM threads");
	$res=mysqli_fetch_assoc($query);
	return $res;
}

// Potemių skaičiavimas
function count_totalposts(){
	global $con;
	$query=mysqli_query($con,"SELECT COUNT(*) as total FROM posts");
	$res=mysqli_fetch_assoc($query);
	return $res;
}


// Skaičiuoti temas of specifiškai skilčiai
function count_total_threads($id){
	global $con;
	$query=mysqli_query($con,"SELECT COUNT(*) as total FROM threads WHERE topic_id=$id");
	$res=mysqli_fetch_assoc($query);
	return $res;
}

// Skaičiuoti potemes of specifiškai temai
function count_total_posts($id){
	global $con;
	$query=mysqli_query($con,"SELECT COUNT(*) as total FROM posts WHERE thread_id=$id");
	$res=mysqli_fetch_assoc($query);
	return $res;
}

// Skaičiuoti atsakymus temai
function count_total_replies($id){
	global $con;
	$query=mysqli_query($con,"SELECT COUNT(*) as total FROM replies WHERE post_id=$id");
	$res=mysqli_fetch_assoc($query);
	return $res;
}

// Visos skilties temos
function get_thread_by_topic($id){
	$res=array();
	global $con;
	$query=mysqli_query($con,"SELECT * FROM threads WHERE topic_id='$id' ORDER BY thread_id DESC");
	if(mysqli_num_rows($query)>0){
		$res['totalResult']=mysqli_num_rows($query);
		while($data=mysqli_fetch_assoc($query)){
			$res['allData'][]=$data;
		}
	}else{
		$res['totalResult']=mysqli_num_rows($query);
	}
	return $res;
}
// Tema pagal id
function get_thread_by_id($id){
	$res=array();
	global $con;
	$query=mysqli_query($con,"SELECT * FROM threads WHERE thread_id='$id'");
	if(mysqli_num_rows($query)>0){
		$res['totalResult']=mysqli_num_rows($query);
		$data=mysqli_fetch_assoc($query);
		$res['allData']=$data;
	}else{
		$res['totalResult']=mysqli_num_rows($query);
	}
	return $res;
}

// Skiltis pagal id
function get_topic_by_id($id){
	$res=array();
	global $con;
	$query=mysqli_query($con,"SELECT * FROM topics WHERE topic_id='$id' ORDER BY topic_id DESC");
	if(mysqli_num_rows($query)>0){
		$res['totalResult']=mysqli_num_rows($query);
		$data=mysqli_fetch_assoc($query);
		$res['allData']=$data;
	}else{
		$res['totalResult']=mysqli_num_rows($query);
	}
	return $res;
}

// Visos temos potemės
function get_posts_by_thread($id){
	$res=array();
	global $con;
	$query=mysqli_query($con,"SELECT * FROM posts WHERE thread_id='$id' ORDER BY post_id DESC");
	if(mysqli_num_rows($query)>0){
		$res['totalResult']=mysqli_num_rows($query);
		while($data=mysqli_fetch_assoc($query)){
			$res['allData'][]=$data;
		}
	}else{
		$res['totalResult']=mysqli_num_rows($query);
	}
	return $res;
}

// Visi vartotojo postai
function get_posts_by_user($id){
	$res=array();
	global $con;
	$query=mysqli_query($con,"SELECT * FROM posts WHERE added_by='$id' ORDER BY post_id DESC");
	if(mysqli_num_rows($query)>0){
		$res['totalResult']=mysqli_num_rows($query);
		while($data=mysqli_fetch_assoc($query)){
			$res['allData'][]=$data;
		}
	}else{
		$res['totalResult']=mysqli_num_rows($query);
	}
	return $res;
}

// Atsakymai specifiskai potemei
function get_replies_by_post($id){
	$res=array();
	global $con;
	$query=mysqli_query($con,"SELECT * FROM replies WHERE post_id='$id' ORDER BY reply_id DESC");
	if(mysqli_num_rows($query)>0){
		$res['totalResult']=mysqli_num_rows($query);
		while($data=mysqli_fetch_assoc($query)){
			$res['allData'][]=$data;
		}
	}else{
		$res['totalResult']=mysqli_num_rows($query);
	}
	return $res;
}


// Registracija
function register_user($data){
	$res=array();
	global $con;
	//Patikra
	$checkUser=mysqli_query($con,"SELECT username FROM users WHERE username='".$data['user']."'");
	if(mysqli_num_rows($checkUser)>0){
		$res['bool']=false;
		$res['msg']='Toks slapyvardis naudojamas';
	}else{
		$query=mysqli_query($con,"INSERT INTO users SET fname='".$data['fname']."',username='".$data['user']."',email='".$data['email']."',pwd='".$data['pwd']."',address='".$data['address']."'");
		if(mysqli_affected_rows($con)>0){
			$res['bool']=true;
			$res['msg']='Sveikiname prisijungus';
		}else{
			$res['bool']=false;
			$res['msg']=mysqli_error($con);
		}
	}
	return $res;
}

// Atnaujinti vartotojo informaciją
function update_user($userid,$data){
	$res=array();
	global $con;
	$query=mysqli_query($con,"UPDATE users SET fname='".$data['fname']."',username='".$data['user']."',email='".$data['email']."',address='".$data['address']."' WHERE user_id='$userid'");
	if(mysqli_affected_rows($con)>0){
		$res['bool']=true;
		$res['msg']='Pavyko';
	}else{
		$res['bool']=false;
		$res['msg']='Nepavyko';
	}
	return $res;
}

function change_profile_pic($id,$img){
	$res=array();
	global $con;
	$query=mysqli_query($con,"UPDATE users SET img='$img' WHERE user_id='$id'");
	if(mysqli_affected_rows($con)>0){
		$res['bool']=true;
		$res['msg']='Nuotrauka pakeista';
	}else{
		$res['bool']=false;
		$res['msg']=mysqli_error($con);
		// $res['msg']=mysqli_error($con);
	}
	return $res;
}

// Nuotrauka pagal ID
function get_user_profile_pic($id){
	$res=array();
	global $con;
	$query=mysqli_query($con,"SELECT img FROM users WHERE user_id='$id'");
	if(mysqli_num_rows($query)>0){
		$res['bool']=true;
		$res['allData']=mysqli_fetch_assoc($query);
	}else{
		$res['bool']=false;
		$res['msg']='Nėra profilio nuotraukos';
	}
	return $res;
}

// Prisijungimas

function uidExists($data){
	
	$res=array();
	global $con;
	$username = $data['username'];

	$sql = "SELECT * FROM users WHERE username = ?;";
	$stmt = mysqli_stmt_init($con);
	if(!mysqli_stmt_prepare($stmt, $sql)){
		$res['bool']=false;
		$res['msg']='Stmt failed';
		return $res;
	}

	mysqli_stmt_bind_param($stmt, "s", $username);
	mysqli_stmt_execute($stmt);

	$resultData = mysqli_stmt_get_result($stmt);

	if($row = mysqli_fetch_assoc($resultData)){

			return $row;

	}else{
		$res['bool']=false;
		$res['msg']='Stmt failed';
	}
}

function user_login($data){

	$res=array();
	global $con;

	$uidExists = uidExists($data);

	if($uidExists === false){
		$res['bool']=false;
		$res['msg']='Klaidingas Slapyvardis/Slaptažodis';
		return $res;
	}
		$pwdHashed = $uidExists["pwd"];
		$checkPwd = password_verify($data['pwd'], $pwdHashed);

		if($checkPwd === false){
			$res['bool']=false;
		$res['msg']='Klaidingas Slapyvardis/Slaptažodis';		
		}else{
			$query=mysqli_query($con,"SELECT * FROM users WHERE username='".$data['username']."'");
			$res['bool']=true;
		$res['allData']=mysqli_fetch_assoc($query);
		return $res;
		}
	
}

// Keisti slaptažodį
function change_password($new){
	global $con;
	$query=mysqli_query($con,"UPDATE users SET pwd='$new' WHERE user_id='".$_SESSION['userData']['user_id']."'");
	if(mysqli_affected_rows($con)>0){
		$res['bool']=true;
	}else{
		$res['bool']=false;
	}
	return $res;
}

// Vartotojas pagal ID
function get_user_by_id($id){
	$res=array();
	global $con;
	$query=mysqli_query($con,"SELECT * FROM users WHERE user_id='$id'");
	if(mysqli_num_rows($query)>0){
		$res['bool']=true;
		$res['allData']=mysqli_fetch_assoc($query);
	}else{
		$res['bool']=false;
		$res['msg']=mysqli_error($con);
	}
	return $res;
}

// Visos Vartotojo temos
function get_threads_by_user($userid){
	global $con;
	$res=array();
	$query=mysqli_query($con,"SELECT * FROM threads WHERE added_by='$userid'");
	if(mysqli_num_rows($query)>0){
		$res['bool']=true;
		while($data=mysqli_fetch_assoc($query)){
			$res['allData'][]=$data;
		}
	}else{
		$res['bool']=false;
	}
	return $res;
}

// Pridėti temą
function add_thread($id,$data){
	$res=array();
	global $con;
	$query=mysqli_query($con,"INSERT INTO threads SET topic_id='".$data['id']."',title='".$data['title']."',description='".$data['description']."',added_by='".$data['added_by']."'");
	if(mysqli_affected_rows($con)>0){
		$res['bool']=true;
		$res['msg']='Paskelbta!';
	}else{
		$res['bool']=false;
		$res['msg']=mysqli_error($con);
	}
	return $res;
}

// Pridėti potemę
function add_post($id,$data){
	$res=array();
	global $con;
	$query=mysqli_query($con,"INSERT INTO posts SET thread_id='".$data['id']."',title='".$data['title']."',description='".$data['description']."',added_by='".$data['added_by']."'");
	if(mysqli_affected_rows($con)>0){
		$res['bool']=true;
		$res['msg']='Paskelbta';
	}else{
		$res['bool']=false;
		$res['msg']=mysqli_error($con);
	}
	return $res;
}

// Pridėti komentarą
function add_reply($id,$data){
	$res=array();
	global $con;
	$query=mysqli_query($con,"INSERT INTO replies SET post_id='".$data['id']."',title='".$data['title']."',description='".$data['description']."',added_by='".$data['added_by']."'");
	if(mysqli_affected_rows($con)>0){
		$res['bool']=true;
		$res['msg']='Paskelbta';
	}else{
		$res['bool']=false;
		$res['msg']=mysqli_error($con);
	}
	return $res;
}

// Atnaujinti temos view
function update_thread_view($id){
	global $con;
	mysqli_query($con,"UPDATE threads set views=views+1 WHERE thread_id='$id'");
}

// Temos peržiūros
function count_total_thread_views($id){
	global $con;
	$query=mysqli_query($con,"SELECT views FROM threads WHERE thread_id=$id");
	$res=mysqli_fetch_assoc($query);
	return $res;
}

// Atnaujinti potemės view
function update_post_view($id){
	global $con;
	mysqli_query($con,"UPDATE posts SET views=views+1 WHERE post_id='$id'");
}

// Potemių peržiūros
function count_total_post_views($id){
	global $con;
	$query=mysqli_query($con,"SELECT views FROM posts WHERE post_id='$id'");
	$res=mysqli_fetch_assoc($query);
	return $res;
}


?>