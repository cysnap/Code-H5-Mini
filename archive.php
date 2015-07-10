<?php get_header(); ?>
<div class="fuss nova">
<?php if (is_day()) { ?>存档：<strong><?php the_time('Y 年 n 月 j 日'); ?></strong>
<?php } elseif (is_month()) { ?>存档：<strong><?php the_time('Y 年 n 月'); ?></strong>
<?php } elseif (is_year()) { ?>存档：<strong><?php the_time('Y 年'); ?></strong>
<?php } elseif (is_tag()) { ?>标签为 : <strong><?php single_tag_title(); ?></strong> &nbsp;的所有文章
<?php } elseif (is_author()) { ?><?php $curauth = get_userdata(get_query_var('author')); ?>作者 Author : <strong><?php echo $curauth->nickname; ?></strong> - <small>目前发表了 <?php the_author_posts(); ?> 篇文章</small>
<?php } ?></div>

<?php if (is_author()) { ?><div class="entry author-profile">
<div class="author-avatar gravatar nova-l"><?php echo get_avatar($curauth->user_email, '28', $avatar); ?></div>
<div class="author-description comment-content"><blockquote><?php echo $curauth->user_description; ?><br/><strong>URL</strong>: <a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a></blockquote></div>
</div><?php } ?>

<?php if(is_tag()) { ?>
<table width="100%" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#CCCCCC" style="margin:10px 0;"><tbody>
	<tr bgcolor="#F1F9FC">
		<td width="38%" height="35" align="center" >新闻标题</td>
		<td width="17%" align="center" >主题</td>
		<td width="14%" align="center" >时间</td>
		<td width="11%" align="center" >浏览次数</td>
	</tr>
<?php } ?>

<?php rewind_posts() ?>
<?php $count = 1; ?>
<?php while ( have_posts() ) : the_post(); ?>

<?php if(is_tag()) { ?>
<tr bgcolor="#FFFFFF">
	<td width="38%" height="40" align="center"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></td>
	<td width="17%" align="center" ><?php the_category(', ') ?></td>
	<td width="14%" align="center" ><small><?php the_time('m-d H:i'); ?></small></td>
	<td width="11%" align="center" ><small><?php the_views($display = false); ?></small></td>
</tr>
<?php } elseif(!is_paged()){ ?>

<?php if ($count <= 3) : ?>
<div class="post meta" id="post-<?php the_ID(); ?>">
	<div class="post-title">
		<h2><a href="<?php the_permalink() ?>" rel="bookmark" ><?php the_title(); ?></a></h2>
		<span class="post-info"><?php the_author(); ?>&nbsp;发表于 &nbsp;: <?php the_time('Y-m-d H:i:s'); ?>&nbsp;|&nbsp; 分类: <?php foreach((get_the_category()) as $category) {echo $category->cat_name . ' ';}?>&nbsp;|&nbsp;<?php the_views($display = false); ?>&nbsp;次浏览</span>
		<?php edit_post_link(' 编辑', '<span class="post-edit">', '</span>'); ?>
	</div>
	
	<div class="entry clearfix">
		<div class="cat-img">
			<a href="<?php bloginfo('url'); ?>/archives/category/<?php foreach((get_the_category()) as $cat){echo $cat->category_nicename;}?>" title="<?php single_cat_title() ?>"><img src="http://imgcdn.sinaapp.com/cat-img/<?php foreach((get_the_category()) as $cat){echo $cat->category_nicename;}?>.gif" alt="<?php single_cat_title() ?>" ></a>
		</div>
	<?php the_content('',TRUE,''); ?>
	</div>
	<div class="post-bottom clearfix"><span class="post-tags"><?php the_tags('', ' - ', ''); ?></span><span class="nova-r"><?php comments_popup_link('参与讨论&nbsp;&raquo;', '1 条评论&nbsp;&raquo;', '% 条评论&nbsp;&raquo;', 'post-comments'); ?>&nbsp;&nbsp;&nbsp;<a class="more-link" href="<?php the_permalink() ?>" title="<?php the_title(); ?>" target="_blank" rel="nofollow">查看全文&nbsp;&raquo;</a></span></div>
</div>
<?php else: ?>
<div class="meta nova" id="post-<?php the_ID(); ?>">
		<div class="nova-l"><h2><a href="<?php the_permalink() ?>" rel="bookmark" ><?php the_title(); ?></a></h2></div>
		<div class="nova-r"><span><small> (<?php the_author(); ?>&nbsp;- <?php the_time('m月d日 H:i'); ?> - <?php the_views($display = false); ?>) 次浏览</small></span></div>
		<div class="clearfix"></div>
</div>
<?php endif; $count++; ?>

<?php }else{ ?>
<div class="meta nova" id="post-<?php the_ID(); ?>">
		<div class="nova-l"><h2><a href="<?php the_permalink() ?>" rel="bookmark" ><?php the_title(); ?></a></h2></div>
		<div class="nova-r"><span><small> (<?php the_author(); ?>&nbsp;- <?php the_time('m月d日 H:i'); ?> - <?php the_views($display = false); ?>) 次浏览</small></span></div>
		<div class="clearfix"></div>
</div>
<?php }?>

<?php endwhile; ?>
<?php if(is_tag()) : ?>
	<tr bgcolor="#F1F9FC">
		<td width="38%" height="23" align="center" >新闻标题</td>
		<td width="17%" align="center" >主题</td>
		<td width="14%" align="center" >时间</td>
		<td width="11%" align="center" >浏览次数</td>
	</tr>
</tbody></table>
<?php endif; pagenavi(); ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
