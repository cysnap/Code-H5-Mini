<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
	<title><?php if(is_single() || is_page() || is_archive() || is_404() || is_search()) : wp_title('_',true,'right'); endif; bloginfo('name');  if( $paged == "" ) $pagenum = "";else echo $pagenum = " - 第 ".$paged." 页"; ?></title>
	<?php if(strpos($_SERVER['HTTP_USER_AGENT'],'AppleWebKit') !== false) :?>
	<link rel="apple-touch-icon" href="/iOS_icon.png"/>
	<?php endif;?>
	<?php if(is_home() && !is_paged()) :?>
		<meta name="description" content="<?php echo bloginfo('description'); ?>" />
		<?php endif; if(is_single()) :?>
		<meta name="description" content="<?php echo mb_substr(strip_tags($post->post_content),0,120); ?>" />
		<?php endif; if(is_category() && !is_paged()) :?>
		<meta name="description" content="<?php echo strip_tags(category_description()); ?>" />
	<?php endif;?>
	<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url');_e('?');echo(date('Ynj', time()));?>" />
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<script type="text/javascript" src="http://imgcdn.sinaapp.com/js/jquery-2.0.3.min.js"></script>
	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/functions.js"></script>
	<?php wp_head(); ?>
</head>

<body id="main">

<div class="header">
	<div class="nova-l-h">
			<div class="nova-l"><a href="<?php echo get_settings('home'); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo.gif" height="60px" alt="<?php bloginfo('name'); ?>" /></a></div>
			<div class="nova-r">
			<?php if(!is_home()) : show_ads(1); else : show_ads(8); endif; ?>
			</div>
			<div class="clearfix"></div>
	</div>
	<?php wp_nav_menu( array( 'theme_location' => 'header-menu','container_class' => 'nav','items_wrap' => '<ul>%3$s</ul>', ) ); ?>
</div>

<div class="wrapper">

	<div class="flat_image">
		<ul>
			<?php wp_reset_query(); ?>
			<?php query_posts($query_string . 'meta_key=flat_image&posts_per_page=5'); ?>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<li>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php $key="flat_image"; echo get_post_meta($post->ID, $key, true); ?>"/>
				<span><?php the_title(); ?></span></a>
			</li>
			<?php endwhile; endif; ?>
			<?php wp_reset_query(); ?>
		</ul>
	</div>

	<div class="content">

