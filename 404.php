<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<title>404 | <?php bloginfo('name'); ?></title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/style.css" type="text/css" media="screen" />
</head>

<body id="main">
	<div class="kudos">
		<div class="kudos-title">
			<a href="<?php echo get_settings('home'); ?>/"><h1>测试版资讯::IT业界资讯及时推送！</h1></a>
		</div>
		<div class="kudos-widget">
			<div class="kudos-title"><p>404！这个页面被缺心眼的站长给弄丢！再也找不回来了！</p></div>
			<div class="keywords clearfix"><h3>站内热门话题</h3><?php wp_tag_cloud('smallest=9&largest=15&number=8&orderby=count&order=DESC'); ?></div>
			<div class="keywords">
				<h3>最新文章</h3>
				<ul><?php echo mb_strimwidth(strip_tags(wp_get_archives('type=postbypost&limit=10')), 0, 35,'...') ?></ul>
			</div>
		</div>
	</div>
</body>
</html>
