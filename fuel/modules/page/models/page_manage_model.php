<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Page_manage_model extends MY_Model {
	
	function __construct()
	{
		$CI =& get_instance();
		$CI->config->module_load(PAGE_FOLDER, PAGE_FOLDER);
		$tables = $CI->config->item('tables');
		parent::__construct($tables['mod_page']); // table name
	}

	public function get_total_rows($filter="")
	{
		$sql = @"SELECT COUNT(*) AS total_rows FROM mod_page a left join mod_code b on a.category_id = b.code_id $filter ";
		$query = $this->db->query($sql);

		if($query->num_rows() > 0)
		{
			$row = $query->row();

			return $row->total_rows;
		}

		return 0;
	}

	public function get_page_list($dataStart, $dataLen, $filter="")
	{
		$sql = @"SELECT a.*,b.code_name FROM mod_page a left join mod_code b on a.category_id = b.code_id
 		$filter  ORDER BY a.modi_time DESC LIMIT $dataStart, $dataLen";
	
		$query = $this->db->query($sql);

		if($query->num_rows() > 0)
		{
			$result = $query->result();

			return $result;
		}

		return;
	}

	public function get_page_detail($id){
		$sql = @"SELECT * FROM mod_page where id='$id' LIMIT 1 ";
	
		$query = $this->db->query($sql);

		if($query->num_rows() > 0)
		{
			$row = $query->row();

			return $row;
		}

		return;
	}
 

	public function insert($insert_data)
	{
		$sql = @"INSERT INTO mod_page (
											title, 
											description,
											category_id, 
											modi_time,
											seo_title,
											seo_desc,
											seo_kw									 
										) 
				VALUES ( ?, ?, ?, NOW(),?,?,?)"; 

		$para = array(
				$insert_data['title'], 
				$insert_data['description'],
				$insert_data['category_id'], 
				$insert_data['seo_title'], 
				$insert_data['seo_desc'], 
				$insert_data['seo_kw']
			);
		$success = $this->db->query($sql, $para);

		if($success)
		{
			return true;
		}

		return;
	}

	public function update($update_data)
	{ 
		//print_r($update_data);
		//die;
		$sql = @"UPDATE mod_page SET `title` 	= ?,
										description 	= ?, 
										category_id = ?,  
										hd_path = ?, 
										sd_path	= ?, 
										image_path	= ?, 
										seo_title = ?,
										seo_desc = ?,
										seo_kw = ?, 
										modi_time = Now()
									 
				WHERE id = ?";
		$para = array(
				$update_data['title'], 
				$update_data['description'],
				$update_data['category_id'], 
				$update_data['hd_path']==""?$update_data['exist_hd_file']:$update_data['hd_path'],
				$update_data['sd_path']==""?$update_data['exist_sd_file']:$update_data['sd_path'],
				$update_data['img_path']==""?$update_data['exist_img_file']:$update_data['img_path'],
				$update_data['seo_title'],
				$update_data['seo_desc'],
				$update_data['seo_kw'],
				$update_data['id']
			);

		//	print_r($update_data);
		//die();
		$success = $this->db->query($sql, $para);
 
		 
		if($success)
		{
			return true;
		}

		return;
	} 

	public function update_file($update_data)
	{
		$sql = @"UPDATE mod_page SET  hd_path    = ?, 
									  sd_path	= ?,
									  image_path	= ?
									 
				WHERE id = ?";
		$para = array( 
				$update_data['hd_path'],
				$update_data['sd_path'], 
				$update_data['img_path'], 
				$update_data['id']
			);
		$success = $this->db->query($sql, $para);
 
		 
		if($success)
		{
			return true;
		}

		return;
	} 

	public function get_last_insert_id(){
		$sql = "SELECT last_insert_id() as ID";
        $id_result= $this->db->query($sql);
        return $id_result->row()->ID;  ;
	}

	public function do_multi_del($ids){
		$sql = @"DELETE FROM  mod_page WHERE id in ($ids) ";

		// $para = array($ids);
		$success = $this->db->query($sql);

		return $success;
	}

	public function del($id)
	{
		$sql = @"DELETE FROM mod_page WHERE id = ?";
		 
		$para = array($id);
		$success = $this->db->query($sql, $para);

		if($success)
		{
			return true;
		}

		return;
	} 
	  
	
}