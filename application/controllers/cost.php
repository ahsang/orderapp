<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cost extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	
	function __construct()
	{
		parent::__construct();
	
		// To load the CI benchmark and memory usage profiler - set 1==1.
		if (1==2)
		{
			$sections = array(
					'benchmarks' => TRUE, 'memory_usage' => TRUE,
					'config' => FALSE, 'controller_info' => FALSE, 'get' => FALSE, 'post' => FALSE, 'queries' => FALSE,
					'uri_string' => FALSE, 'http_headers' => FALSE, 'session_data' => FALSE
			);
			$this->output->set_profiler_sections($sections);
			$this->output->enable_profiler(TRUE);
		}
	
		// Load required CI libraries and helpers.
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('form');
	
		// IMPORTANT! This global must be defined BEFORE the flexi auth library is loaded!
		// It is used as a global that is accessible via both models and both libraries, without it, flexi auth will not work.
		$this->auth = new stdClass;
	
		// Load 'standard' flexi auth library by default.
		$this->load->library('flexi_auth');
	
		// Check user is logged in via either password or 'Remember me'.
		// Note: Allow access to logged out users that are attempting to validate a change of their email address via the 'update_email' page/method.
		
		// Note: This is only included to create base urls for purposes of this demo only and are not necessarily considered as 'Best practice'.
		$this->load->vars('base_url', 'http://bizgame.collegetrails.com/');
		$this->load->vars('includes_dir', 'http://bizgame.collegetrails.com/includes/');
		$this->load->vars('current_url', $this->uri->uri_to_assoc(1));
	
		// Define a global variable to store data that is then used by the end view page.
		$this->data['cycle'] = "0";
			
		$this->load->model ( 'med_model' );
	}
	
	
	
	
	
	
	
	
	
	
	
	public function index()
	{
// 		$this->load->helper('url');
		
		
	}
	public function med(){
		echo($this->med_model->get_medicines());
	}	

	public function update_price(){
		$entry_id=$this->uri->segment(3);
		$price=$this->uri->segment(4);
		
		$data = array(
				'price' => $price,
				
		);
		
		$this->db->where('Entry_ID', $entry_id);
		$this->db->update('PackingMedJoin', $data);
		echo "success";
	}

	public function update_status(){
		$entry_id=$this->uri->segment(3);
		$status=$this->uri->segment(4);
		
		$data = array(
				'Status' => $status,
				
		);
		
		$this->db->where('OrderID', $entry_id);
		$this->db->update('OrdersMaster', $data);
		echo "success";
	}
	
	public function insert_pack(){
		$med_id=$this->uri->segment(3);
		$name=$this->uri->segment(4);
		$price=$this->uri->segment(5);
		
		$data = array(
				'MedID'=>$med_id,
				'Price' => $price,
				'Size' => $name
	
		);
	
		
		$this->db->insert('PackingMedJoin', $data);
		echo "success";
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */