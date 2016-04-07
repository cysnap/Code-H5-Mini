<?php
/*
Template Name: All Topics
*/
?>
<?php get_header(); ?>
	<div class="fuss nova">所有新闻主题</div>
	<div class="post meta nav-icon">
	<?php
	$args = array ('orderby' => 'name');
	$categories = get_categories( $args );
	foreach ( $categories as $category ) {
		echo '<a href="' . get_category_link( $category->term_id ) . '" title="' . $category->name  . '"><img src="'; img_url(); echo '/cat-img/' . $category->category_nicename . '.gif" alt="' . $category->name . '"></a>';
	}
?>
	</div>

	<div class="fuss nova">所有新闻标签</div>
	<div class="post meta"><?php wp_tag_cloud('smallest=11&largest=18&format=flat&orderby=count&order=DESC'); ?></div>
</div>

<div class="sidebar">
	<ul>
		<li><?php dynamic_sidebar( '300x250-Ads' ); ?></li>
	</ul>
</div>
<?php get_footer(); ?>
