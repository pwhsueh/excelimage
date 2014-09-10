 
<script>
$(document).ready(function(){
    imgHeight = $('.video_wall_box').css('width');
    $('.video_wall_box').css('height', imgHeight);
});
</script>


<div id="video_wall_imgs">
    <?php if (isset($wall_result)): ?>
        <?php foreach ($wall_result as $key => $value): ?>
            <div class="video_wall_box">
                <a href="<?php echo site_url()."video_page/$value->id" ?>">
                    <img src="<?php echo site_url()."assets/".$value->image_path ?>" />
                </a>
                </div>
        <?php endforeach ?>
    <?php endif ?>
  <!--	<div class="video_wall_box"><a href="<?php echo site_url()."video_page" ?>"><img src="<?php echo site_url() ?>assets/templates/images/videowall_imgs/1.jpg" /></a></div>
   <div class="video_wall_box"><img src="<?php echo site_url() ?>assets/templates/images/videowall_imgs/2.jpg" /></div>
    <div class="video_wall_box"><img src="<?php echo site_url() ?>assets/templates/images/videowall_imgs/3.jpg" /></div>
    <div class="video_wall_box"><img src="<?php echo site_url() ?>assets/templates/images/videowall_imgs/4.jpg" /></div>
    <div class="video_wall_box"><img src="<?php echo site_url() ?>assets/templates/images/videowall_imgs/5.jpg" /></div>
    <div class="video_wall_box"><img src="<?php echo site_url() ?>assets/templates/images/videowall_imgs/6.jpg" /></div>
    <div class="video_wall_box"><img src="<?php echo site_url() ?>assets/templates/images/videowall_imgs/7.jpg" /></div>
    <div class="video_wall_box"><img src="<?php echo site_url() ?>assets/templates/images/videowall_imgs/8.jpg" /></div>
    <div class="video_wall_box"><img src="<?php echo site_url() ?>assets/templates/images/videowall_imgs/9.jpg" /></div>
    <div class="video_wall_box"><img src="<?php echo site_url() ?>assets/templates/images/videowall_imgs/10.jpg" /></div>
  
    <div class="video_wall_box"><img src="<?php echo site_url() ?>assets/templates/images/videowall_imgs/1.jpg" /></div>
    <div class="video_wall_box"><img src="<?php echo site_url() ?>assets/templates/images/videowall_imgs/2.jpg" /></div>
    <div class="video_wall_box"><img src="<?php echo site_url() ?>assets/templates/images/videowall_imgs/3.jpg" /></div>
    <div class="video_wall_box"><img src="<?php echo site_url() ?>assets/templates/images/videowall_imgs/4.jpg" /></div>
    <div class="video_wall_box"><img src="<?php echo site_url() ?>assets/templates/images/videowall_imgs/5.jpg" /></div>
    <div class="video_wall_box"><img src="<?php echo site_url() ?>assets/templates/images/videowall_imgs/6.jpg" /></div>
    <div class="video_wall_box"><img src="<?php echo site_url() ?>assets/templates/images/videowall_imgs/7.jpg" /></div>
    <div class="video_wall_box"><img src="<?php echo site_url() ?>assets/templates/images/videowall_imgs/8.jpg" /></div>
    <div class="video_wall_box"><img src="<?php echo site_url() ?>assets/templates/images/videowall_imgs/9.jpg" /></div>
    <div class="video_wall_box"><img src="<?php echo site_url() ?>assets/templates/images/videowall_imgs/10.jpg" /></div>
  
    <div class="video_wall_box"><img src="<?php echo site_url() ?>assets/templates/images/videowall_imgs/1.jpg" /></div>
    <div class="video_wall_box"><img src="<?php echo site_url() ?>assets/templates/images/videowall_imgs/2.jpg" /></div>
    <div class="video_wall_box"><img src="<?php echo site_url() ?>assets/templates/images/videowall_imgs/3.jpg" /></div>
    <div class="video_wall_box"><img src="<?php echo site_url() ?>assets/templates/images/videowall_imgs/4.jpg" /></div>
    <div class="video_wall_box"><img src="<?php echo site_url() ?>assets/templates/images/videowall_imgs/5.jpg" /></div>
    <div class="video_wall_box"><img src="<?php echo site_url() ?>assets/templates/images/videowall_imgs/6.jpg" /></div>
    <div class="video_wall_box"><img src="<?php echo site_url() ?>assets/templates/images/videowall_imgs/7.jpg" /></div>
    <div class="video_wall_box"><img src="<?php echo site_url() ?>assets/templates/images/videowall_imgs/8.jpg" /></div>
    <div class="video_wall_box"><img src="<?php echo site_url() ?>assets/templates/images/videowall_imgs/9.jpg" /></div>
    <div class="video_wall_box"><img src="<?php echo site_url() ?>assets/templates/images/videowall_imgs/10.jpg" /></div>
    
    <div class="video_wall_box"><img src="<?php echo site_url() ?>assets/templates/images/videowall_imgs/1.jpg" /></div>
    <div class="video_wall_box"><img src="<?php echo site_url() ?>assets/templates/images/videowall_imgs/2.jpg" /></div>
    <div class="video_wall_box"><img src="<?php echo site_url() ?>assets/templates/images/videowall_imgs/3.jpg" /></div>
    <div class="video_wall_box"><img src="<?php echo site_url() ?>assets/templates/images/videowall_imgs/4.jpg" /></div>
    <div class="video_wall_box"><img src="<?php echo site_url() ?>assets/templates/images/videowall_imgs/5.jpg" /></div>
    <div class="video_wall_box"><img src="<?php echo site_url() ?>assets/templates/images/videowall_imgs/6.jpg" /></div>
    <div class="video_wall_box"><img src="<?php echo site_url() ?>assets/templates/images/videowall_imgs/7.jpg" /></div>
    <div class="video_wall_box"><img src="<?php echo site_url() ?>assets/templates/images/videowall_imgs/8.jpg" /></div>
    <div class="video_wall_box"><img src="<?php echo site_url() ?>assets/templates/images/videowall_imgs/9.jpg" /></div>
    <div class="video_wall_box"><img src="<?php echo site_url() ?>assets/templates/images/videowall_imgs/10.jpg" /></div>
    
    <div class="video_wall_box"><img src="<?php echo site_url() ?>assets/templates/images/videowall_imgs/1.jpg" /></div>
    <div class="video_wall_box"><img src="<?php echo site_url() ?>assets/templates/images/videowall_imgs/2.jpg" /></div>
    <div class="video_wall_box"><img src="<?php echo site_url() ?>assets/templates/images/videowall_imgs/3.jpg" /></div>
    <div class="video_wall_box"><img src="<?php echo site_url() ?>assets/templates/images/videowall_imgs/4.jpg" /></div>
    <div class="video_wall_box"><img src="<?php echo site_url() ?>assets/templates/images/videowall_imgs/5.jpg" /></div>
    <div class="video_wall_box"><img src="<?php echo site_url() ?>assets/templates/images/videowall_imgs/6.jpg" /></div>
    <div class="video_wall_box"><img src="<?php echo site_url() ?>assets/templates/images/videowall_imgs/7.jpg" /></div>
    <div class="video_wall_box"><img src="<?php echo site_url() ?>assets/templates/images/videowall_imgs/8.jpg" /></div>
    <div class="video_wall_box"><img src="<?php echo site_url() ?>assets/templates/images/videowall_imgs/9.jpg" /></div>
    <div class="video_wall_box"><img src="<?php echo site_url() ?>assets/templates/images/videowall_imgs/10.jpg" /></div> -->
    
</div>

<div id="bottom_nav">
    <ul>
        <!-- <li id="directionbutton">&lt;&lt;</li>
        <li class="numberbutton" id="this_bottom_nav">1</li>
        <li class="numberbutton">2</li>
        <li class="numberbutton">3</li>
        <li class="numberbutton">4</li>
        <li class="numberbutton">5</li>
        <li id="directionbutton">&gt;&gt;</li> -->
        <?php echo $pagination?>
    </ul>
</div>
    
 

 

 
