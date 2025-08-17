<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Random_Address extends CI_Controller {



  	

	public function __construct(){

		parent::__construct();

		$this->load->helper('url');
		$this->load->model('Random_Address_model');


	}

	/**
	 * 根据国家格式化生日显示
	 * @param string $birthday 原始生日格式 (YYYY-MM-DD)
	 * @param string $country_code 国家代码
	 * @return string 格式化后的生日
	 */
	private function format_birthday_by_country($birthday, $country_code) {
		if (empty($birthday)) {
			return '';
		}

		// 解析日期
		$date_parts = explode('-', $birthday);
		if (count($date_parts) !== 3) {
			return $birthday; // 如果格式不正确，返回原值
		}

		$year = $date_parts[0];
		$month = $date_parts[1];
		$day = $date_parts[2];

		// 月份名称数组
		$months = array(
			'01' => 'January', '02' => 'February', '03' => 'March', '04' => 'April',
			'05' => 'May', '06' => 'June', '07' => 'July', '08' => 'August',
			'09' => 'September', '10' => 'October', '11' => 'November', '12' => 'December'
		);

		$month_name = $months[$month] ?? $month;

		// 根据国家代码格式化
		switch (strtoupper($country_code)) {
			case 'US':
			case 'CA':
				// 美国/加拿大: Month Day, Year (April 18, 1982)
				return $month_name . ' ' . intval($day) . ', ' . $year;
			
			case 'GB':
			case 'UK':
				// 英国: Day Month Year (18 April 1982)
				return intval($day) . ' ' . $month_name . ' ' . $year;
			
			case 'DE':
			case 'AT':
			case 'CH':
				// 德国/奥地利/瑞士: Day.Month.Year (18.04.1982)
				return intval($day) . '.' . intval($month) . '.' . $year;
			
			case 'FR':
			case 'BE':
			case 'LU':
				// 法国/比利时/卢森堡: Day/Month/Year (18/04/1982)
				return intval($day) . '/' . intval($month) . '/' . $year;
			
			case 'IT':
			case 'ES':
			case 'PT':
				// 意大利/西班牙/葡萄牙: Day-Month-Year (18-04-1982)
				return intval($day) . '-' . intval($month) . '-' . $year;
			
			case 'JP':
				// 日本: Year年Month月Day日 (1982年4月18日)
				return $year . '年' . intval($month) . '月' . intval($day) . '日';
			
			case 'KR':
				// 韩国: Year년 Month월 Day일 (1982년 4월 18일)
				return $year . '년 ' . intval($month) . '월 ' . intval($day) . '일';
			
			case 'CN':
			case 'TW':
			case 'HK':
				// 中国/台湾/香港: Year年Month月Day日 (1982年4月18日)
				return $year . '年' . intval($month) . '月' . intval($day) . '日';
			
			case 'AU':
			case 'NZ':
				// 澳大利亚/新西兰: Day Month Year (18 April 1982) - 类似英国
				return intval($day) . ' ' . $month_name . ' ' . $year;
			
			case 'IN':
				// 印度: Day-Month-Year (18-04-1982) - 类似欧洲
				return intval($day) . '-' . intval($month) . '-' . $year;
			
			default:
				// 默认格式: YYYY-MM-DD
				return $birthday;
		}
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
		$randomID = $this->Random_Address_model->get_address_minmax_id($country_code,'');
		if(!$randomID || $randomID->min_id === null) {
			redirect(base_url(), 'location', 301);
		}
		
		$random_id = mt_rand($randomID->min_id, $randomID->max_id);
		$address = $this->Random_Address_model->get_random_address($country_code,'',$random_id);
		if(!$address) {
			redirect(base_url(), 'location', 301);
		}

		// 简化个人信息获取
		$person_randomID = $this->Random_Address_model->get_person_profile_minmax_id(strtolower($country_code),'');
		$person = null;
		if($person_randomID && $person_randomID->min_id !== null) {
			$person_random_id = mt_rand($person_randomID->min_id, $person_randomID->max_id);
			$person = $this->Random_Address_model->get_person_profile(strtolower($country_code),'',$person_random_id);
			
			// 格式化生日
			if($person && isset($person->birthday)) {
				$person->birthday = $this->format_birthday_by_country($person->birthday, $country_code);
			}
		}

		// 简化信用卡信息获取
		$credit_randomID = $this->Random_Address_model->get_creditcard_minmax_id('');
		$creditcard = null;
		if($credit_randomID && $credit_randomID->min_id !== null) {
			$credit_random_id = mt_rand($credit_randomID->min_id, $credit_randomID->max_id);
			$creditcard = $this->Random_Address_model->get_creditcard('',$credit_random_id);
		}

		// 加载州列表（仅限美国）
		$state_list = array();
		if(strtolower($country_code) == 'us') {
			$state_list = $this->Random_Address_model->get_state_list($country_code);
		}
		
		// 加载国家列表
		$country_list = $this->Random_Address_model->get_country_list();
		
		// 加载主要城市列表（仅限美国）
		$major_cities = array();
		if(strtolower($country_code) == 'us') {
			$major_cities = $this->Random_Address_model->get_major_cities($country_code);
		}
		
		$data['creditcard'] = $creditcard;
		$data['person'] = $person;
		$data['address'] = $address;
		$data['state_list'] = $state_list;
		$data['country_list'] = $country_list;
		$data['major_cities'] = $major_cities;
		$data['tier1_array'] = $tier1_array;
		$data['is_state_page'] = false; // 国家级页面
		$data['is_city_page'] = false; // 不是城市页面

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
		
		// 加载州列表（仅限美国）
		$state_list = array();
		if(strtolower($country_code) == 'us') {
			$state_list = $this->Random_Address_model->get_state_list($country_code);
		}
		
		if($address == null){
			redirect(base_url(), 'location', 301);
		}

		$person_randomID = $this->Random_Address_model->get_person_profile_minmax_id(strtolower($country_code),'');
		$person = null;
		if($person_randomID && $person_randomID->min_id !== null) {
			$person_random_id = mt_rand($person_randomID->min_id, $person_randomID->max_id);
			$person = $this->Random_Address_model->get_person_profile(strtolower($country_code),'',$person_random_id);
			
			// 格式化生日
			if($person && isset($person->birthday)) {
				$person->birthday = $this->format_birthday_by_country($person->birthday, $country_code);
			}
		}



		$credit_randomID = $this->Random_Address_model->get_creditcard_minmax_id('');
		$creditcard = null;
		if($credit_randomID && $credit_randomID->min_id !== null) {
			$credit_random_id = mt_rand($credit_randomID->min_id, $credit_randomID->max_id);
			$creditcard = $this->Random_Address_model->get_creditcard('',$credit_random_id);
		}
		
		// 加载国家列表
		$country_list = $this->Random_Address_model->get_country_list();
		
		// 加载主要城市列表（仅限美国）
		$major_cities = array();
		if(strtolower($country_code) == 'us') {
			$major_cities = $this->Random_Address_model->get_major_cities($country_code);
		}
		
		$data['creditcard'] = $creditcard;
		$data['person'] = $person;

		$data['address'] = $address;
		$data['state_list'] = $state_list;
		$data['country_list'] = $country_list;
		$data['major_cities'] = $major_cities;
		$data['tier1_array'] = $tier1_array;
		$data['is_state_page'] = true; // 州级页面
		$data['is_city_page'] = false; // 不是城市页面

		$data['header'] = $this->load->view('header', $data, TRUE);
		$data['footer'] = $this->load->view('footer', $data, TRUE);

		$this->load->view('random_address_generator_v1',$data);

	}






	public function random_address_city(){

		$tier1_array = array(
    		'US'  => 'US',
    		'UK' => 'UK',
		);

		$segment1 = $this->uri->segment(2); // country_code-state_code
		$segment2 = $this->uri->segment(3); // city_slug
		
		if($segment1 == Null or $segment1 == "" or $segment2 == Null or $segment2 == ""){
			redirect(base_url(), 'location', 301);
		}

		// 解析country_code和state_code
		$parts = explode("-", $segment1, 2);
		if(count($parts) < 2) {
			redirect(base_url(), 'location', 301);
		}
		
		$country_code = $parts[0];
		$state_code = $parts[1];
		$city_slug = $segment2;

		// 获取城市的地址ID范围
		$randomID = $this->Random_Address_model->get_address_minmax_id_by_city($country_code, $state_code, $city_slug);
		if(!$randomID || $randomID->min_id === null) {
			redirect(base_url(), 'location', 301);
		}
		
		$random_id = mt_rand($randomID->min_id, $randomID->max_id);
		$address = $this->Random_Address_model->get_random_address_by_city($country_code, $state_code, $city_slug, $random_id);
		if(!$address) {
			redirect(base_url(), 'location', 301);
		}

		// 获取个人信息
		$person_randomID = $this->Random_Address_model->get_person_profile_minmax_id(strtolower($country_code),'');
		$person = null;
		if($person_randomID && $person_randomID->min_id !== null) {
			$person_random_id = mt_rand($person_randomID->min_id, $person_randomID->max_id);
			$person = $this->Random_Address_model->get_person_profile(strtolower($country_code),'',$person_random_id);
			
			// 格式化生日
			if($person && isset($person->birthday)) {
				$person->birthday = $this->format_birthday_by_country($person->birthday, $country_code);
			}
		}

		// 获取信用卡信息
		$credit_randomID = $this->Random_Address_model->get_creditcard_minmax_id('');
		$creditcard = null;
		if($credit_randomID && $credit_randomID->min_id !== null) {
			$credit_random_id = mt_rand($credit_randomID->min_id, $credit_randomID->max_id);
			$creditcard = $this->Random_Address_model->get_creditcard('',$credit_random_id);
		}
		
		// 加载州列表（仅限美国）
		$state_list = array();
		if(strtolower($country_code) == 'us') {
			$state_list = $this->Random_Address_model->get_state_list($country_code);
		}
		
		// 加载国家列表
		$country_list = $this->Random_Address_model->get_country_list();
		
		// 加载主要城市列表（仅限美国）
		$major_cities = array();
		if(strtolower($country_code) == 'us') {
			$major_cities = $this->Random_Address_model->get_major_cities($country_code);
		}
		
		$data['creditcard'] = $creditcard;
		$data['person'] = $person;
		$data['address'] = $address;
		$data['state_list'] = $state_list;
		$data['country_list'] = $country_list;
		$data['major_cities'] = $major_cities;
		$data['tier1_array'] = $tier1_array;
		$data['is_state_page'] = false; // 城市级页面，显示为国家级
		$data['is_city_page'] = true; // 标记为城市页面

		$data['header'] = $this->load->view('header', $data, TRUE);
		$data['footer'] = $this->load->view('footer', $data, TRUE);

		$this->load->view('random_address_generator_v1',$data);

	}

	public function random_address_countries(){

		$country_list = $this->Random_Address_model->get_country_list();

		$data['country_list'] = $country_list;


		$data['header'] = $this->load->view('header', $data, TRUE);
		$data['footer'] = $this->load->view('footer', $data, TRUE);
		$this->load->view('random_address_countries_v1',$data);

	}

}
