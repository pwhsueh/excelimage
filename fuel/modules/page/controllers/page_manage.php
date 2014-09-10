<?php
require_once(FUEL_PATH.'/libraries/Fuel_base_controller.php');

class Page_manage extends Fuel_base_controller {
	public $view_location = 'page';
	public $nav_selected = 'page/manage';
	public $module_name = 'page manage';
	public $module_uri = 'fuel/page/lists';
	function __construct()
	{
		parent::__construct();
		$this->_validate_user('page/manage');
		$this->load->module_model(PAGE_FOLDER, 'page_manage_model');
		$this->load->module_model(CODEKIND_FOLDER, 'codekind_manage_model');
		$this->load->helper('ajax');
		$this->load->library('pagination');
		$this->load->library('set_page');
		$this->load->library('session');		
		$this->load->library('comm');
	}
	
	function lists($dataStart=0)
	{
		$base_url = base_url();

		$search_category = $this->input->get_post('search_category'); 
		// $search_lang = $this->input->get_post('search_lang'); 
		
		$filter = " WHERE 1=1  "; 

		if (!empty($search_category)) {
			$this->session->set_userdata('search_category', $search_category);
		}else {
			$search_category = $this->session->userdata('search_category'); 
		} 
 		
 		if ( "all" != $search_category) {
 			$filter .= " AND a.category_id = '$search_category' ";
 		}

		

		// print_r($filter);

		$target_url = $base_url.'fuel/page/lists/';

		$total_rows = $this->page_manage_model->get_total_rows($filter);
		$config = $this->set_page->set_config($target_url, $total_rows, $dataStart, 20);
		$dataLen = $config['per_page'];
		$this->pagination->initialize($config); 

		$results = $this->page_manage_model->get_page_list($dataStart, $dataLen,$filter);

	 
		// $type = $this->codekind_manage_model->get_code_list_for_other_mod("NEWSTYPE");
		$category = $this->codekind_manage_model->get_code_list_for_other_mod("Category");
		$vars['category'] = $category;


		// if (isset($results)) {
		// 	foreach ($results as $key => $value) {
		// 		$l_id = explode(';', $value->level_id);
		// 		$level_str = "";
		// 		foreach ($l_id as $key2) {
		// 			$series_row = $this->codekind_manage_model->get_codekind_list(0,1,"WHERE code_id='$key2'","mod_code");
		// 			// print_r($series_row);
		// 			$level_str .= $series_row[0]->code_name."-";
		// 		} 
	 // 			$value->level_str = $search_serial."-".rtrim($level_str,'-');
		// 	}
		// }
		

		// print_r($results);
		// die;
		// $vars['type'] = $type;
		$vars['search_category'] = $search_category;
		// $vars['search_lang'] = $search_lang;
		$vars['total_rows'] = $total_rows; 
		$vars['form_action'] = $base_url.'fuel/page/lists';
		$vars['form_method'] = 'POST';
		$crumbs = array($this->module_uri => $this->module_name);
		$this->fuel->admin->set_titlebar($crumbs);

		$vars['page_jump'] = $this->pagination->create_links();
		$vars['create_url'] = $base_url.'fuel/page/create';
		$vars['edit_url'] = $base_url.'fuel/page/edit/';
		$vars['del_url'] = $base_url.'fuel/page/del/';
		$vars['multi_del_url'] = $base_url.'fuel/page/do_multi_del';
		$vars['results'] = $results;
		$vars['total_rows'] = $total_rows; 
		$vars['CI'] = & get_instance();

		$this->fuel->admin->render('_admin/page_lists_view', $vars);

	}

 
	function create()
	{
		$vars['form_action'] = base_url().'fuel/page/do_create';
		$vars['form_method'] = 'POST';
		$crumbs = array($this->module_uri => $this->module_name);
		$this->fuel->admin->set_titlebar($crumbs);		

		$vars['module_uri'] = base_url().$this->module_uri;
		$vars['view_name'] = "新增";

		$category = $this->codekind_manage_model->get_code_list_for_other_mod("Category");
		$vars['category'] = $category; 

		$this->fuel->admin->render("_admin/page_create_view", $vars);
	}

	function do_create()
	{
		$post_arr = $this->input->post();  
        
		$success = $this->page_manage_model->insert($post_arr);  

		if($success)
		{ 
			$id = $this->page_manage_model->get_last_insert_id(); 
			$hd_root_path = assets_server_path("page_video/$id/hd/");
			$sd_root_path = assets_server_path("page_video/$id/sd/");
			$img_root_path = assets_server_path("page_video/$id/img/");


			if (!file_exists($hd_root_path)) {
			    mkdir($hd_root_path, 0777, true);
			}

			if (!file_exists($sd_root_path)) {
			    mkdir($sd_root_path, 0777, true);
			}

			if (!file_exists($img_root_path)) {
			    mkdir($img_root_path, 0777, true);
			}
			 
			$module_uri = base_url().$this->module_uri;
			 
		
			$config['upload_path'] = $hd_root_path;
			$config['allowed_types'] = 'mp4';
			$config['max_size']	= '999999';
			$config['max_width']  = '0';
			$config['max_height']  = '0';

			// $this->load->library('upload',$config); 
			// $this->upload->initialize($config);

			$this->load->library('upload',$config); 

			$updateAry = array();
			$updateAry["id"] = $id;
			if ($this->upload->do_upload('hd_file'))
			{
				$data = array('upload_data'=>$this->upload->data()); 
				$updateAry["hd_path"] = "page_video/$id/hd/".$data["upload_data"]["file_name"];
			} else{ 
				$updateAry["hd_path"] = '';				 
			} 


			$config['upload_path'] = $sd_root_path;
			$config['allowed_types'] = 'mp4';
			$config['max_size']	= '9999';
			$config['max_width']  = '0';
			$config['max_height']  = '0';

			// $this->load->library('upload',$config); 
			$this->upload->initialize($config);

			if ($this->upload->do_upload('sd_file'))
			{
				$data = array('upload_data'=>$this->upload->data()); 
				$updateAry["sd_path"] = "page_video/$id/sd/".$data["upload_data"]["file_name"];
			} else{ 
				$updateAry["sd_path"] = '';				 
			} 


			$config['upload_path'] = $img_root_path;
			$config['allowed_types'] = 'png|jpg';
			$config['max_size']	= '9999';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';

			// $this->load->library('upload',$config); 
			$this->upload->initialize($config);

			if ($this->upload->do_upload('img_file'))
			{
				$data = array('upload_data'=>$this->upload->data()); 
				$updateAry["img_path"] = "page_video/$id/img/".$data["upload_data"]["file_name"];
			} else{ 
				$updateAry["img_path"] = '';				 
			} 
		 
			$this->page_manage_model->update_file($updateAry); 

			$this->comm->plu_redirect($module_uri, 0, "新增成功");
			die();
		}
		else
		{
			$this->comm->plu_redirect($module_uri, 0, "新增失敗");
			die();
		}
		return;
	}

	 
	function edit($id)
	{ 
		$page;
		if(isset($id))
		{
			$page = $this->page_manage_model->get_page_detail($id);
		} 

		if(!isset($id) || !isset($page))
		{
			$this->comm->plu_redirect(base_url().'fuel/page/lists', 0, "找不到資料");
			die;
		} 
		// print_r($vars);
		// die; 

		$vars['form_action'] = base_url()."fuel/page/do_edit/$id";
		$vars['form_method'] = 'POST';
		$crumbs = array($this->module_uri => $this->module_name);
		$this->fuel->admin->set_titlebar($crumbs);	 

		$category = $this->codekind_manage_model->get_code_list_for_other_mod("Category");
		$vars['category'] = $category; 

	    $vars['page'] = $page; 
		$vars['module_uri'] = base_url().$this->module_uri;
	 
		$vars["view_name"] = "修改";
		$this->fuel->admin->render('_admin/page_edit_view', $vars);
	}

	function do_edit($id)
	{ 
		$updateAry = $this->input->post(); 

		$updateAry["id"] = $id;

		$hd_root_path = assets_server_path("page_video/$id/hd/");
		$sd_root_path = assets_server_path("page_video/$id/sd/");
		$img_root_path = assets_server_path("page_video/$id/img/");


		if (!file_exists($hd_root_path)) {
		    mkdir($hd_root_path, 0777, true);
		}

		if (!file_exists($sd_root_path)) {
		    mkdir($sd_root_path, 0777, true);
		}

		if (!file_exists($img_root_path)) {
		    mkdir($img_root_path, 0777, true);
		}
		 
		$module_uri = base_url().$this->module_uri;
		  
		$config['upload_path'] = $hd_root_path;
		$config['allowed_types'] = 'mp4';
		$config['max_size']	= '999999';
		$config['max_width']  = '0';
		$config['max_height']  = '0';

		// $this->load->library('upload',$config); 
		// $this->upload->initialize($config);

		$this->load->library('upload',$config); 

	 
		if ($this->upload->do_upload('hd_file'))
		{
			$data = array('upload_data'=>$this->upload->data()); 
			$updateAry["hd_path"] = "page_video/$id/hd/".$data["upload_data"]["file_name"];
		} else{ 
			$updateAry["hd_path"] = '';				 
		} 


		$config['upload_path'] = $sd_root_path;
		$config['allowed_types'] = 'mp4';
		$config['max_size']	= '9999';
		$config['max_width']  = '0';
		$config['max_height']  = '0';

		// $this->load->library('upload',$config); 
		$this->upload->initialize($config);

		if ($this->upload->do_upload('sd_file'))
		{
			$data = array('upload_data'=>$this->upload->data()); 
			$updateAry["sd_path"] = "page_video/$id/sd/".$data["upload_data"]["file_name"];
		} else{ 
			$updateAry["sd_path"] = '';				 
		} 


		$config['upload_path'] = $img_root_path;
		$config['allowed_types'] = 'png|jpg';
		$config['max_size']	= '9999';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		// $this->load->library('upload',$config); 
		$this->upload->initialize($config);

		if ($this->upload->do_upload('img_file'))
		{
			$data = array('upload_data'=>$this->upload->data()); 
			$updateAry["img_path"] = "page_video/$id/img/".$data["upload_data"]["file_name"];
		} else{ 
			$updateAry["img_path"] = '';				 
		} 

		// print_r($post_arr);
		// die;
		$success = $this->page_manage_model->update($updateAry); 
		
		if($success)
		{  
			$this->comm->plu_redirect($module_uri, 0, "更新成功");
			die();
		}
		else
		{
			$this->comm->plu_redirect($module_uri, 0, "更新失敗");
			die();
		}
		return;
	} 

	function do_multi_del(){
		$result = array();

		$ids = $this->input->get_post("ids");


		if($ids)
		{
			$im_ids = implode(",", $ids);
			// $result['im_ids'] = $im_ids;

			$success = $this->page_manage_model->do_multi_del($im_ids);
		}
		else
		{
			$success = false;
		}



		if(isset($success))
		{
			$result['status'] = 1;
		}
		else
		{
			$result['status'] = $ids;
		}


		if(is_ajax())
		{
			echo json_encode($result);
		}
	} 

	function do_del($id)
	{
		$response = array();
		if(!empty($id))
		{
			$success = $this->page_manage_model->del($id);

			if($success)
			{
				$response['status'] = 1;
			}
			else
			{
				$response['status'] = -1;
			}
		}
		else
		{
			$response['status'] = -1;
		}

		echo json_encode($response);
	}

	// function plu_redirect($url, $delay, $msg)
	// {
	//     if( isset($msg) )
	//     {
	//         $this->notify($msg);
	//     }

	//     echo "<meta http-equiv='Refresh' content='$delay; url=$url'>";
	// }

	// function notify($msg)
	// {
	//     $msg = addslashes($msg);
	//     echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />";
	//     echo "<script type='text/javascript'>alert('$msg')</script>\n";
	//     echo "<noscript>$msg</noscript>\n";
	//     return;
	// }

	function get_series($codekind_key,$lang_code,$parent_id)
	{
		$response = $this->codekind_manage_model->get_series_menu($codekind_key,$lang_code,$parent_id); ;
		 
		echo json_encode($response);
	} 

}