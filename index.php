<?php get_header(); ?>

<?php if ( is_home()) : ?>
<div class="headflash">
	<script>$(function() {$("#rslides").responsiveSlides({auto: true,pager: true,speed: 500,maxwidth: 260})});</script>
	<div class="flashNews">
		<ul id="rslides">
			<?php wp_reset_query(); ?>
			<?php query_posts($query_string . 'meta_key=flash_image&posts_per_page=4'); ?>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<li>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<img src="<?php $key="flash_image"; echo get_post_meta($post->ID, $key, true); ?>"/>
					<span><?php the_title(); ?></span>
				</a>
			</li>
			<?php endwhile; endif; ?>
			<?php wp_reset_query(); ?>
		</ul>
	</div>

	<div class="headrcmd">
			<?php query_posts($query_string . 'tag=recommended&posts_per_page=6'); ?>
			<?php $count = 1;if ( have_posts() ) : while ( have_posts() ) : the_post(); if ($count == 1) : ?>
			<div class="headsgst">
				<dl>
				<dt><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></dt>
				<dd><?php echo mb_strimwidth(strip_tags(apply_filters('the_excerpt', $post->post_content)), 0, 120,"..."); ?> <small>[<a href="<?php the_permalink(); ?>" >查看详情</a> - <?php the_views($display = false); ?>&nbsp;次浏览]</small></dd>
				</dl>
			</div>
			<div class="headsgst">
				<ul>
					<?php else: ?>
					<li><span class="sidebar-count">(<?php the_views($display = false); ?>)</span><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo mb_strimwidth(get_the_title(), 0, 40, '...'); ?></a></li>
					<?php endif; $count++; endwhile; endif; ?>
					<?php wp_reset_query(); ?>
				</ul>
			</div>
	</div>
	<div class="clearfix"></div>
</div>

<?php endif; ?>

<div class="post-block">
	<?php $rcmdcounter = 0; ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php $rcmdcounter++; ?>
	<div class="post">
		<div class="post-title">
			<?php if(is_sticky()) : ?>
			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>" target="_blank"><?php the_title(); ?></a><?php _e('<span style="color:red;">[置顶] </span>'); ?></h2>
			<?php else: ?>
			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>" target="_blank"><?php the_title(); ?></a><?php video_tag(); ?><?php $diff = strtotime(date('Y-m-d H:i:s'))-strtotime(get_the_time('Y-m-d H:i:s')); if ($diff <= -25100){ ?><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/new-icon.gif"><?php } ?></h2>
			<?php endif; ?>
			<span class="post-count"><?php echo($rcmdcounter); ?>#</span>
		</div>
		
		<div class="entry clearfix">
			<div class="nova-r">
				<?php
				$the_cat = get_the_category();
				$category_slug = $the_cat[0]->slug;
				$category_name = $the_cat[0]->cat_name;
				$category_description = $the_cat[0]->category_description;
				$category_link = get_category_link( $the_cat[0]->cat_ID );
				?>
				<a href="<?php echo $category_link; ?>" title="<?php echo $category_name; ?>"><img src="http://imgcdn.sinaapp.com/cat-img/<?php echo $category_slug; ?>.gif" /></a>
			</div>
		<?php the_content('',TRUE,'');?>
		
		</div>

		<div class="post-bottom clearfix">
			<span class="post-info"><?php the_author(); ?>&nbsp;发表于 &nbsp;: <?php the_time('Y-m-d H:i'); ?>&nbsp;-&nbsp; 主题 : <?php foreach((get_the_category()) as $category) {echo $category->cat_name . ' ';}?>&nbsp;-&nbsp;<?php the_views($display = false); ?>&nbsp;次浏览</span>
			<span class="nova-r">
				<?php comments_popup_link('参与讨论&nbsp;&raquo;', '1 条评论&nbsp;&raquo;', '% 条评论&nbsp;&raquo;', 'post-comments'); ?>&nbsp;&nbsp;&nbsp;<a class="more-link" href="<?php the_permalink() ?>" title="<?php the_title(); ?>" target="_blank" rel="nofollow">查看全文&nbsp;&raquo;</a>
			</span>
		</div>
	</div>

	<?php endwhile; ?>
	</div>
	<?php pagenavi(); else : ?>
	<div class="fuss nova">内容不存在。</div>
	<?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
