<?

class Model_user extends CI_Model
{	
	/**
	 * Constructor
	 */
	function __construct() {
		parent::__construct();

		
	}
	
	public function saveFiwareUser($access_token){
		//echo 'token:'.$access_token;
		// after access token same for mobile
		$this->access_token=$access_token;
		$graph_url 	= "http://account.lab.fi-ware.org/user?access_token=".$access_token;
		$user 		= json_decode(file_get_contents($graph_url));					// USER DATA FROM FACEBOOK
		//print_r($user);
		$return['status']	=	false;
		$return['message']	=	"Oops! site OverWorked";
		
		if (!empty($user)) {
			$this->session->set_userdata('loggedUser',$user);
			$return['status']	=	true;	
			$return['message']	=	"Welcome Fiware user.";	
							
		}
			return $return;
	}
	
}
	
	
?>	