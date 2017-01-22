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

	<!-- Header -->
	<header id="head">
		<div class="container">
             <div class="heading-text">							
							<h1 class="animated flipInY delay1">Start Online Education</h1>
							<p>Free Online education template for elearning and online education institute.</p>
						</div>
            
					<div class="fluid_container">                       
                    <div class="camera_wrap camera_emboss pattern_1" id="camera_wrap_4">
                        <div data-thumb="/Public/assets/images/slides/thumbs/img1.jpg" data-src="/Public/assets/images/slides/img1.jpg">
                            <h2>We develop.</h2>
                        </div> 
                        <div data-thumb="/Public/assets/images/slides/thumbs/img2.jpg" data-src="/Public/assets/images/slides/img2.jpg">
                        </div>
                        <div data-thumb="/Public/assets/images/slides/thumbs/img3.jpg" data-src="/Public/assets/images/slides/img3.jpg">
                        </div> 
                    </div><!-- #camera_wrap_3 -->
                </div><!-- .fluid_container -->
		</div>
	</header>
	<!-- /Header -->

  <div class="container">
    <div class="row">
					<div class="col-md-3">
						<div class="grey-box-icon">
							<div class="icon-box-top grey-box-icon-pos">
								<img src="/Public/assets/images/1.png" alt="" />
							</div><!--icon box top -->
							<h4>在线课程</h4>
              <p>数据结构</p>
              <p>算法</p>
							<p>面试技巧</p>
     						<p><a href="<?php echo U('Index/classes');?>"><em>了解更多</em></a></p>
						</div><!--grey box -->
					</div><!--/span3-->
					<div class="col-md-3">
						<div class="grey-box-icon">
							<div class="icon-box-top grey-box-icon-pos">
								<img src="/Public/assets/images/2.png" alt="" />
							</div><!--icon box top -->
							<h4>授课方式</h4>
              <p>线上教学</p>
              <p>指导学习方法</p>
							<p>解决问题</p>
     						<p><a href="<?php echo U('Index/classes');?>"><em>了解更多</em></a></p>
						</div><!--grey box -->
					</div><!--/span3-->
					<div class="col-md-3">
						<div class="grey-box-icon">
							<div class="icon-box-top grey-box-icon-pos">
								<img src="/Public/assets/images/3.png" alt="" />
							</div><!--icon box top -->
							<h4>最新课程</h4>
              <?php if(is_array($class_list)): foreach($class_list as $key=>$v): ?><p><?php echo ($v['c_name']); ?></p><?php endforeach; endif; ?>
              
     						<p><a href="<?php echo U('Index/classes');?>"><em>了解更多</em></a></p>
						</div><!--grey box -->
					</div><!--/span3-->
					<div class="col-md-3">
						<div class="grey-box-icon">
							<div class="icon-box-top grey-box-icon-pos">
								<img src="/Public/assets/images/4.png" alt="" />
							</div><!--icon box top -->
							<h4>联系我们</h4>
              <p>在线留言</p>
              <p>联系方式</p>
							<p>公司地址</p>
     						<p><a href="<?php echo U('Index/contact');?>"><em>了解更多</em></a></p>
						</div><!--grey box -->
					</div><!--/span3-->
				</div>
    </div>
      <section class="news-box top-margin">
        <div class="container">
            <h2><span>最新课程</span></h2>
            <div class="row">
                <?php if(is_array($info)): foreach($info as $key=>$v): ?><div class="col-lg-4 col-md-4 col-sm-12" style="height:260px;">
                      <div class="newsBox">
                          <div class="thumbnail">
                              <figure><a href="<?php echo U('Index/classes',array('class_id'=>$v['c_id']));?>"><img src="<?php echo ($v['c_pic']); ?>" alt="" width="352" height="147"></a></figure>
                              <div class="caption maxheight2">
                              <div class="box_inner">
                                          <div class="box">
                                              <p class="title"><h5><?php echo ($v['c_name']); ?></h5></p>
                                              <p><?php echo ($v['c_desc']); ?></p>
                                          </div> 
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div><?php endforeach; endif; ?>
            </div>
        </div>
    </section>
	
    <section class="container">
    <div class="row">
    	<div class="col-md-8"><div class="title-box clearfix "><h2 class="title-box_primary">关于我们</h2></div> 
      <p><span><?php echo ($web_info['set_desc']); ?>
      </span></p>
      <a href="<?php echo U('Index/about');?>" title="了解更多" class="btn-inline">了解更多</a> </div>
            
        
        <div class="col-md-4"><div class="title-box clearfix "><h2 class="title-box_primary">即将上线</h2></div> 
          <div class="list styled custom-list">
          <ul>
          <?php if(is_array($adv_list)): foreach($adv_list as $key=>$v): ?><li><?php echo ($v['adv_name']); ?></li><?php endforeach; endif; ?>
          </ul>
          </div>
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