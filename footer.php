</main> 
<footer class="footer">
	<div class="footer-credits">
	<span class="footer-fuss">&copy; Copyright <?php echo $showtime=date("Y");?> <a href="<?php echo get_settings('home'); ?>" style="color:#F60;" target="_blank"><?php bloginfo('name'); ?></a>; <?php echo get_num_queries();?> Queries in <?php timer_stop(1);?> Seconds.</span>
		<?php if(is_single() || is_page()): add_duoshuo_js_to_footer(); endif;?>
	</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
