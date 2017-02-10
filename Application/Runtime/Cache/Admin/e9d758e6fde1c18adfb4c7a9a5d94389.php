<?php if (!defined('THINK_PATH')) exit();?>

<header id="head" class="secondary">
    <div class="container">
        <h1>课程中心</h1>
    </div>
</header>

    
	<div id="courses">
		<section class="container">
			<div class="row">

			<!-- Article main content -->
			<article class="col-md-8 maincontent">
				<br>
				<br>
				<table style="text-align: center;" width="100%">
					<tr><td><h2><?php echo ($info['c_name']); ?></h2></td></tr>
					<tr align="center"><td>
						作者：<?php echo ($info['c_author']); ?>&nbsp;&nbsp;&nbsp;
						分类：<?php echo ($info['c_pname']); ?>&nbsp;&nbsp;&nbsp;
						点击率：<?php echo ($info['c_count']); ?>&nbsp;&nbsp;&nbsp;
						发布日期：<?php echo date('Y-m-d H:i:s',$info['c_date']);?>
					</td></tr>
					<tr>
						<td style='text-align:left;'>
						<?php echo ($info['c_content']); ?>
						</td>
					</tr>
				</table>
				
			</article>
			<!-- /Article -->

			<!-- Sidebar -->
			<aside class="col-md-4 sidebar sidebar-right">
				<div class="row panel">
				<?php if(is_array($p_title)): foreach($p_title as $key=>$v1): ?><div class="col-xs-12">
						<h3><?php echo ($v1['c_name']); ?></h3>
						<?php if(is_array($s_title)): foreach($s_title as $key=>$v2): if($v2['c_pid'] == $v1['c_id']): ?><p><a href="http://<?php echo ($_SERVER['HTTP_HOST']); ?>/classes/<?php echo ($v2['c_id']); ?>.html"><?php echo ($v2['c_name']); ?></a></p><?php endif; endforeach; endif; ?>
					</div><?php endforeach; endif; ?>
				</div>
			</aside>
			<!-- /Sidebar -->

		</div>

		</section>
	</div>