<?php get_header(); ?>
<div class="fuss nova">搜索结果 : <strong><?php the_search_query() ?></strong></div>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<div class="post meta clearfix">
<div class="post-title">
<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="到 <?php the_title(); ?> 的永久链接"><?php the_title(); ?></a></h2>
<span class="post-info"><?php the_author_posts_link(); ?>&nbsp;发表于 &nbsp;: <?php the_time('Y-m-d H:i:s'); ?>&nbsp;-&nbsp; 分类: <?php the_category(', ') ?>&nbsp;</span>
<?php edit_post_link(' 编辑', '<span class="post-edit">', '</span>'); ?>
</div>
<div class="entry clearfix">
<?php the_excerpt(); ?>
</div>
<div class="post-bottom clearfix"><span class="post-tags"><?php the_tags('', ', ', ''); ?></span><span class="nova-r"><?php comments_popup_link('参与讨论', '1 条评论', '% 条评论', 'post-comments'); ?>&nbsp;&nbsp;<a class="more-link" href="<?php the_permalink() ?>" title="<?php the_title(); ?>" target="_blank">查看全文</a></span></div>
</div>
<?php endwhile; ?>
<div class="navigation"><div class="previous-entries nova-l"><?php next_posts_link('较旧文章') ?></div> <div class="next-entries nova-r"><?php previous_posts_link('较新文章') ?></div></div>
<?php else : ?>
<div class="fuss nova">没有找到文章。尝试再次搜索?</div>
<?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>