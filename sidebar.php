<div class="sidebar">

	<ul>
		<?php if(is_home()) {?>
		<li class="sidebar-li">
			<?php show_ads(3); ?>
		</li>
		<?php } ?>
		<?php if(!is_single()) {?>
			<li class="sidebar-li"><div class="mobile"></div></li>
		<?php } ?>
		<li class="sidebar-li">
			<?php show_ads(10); ?>
		</li>
		
		<?php if (!is_search()) {$search_text = "站内新闻搜索";} else {$search_text = "$s";} ?>
		<li class="sidebar-li">
			<div class="search">
				<form method="get" class="searchform" name="searchform" action="<?php echo $_SERVER['PHP_SELF']; ?>">
					<input type="text" class="search-input nova-l" size="24" value="站内新闻搜索" name="s" onfocus="if (this.value == '站内新闻搜索') {this.value = '';}" onblur="if (this.value == '') {this.value = '站内新闻搜索';}" />
					<input type="submit" class="search-submit nova-r" value="" />
				</form>
			</div>
		</li>
		
		<?php if (is_category()) { ?>
		<li class="sidebar-li">
			<h2 class="sidebar-title">本月热门</h2>
			<div class="notice nova">
				<ul class="list_page">
					<?php $categories = get_the_category(); foreach ($categories as $category) {get_most_viewed_category($category_id = $category->term_id, $mode = '', $limit = 10, $chars = 0, $display = true); } ?>
				</ul>
			</div>
		</li>
		<?php } ?>

		<?php if (is_day() || is_month() || is_year()) {?>
		<li class="sidebar-li">
			<?php get_calendar();?>
		</li>

		<?php } ?>
		
		<?php if ( !is_home() && !is_crawler() ) { ?>
		<li class="sidebar-li">
			<h2 class="sidebar-title">最新文章</h2>
			<div class="notice nova">
				<ul class="list_page"><?php echo mb_strimwidth(strip_tags(wp_get_archives('type=postbypost&limit=10')), 0, 35,'...') ?></ul>
			</div>
			<div class="clearfix"></div>
		</li>
		<?php } ?>
		
		<?php if ( is_home() ) { ?>
		
		<li class="sidebar-li">
			<h2 class="sidebar-title">本周热门</h2>
			<div class="notice">
				<ul> <?php if (function_exists('get_most_viewed')): ?>
					<?php get_most_viewed('post', 15, 0, true, true); ?>
					<?php endif; ?>
				</ul>
			</div>
		</li>
		<li class="sidebar-li">
			<h2 class="sidebar-title">编辑推荐</h2>
			<div class="sidebar-rcmd-content">
				<?php add_filter('posts_where', 'filter_where');?>
				<?php query_posts($query_string . '&meta_key=views&orderby=meta_value_num&order=DESC&showposts=12'); ?>
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<dl>
						<dt><h4><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"> <?php echo mb_strimwidth(get_the_title(), 0, 37, '...'); ?> </a></h4></dt>
						<dd>
							<p><?php if ( get_post_meta( get_the_ID(), 'thumbnail', true ) ) : ?><a href="<?php the_permalink() ?>" rel="bookmark"><img class="thumbnail" src="<?php echo get_post_meta( get_the_ID(), 'thumbnail', true ) ?>" alt="<?php the_title(); ?>" /></a>
<?php endif; ?>
							<?php echo mb_strimwidth(strip_tags(apply_filters('the_excerpt', $post->post_content)), 0, 110,"..."); ?></p>
						</dd>
					</dl>
				<?php endwhile; else: ?>
				<?php endif; wp_reset_query(); ?> 
				<?php remove_filter('posts_where', 'filter_where');?>
			</div>
		</li>

		<li class="sidebar-li">
			<h2 class="sidebar-title">标签和主题排行榜</h2>
			<div class="notice nova">
				<?php wp_tag_cloud('smallest=12&largest=12&number=10&format=list&orderby=count&order=DESC'); ?>
				<ul style="width:195px;float:right;" class="wp-tag-cloud">
				<?php wp_list_categories('number=10&orderby=count&order=DESC&title_li=0&depth=-1'); ?>
				</ul>
				<div class="clearfix"></div>
			</div>
			
		</li>
		<?php } ?>
		

		<?php if ( is_single() && !is_attachment()) { ?>
		<li class="sidebar-li">
			<h2 class="sidebar-title">相关文章</h2>
			<div class="notice nova">
				<ul class="list_page">
				<?php $categories = get_the_category(); foreach ($categories as $category) : ?>
				<?php $posts = get_posts('numberposts=10&category='. $category->term_id); foreach($posts as $post) : ?>
				<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li> <?php endforeach; ?>
				<?php endforeach; ?>
				</ul>
			</div>
		</li>
		<?php }?>

		<?php if ( is_home() ) { ?>
		<li class="sidebar-li">
			<?php show_ads(3); ?>
		</li>
		<li class="sidebar-li">
			<h2 class="sidebar-title">最新评论</h2>
			<div class="sidebar-comment"><?php most_recent_comments(); ?></div>
		</li>
		<li class="sidebar-li">
			<?php show_ads(3); ?>
		</li>
		<?php } ?>
		
		<?php if(!is_home() && !is_crawler() && !is_attachment()) {?>
		<li class="sidebar-li">
			<h2 class="sidebar-title">标签云</h2>
			<div class="notice nova">
			<?php wp_tag_cloud('smallest=11&largest=14&format=flat&orderby=count&order=DESC&exclude=82'); ?>
			</div>
		</li>
		<?php } ?>
		
		<?php if ( !is_single() && !is_tag() && !is_paged() && !is_crawler() ) { ?>
		<li class="sidebar-li">
			<h2 class="sidebar-title">本月热评文章</h2>
			<div class="notice">
				<ul class="list_page"><?php most_commented_posts(); ?></ul>
			</div>
		</li>
		<?php } ?>
		
		<?php if ( is_home() && !is_crawler() ) { ?>
		<li class="sidebar-li">
			<h2 class="sidebar-title">存档</h2>
			<div class="notice list_archives">
			<form action="<?php bloginfo('url'); ?>/" method="get">
				<?php
				$select = wp_dropdown_categories('show_option_none=选择分类&show_count=1&orderby=name&echo=0');
				$select = preg_replace("#<select([^>]*)>#", "<select$1 onchange='return this.form.submit()'>", $select);
				echo $select;
				?>
			<noscript><input  type="submit" value="View" /></noscript>
			</form>

			<select class="postform_r" onChange='document.location.href=this.options[this.selectedIndex].value;'>
				<option><?php echo attribute_escape(__('Select Month')); ?></option>
				<?php wp_get_archives('type=monthly&limit=12&format=option&show_post_count=1'); ?>
			</select>
			</div>
		</li>

		<?php } ?>
		
		<?php if (!is_home()) { ?>
		<li class="sidebar-li">
			<?php show_ads(3); ?>
		</li>
		<?php } ?>
		
	</ul>
</div>
