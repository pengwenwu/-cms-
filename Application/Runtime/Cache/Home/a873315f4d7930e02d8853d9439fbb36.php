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
	<!-- container -->
	<div class="container">
				<div class="row">
					<div class="col-md-8">
						<h3 class="section-title">留言板</h3>
						<p>
						您可以在这里提交您的联系信息和您的业务需求，我们的客服会在第一时间与您取得联系。
						</p>
						
		<!--NOTE: Update your email Id in "contact_me.php" file in order to receive emails from your contact form-->
		<form method="post" action="<?php echo U('Index/contact');?>" name="sentMessage" id="contactForm"  novalidate> 
		<div class="control-group">
		<div class="controls">
		<input type="text" class="form-control" name='m_name'
		placeholder="您的姓名" id="name" required
		data-validation-required-message="请输入您的姓名" />
		<p class="help-block"></p>
		</div>
		</div> 	
		<div class="control-group">
		<div class="controls">
		<input type="email" class="form-control" placeholder="邮箱地址" name='m_email'
		id="email" required
		data-validation-required-message="请输入您的邮箱地址" />
		</div>
		</div> 	

		<div class="control-group">
		<div class="controls">
		<textarea rows="10" cols="100" class="form-control" name='m_content'
		placeholder="留言" id="message" required
		data-validation-required-message="请输入您的留言内容" minlength="5" 
		data-validation-minlength-message="至少五个字符" 
		maxlength="999" style="resize:none"></textarea>
		</div>
		</div> 		 
		<div id="success"> </div> <!-- For success/fail messages -->
		<button type="submit" class="btn btn-primary pull-right">提交</button><br />
		</form>
					</div>
					<div class="col-md-4">
						<div class="row">
							<div class="col-md-6">
								<h3 class="section-title">联系我们</h3>
								<div class="contact-info">
									<h5><b>地址</b></h5>
									<p><?php echo ($info['set_addr']); ?></p>
									
									<h5><b>邮箱</b></h5>
									<p><?php echo ($info['set_email']); ?></p>

									<h5><b>QQ</b></h5>
									<p><?php echo ($info['set_qq']); ?></p>
									
									<h5><b>电话</b></h5>
									<p><?php echo ($info['set_tel']); ?></p>
								</div>
							</div> 
						</div> 						
					</div>
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