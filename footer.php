</main> 
<footer>
	<div class="footer-credits">
	<span>&copy; Copyright 2009 - <?php echo $showtime=date("Y");?> <a href="<?php echo get_settings('home'); ?>"><?php bloginfo('name'); ?></a>； <?php echo get_num_queries();?> Queries in <?php timer_stop(1);?> Seconds.</span>
	<span>除特别声明，本站转载内容均不代表本站观点。请遵守相关法律法规，理性使用评论功能。</span>
	</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
