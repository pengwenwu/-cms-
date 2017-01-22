<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>内容管理系统</title>
	<link rel="favicon" href="/Public/assets/images/favicon.png">
	<link rel="stylesheet" media="screen" href="http://fonts.useso.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="/Public/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="/Public/assets/css/font-awesome.min.css"> 
	<link rel="stylesheet" href="/Public/assets/css/bootstrap-theme.css" media="screen"> 
	<link rel="stylesheet" href="/Public/assets/css/style.css">
    <link rel='stylesheet' id='camera-css'  href='/Public/assets/css/camera.css' type='text/css' media='all'> 
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="/Public/assets/js/html5shiv.js"></script>
	<script src="/Public/assets/js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
				<a class="navbar-brand" href="index.html">
					<img src="/Public/assets/images/logo.png" alt="Techro HTML5 template"></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right mainNav">
					<?php if(is_array($p_list)): foreach($p_list as $key=>$v): ?><li <?php if(ACTION_NAME == $v['col_action']): ?>class="active"<?php endif; ?>  ><a href="<?php echo U($v['col_action']);?>"><?php echo ($v['col_name']); ?>1</a></li><?php endforeach; endif; ?>
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
	<!-- /.navbar -->

	<header id="head" class="secondary">
        <div class="container">
                <h1>Courses</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing eliras scele!</p>
            </div>
    </header>

    
    <div class="container">
<h3>Courses</h3>
<p>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
</p>
<br/>
<ul class="list-unstyled video-list-thumbs row">
	<li class="col-lg-3 col-sm-4 col-xs-6">
		<a href="#" title="Claudio Bravo, antes su debut con el Barça en la Liga">
			<img src="http://i.ytimg.com/vi/ZKOtE9DOwGE/mqdefault.jpg" alt="Barca" class="img-responsive" height="130px" />
			<h2>Claudio Bravo, antes su debut con el Barça en la Liga</h2>
			<span class="play-button"></span>
			<span class="duration">03:15</span>
		</a>
	</li>
	<li class="col-lg-3 col-sm-4 col-xs-6">
		<a href="#" title="Claudio Bravo, antes su debut con el Barça en la Liga">
			<img src="http://i.ytimg.com/vi/ZKOtE9DOwGE/mqdefault.jpg" alt="Barca" class="img-responsive" height="130px" />
			<h2>Claudio Bravo, antes su debut con el Barça en la Liga</h2>
			<span class="play-button"></span>
			<span class="duration">03:15</span>
		</a>
	</li>
	<li class="col-lg-3 col-sm-4 col-xs-6">
		<a href="#" title="Claudio Bravo, antes su debut con el Barça en la Liga">
			<img src="http://i.ytimg.com/vi/ZKOtE9DOwGE/mqdefault.jpg" alt="Barca" class="img-responsive" height="130px" />
			<h2>Claudio Bravo, antes su debut con el Barça en la Liga</h2>
			<span class="play-button"></span>
			<span class="duration">03:15</span>
		</a>
	</li>
	<li class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
		<a href="#" title="Claudio Bravo, antes su debut con el Barça en la Liga">
			<img src="http://i.ytimg.com/vi/ZKOtE9DOwGE/mqdefault.jpg" alt="Barca" class="img-responsive" height="130px" />
			<h2>Claudio Bravo, antes su debut con el Barça en la Liga</h2>
			<span class="play-button"></span>
			<span class="duration">03:15</span>
		</a>
	</li> 
</ul>

</div>
	<div id="courses">
		<section class="container">
			<h3>Development Courses</h3>
			<div class="row">
				<div class="col-md-4">
					<div class="featured-box"> 
						<div class="text">
							<h3>Responsive Design</h3>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="featured-box"> 
						<div class="text">
							<h3>HTML5/CSS3</h3>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="featured-box"> 
						<div class="text">
							<h3>Web Designing</h3>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="featured-box"> 
						<div class="text">
							<h3>Web App Dev</h3>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="featured-box"> 
						<div class="text">
							<h3>Data Base</h3>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="featured-box"> 
						<div class="text">
							<h3>Mobile App Dev</h3>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
						</div>
					</div>
				</div>
			</div>

		</section>
	</div>
    
	<!-- container -->
	<div class="container">
		<div class="row">
			<!-- Article content -->
			<section class="col-sm-12 maincontent">
				<h3>Responsive Website</h3>
				<p>
					Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
				</p>
				<h3>Bootstrap</h3>
				<p>Standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
			</section>
		</div>
	</div>
	<!-- /container -->
 <footer id="footer">
 
		<div class="container">
   <div class="row">
  <div class="footerbottom">
    <div class="col-md-4 col-sm-6">
      <div class="footerwidget">
        <h4>
          关注我们
        </h4>
        <img class="img-responsive" src="<?php echo ($web_info['set_logo']); ?>" style="width: 120px;">
      </div>
    </div>
    <div class="col-md-4 col-sm-6">
      <div class="footerwidget">
        <h4>
          技术服务
        </h4>
        <div class="menu-course">
          <ul class="menu">
            <li> 
              售前小组：9:00-18:00
            </li>
            <li>
              售后小组：9:00-18:00
            </li>
            <li>
              应急小组：24小时×365天
            </li>
            <li>
              应急电话：010-12345678
            </li>
          </ul>
        </div>
      </div>
    </div>
    
    <div class="col-md-4 col-sm-6"> 
            	<div class="footerwidget"> 
                <h4>联系我们</h4> 
                <p><?php echo ($web_info['set_name']); ?></p>
            <div class="contact-info"> 
            QQ：<?php echo ($web_info['set_qq']); ?><br/>
            <i class="fa fa-map-marker"></i>&nbsp;&nbsp;<?php echo ($web_info['set_addr']); ?><br>
            <i class="fa fa-phone"></i>&nbsp;<?php echo ($web_info['set_tel']); ?><br>
             <i class="fa fa-envelope-o"></i>&nbsp;<?php echo ($web_info['set_email']); ?>
              </div> 
                </div><!-- end widget --> 
    </div>
  </div>
</div>
			<div class="social text-center">
				<a href="#"><i class="fa fa-twitter"></i></a>
				<a href="#"><i class="fa fa-facebook"></i></a>
				<a href="#"><i class="fa fa-dribbble"></i></a>
				<a href="#"><i class="fa fa-flickr"></i></a>
				<a href="#"><i class="fa fa-github"></i></a>
			</div>

			<div class="clear"></div>
			<!--CLEAR FLOATS-->
		</div>
		<div class="footer2">
			<div class="container">
				<div class="row">
					<div class="col-md-12 panel">
						<div class="panel-body">
							<p class="text-center">
								<?php echo ($web_info['set_footer']); ?>
							</p>
						</div>
					</div>

				</div>
				<!-- /row of panels -->
			</div>
		</div>
	</footer>

	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="/Public/assets/js/modernizr-latest.js"></script> 
	<script type='text/javascript' src='/Public/assets/js/jquery.min.js'></script>
    <script type='text/javascript' src='/Public/assets/js/fancybox/jquery.fancybox.pack.js'></script>
    
    <script type='text/javascript' src='/Public/assets/js/jquery.mobile.customized.min.js'></script>
    <script type='text/javascript' src='/Public/assets/js/jquery.easing.1.3.js'></script> 
    <script type='text/javascript' src='/Public/assets/js/camera.min.js'></script> 
    <script src="/Public/assets/js/bootstrap.min.js"></script> 
	<script src="/Public/assets/js/custom.js"></script>
    <script>
		jQuery(function(){
			
			jQuery('#camera_wrap_4').camera({
                transPeriod: 500,
                time: 3000,
				height: '600',
				loader: 'false',
				pagination: true,
				thumbnails: false,
				hover: false,
                playPause: false,
                navigation: false,
				opacityOnGrid: false,
				imagePath: '/Public/assets/images/'
			});

		});
      
	</script>
    
</body>
</html>