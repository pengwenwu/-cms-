<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>内容管理系统</title>
	<link rel="favicon" href="/Public/assets/images/favicon.png">
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
					<?php if(is_array($p_list)): foreach($p_list as $key=>$v): ?><li <?php if(ACTION_NAME == $v['col_action']): ?>class="active"<?php endif; ?>  ><a href="<?php echo U($v['col_action']);?>"><?php echo ($v['col_name']); ?></a></li><?php endforeach; endif; ?>
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
	<!-- /.navbar -->

 	<header id="head" class="secondary">
    <div class="container">
        <h1><b>关于我们</b></h1>
    </div>
    </header>


    <!-- container -->
    <section class="container">
        <div class="row">
            <!-- main content -->
            <section class="col-sm-8 maincontent">
                <h3>详细介绍</h3>
                <p>
                    <img src="/Public/assets/images/img9.jpg" alt="" class="img-rounded pull-right" width="300">
                </p>
                <p><?php echo ($info['set_content']); ?></p>
                
                <h3>大牛介绍</h3>
                <?php if(is_array($member_list)): foreach($member_list as $key=>$v): ?><h4><b><?php echo ($v['m_name']); ?></b></h4>
                    <p><?php echo ($v['m_desc']); ?></p><?php endforeach; endif; ?>
            </section>
            <!-- /main -->

            <!-- Sidebar -->
            <aside class="col-sm-4 sidebar sidebar-right">

                <div class="panel">
                    <h4>热门新闻</h4>
                    <ul class="list-unstyled list-spaces">
                        <?php if(is_array($news_list)): foreach($news_list as $key=>$v): ?><li><a href="<?php echo U('Index/news',array('news_id'=>$v['n_id']));?>"><?php echo ($v['n_name']); ?>---点击率:<?php echo ($v['n_count']); ?>次</a><br>
                            <span class="small text-muted"><?php echo ($v['n_desc']); ?></span></li><?php endforeach; endif; ?>
                    </ul>
                </div>

            </aside>
            <!-- /Sidebar -->

        </div>
    </section>
    <!-- /container -->
    <section class="team-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>团队阵容</h3>
                    <p>这里有来自各个领域的大神</p>
                    <br />
                </div>
            </div>
            <div class="row">
                <?php if(is_array($member_list2)): foreach($member_list2 as $key=>$v): ?><div class="col-md-3 col-sm-6 col-xs-6">
                        <!-- Team Member -->
                        <div class="team-member">
                            <!-- Image Hover Block -->
                            <div class="member-img">
                                <!-- Image  -->
                                <img src="<?php echo ($v['m_pic']); ?>" alt="" width="263" height="263">
                            </div>
                            <!-- Member Details -->
                            <h4><?php echo ($v['m_name']); ?></h4>
                            <!-- Designation -->
                            <span class="pos"><?php echo ($v['m_position']); ?></span>
                            <div class="team-socials">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-dribbble"></i></a>
                                <a href="#"><i class="fa fa-github"></i></a>
                            </div>
                        </div>
                    </div><?php endforeach; endif; ?>
            </div>
        </div>
    </section>
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