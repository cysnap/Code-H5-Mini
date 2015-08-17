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
	
		<li class="sidebar-li"><div class="mobile"></div></li>
		
		<?php if (!is_search()) {$search_text = "站内新闻搜索";} else {$search_text = "$s";} ?>
		<li class="sidebar-li">
		<div class="search">
			<form method="get" class="searchform" name="searchform" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<input type="text" class="search-input nova-l" size="24" value="站内新闻搜索" name="s" onfocus="if (this.value == '站内新闻搜索') {this.value = '';}" onblur="if (this.value == '') {this.value = '站内新闻搜索';}" />
				<input type="submit" class="search-submit nova-r" value="" />
			</form>
		</div>
		</li>
		
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

		<li class="sidebar-li">
			<?php show_ads(3); ?>
		</li>

	</ul>
</div>
<?php get_footer(); ?>
