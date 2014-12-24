<?php echo css($this->config->item('page_css'), 'page')?> 

<section class="wrapper" style="margin:0px">
	<div class="row" style="margin:10px 10px">
	    <div class="col-md-2 sheader"><h4>新增</h4></div>
	    <div class="col-md-10 sheader"></div>
	</div>

	<div class="row" style="margin:10px 10px">
		<div class="span12">
			<ul class="breadcrumb">
			  <li>位置：<a href="<?php echo $module_uri?>">Page List</a></li>
			  <li class="active"><?php echo $view_name?></li>
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
					<?php echo $view_name?>
				</header>
				<div class="panel-body">
					<div class="form-horizontal tasi-form">						 
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Category</label>
							<div class="col-sm-4">
								 <select name="category_id" id="Category">
									<?php
										if(isset($category)):
									?>	
									<?php   foreach($category as $key=>$rows):?>
										<option value="<?php echo $rows->code_id ?>" <?php if ($rows->code_id == $page->category_id): ?>
											selected
										<?php endif ?> ><?php echo $rows->code_name ?></option>
									<?php endforeach;?>
									<?php endif;?>
								</select>
							</div>
						</div>	 
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Title</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="title" value='<?php echo $page->title ?>' /> 
							</div>
						</div> 
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Description</label>
							<div class="col-sm-4"> 
								<textarea class="form-control" rows="8" name="description" rows="10" cols="60"><?php echo $page->description ?></textarea>
							</div>
						</div>					  
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Image file</label>
							<div class="col-sm-4">
								<input type="file" class="form-control" name="img_file" value="">  
								<input type="hidden" value="<?php echo $page->image_path; ?>" name="exist_img_file" />	
								<?php if (isset($page->image_path) && !empty($page->image_path)): ?>
									<img src="<?php echo site_url()."assets/".$page->image_path; ?>" />
								<?php endif ?> 
							</div>
						</div>					  
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">HD file</label>
							<div class="col-sm-4">
								<input type="file" class="form-control" name="hd_file" value="">  
								<input type="hidden" value="<?php echo $page->hd_path; ?>" name="exist_hd_file" />	
								<?php if (isset($page->hd_path) && !empty($page->hd_path)): ?>
									<a href="<?php echo site_url()."assets/".$page->hd_path; ?>" >HD File</a>
								<?php endif ?> 
							</div>
						</div>						  
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">SD file</label>
							<div class="col-sm-4">
								<input type="file" class="form-control" name="sd_file" value="">  
								<input type="hidden" value="<?php echo $page->sd_path; ?>" name="exist_sd_file" />	
								<?php if (isset($page->sd_path) && !empty($page->sd_path)): ?>
									<a href="<?php echo site_url()."assets/".$page->sd_path; ?>" >SD File</a>
								<?php endif ?> 
							</div>
						</div>						  
 						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">SEO:Title</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="seo_title" value='<?php echo $page->seo_title ?>' /> 
							</div>
						</div> 
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">SEO:Description</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="seo_desc" value='<?php echo $page->seo_desc ?>' /> 
							</div>
						</div> 
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">SEO:Keyword</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="seo_kw" value='<?php echo $page->seo_kw ?>' /> 
							</div>
						</div> 
						<div class="form-group">
							<div class="col-sm-12" style="text-align:center">
								<button type="submit" class="btn btn-info">更新</button>
								<button type="button" class="btn btn-danger" onClick="aHover('<?php echo $module_uri?>')">取消</button>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>

</section>

<?php echo js($this->config->item('page_javascript'), 'page')?>
 
<script>
	function aHover(url)
	{
		location.href = url;
	}

	jQuery(document).ready(function($) {
 
 		
 

	});
</script>
