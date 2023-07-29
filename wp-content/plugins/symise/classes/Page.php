<?php
class Page{
	public $fileurl;
	function __construct(){
		$this->fileurl=FILE_URL;	
		add_action('user_header',[ $this,'user_header']);
		add_action('user_footer',[ $this,'user_footer']);
		add_action('user_homepage',[ $this,'user_homepage']);
		add_action('init',[ $this,'enquirydata']);		
		add_action('init',[ $this,'forget_passwordpostdata']);		
	}
	function user_header(){
		$_SESSION['webenquiry']='symise';
		get_template_part('template-parts/header', null,array());
	}
	function user_footer(){
		get_template_part('template-parts/footer', null,array());
	}
	function user_homepage(){
		get_template_part('template-parts/homepage', null,array());
	}
	function forget_passwordpostdata(){
		global $wpdb;
		
		if(!empty($_POST['contactform'])){
			if (empty($_SESSION['webenquiry'])) {
		wp_redirect(site_url());
		exit();
		}
		$table_name = $wpdb->prefix . 'enquiry_emailsetting';
  		$emaildata = $wpdb->get_row("select * from $table_name where `id`='1'");
  		date_default_timezone_set('asia/kolkata');
  		$time=time();
  		$datetime = date('M-d-Y h:i:s a',$time);
  		$insert_table = $wpdb->prefix . 'equirydata';
    $data = array( 'createddate' => $time, 'name' =>$_POST['fname'], 'email' =>$_POST['eemail'], 'subject' => $_POST['subject'], 'message' => $_POST['message'],'ip' => self::get_client_ip(), 'brower_details' => $_SERVER['HTTP_USER_AGENT'], 'date' => date('Y-m-d'));
			$sendata = $wpdb->insert($insert_table, $data);
$message="";
    $subject = "Symise contact us enquiry form";
    $message .= "<p style='font-size:16px;'><b> " . $subject . ":</b></p>";

    $message .= "<p style='font-size:14px;'><b>Name : </b><span>" . $_POST['fname']. "</span></p>";
    $message .= "<p style='font-size:14px;'><b>Email-id : </b><span>" . $_POST['eemail'] . "</span></p>";
    $message .= "<p style='font-size:14px;'><b>Subject : </b><span>" . $_POST['subject']. "</span></p>";
    $message .= "<p style='font-size:14px;'><b>Message : </b><span>" . $_POST['message'] . "</span></p>";
    $message .= "<p style='font-size:14px;'><b>Time : </b><span>" . $datetime . "</span></p>";

    $message .= "<p style='font-size:14px;'><b>Ip : </b><span>" . self::get_client_ip() . "</span></p>";
    $message .= "<p style='font-size:14px;'><b>Browser Details : </b><span>" . $_SERVER['HTTP_USER_AGENT'] . "</span></p>";
  $subject = $subject;
  // To send HTML mail, the Content-type header must be set
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
  // Additional headers
  $headers .= 'From: no-reply@symise.com' . "\r\n";
  //$headers .= 'Cc: '.$u_email.'' . "\r\n";

  // Compose a simple HTML email message 

  $message .= "<p style='font-size:18px;'>Thanks<br><br>
  Symise</p>";

  $message .= '</body></html>';
  // Sending email
  if (!empty($emaildata->email)) {
    foreach (explode(",", $emaildata->email) as $sendmailid) {
      $sent = wp_mail($sendmailid, $subject, $message, $headers);
    }
  }
				echo"OK";

		}
		
	}
	function enquirydata(){
		if( !session_id() )
  {
    session_start();
  }
	}
	public static function get_client_ip()
  {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
      $ipaddress = getenv('HTTP_CLIENT_IP');
    else if (getenv('HTTP_X_FORWARDED_FOR'))
      $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if (getenv('HTTP_X_FORWARDED'))
      $ipaddress = getenv('HTTP_X_FORWARDED');
    else if (getenv('HTTP_FORWARDED_FOR'))
      $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if (getenv('HTTP_FORWARDED'))
      $ipaddress = getenv('HTTP_FORWARDED');
    else if (getenv('REMOTE_ADDR'))
      $ipaddress = getenv('REMOTE_ADDR');
    else
      $ipaddress = 'UNKNOWN';
    return $ipaddress;
  }

}
new Page();