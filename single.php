<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="post-single clearfix" id="post-<?php the_ID(); ?>">

	<div class="fuss nova">您的位置： <a href="<?php echo get_settings('home'); ?>" title="首页">首页</a>&nbsp;&raquo;&nbsp;<?php the_category(' &gt; '); ?>&nbsp;&raquo;&nbsp;<a href="<?php the_permalink() ?>" rel="bookmark" title="到 <?php the_title(); ?> 的永久链接"><?php the_title(); ?></a></div>
	
	<div class="post_navigation">
		<div class="previous-entries nova-l"><?php previous_post_link('%link') ?></div>
		<div class="next-entries nova-r"><?php next_post_link('%link') ?></div>
		<div class="clearfix"></div>
	</div>

	<div class="meta nova">

		<div class="post-single-title">
			<h2><?php the_title(); ?></h2>
			<span class="post-single-info"><?php the_author(); ?>&nbsp;发表于&nbsp;:&nbsp;<?php the_time('Y-m-d H:i'); ?>&nbsp;|&nbsp;主题&nbsp;:&nbsp;<?php the_category(', ') ?>&nbsp;|&nbsp;<?php the_views(); ?>&nbsp;次浏览&nbsp;|&nbsp;<?php comments_popup_link('发表评论', '1 条评论', '% 条评论'); ?>&nbsp;<?php edit_post_link('编辑', ' | ', ''); ?></span>
		</div>
		
		<div class="entry clearfix">
		<?php if(!is_attachment()) :?>
		<div class="post-single-cat-img">
			<?php
			$the_cat = get_the_category();
			$category_slug = $the_cat[0]->slug;
			$category_name = $the_cat[0]->cat_name;
			$category_description = $the_cat[0]->category_description;
			$category_link = get_category_link( $the_cat[0]->cat_ID );
			?>
			<a href="<?php echo $category_link; ?>" title="<?php echo $category_name; ?>"><img src="http://imgcdn.sinaapp.com/cat-img/<?php echo $category_slug; ?>.gif" /></a>
		</div>
		<?php endif;?>
		<?php the_content(); ?>
		<?php if(!is_crawler()) :?>
		<div class="entry_ads"><?php show_ads(1);?></div>
		<p style="padding:0px;">本文来自: <a href="<?php the_permalink() ?>" rel="bookmark" title="到 <?php the_title(); ?> 的永久链接"><?php the_title(); ?></a> - 索引标签：<?php the_tags('',', ',''); ?></p>
		<?php endif; ?>
		
		</div>
	<div id="wumiiDisplayDiv"></div>
	</div>

	<?php comments_template(); ?>

	<?php endwhile; else: ?>
	<p>咦！居然没有您要访问的页面，有可能是被删帖了哦！</p>
	<?php endif; ?>
</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>