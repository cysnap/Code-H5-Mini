</main> 
<footer class="footer">
	<div class="footer-credits">
	<span class="footer-fuss">&copy; Copyright <?php echo $showtime=date("Y");?> <a href="<?php echo get_settings('home'); ?>" style="color:#F60;" target="_blank"><?php bloginfo('name'); ?></a>； <?php echo get_num_queries();?> Queries in <?php timer_stop(1);?> Seconds.</span>
	<span class="footer-fuss">除特别声明，本站转载内容均不代表本站观点。请遵守相关法律法规，理性使用评论功能。</span>
		<?php if(is_single() || is_page()): add_duoshuo_js_to_footer(); endif;?>
	</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
