<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class med_model extends CI_Model {
	
	// The following method prevents an error occurring when $this->data is modified.
	// Error Message: 'Indirect modification of overloaded property Demo_cart_admin_model::$data has no effect'.
	function __construct() {
		parent::__construct ();
		
		// To load the CI benchmark and memory usage profiler - set 1==1.
		if (1 == 2) {
			$sections = array (
					'benchmarks' => TRUE,
					'memory_usage' => TRUE,
					'config' => FALSE,
					'controller_info' => FALSE,
					'get' => FALSE,
					'post' => FALSE,
					'queries' => FALSE,
					'uri_string' => FALSE,
					'http_headers' => FALSE,
					'session_data' => FALSE 
			);
			$this->output->set_profiler_sections ( $sections );
			$this->output->enable_profiler ( TRUE );
		}
		
		
		// Load required CI libraries and helpers.
		$this->load->database ();
		$this->load->library ( 'session' );
		$this->load->helper ( 'url' );
		$this->load->helper ( 'form' );
		
		// IMPORTANT! This global must be defined BEFORE the flexi auth library is loaded!
		// It is used as a global that is accessible via both models and both libraries, without it, flexi auth will not work.
		
		$this->auth = new stdClass ();
		$this->auth->id = '';
		
		// Load 'standard' flexi auth library by default.
		$this->load->library ( 'flexi_auth' );
		
		// Note: This is only included to create base urls for purposes of this demo only and are not necessarily considered as 'Best practice'.
		$this->load->vars ( 'base_url', 'http://' . $_SERVER ['HTTP_HOST']."/" );
		$this->load->vars ( 'includes_dir', 'http://' . $_SERVER ['HTTP_HOST'] . '/includes/' );
		$this->load->vars ( 'current_url', $this->uri->uri_to_assoc ( 1 ) );
		
		
		// Define a global variable to store data that is then used by the end view page.
		$this->data = null;
	}
	function get_medicines() {
		$this->db->select('MedID,Category,Name');
		
		$this->db->from('MedMaster');
		
// 		$this->db->join('MedMaster', 'MedMaster.MedID=PackingMedJoin.MedID');
// 		$this->db->limit(4000);
			$q = $this->db->get ();
		 $result=$q->result ();
		
		if ($q->num_rows > 0) {
			return ($result);
		}
		return array ();
	}
	
	function get_batch() {
		$this->db->distinct();
		$this->db->select('m.Category,m.CategoryID,p.Size');
	
		$this->db->from('MedMaster as m');
	
		$this->db->join('PackingMedJoin as p', 'm.MedID=p.MedID');
		// 		$this->db->limit(4000);
		$q = $this->db->get ();
		$result=$q->result ();
	
		if ($q->num_rows > 0) {
			return ($result);
		}
		return array ();
	}

	function get_orders() {
		// $this->db->distinct();
		$this->db->select('*');
	
		$this->db->from('OrdersMaster as m');
	
		// $this->db->join('PackingMedJoin as p', 'm.MedID=p.MedID');
		// 		$this->db->limit(4000);
		$q = $this->db->get ();
		$result=$q->result ();
	
		if ($q->num_rows > 0) {
			return ($result);
		}
		return array ();
	}

	function get_packages() {
		// $this->db->distinct();
		$this->db->select('*');
	
		$this->db->from('PackingMedJoin as m');
	
		// $this->db->join('PackingMedJoin as p', 'm.MedID=p.MedID');
		// 		$this->db->limit(4000);
		$q = $this->db->get ();
		$result=$q->result ();
	
		if ($q->num_rows > 0) {
			return ($result);
		}
		return array ();
	}

	function get_users() {
		// $this->db->distinct();
		$this->db->select('*');
	
		$this->db->from('Users as m');
	
		// $this->db->join('PackingMedJoin as p', 'm.MedID=p.MedID');
		// 		$this->db->limit(4000);
		$q = $this->db->get ();
		$result=$q->result ();
	
		if ($q->num_rows > 0) {
			return ($result);
		}
		return array ();
	}
		
	function get_medicine_details($id){
		$this->db->where('MedID',$id);
		$this->db->from('PackingMedJoin');
		$q = $this->db->get ();
		$result=$q->result ();
		
		if ($q->num_rows > 0) {
			return ($result);
		}
		return array ();
	}

	function get_order_details($id){
		$this->db->where('OrderID',$id);
		$this->db->from('OrderDetails');
		$q = $this->db->get ();
		$result=$q->result ();
		
		if ($q->num_rows > 0) {
			return ($result);
		}
		return array ();
	}
	
}


					/* End of file demo_auth_admin_model.php */
/* Location: ./application/models/demo_auth_admin_model.php */