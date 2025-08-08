<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Random_Address extends CI_Controller {



  	

	public function __construct(){

		parent::__construct();

		$this->load->helper('url');
		$this->load->model('Random_Address_model');


	}

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$tier1_array = array(
    		'US'  => 'US',
    		'UK' => 'UK',
		);

		$segment = $this->uri->segment(2);
		if($segment == Null or $segment == ""){
			$segment = 'us';
		}

		$country_code = trim($segment);

		// 简化：直接获取随机地址
		$randomID = $this->Random_Address_model->get_address_minmax_id($country_code,'','');
		if(!$randomID || $randomID->min_id === null) {
			redirect(base_url(), 'location', 301);
		}
		
		$random_id = mt_rand($randomID->min_id, $randomID->max_id);
		$address = $this->Random_Address_model->get_random_address($country_code,'','',$random_id);
		if(!$address) {
			redirect(base_url(), 'location', 301);
		}

		// 简化个人信息获取
		$person_randomID = $this->Random_Address_model->get_person_profile_minmax_id(strtoupper($country_code),'');
		$person = null;
		if($person_randomID && $person_randomID->min_id !== null) {
			$person_random_id = mt_rand($person_randomID->min_id, $person_randomID->max_id);
			$person = $this->Random_Address_model->get_person_profile(strtoupper($country_code),'',$person_random_id);
		}

		// 简化信用卡信息获取
		$credit_randomID = $this->Random_Address_model->get_creditcard_minmax_id('');
		$creditcard = null;
		if($credit_randomID && $credit_randomID->min_id !== null) {
			$credit_random_id = mt_rand($credit_randomID->min_id, $credit_randomID->max_id);
			$creditcard = $this->Random_Address_model->get_creditcard('',$credit_random_id);
		}

		// 加载州列表
		$state_list = $this->Random_Address_model->get_state_list($country_code);
		
		$data['creditcard'] = $creditcard;
		$data['person'] = $person;
		$data['address'] = $address;
		$data['state_list'] = $state_list;
		$data['tier1_array'] = $tier1_array;

		$data['header'] = $this->load->view('header', $data, TRUE);
		$data['footer'] = $this->load->view('footer', $data, TRUE);

		$this->load->view('random_address_generator_v1',$data);
	}




	public function random_address_state(){


		$tier1_array = array(
    		'US'  => 'US',
    		'UK' => 'UK',
		);

		$segment = $this->uri->segment(2);
		//echo $segment;
		if($segment == Null or $segment == ""){
			redirect(base_url(), 'location', 301);
		}

		//$parts = explode("-", $segment);
		$parts = explode("-", $segment, 2);
		$country_code = $parts[0];
		$state_code = $parts[1];

		$randomID = $this->Random_Address_model->get_address_minmax_id($country_code,$state_code);
		$random_id = mt_rand($randomID->min_id, $randomID->max_id);
		$address = $this->Random_Address_model->get_random_address($country_code,$state_code,$random_id);
		$state_list = $this->Random_Address_model->get_state_list($country_code);
		if($address == null){
			redirect(base_url(), 'location', 301);
		}

		$person_randomID = $this->Random_Address_model->get_person_profile_minmax_id(strtoupper($country_code),'');
		$person_random_id = mt_rand($person_randomID->min_id, $person_randomID->max_id);
		$person = $this->Random_Address_model->get_person_profile(strtoupper($country_code),'',$person_random_id);



		$credit_randomID = $this->Random_Address_model->get_creditcard_minmax_id('');
		$credit_random_id = mt_rand($credit_randomID->min_id, $credit_randomID->max_id);
		$creditcard = $this->Random_Address_model->get_creditcard('',$credit_random_id);
		
		$data['creditcard'] = $creditcard;
		$data['person'] = $person;

		$data['address'] = $address;
		$data['state_list'] = $state_list;
		$data['tier1_array'] = $tier1_array;

		$data['header'] = $this->load->view('header', $data, TRUE);
		$data['footer'] = $this->load->view('footer', $data, TRUE);

		$this->load->view('random_address_generator_state_v1',$data);

	}






	public function random_address_countries(){

		$country_list = $this->Random_Address_model->get_country_list();

		$data['country_list'] = $country_list;


		$data['header'] = $this->load->view('header', $data, TRUE);
		$data['footer'] = $this->load->view('footer', $data, TRUE);
		$this->load->view('random_address_countries_v1',$data);

	}

}
