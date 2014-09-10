<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ExcelImage VDO</title>
<link rel="stylesheet" type="text/css" href="<?php echo site_url() ?>assets/templates/css/default.css" />
<link rel="stylesheet" type="text/css" href="<?php echo site_url() ?>assets/templates/css/index.css" />

 <?php if (isset($css)): ?>
 	<?php foreach ($css as $url): ?>
<link rel="stylesheet" type="text/css" href="<?php echo $url ?>" />
 	<?php endforeach ?>
 <?php endif ?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
 
</head>

<body>
 
<?php $this->load->view("_blocks/_header")?> 

<div id="wrapper">

<div id="left_nav">
	<div class="left_subnav"><a href="<?php echo site_url() ?>">Home</a></div>
    <div class="left_subnav"><a href="http://www.excelmage.com/index.jsp">Image Stock</a></div>
    <div class="left_subnav"><a href="http://www.excelmage.com/index2.jsp">Commercial Photo</a></div>
    <div class="left_subnav">Contact Us</div>
</div>

<div class="main_wrapper" id="main_index">


	<?php 
		if(isset($views)){ 
			$this->load->view($views);
		}
		else
		{
			define('FUELIFY', FALSE);
			echo fuel_var('body', '');
		}
	?>
    
</div>
<?php 
	 
	$menu_result = $this->code_model->get_menu('Category');
 ?>
<div id="right_nav">
	<!-- <div class="right_subnav"><a href="videowall.html">Landmark & City<br/>地標與城市</a></div>
    <div class="right_subnav"><a href="#">Health & Beauty<br/>健康與美麗</a></div>
    <div class="right_subnav"><a href="#">Senery<br/>美麗風景</a></div>
    <div class="right_subnav"><a href="#">Natural Concept<br/>自然概念</a></div>
    <div class="right_subnav"><a href="#">People & Life<br/>人物與生活</a></div>
    <div class="right_subnav"><a href="#">Regional Culture<br/>地方文化</a></div> -->
    <?php if (isset($menu_result)): ?>
    	<?php foreach ($menu_result as $key => $value): ?>
    		<div class="right_subnav"><a href="<?php echo site_url()."video_wall/$value->code_id/0" ?>"><?php echo $value->code_value1; ?><br/><?php echo $value->code_name; ?></a></div>
    	<?php endforeach ?>
    <?php endif ?>
</div>

</div>

	
<?php $this->load->view("_blocks/_footer")?>
 

  <?php if (isset($js)): ?>
 	<?php foreach ($js as $url): ?>
<script src="<?php echo $url ?>"></script>
 	<?php endforeach ?>
 <?php endif ?>


</body>
</html>