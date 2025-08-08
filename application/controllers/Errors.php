<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    /**
     * 处理404错误，重定向到首页
     */
    public function page_missing()
    {
        // 重定向到首页（不需要设置404状态码，因为要重定向到正常页面）
        redirect(base_url(), 'location', 301);
    }
} 