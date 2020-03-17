<?
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../favicon.ico">

  <title>未来资讯</title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url('static/home/css/bootstrap.min.css'); ?>" rel="stylesheet">
  <!-- Bootstrap theme -->
  <!-- <link href="<?php //echo base_url('static/home/css/bootstrap-theme.min.css'); 
                    ?>" rel="stylesheet"> -->

  <!-- Custom styles for this template -->
  <link href="<?php echo base_url('static/home/css/common.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('static/home/css/article.css'); ?>" rel="stylesheet">

  <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
  <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
  <!-- <script src="../../assets/js/ie-emulation-modes-warning.js"></script> -->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body role="document">

  <!-- Fixed navbar -->
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">未来资讯</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <?php foreach($nav as $item){ ?>
            <li class="<?php if($item['cid'] == $nav_id){ echo 'active'; } ?>">
              <a href="<?php echo site_url('Home/index/').$item['cid']; ?>"><?php echo $item['cname']; ?></a>
            </li>
          <?php } ?>
          <li class="dropdown">
            <a href="<?php echo site_url('About/index/'); ?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">关于我们 <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="">平台简介</a></li>
              <li><a href="">联系方式</a></li>
            </ul>
          </li>
        </ul>

        <form class="header-search pull-right hidden-sm hidden-xs" action="<?php echo site_url('Search/index'); ?>" method="post">
          <button class="btn btn-link" type="submit"><span class="sr-only">搜索</span><span class="glyphicon glyphicon-search"></span></button>
          <input type="text" value="" class="form-control" placeholder="输入关键字搜索" name="q" id="searchBox" style="width: 180px;">
        </form>
      </div>
      <!--/.nav-collapse -->
    </div>
  </nav>