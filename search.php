<?php get_header(); ?>
<div class="post-block">
<div class="fuss nova">搜索结果 : <strong><?php the_search_query() ?></strong></div>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<div class="post" id="post-<?php the_ID(); ?>">
	<div class="post-title">
		<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="到 <?php the_title(); ?> 的永久链接"><?php the_title(); ?></a></h2>
		<span class="post-info"><?php the_author(); ?>&nbsp;发表于 &nbsp;: <?php the_time('Y-m-d H:i:s'); ?>&nbsp;|&nbsp; 分类: <?php foreach((get_the_category()) as $category) {echo $category->cat_name . ' ';}?>&nbsp;|&nbsp;<?php the_views($display = false); ?>&nbsp;次浏览</span>
		<?php edit_post_link(' 编辑', '<span class="post-edit">', '</span>'); ?>
	</div>
	
	<div class="entry clearfix">
		<div class="cat-img">
				<?php
				$the_cat = get_the_category();
				$category_slug = $the_cat[0]->slug;
				$category_name = $the_cat[0]->cat_name;
				$category_description = $the_cat[0]->category_description;
				$category_link = get_category_link( $the_cat[0]->cat_ID );
				?>
				<a href="<?php echo $category_link; ?>" title="<?php echo $category_name; ?>"><img src="http://imgcdn.sinaapp.com/cat-img/<?php echo $category_slug; ?>.gif" /></a>
		</div>
	<?php the_content('',TRUE,''); ?>
	</div>

	<div class="post-bottom clearfix">
			<span class="post-info"><?php the_author(); ?>&nbsp;发表于 &nbsp;: <?php the_time('Y-m-d H:i'); ?>&nbsp;-&nbsp; 主题 : <?php foreach((get_the_category()) as $category) {echo $category->cat_name . ' ';}?>&nbsp;-&nbsp;<?php the_views($display = false); ?>&nbsp;次浏览</span>
			<span class="nova-r">
				<?php comments_popup_link('参与讨论&nbsp;&raquo;', '1 条评论&nbsp;&raquo;', '% 条评论&nbsp;&raquo;', 'post-comments'); ?>&nbsp;&nbsp;&nbsp;<a class="more-link" href="<?php the_permalink() ?>" title="<?php the_title(); ?>" target="_blank" rel="nofollow">查看全文&nbsp;&raquo;</a>
			</span>
	</div>

</div>

<?php endwhile; ?>
<div class="navigation"><div class="previous-entries nova-l"><?php next_posts_link('上一页') ?></div> <div class="next-entries nova-r"><?php previous_posts_link('下一页') ?></div></div>
<?php else : ?>
<div class="fuss nova">没有找到文章。尝试再次搜索?</div>
<?php endif; ?>
</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
