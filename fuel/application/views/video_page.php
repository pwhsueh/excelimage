 

<video id="video_content" class="video-js vjs-default-skin" controls preload="auto" width="100%" height="450" poster="<?php echo site_url()."assets/".$page_info->image_path ?>" data-setup="{}">
    
 <!-- <source src="http://video-js.zencoder.com/oceans-clip.mp4" type='video/mp4' />
 <source src="http://video-js.zencoder.com/oceans-clip.webm" type='video/webm' />
 <source src="http://video-js.zencoder.com/oceans-clip.ogv" type='video/ogg' /> -->
 <source src="<?php echo site_url()."assets/".$page_info->video ?>" type='video/mp4' />
 
 <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>

</video>

<div id="video_select_tag">
	<?php if ("hd"==$hd_sd): ?>
		<div class="video_select_subtag thisvideo_select_subtag"><h1>HD</h1><img src="<?php echo site_url()."assets/".$page_info->image_path ?>" /></div>
		<div class="video_select_subtag"><h1>SD</h1><a href="<?php echo $url."sd" ?>"><img src="<?php echo site_url()."assets/".$page_info->image_path ?>" /></a></div>

	<?php else: ?>

		<div class="video_select_subtag"><h1>HD</h1><a href="<?php echo $url."hd" ?>"><img src="<?php echo site_url()."assets/".$page_info->image_path ?>" /></a></div>
		<div class="video_select_subtag thisvideo_select_subtag"><h1>SD</h1><img src="<?php echo site_url()."assets/".$page_info->image_path ?>" /></div>

	<?php endif ?>
<div></div>
</div>

<div id="video_description">
<h1><?php echo $page_info->title ?></h1>
<span>
	<?php echo $page_info->description ?>
</span>
</div>

 