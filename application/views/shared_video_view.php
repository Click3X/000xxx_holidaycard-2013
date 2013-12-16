<?php 
  $data = array(
    "page_id" => "shared_video",
    "header_text" => "Check out this customized video. Then share it, or customize your own!"
  );
 ?>

<? $this->load->view( "header_view",$data ); ?>

<script type="text/javascript">
  var video_filename = "<?= $filename; ?>";
  var selections = JSON.parse("<?= $selections; ?>");
  var header_text = "<?= $data['header_text']; ?>";
</script>

<div id="video_container" class="row">
  <div class="col-md-8 col-md-offset-2">
    <div class="play-controls">
      <a class="glyphicon glyphicon-play"></a>
    </div>
    <video width="600" height="600" poster="<?=base_url();?>img/thumbnails/600/preview.jpg">
      <!-- <source src="" type='video/mp4' /> -->
    </video>
  </div>
  <div class="col-md-8 col-md-offset-2">
    <ul id="share-nav"><!--
    --><li id="create-btn"><a href="<?=base_url();?>">Customize<br/><span class="glyphicon glyphicon-film"></a></li><!--
    --><li id="facebook-btn"></li><!--
    --><li id="twitter-btn"></li><!--
  --></ul>
  </div>
</div>

<? $this->load->view("footer_view", $data); ?>
