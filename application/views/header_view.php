<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js"> <!--<![endif]-->
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
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/master.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/<?=$page_id;?>.css">

        <script src="<?=base_url();?>js/facebook_all.js"></script>

    </head>
    <body>
        <div id="fb-root"></div>

         <script type="text/javascript">
            var base_url = "<?= base_url(); ?>";
            var fbapp_id = "<?= FBAPP_ID; ?>";

            FB.init({
              appId      : fbapp_id,
              status     : true,
              xfbml      : true
            });
        </script>

        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div id="header">
            <h1>Happy Holidays</h1>
            <p><img id="c3x_logo" class="logo" src="<?= base_url(); ?>img/c3x_logo.png" /></p>
            <p>
                <img id="cfm_logo" class="logo" src="<?= base_url(); ?>img/cfm_logo.png" />
                <img id="r2b_logo" class="logo" src="<?= base_url(); ?>img/r2b_logo.png" />
            </p>
            <p><?= $header_text; ?></p>
        </div>

        <div class="container">