 

	<ul class="rslides" id="slider1">
     <!--  <li><img src="<?php echo site_url() ?>assets/templates/images/index1.jpg"/></li>
      <li><img src="<?php echo site_url() ?>assets/templates/images/index2.jpg" alt=""></li>
      <li><img src="<?php echo site_url() ?>assets/templates/images/index3.jpg" alt=""></li> -->
        <?php if (isset($index_list) && sizeof($index_list) >0): ?>
           <?php foreach ($index_list as $key => $value): ?>
             <li><img src='<?php echo site_url()."assets/$value->img"?>' alt="<?php echo $value->title; ?>"></li>  
          <?php endforeach ?>
      <?php endif ?>
    </ul>
    

 <script src="<?php echo site_url() ?>assets/templates/js/responsiveslides.min.js"></script>   
 <script>
$(function () {

      // Slideshow 1
      $("#slider1").responsiveSlides({
        maxwidth: 800,
        speed: 800
      });
});
</script>