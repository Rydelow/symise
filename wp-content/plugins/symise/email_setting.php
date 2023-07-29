 <?php require_once("../../../wp-config.php");

if(!empty($_POST)){
    $functionname =$_POST['wsfunction'];
}
class APIManager {
	function emailsettingdata($data){
		return Enquiry::emaildataupdate($data);
	}
		
}
$baseobject = new APIManager();
if (method_exists($baseobject, $functionname)) {
 
   $return=$baseobject->$functionname($_POST);
        
}
echo json_encode($return);
