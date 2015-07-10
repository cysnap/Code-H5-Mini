<?php
/*
Template Name: Web Slices
*/
?>
<?php get_header(); ?>
<div class="fuss nova">Internet Explorer 9 Web Slices 介绍</div>
<div class="post">
<div class="entry clearfix">
<p>如果你正在使用 Internet Explorer 9或Internet Explorer 8，则可通过<strong>网页快讯 Web Slices</strong> 订阅 <?php bloginfo('name'); ?>。以下是微软官方对<strong>网页快讯 Web Slices</strong> 的介绍：</p>
<blockquote>通过网页快讯，您可以只订阅网站里感兴趣的那部分内容（需网站支持），而且无论您在浏览哪个页面，都可以即时查看这些内容的最新动态，比如竞拍商品的价格、股市动态、汇率、天气、新闻等等。</blockquote>
</div>
</div>
<div class="post clearfix hslice" id="livesino">
<div class="fuss nova entry-title"><?php bloginfo('name'); ?> 最新文章</div><a rel="bookmark" href="<?php echo get_settings('home'); ?>" style="display:none;"></a>
<div class="entry clearfix entry-content">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
<td style="background-color:#0097C1;height:4px;margin:0pt;padding:0pt;width:25%;"></td>
<td style="background-color:#19518A;height:4px;margin:0pt;padding:0pt;width:25%;"></td>
<td style="background-color:#B2DBE6;height:4px;margin:0pt;padding:0pt;width:25%;"></td>
<td style="background-color:#579EBC;height:4px;margin:0pt;padding:0pt;width:25%;"></td>
</tr>
</table>
<ul>
<?php wp_get_archives('type=postbypost&limit=10'); ?>
</ul>
</div>
</div>
<div class="post clearfix hslice" id="comments">
<div class="fuss nova entry-title"><?php bloginfo('name'); ?> 最新评论</div><a rel="bookmark" href="<?php echo get_settings('home'); ?>/comments" style="display:none;"></a>
<div class="entry clearfix entry-content">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
<td style="background-color:#FA930D;height:4px;margin:0pt;padding:0pt;width:25%;"></td>
<td style="background-color:#CB5C11;height:4px;margin:0pt;padding:0pt;width:25%;"></td>
<td style="background-color:#F2BA15;height:4px;margin:0pt;padding:0pt;width:25%;"></td>
<td style="background-color:#EE9116;height:4px;margin:0pt;padding:0pt;width:25%;"></td>
</tr>
</table>
<div class="sidebar-comment">
<?php most_recent_comments(); ?>
</div>
</div>
</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>