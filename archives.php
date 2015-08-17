<?php
/*
Template Name: All Topics
*/
?>
<?php get_header(); ?>
	<div class="fuss nova">所有新闻主题</div>
	<div class="post meta">
	<?php
	$args = array ('orderby' => 'name');
	$categories = get_categories( $args );
	foreach ( $categories as $category ) {
		echo '<a href="' . get_category_link( $category->term_id ) . '"><img src="http://imgcdn.sinaapp.com/cat-img/' . $category->category_nicename . '.gif" title="' . $category->name . '"></a>';
	}
?>
	</div>

	<div class="fuss nova">所有新闻标签</div>
	<div class="post meta"><?php wp_tag_cloud('smallest=11&largest=18&format=flat&orderby=count&order=DESC'); ?></div>
</div>

<div class="sidebar">
	<ul>
	
		<li><div class="mobile"></div></li>
		
		<?php if (!is_search()) {$search_text = "站内新闻搜索";} else {$search_text = "$s";} ?>
		<li class="sidebar-li">
		<div class="search">
			<form method="get" class="searchform" name="searchform" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<input type="text" class="search-input nova-l" size="24" value="站内新闻搜索" name="s" onfocus="if (this.value == '站内新闻搜索') {this.value = '';}" onblur="if (this.value == '') {this.value = '站内新闻搜索';}" />
				<input type="submit" class="search-submit nova-r" value="" />
			</form>
		</div>
		</li>
		
		<li><?php dynamic_sidebar( '300x250-Ads' ); ?></li>

	</ul>
</div>
<?php get_footer(); ?>
