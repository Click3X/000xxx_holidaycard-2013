<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js touch ios"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Happy Holidays from Click 3X</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/><!--320-->

        <style>
            body {
                padding-bottom: 30px;
            }
        </style>

        <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css">
        <link rel="stylesheet" href="<?= base_url(); ?>css/fonts.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/main.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/video.css">

        <script src="<?php echo base_url(); ?>js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <script type="text/javascript">
        var base_url = "<?= base_url();?>";
        var categories = [];

        <?php foreach(config_item('category_list') as $id=>$num_videos ): ?>
          categories.push("<?=$id;?>");
        <? endforeach; ?>

        </script>
    </head>
    <body>
        <img id="ball" data-src="<?php echo base_url(); ?>img/ball_320.png" alt="Ball" src="<?php echo base_url(); ?>img/ball_320.png">
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div id="header">
            <h1>Happy Holidays</h1>
            <p><img id="logo" src="<?= base_url(); ?>img/c3x_logo.png" /></p>
            <p>Lorem ipsum dolor sit amet, ubrum consectetur sit adipiscing elit. 
Nullam vulptate arcu sit amet hendrerit vestibulum. Ut nec mallis am corper. Donec quis rutrum lectus. Sed posuere semper laoreet.</p>
            <div id="choose-videos-header">
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
        </div>

        <!-- Nav tabs -->
        <div class="container">
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
                            <img width="300" height="300" data-src="img/thumbnails/300/<?= $id; ?>_<?= $i; ?>.jpg" alt="<?= $id;?> Video <?= $i;?>" src="img/thumbnails/300/<?= $id; ?>_<?= $i; ?>.jpg">
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
                      --><li data-id="<?= $id;?>"><span><h1><?= $id;?></h1></span><a data-id="<?= $id;?>" href="#video-category-<?= $id;?>"></a></li><!--
                      <?php endforeach; ?>
                  --></ul>
                  <p class="pull-right">end</p>
                </div>
              </div>
            </div>
            <div id="build" class="row section">
              <div class="col-md-12">
                <button type="button" class="btn btn-default">Create Video<span class="glyphicon glyphicon-film"></span></button>
              </div>
            </div>
            <div id="preview" class="row section">
              <div class="col-md-8 col-md-offset-2">
                <h4>Nice job. Now share it!</h4>
                <div class="play-controls">
                  <a class="glyphicon glyphicon-play"></a>
                </div>
                <video width="600" height="600" poster="">
                  <!-- <source src="" type='video/mp4' /> -->
                </video>
              </div>
              <div class="col-md-8 col-md-offset-2">
                <ul id="share-nav"><!--
                --><li id="facebook"></li><!--
                --><li id="twitter"></li><!--
              --></ul>
              </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="preview_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-body">
                    <a class="modal-close glyphicon glyphicon-remove" class="glyphicon glyphicon-remove"></a>
                    <video controls width="600" height="600" poster="">
                      <!-- <source src="" type='video/mp4' /> -->
                    </video>
                  </div>
                </div>
              </div>
            </div>
        </div>

        <script src="<?php echo base_url(); ?>js/jquery-1.9.1.min.js"></script>    
        <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>

        <script src="<?php echo base_url(); ?>js/plugins.js"></script>
        <script src="<?php echo base_url(); ?>js/main.js"></script>

        <script>
            var _gaq=[['_setAccount','<?php echo GA_ACCOUNT; ?>'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>
