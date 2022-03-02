<?php
// -------------------------------------------------------------------- CONNECT TO DATABASE --------------------------
include ("database-connect.php");

// ------------------------------------------------------------------------ GLOBAL FUNCTION ------------------------------------
//xoa dau tieng viet
function vi_no_sign($string){
       $unicode = array(
	   		'-'=>' ',
           'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
           'd'=>'đ',
           'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
           'i'=>'í|ì|ỉ|ĩ|ị',
           'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
           'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
           'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
           'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
           'D'=>'Đ',
           'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
           'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
           'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
           'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
           'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
       );
      foreach($unicode as $nonUnicode=>$uni){
          $string = preg_replace("/($uni)/i", $nonUnicode, $string);
      }
       return $string;
}

//get IP address
function getIP(){
$ip = $_SERVER['REMOTE_ADDR'];
	//lay IP neu user truy cap qua Proxy
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
return $ip;
}

// Hàm xóa
function delete_content($table, $id){
    global $conn;
    connect_db();
    switch($table) {
		case 'watashinodesu':
			$query = mysqli_query($conn, "DELETE FROM `watashinodesu` WHERE watashinodesu.id_desu = $id");
			break;
		case 'child_lab':
			$query = mysqli_query($conn, "DELETE FROM `child_lab` WHERE child_lab.id = $id");
			break;
		case 'guest':
			$query = mysqli_query($conn, "DELETE FROM `guest` WHERE guest.g_level = $id");
			break;
		case 'mess':
			$query = mysqli_query($conn, "DELETE FROM `message` WHERE message.id = $id");
			break;
		case 'project':
			$query = mysqli_query($conn, "DELETE FROM `project` WHERE project.project_id = $id");
			break;
		case 'lab':
			$query = mysqli_query($conn, "DELETE FROM `post` WHERE post.post_id = $id AND post.type='lab'");
			break;
		case 'blog':
			$query = mysqli_query($conn, "DELETE FROM `post` WHERE post.post_id = $id AND post.type='blog'");
			break;
		default:
			echo "Wrong input! This {$table} is not exist!";
	}
    
    if ($query) { header("location:Headquater-Of-Big-Boss"); exit;} 
	else echo "Something wrong! Cannot delete this!";
}

//get blog, lab, work, view
function get_content($table,$quantity){
	global $conn;
    connect_db();
	switch($table) {
		case 'watashinodesu':
			$query = mysqli_query($conn, 
				"SELECT * FROM watashinodesu ORDER BY service_name ASC");
			break;
		case 'child_lab_view':
			$query = mysqli_query($conn, 
				"SELECT view FROM child_lab WHERE child_lab.name = '$quantity'");
			break;
		case 'child_lab':
			if($quantity=='all'){
				$query = mysqli_query($conn, 
				"SELECT * FROM child_lab ORDER BY id DESC");
				break;
			}
			else {
				$query = mysqli_query($conn, 
				"SELECT * FROM child_lab WHERE child_lab.id = $quantity");
			break;
			}			
		case 'labnewest':
			$query = mysqli_query($conn, 
				"SELECT * FROM post WHERE post.type = 'lab' AND post.status ='show' ORDER BY post_id DESC LIMIT 1");
			break;
		case 'blognewest':
			$query = mysqli_query($conn, 
				"SELECT * FROM post WHERE post.type = 'blog' AND post.status ='show' ORDER BY post_id DESC LIMIT 1");
			break;
		case 'labnext':
			$query = mysqli_query($conn, 
				"SELECT * FROM post WHERE post.post_id < $quantity AND post.type = 'lab' AND post.status ='show' ORDER BY post_id DESC LIMIT 1");
			break;
		case 'blognext':
			$query = mysqli_query($conn, 
				"SELECT * FROM post WHERE post.post_id < $quantity AND post.type = 'blog' AND post.status ='show' ORDER BY post_id DESC LIMIT 1");
			break;
		case 'mess':
			if($quantity=="all"){
				$query = mysqli_query($conn, "SELECT * FROM message ORDER BY id DESC");
				break;}
		case 'noti':
			$query = mysqli_query($conn, "SELECT * FROM noti");
			break;
		case 'project':
			if($quantity=='all'){$query = mysqli_query($conn, "select * from project order by project_id desc");}
			else {$query = mysqli_query($conn, "select * from project where project.project_id='$quantity'");}
			break;
		case 'lab':
			if($quantity=='all'){
				if(@$_SESSION['admin']=='admin'){$query = mysqli_query($conn, "select * from post WHERE post.type ='lab' order by post_id desc");}
				else {$query = mysqli_query($conn, "select * from post WHERE post.type ='lab' AND post.status = 'show' order by post_id desc");}
			}
			else {$query = mysqli_query($conn, 
				"select * from post where post.type ='lab' AND post.post_id='$quantity' order by post_id desc");}
			break;
		case 'blog':
			if($quantity=='all'){
				if(@$_SESSION['admin']=='admin'){$query = mysqli_query($conn, "select * from post WHERE post.type ='blog' order by post_id desc");}
				else {$query = mysqli_query($conn, "select * from post WHERE post.type ='blog' AND post.status = 'show' order by post_id desc");}
			}
			else {$query = mysqli_query($conn, 
				"select * from post where post.type ='blog' AND post.post_id='$quantity' order by post_id desc");}
			break;
		case 'view':
			$query = mysqli_query($conn, "SELECT * FROM allview");
			break;
		case 'guest':
			$query = mysqli_query($conn, "SELECT * FROM guest WHERE g_level=$quantity ORDER BY g_id DESC");
			break;
		case 'todayview':
			$query = mysqli_query($conn, "SELECT * FROM guest WHERE g_level=$quantity AND DATE(g_time)=CURDATE() ORDER BY g_id DESC");
			break;
		default:
			echo "Wrong input! This {$table} is not exist!";
	}
	$result = array();
    if ($query){
		if (mysqli_num_rows($query) != 0){
			while ($row = mysqli_fetch_assoc($query))
				{ $result[] = $row; }
		}
		/*else { header("location:home");	}*/
    }
	else {header("location:404");}
    return $result;
}

//return d/m/y:h:m:s HCMC time zone
function get_time(){
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	return $time = date("Y-m-d/H:i:s");
}

// ------------------------------------------------------------------------ PROJECT ------------------------------------
// Hàm thêm PROJECT
function add_project($img, $url, $title, $part)
{
    // Gọi tới biến toàn cục $conn
    global $conn;
     
    // Hàm kết nối
    connect_db();
     
    // Chống SQL Injection
    $img = addslashes($img);
    $url = addslashes($url);
	$title = addslashes(ucwords($title));
    $part = addslashes(ucfirst($part));
	$time = get_time();
	
    // Câu truy vấn thêm
    $sql = "
            INSERT INTO project(img, url, title, part, project_date) VALUES
            				('$img','$url','$title','$part','$time')
    ";
     
    // Thực hiện câu truy vấn
    $query = mysqli_query($conn, $sql);
     		//Lưu tên đăng nhập

	if ($query){
        header("location:project");
	exit;}
else {echo "loi";}
        die();
}

// Hàm update project
function update_project($img, $url, $title, $part, $id)
{
    global $conn;
    connect_db();

	// Chống SQL Injection
    $img = addslashes($img);
    $url = addslashes($url);
	$title = addslashes(ucwords($title));
    $part = addslashes(ucfirst($part));
	
	//Get current time
	$project_date_update = get_time();
	
	$sql ="UPDATE `project` SET project_date_update = '$project_date_update',`img` = '$img', `url` = '$url', `title` = '$title', `part` = '$part' WHERE `project`.`project_id` = '$id'";
     
    // Thực hiện câu truy vấn
    $query = mysqli_query($conn, $sql);
    if ($query) {
		header("location:Headquater-Of-Big-Boss");
	exit;} 
	else {
    echo "loi";}

    return $query;
		
}

//tang view post and project - view filter
function count_view($type,$id){
	
	global $conn;
    connect_db();
	
	//get location from IP
	@$ipinfo = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
	@$dbip = json_decode(file_get_contents("http://api.db-ip.com/v2/45655dcac459add3f04f5f8086a3a944c99fbed5/{$ip}"));
	@$mang = isset($ipinfo->org) ? $ipinfo->org : "undefined"; // -> "org: nha cung cap mang"
	$brs = $_SERVER['HTTP_USER_AGENT'];//--Thông tin về trình duyệt của người truy cập
	
	//neu la admin hoac truy cap tu gg thi ko tinh view
	if(@$_SESSION['admin']!='admin'){
		//stripos: case-insensitive, strpos: case-sensitive, return false or position
		if (stripos($brs, 'bot') !== false){
			switch($type){
				case 'project':
					$query = mysqli_query($conn, "UPDATE `project` SET  view = view+1 WHERE `project`.`url` = '$id'");
					if ($query) {header("location:{$id}");exit;}
					break;
				case 'post':
					$query = mysqli_query($conn, "UPDATE `post` SET  post_view = post_view+1 WHERE `post`.`post_id` = '$id'");
					break;
				case 'child_lab':
					$query = mysqli_query($conn, "UPDATE `child_lab` SET  view = view+1 WHERE `child_lab`.`name` = '$id'");
					break;
			}
		}
	}
}

// ------------------------------------------------------------------------ POST ---------------------------------

//add child lab
function add_child_lab($name, $url, $mother_page)
{
    global $conn;
    connect_db();

	$date_add = get_time();
	$name = addslashes($name);
	$url = addslashes($url);
	$mother_page = addslashes($mother_page);
	
    $sql = "
            INSERT INTO child_lab(date_add, name, url, mother_page) VALUES
            				('$date_add','$name', '$url', '$mother_page')
    ";
     
    $query = mysqli_query($conn, $sql);

	if ($query){
			header("location:Headquater-Of-Big-Boss");
			exit;
	}
	else {echo "loi";}
			die();
	}

//update child lab
function update_child_lab($name, $url, $mother_page, $id)
{
    global $conn;
    connect_db();

	$date_update = get_time();
	$name = addslashes($name);
	$url = addslashes($url);
	$mother_page = addslashes($mother_page);
	
    $sql = "
            UPDATE child_lab SET date_update = '$date_update', name = '$name', url = '$url', mother_page = '$mother_page' WHERE child_lab.id = '$id'
    ";
     
    $query = mysqli_query($conn, $sql);

	if ($query){
			header("location:Headquater-Of-Big-Boss");
			exit;
	}
	else {echo "loi";}
			die();
	}

// Hàm thêm post
function add_post($type, $post_title, $post_content, $post_icon, $color, $status)
{
    global $conn;
    connect_db();

	$post_date_add = get_time();
	$title_no_sign = vi_no_sign(ucwords($post_title));
	$type = addslashes($type);
	$post_title = addslashes(ucwords($post_title));
	$post_content = addslashes($post_content);
	$post_icon = addslashes($post_icon);
	$color = addslashes($color);
	
    $sql = "
            INSERT INTO post(title_no_sign, type, post_title, post_content, post_date_add, post_icon, color, status) VALUES
            				('$title_no_sign', '$type', '$post_title', '$post_content', '$post_date_add', '$post_icon', '$color', '$status')
    ";
     
    $query = mysqli_query($conn, $sql);

	if ($query){
			header("location:post.php?type=$type");
			exit;
	}
	else {echo "loi";}
			die();
	}

// Hàm update post
function update_post($id, $type, $post_title, $post_content, $post_icon, $color, $status)
{
    global $conn;
    connect_db();
	$post_date_update = get_time();
	$title_no_sign = vi_no_sign(ucwords($post_title));
	$type = addslashes($type);
	$post_title = addslashes(ucwords($post_title));
	$post_content = addslashes($post_content);
	$post_icon = addslashes($post_icon);
	$color = addslashes($color);
	
    $sql = "UPDATE post SET status = '$status', title_no_sign = '$title_no_sign', post_date_update = '$post_date_update', type = '$type', post_title = '$post_title', post_content = '$post_content', post_icon = '$post_icon', color = '$color' WHERE post.post_id = '$id'
    ";
     
    $query = mysqli_query($conn, $sql);

	if ($query){
			header("location:$type/$title_no_sign-$id");
			exit;
	}
	else {echo "loi";}
			die();
	}

// ------------------------------------------------------------------------ GUEST ------------------------------
//save guest info for every visitor
function save_guest_info(){
    global $conn;
    connect_db();
	
	//get guest info
	$refer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "undefined"; //truy cap tu trang nay
	$url = $_SERVER['REQUEST_URI']; //da truy cap vao trang nay
	$ip = getIP();//--IP của người truy cập
	$brs = $_SERVER['HTTP_USER_AGENT'];//--Thông tin về trình duyệt của người truy cập
	$time = get_time();
	
	//get location from IP
	@$ipinfo = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
	@$dbip = json_decode(file_get_contents("http://api.db-ip.com/v2/45655dcac459add3f04f5f8086a3a944c99fbed5/{$ip}"));
	@$mang = isset($ipinfo->org) ? $ipinfo->org : "undefined"; // -> "org: nha cung cap mang"
	@$city = isset($dbip->city) ? $dbip->city : "undefined";
	@$country = isset($dbip->countryName) ? $dbip->countryName : "undefined";
	
	$query = mysqli_query($conn,"SELECT g_name FROM guest WHERE g_ip='$ip' ORDER BY g_id DESC");
	$row = mysqli_fetch_array($query,MYSQLI_BOTH);
	
	//if this IP was named then use that name.
	$name = isset($row['g_name']) ? $row['g_name']:"";

	//level: 0-guess, 1-admin, 2-bot, 3-signin fail
	if(@$_SESSION['admin']=='admin'){$level = 1;}
	else if (stripos($brs, 'bot') !== false){$level=2;}//stripos: case-insensitive, strpos: case-sensitive, return false or position
	else if(isset($_SESSION['fail'])){$level=3;}
	else {$level = 0;}
	
    $sql = "INSERT INTO guest(g_ip, g_url, g_refer, g_time, g_brs, g_name, g_loc, g_mang, g_level) VALUES
            				('$ip', '$url', '$refer', '$time', '$brs', '$name', '$city-$country', '$mang', $level)";
	$query = mysqli_query($conn, $sql);
}

//count view by record column
function count_by($column,$by){
	global $conn;
    connect_db();
	$by = addslashes($by);
	$query = mysqli_query($conn,"SELECT * FROM guest WHERE $column = '$by' ORDER BY g_id DESC");
    $result = array();
    if ($query){
        while ($row = mysqli_fetch_assoc($query)){
            $result[] = $row;
        }
    } else {echo "Something wrong! Cannot get anything from database!";}
    return $result;
}

// ------------------------------------------------------------------------- ADMIN -----------------------------
//add password log
function save_pw($service_name, $user_name, $pw, $link_to, $note, $type){
	global $conn;
    connect_db();
	$date = get_time();
	$pw = htmlspecialchars(addslashes($pw));
	if($type=="add"){
		$sql = "INSERT INTO watashinodesu(service_name, user_name, pw, link_to, note, create_date) VALUES
								('$service_name', '$user_name', '$pw', '$link_to', '$note', '$date')";
	
	}
	else {
		$sql = "UPDATE watashinodesu SET note = '$note', service_name = '$service_name', user_name = '$user_name', pw = '$pw', link_to = '$link_to', update_date = '$date' WHERE id_desu=$type";
	}
	$query = mysqli_query($conn, $sql);
	
}

//send report & get xss error victim
function send_report($ct_name,$ct_mess){
	//save message
		global $conn;
    	connect_db();
		if($ct_name=="victim"){
			//get location from IP
			@$ipinfo = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
			@$dbip = json_decode(file_get_contents("http://api.db-ip.com/v2/45655dcac459add3f04f5f8086a3a944c99fbed5/{$ip}"));
			@$mang = isset($ipinfo->org) ? $ipinfo->org : "undefined"; // -> "org: nha cung cap mang"
			$ct_name= "VICTIM";
			$ct_mess="Victim from: ".$ct_mess." - Network service: ".$mang;
			$ct_abt="XSS FINDER";
		}
		else {
			$ct_abt = "REPORT";
		}
		// Chống SQL Injection
		$ct_name = htmlspecialchars(addslashes($ct_name));
		$ct_mess = htmlspecialchars(addslashes($ct_mess));
		
		$ip = getIP();
		$ct_time = get_time();
		
		$sql = "INSERT INTO message(ct_name, ct_mail, ct_abt, ct_mess, ct_time, ct_ip) VALUES
								('$ct_name', 'N/A', '$ct_abt', '$ct_mess', '$ct_time', '$ip')";
		$query = mysqli_query($conn, $sql);
		if($ct_name== "VICTIM") {echo("<script>window.location='http://google.com.vn';</script>");}
}

//check captcha and save message
function check_captcha($site_key_post,$ct_name,$ct_mail,$ct_abt,$ct_mess){
	$ip = getIP();
	$site_key = '6LfafyYTAAAAAE3pRdldLDw8BmwavLoxlZMa0XY8';
	$secret_key = '6LfafyYTAAAAANKxW_tx0ERP7MQ0opH6zHX5KkfP';
	$api_url     = 'https://www.google.com/recaptcha/api/siteverify';
	//tạo link kết nối
    $api_url = $api_url.'?secret='.$secret_key.'&response='.$site_key_post.'&remoteip='.$ip;
    //lấy kết quả trả về từ google
    $response = file_get_contents($api_url);
    //dữ liệu trả về dạng json
    $response = json_decode($response);
    if(!isset($response->success))
    {
        echo 'khong nhap captcha';
    }
    if($response->success == true)
    {
		//save message
		global $conn;
    	connect_db();

		// Chống SQL Injection
		$ct_name = htmlspecialchars(addslashes($ct_name));
		$ct_mail = htmlspecialchars(addslashes($ct_mail));
		$ct_mess = htmlspecialchars(addslashes($ct_mess));

		$ct_time = get_time();
		
		$sql = "INSERT INTO message(ct_name, ct_mail, ct_abt, ct_mess, ct_time, ct_ip) VALUES
								('$ct_name', '$ct_mail', '$ct_abt', '$ct_mess', '$ct_time', '$ip')";
		$query = mysqli_query($conn, $sql);
		echo "<script type='text/javascript'>alert('Your message has been sent.');</script>";
    }else{
		header("location:javascript://history.go(-1)");
    }
}

//set noti
function set_noti($content){
	global $conn;
    connect_db();
	$content = addslashes($content);
	$query = mysqli_query($conn, "UPDATE noti SET noti_content = '$content' WHERE noti.noti_id=1");
	if ($query){
			header("location:Headquater-Of-Big-Boss");
			exit;
	}
	else {echo "ERROR: CANNOT SET NEW NOTIFICATION! CHECK SQL QUERY!";}
			die();
}

//xoa va cap nhat view page
function update_allview($lev){
	global $conn;
    connect_db();
	switch($lev){
		case 0:
			//lay so record trong bang guest
			$g_num = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM guest WHERE g_level=0"));
			//cong record cua guest vao bang view
			$time = get_time();
			$query = mysqli_query($conn, "UPDATE allview SET view = view+$g_num, t_o = '$time' WHERE allview.id = 1");
			//xoa record cua guest trong bang guest
			if($query){
			$del = mysqli_query($conn, "DELETE FROM guest WHERE g_level=0"); header("location:Headquater-Of-Big-Boss");}
			else {echo "Something wrong! Cannot update! Nothing changed.";}
			break;
		case 2:
			$del = mysqli_query($conn, "DELETE FROM guest WHERE g_level=2"); header("location:Headquater-Of-Big-Boss");
			break;
		case 3:
			$del = mysqli_query($conn, "DELETE FROM guest WHERE g_level=3"); header("location:Headquater-Of-Big-Boss");
			break;
		default: echo "Khong nhac duoc level, khong xoa duoc du lieu!";
	}
}

//admin sign out
function admin_signout() {
	if (isset($_SESSION['admin'])){
	
    unset($_SESSION['admin']); // xóa session login
}
header("location:home");	
}

//admin sign in
function admin_signin($password){
		//neu dung mat khau -> luu thong tin -> toi trang admin
		if($password=="M*p15*11mysite"){
			$_SESSION['admin'] = "admin";
			unset($_SESSION['fail']);
			save_guest_info();
			header("location:Headquater-Of-Big-Boss");exit();	
		}
		
		else {
			if(isset($_SESSION['fail'])){
				$_SESSION['fail']=$_SESSION['fail']-1;
				save_guest_info();
			} 
			else {$_SESSION['fail']=5;save_guest_info();}
			
			//neu sai mat khau 5 lan -> luu thong tin -> toi trang loi
			$fail=$_SESSION['fail'];
			if($fail==0){
				save_guest_info();
				unset($_SESSION['fail']);
				header("location:404");exit();}
			echo "<script type='text/javascript'>alert('Wrong password! Your PC will SHUTDOWN in $fail times!');</script>";
		}
		//co the luu IP vao session de chan truy cap
}
?>