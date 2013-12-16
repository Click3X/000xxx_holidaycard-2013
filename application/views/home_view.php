<?php 
  $data = array(
    "page_id" => "home",
    "header_text" => "Pick a clip for each number to create a custom 2014 video!"
  );
?>

<script type="text/javascript">
  var categories = [];
  <?php foreach(config_item('category_list') as $id=>$num_videos ): ?>
    categories.push("<?=$id;?>");
  <? endforeach; ?>

  var header_text = "<?= $data['header_text']; ?>";
</script>

<? $this->load->view("header_view",$data); ?>

<div id="choose-videos-header" class="row">
  <h4>Start choosing videos.</h4>
  <div id="nav-container">
    <img id="arrow" src="<?= base_url(); ?>img/up_arrow.jpg" />
    <ul id="category-nav" class="nav nav-tabs">
      <?php $index = 0; foreach ( config_item("category_list") as $id=>$num_videos ): ?>
      <li data-id="<?= $id;?>"><a data-id="<?= $id;?>" data-index="<?= $index;?>" href="#video-category-<?= $id;?>"><?= $id;?></a></li>
      <?php $index++; endforeach; ?>
    </ul>
  </div>
</div>
<div id="pick-videos" class="row">
  <div class="col-md-12">
    <div class="tab-content">
      <?php $index = 0; foreach ( config_item("category_list") as $id=>$num_videos ): ?>
        <div id="video-category-<?= $id; ?>" data-video-category="<?= $id; ?>" class="tab-pane fade <?= $index == 0 ? 'active' : ''; ?>">
          <div class="row">
            <?php for($i = 0; $i < intval($num_videos); $i++ ): ?>
            <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
              <div class="thumbnail" data-id="<?= $i; ?>" data-video-category="<?= $id; ?>">
                <div class="hover-state">
                  <p class="preview-btn">preview</p><!--
                  --><p class="add-btn">Add</p>
                </div>
                <img width="300" height="300" data-src="<?=base_url();?>img/thumbnails/300/<?= $id; ?>_<?= $i; ?>.jpg" alt="<?= $id;?> Video <?= $i;?>" src="<?=base_url();?>img/thumbnails/300/<?= $id; ?>_<?= $i; ?>.jpg">
              </div>
            </div>
            <?php endfor; ?>
          </div>
        </div>
      <?php $index++; endforeach; ?>
     </div>
  </div>
</div>
<div id="edit-video" class="row section">
  <div class="col-md-10 col-md-offset-1">
    <h4>Edit your timeline.</h4>
    <div id="edit-video-nav-container">
      <p class="pull-left">start</p>
      <ul id="edit-video-nav"><!--
          <?php foreach ( config_item("category_list") as $id=>$num_videos ): ?>
          --><li data-id="<?= $id;?>"><span><h1><?= $id;?></h1></span><a data-id="<?= $id;?>" class="glyphicon glyphicon-remove"></a></li><!--
          <?php endforeach; ?>
      --></ul>
      <p class="pull-right">end</p>
    </div>
  </div>
</div>
<div id="build" class="row section">
  <h4>Nice job. Let's build it!</h4>
  <div class="col-md-8 col-md-offset-2">
    <img width="600" height="600" src="<?=base_url();?>img/thumbnails/600/preview.jpg" />
    <a type="button" class="btn btn-default">Create Video<span class="glyphicon glyphicon-film"></span></a>
  </div>
</div>
<div id="preview" class="row section">
  <h4>Your custom video is complete!</h4>
  <div class="col-md-8 col-md-offset-2">
    <div class="play-controls">
      <a class="glyphicon glyphicon-play"></a>
    </div>
    <video width="600" height="600" poster="<?=base_url();?>img/thumbnails/600/preview.jpg">
      <!-- <source src="" type='video/mp4' /> -->
    </video>
  </div>
  <div class="col-md-8 col-md-offset-2 section">
    <h4>Now share it!</h4>
    <ul id="share-nav"><!--
    --><li id="facebook-btn"></li><!--
    --><li id="twitter-btn"></li><!--
  --></ul>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="preview_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <a class="modal-close glyphicon glyphicon-remove" class="glyphicon glyphicon-remove"></a>
        <video autoplay controls width="600" height="600" poster="">
          <!-- <source src="" type='video/mp4' /> -->
        </video>
      </div>
    </div>
  </div>
</div>

<? $this->load->view("footer_view",$data); ?>
