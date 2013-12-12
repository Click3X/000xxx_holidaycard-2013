<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        
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
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#video-category-0">2</a></li>
                  <li><a href="#video-category-1">0</a></li>
                  <li><a href="#video-category-2">1</a></li>
                  <li><a href="#video-category-3">4</a></li>
                </ul>
              </div>
            </div>
        </div>

        <!-- Nav tabs -->
        <div class="container">
            <div id="pick-videos" class="row">
              <div class="col-md-12">
                <div class="tab-content">
                  <div id="video-category-0" data-video-category="3" class="tab-pane fade in active">
                    <div class="row">
                      <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                        <div class="thumbnail" data-id="0" data-video-category="0">
                          <div class="hover-state">
                            <p class="preview-btn">preview</p><!--
                            --><p class="add-btn">Add</p>
                          </div>
                          <img data-src="img/thumbnails/1_0.jpg" alt="One 1" src="img/thumbnails/1_0.jpg">
                        </div>
                      </div>
                      <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                        <div class="thumbnail" data-id="1" data-video-category="0">
                          <div class="hover-state">
                            <p class="preview-btn">preview</p><!--
                            --><p class="add-btn">Add</p>
                          </div>
                          <img data-src="img/thumbnails/1_0.jpg" alt="One 1" src="img/thumbnails/1_0.jpg">
                        </div>
                      </div>
                      <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                        <div class="thumbnail" data-id="2" data-video-category="0">
                          <div class="hover-state">
                            <p class="preview-btn">preview</p><!--
                            --><p class="add-btn">Add</p>
                          </div>
                          <img data-src="img/thumbnails/1_0.jpg" alt="One 1" src="img/thumbnails/1_0.jpg">
                        </div>
                      </div>
                      <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                        <div class="thumbnail" data-id="3" data-video-category="0">
                          <div class="hover-state">
                            <p class="preview-btn">preview</p><!--
                            --><p class="add-btn">Add</p>
                          </div>
                          <img data-src="img/thumbnails/1_0.jpg" alt="One 1" src="img/thumbnails/1_0.jpg">
                        </div>
                      </div>
                      <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                        <div class="thumbnail" data-id="4" data-video-category="0">
                          <div class="hover-state">
                            <p class="preview-btn">preview</p><!--
                            --><p class="add-btn">Add</p>
                          </div>
                          <img data-src="img/thumbnails/1_0.jpg" alt="One 1" src="img/thumbnails/1_0.jpg">
                        </div>
                      </div>
                      <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                        <div class="thumbnail" data-id="5" data-video-category="0">
                          <div class="hover-state">
                            <p class="preview-btn">preview</p><!--
                            --><p class="add-btn">Add</p>
                          </div>
                          <img data-src="img/thumbnails/1_0.jpg" alt="One 1" src="img/thumbnails/1_0.jpg">
                        </div>
                      </div>
                      <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 col-lg-offset-2">
                        <div class="thumbnail" data-id="6" data-video-category="0">
                          <div class="hover-state">
                            <p class="preview-btn">preview</p><!--
                            --><p class="add-btn">Add</p>
                          </div>
                          <img data-src="img/thumbnails/1_0.jpg" alt="One 1" src="img/thumbnails/1_0.jpg">
                        </div>
                      </div>
                      <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                        <div class="thumbnail" data-id="7" data-video-category="0">
                          <div class="hover-state">
                            <p class="preview-btn">preview</p><!--
                            --><p class="add-btn">Add</p>
                          </div>
                          <img data-src="img/thumbnails/1_0.jpg" alt="One 1" src="img/thumbnails/1_0.jpg">
                        </div>
                      </div>
                      <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 col-md-offset-3 col-lg-offset-0">
                        <div class="thumbnail" data-id="8" data-video-category="0">
                          <div class="hover-state">
                            <p class="preview-btn">preview</p><!--
                            --><p class="add-btn">Add</p>
                          </div>
                          <img data-src="img/thumbnails/1_0.jpg" alt="One 1" src="img/thumbnails/1_0.jpg">
                        </div>
                      </div>
                      <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 col-sm-offset-4 col-md-offset-0">
                        <div class="thumbnail" data-id="9" data-video-category="0">
                          <div class="hover-state">
                            <p class="preview-btn">preview</p><!--
                            --><p class="add-btn">Add</p>
                          </div>
                          <img data-src="img/thumbnails/1_0.jpg" alt="One 1" src="img/thumbnails/1_0.jpg">
                        </div>
                      </div>  
                    </div>
                  </div>
                  <div id="video-category-1" data-video-category="3" class="tab-pane fade">
                    <div class="row">
                      <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                        <div class="thumbnail" data-id="0" data-video-category="1">
                          <div class="hover-state">
                            <p class="preview-btn">preview</p><!--
                            --><p class="add-btn">Add</p>
                          </div>
                          <img data-src="img/thumbnails/1_0.jpg" alt="One 1" src="img/thumbnails/1_0.jpg">
                        </div>
                      </div>
                      <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                        <div class="thumbnail" data-id="1" data-video-category="1">
                          <div class="hover-state">
                            <p class="preview-btn">preview</p><!--
                            --><p class="add-btn">Add</p>
                          </div>
                          <img data-src="img/thumbnails/1_0.jpg" alt="One 1" src="img/thumbnails/1_0.jpg">
                        </div>
                      </div>
                      <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                        <div class="thumbnail" data-id="2" data-video-category="1">
                          <div class="hover-state">
                            <p class="preview-btn">preview</p><!--
                            --><p class="add-btn">Add</p>
                          </div>
                          <img data-src="img/thumbnails/1_0.jpg" alt="One 1" src="img/thumbnails/1_0.jpg">
                        </div>
                      </div>
                      <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                        <div class="thumbnail" data-id="3" data-video-category="1">
                          <div class="hover-state">
                            <p class="preview-btn">preview</p><!--
                            --><p class="add-btn">Add</p>
                          </div>
                          <img data-src="img/thumbnails/1_0.jpg" alt="One 1" src="img/thumbnails/1_0.jpg">
                        </div>
                      </div>
                      <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                        <div class="thumbnail" data-id="4" data-video-category="1">
                          <div class="hover-state">
                            <p class="preview-btn">preview</p><!--
                            --><p class="add-btn">Add</p>
                          </div>
                          <img data-src="img/thumbnails/1_0.jpg" alt="One 1" src="img/thumbnails/1_0.jpg">
                        </div>
                      </div>
                      <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                        <div class="thumbnail" data-id="5" data-video-category="1">
                          <div class="hover-state">
                            <p class="preview-btn">preview</p><!--
                            --><p class="add-btn">Add</p>
                          </div>
                          <img data-src="img/thumbnails/1_0.jpg" alt="One 1" src="img/thumbnails/1_0.jpg">
                        </div>
                      </div>
                      <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 col-lg-offset-2">
                        <div class="thumbnail" data-id="6" data-video-category="1">
                          <div class="hover-state">
                            <p class="preview-btn">preview</p><!--
                            --><p class="add-btn">Add</p>
                          </div>
                          <img data-src="img/thumbnails/1_0.jpg" alt="One 1" src="img/thumbnails/1_0.jpg">
                        </div>
                      </div>
                      <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                        <div class="thumbnail" data-id="7" data-video-category="1">
                          <div class="hover-state">
                            <p class="preview-btn">preview</p><!--
                            --><p class="add-btn">Add</p>
                          </div>
                          <img data-src="img/thumbnails/1_0.jpg" alt="One 1" src="img/thumbnails/1_0.jpg">
                        </div>
                      </div>
                      <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 col-md-offset-3 col-lg-offset-0">
                        <div class="thumbnail" data-id="8" data-video-category="1">
                          <div class="hover-state">
                            <p class="preview-btn">preview</p><!--
                            --><p class="add-btn">Add</p>
                          </div>
                          <img data-src="img/thumbnails/1_0.jpg" alt="One 1" src="img/thumbnails/1_0.jpg">
                        </div>
                      </div>
                      <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 col-sm-offset-4 col-md-offset-0">
                        <div class="thumbnail" data-id="9" data-video-category="1">
                          <div class="hover-state">
                            <p class="preview-btn">preview</p><!--
                            --><p class="add-btn">Add</p>
                          </div>
                          <img data-src="img/thumbnails/1_0.jpg" alt="One 1" src="img/thumbnails/1_0.jpg">
                        </div>
                      </div>  
                    </div>
                  </div>
                  <div id="video-category-2" data-video-category="3" class="tab-pane fade">
                    <div class="row">
                      <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                        <div class="thumbnail" data-id="0" data-video-category="2">
                          <div class="hover-state">
                            <p class="preview-btn">preview</p><!--
                            --><p class="add-btn">Add</p>
                          </div>
                          <img data-src="img/thumbnails/1_0.jpg" alt="One 1" src="img/thumbnails/1_0.jpg">
                        </div>
                      </div>
                      <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                        <div class="thumbnail" data-id="1" data-video-category="2">
                          <div class="hover-state">
                            <p class="preview-btn">preview</p><!--
                            --><p class="add-btn">Add</p>
                          </div>
                          <img data-src="img/thumbnails/1_0.jpg" alt="One 1" src="img/thumbnails/1_0.jpg">
                        </div>
                      </div>
                      <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                        <div class="thumbnail" data-id="2" data-video-category="2">
                          <div class="hover-state">
                            <p class="preview-btn">preview</p><!--
                            --><p class="add-btn">Add</p>
                          </div>
                          <img data-src="img/thumbnails/1_0.jpg" alt="One 1" src="img/thumbnails/1_0.jpg">
                        </div>
                      </div>
                      <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                        <div class="thumbnail" data-id="3" data-video-category="2">
                          <div class="hover-state">
                            <p class="preview-btn">preview</p><!--
                            --><p class="add-btn">Add</p>
                          </div>
                          <img data-src="img/thumbnails/1_0.jpg" alt="One 1" src="img/thumbnails/1_0.jpg">
                        </div>
                      </div>
                      <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                        <div class="thumbnail" data-id="4" data-video-category="2">
                          <div class="hover-state">
                            <p class="preview-btn">preview</p><!--
                            --><p class="add-btn">Add</p>
                          </div>
                          <img data-src="img/thumbnails/1_0.jpg" alt="One 1" src="img/thumbnails/1_0.jpg">
                        </div>
                      </div>
                      <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                        <div class="thumbnail" data-id="5" data-video-category="2">
                          <div class="hover-state">
                            <p class="preview-btn">preview</p><!--
                            --><p class="add-btn">Add</p>
                          </div>
                          <img data-src="img/thumbnails/1_0.jpg" alt="One 1" src="img/thumbnails/1_0.jpg">
                        </div>
                      </div>
                      <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 col-lg-offset-2">
                        <div class="thumbnail" data-id="6" data-video-category="2">
                          <div class="hover-state">
                            <p class="preview-btn">preview</p><!--
                            --><p class="add-btn">Add</p>
                          </div>
                          <img data-src="img/thumbnails/1_0.jpg" alt="One 1" src="img/thumbnails/1_0.jpg">
                        </div>
                      </div>
                      <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                        <div class="thumbnail" data-id="7" data-video-category="2">
                          <div class="hover-state">
                            <p class="preview-btn">preview</p><!--
                            --><p class="add-btn">Add</p>
                          </div>
                          <img data-src="img/thumbnails/1_0.jpg" alt="One 1" src="img/thumbnails/1_0.jpg">
                        </div>
                      </div>
                      <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 col-md-offset-3 col-lg-offset-0">
                        <div class="thumbnail" data-id="8" data-video-category="2">
                          <div class="hover-state">
                            <p class="preview-btn">preview</p><!--
                            --><p class="add-btn">Add</p>
                          </div>
                          <img data-src="img/thumbnails/1_0.jpg" alt="One 1" src="img/thumbnails/1_0.jpg">
                        </div>
                      </div>
                      <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 col-sm-offset-4 col-md-offset-0">
                        <div class="thumbnail" data-id="9" data-video-category="2">
                          <div class="hover-state">
                            <p class="preview-btn">preview</p><!--
                            --><p class="add-btn">Add</p>
                          </div>
                          <img data-src="img/thumbnails/1_0.jpg" alt="One 1" src="img/thumbnails/1_0.jpg">
                        </div>
                      </div>  
                    </div>
                  </div>
                  <div id="video-category-3" data-video-category="3" class="tab-pane fade">
                    <div class="row">
                      <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                        <div class="thumbnail" data-id="0" data-video-category="3">
                          <div class="hover-state">
                            <p class="preview-btn">preview</p><!--
                            --><p class="add-btn">Add</p>
                          </div>
                          <img data-src="img/thumbnails/1_0.jpg" alt="One 1" src="img/thumbnails/1_0.jpg">
                        </div>
                      </div>
                      <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                        <div class="thumbnail" data-id="1" data-video-category="3">
                          <div class="hover-state">
                            <p class="preview-btn">preview</p><!--
                            --><p class="add-btn">Add</p>
                          </div>
                          <img data-src="img/thumbnails/1_0.jpg" alt="One 1" src="img/thumbnails/1_0.jpg">
                        </div>
                      </div>
                      <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                        <div class="thumbnail" data-id="2" data-video-category="3">
                          <div class="hover-state">
                            <p class="preview-btn">preview</p><!--
                            --><p class="add-btn">Add</p>
                          </div>
                          <img data-src="img/thumbnails/1_0.jpg" alt="One 1" src="img/thumbnails/1_0.jpg">
                        </div>
                      </div>
                      <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                        <div class="thumbnail" data-id="3" data-video-category="3">
                          <div class="hover-state">
                            <p class="preview-btn">preview</p><!--
                            --><p class="add-btn">Add</p>
                          </div>
                          <img data-src="img/thumbnails/1_0.jpg" alt="One 1" src="img/thumbnails/1_0.jpg">
                        </div>
                      </div>
                      <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                        <div class="thumbnail" data-id="4" data-video-category="3">
                          <div class="hover-state">
                            <p class="preview-btn">preview</p><!--
                            --><p class="add-btn">Add</p>
                          </div>
                          <img data-src="img/thumbnails/1_0.jpg" alt="One 1" src="img/thumbnails/1_0.jpg">
                        </div>
                      </div>
                      <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                        <div class="thumbnail" data-id="5" data-video-category="3">
                          <div class="hover-state">
                            <p class="preview-btn">preview</p><!--
                            --><p class="add-btn">Add</p>
                          </div>
                          <img data-src="img/thumbnails/1_0.jpg" alt="One 1" src="img/thumbnails/1_0.jpg">
                        </div>
                      </div>
                      <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 col-lg-offset-2">
                        <div class="thumbnail" data-id="6" data-video-category="3">
                          <div class="hover-state">
                            <p class="preview-btn">preview</p><!--
                            --><p class="add-btn">Add</p>
                          </div>
                          <img data-src="img/thumbnails/1_0.jpg" alt="One 1" src="img/thumbnails/1_0.jpg">
                        </div>
                      </div>
                      <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                        <div class="thumbnail" data-id="7" data-video-category="3">
                          <div class="hover-state">
                            <p class="preview-btn">preview</p><!--
                            --><p class="add-btn">Add</p>
                          </div>
                          <img data-src="img/thumbnails/1_0.jpg" alt="One 1" src="img/thumbnails/1_0.jpg">
                        </div>
                      </div>
                      <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 col-md-offset-3 col-lg-offset-0">
                        <div class="thumbnail" data-id="8" data-video-category="3">
                          <div class="hover-state">
                            <p class="preview-btn">preview</p><!--
                            --><p class="add-btn">Add</p>
                          </div>
                          <img data-src="img/thumbnails/1_0.jpg" alt="One 1" src="img/thumbnails/1_0.jpg">
                        </div>
                      </div>
                      <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 col-sm-offset-4 col-md-offset-0">
                        <div class="thumbnail" data-id="9" data-video-category="3">
                          <div class="hover-state">
                            <p class="preview-btn">preview</p><!--
                            --><p class="add-btn">Add</p>
                          </div>
                          <img data-src="img/thumbnails/1_0.jpg" alt="One 1" src="img/thumbnails/1_0.jpg">
                        </div>
                      </div>  
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div id="edit-video" class="row section">
              <div class="col-md-10 col-md-offset-1">
                <h4>Edit your video.</h4>
                <div id="edit-video-nav-container">
                  <p class="pull-left">start</p>
                  <ul id="edit-video-nav"><!--
                      --><li data-video-category="0"><span><h1>2</h1></span><a></a></li><!--
                      --><li data-video-category="1"><span><h1>0</h1></h1></span><a></a></li><!--
                      --><li data-video-category="2"><span><h1>1</h1></span><a></a></li><!--
                      --><li data-video-category="3"><span><h1>4</h1></span><a></a></li><!--
                  --></ul>
                  <p class="pull-right">end</p>
                </div>
              </div>
            </div>
            <div id="preview" class="row section">
              <div class="col-md-8 col-md-offset-2">
                <h4>Preview your video.</h4>
                <video id="preview_video" controls width="600" height="auto" poster="img/posters/1_0.jpg">
                  <source src="mp4/1_0.mp4" type='video/mp4' />
                </video>
              </div>
            </div>
            <div id="preview" class="row section">
              <div class="col-md-8 col-md-offset-2">
                <h4>Nice job. Now share it!</h4>
                <ul id="share-nav"><!--
                --><li id="facebook"></li><!--
                --><li id="twitter"></li><!--
              --></ul>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div id="footer">
                </div>
              </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="preview_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-body">
                    <video id="preview-video" controls width="600" height="auto" poster="img/posters/1_0.jpg">
                      <source id="preview-video-source" src="" type='video/mp4' />
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
