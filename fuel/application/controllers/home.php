<?php
class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct(); 
		$this->load->model('code_model');  		
		$this->load->library('comm');
		$this->load->library('pagination');
		$this->load->library('set_page');
	}

	function home() 
	{
		parent::Controller(); 
	}  

	function index()
	{	  
		$vars['views'] = 'home';
		$vars['css'] = array(site_url()."assets/templates/css/index.css"); 
		$vars['base_url'] = base_url();
		  
 		$index_list = $this->code_model->get_news_list(74); 
 		$vars['index_list'] = $index_list;

		$this->fuel->pages->render("index", $vars);
	 
	}

	function video_page($id,$hd_sd="hd")
	{	 
		$page_info = $this->code_model->get_page_info($id); 
		if ($hd_sd == "hd") {
			$page_info->video = $page_info->hd_path;
		}else {
			$page_info->video = $page_info->sd_path;
		}
		
 		$vars['page_info'] = $page_info;
		$vars['hd_sd'] = $hd_sd;
		$vars['url'] = site_url()."video_page/$id/";
		$vars['views'] = 'video_page';
		$vars['css'] = array(site_url()."assets/templates/css/video.css",site_url()."assets/templates/css/video-js.css"); 
		$vars['js'] = array(site_url()."assets/templates/js/video.js"); 
		$vars['base_url'] = base_url(); 
		$vars['seo_title'] = $page_info->seo_title;
		$vars['seo_desc'] = $page_info->seo_desc;
		$vars['seo_kw'] = $page_info->seo_kw;
		$this->fuel->pages->render("index", $vars);
	 
	}

	function video_wall($category_id,$dataStart=0)
	{
		$base_url = base_url();
		$target_url = $base_url."video_wall/$category_id/";		
		$filter = " WHERE category_id = '$category_id' ";
		$total_rows = $this->code_model->get_page_count($filter);
		$config = $this->set_page->set_config($target_url, $total_rows, $dataStart, 50);
		$dataLen = $config['per_page'];
		$this->pagination->initialize($config); 
		$vars['pagination'] = $this->pagination->create_links(); 

		$wall_result = $this->code_model->get_page_list($dataStart, $dataLen, $filter); 
 		$vars['wall_result'] = $wall_result;

		$vars['views'] = 'videowall';
		$vars['css'] = array(site_url()."assets/templates/css/videowall.css");  
		$vars['base_url'] = base_url(); 
		$this->fuel->pages->render("index", $vars);
	}
	
	 
}