</div> 
<div class="footer">
	<div class="footer-credits">
		<?php if ( !is_single() ) : ?>
		<table><tr>
			<td><span class="footer-fuss">相关信息</span><span class="footer-vaule"><a href="/about?ref=footer" target="_blank" title="关于我们">关于</a></span></td>
			<td><span class="footer-fuss">核心程序</span><span class="footer-vaule">WordPress</span></td>
			<td><span class="footer-fuss">服务器套件</span><span class="footer-vaule">Debian AMP</span></td>
			<td><span class="footer-fuss">Feeds 托管</span><span class="footer-vaule"><a href="http://feed.maxbeta.com/" target="_blank">FeedSky</a></span></td>
			<td><span class="footer-fuss">图标设计</span><span class="footer-vaule"><a href="http://www.famfamfam.com/" rel="nofollow" target="_blank">FAMFAMFAM</a></span></td>
			<td><span class="footer-fuss">许可协议</span><span class="footer-vaule"><a href="http://creativecommons.org/licenses/by-nc-sa/2.5/" title="采用 署名-非商业性使用-相同方式共享 2.5 许可协议进行许可" rel="nofollow" target="_blank">Creative Commons</a></span></td>
			<td><span class="footer-fuss"><?php echo get_num_queries(); ?> Queries</span><span class="footer-vaule"><?php timer_stop(1); ?> Seconds</span></td>
			<td><span class="footer-fuss">&copy; Copyright <?php echo $showtime=date("Y");?></span><span class="footer-vaule"><a href="<?php echo get_settings('home'); ?>" ><?php bloginfo('name'); ?></a></span></td>
		</tr></table>
		<?php else : ?>
		<div align="center"><span class="footer-fuss">&copy; Copyright <?php echo $showtime=date("Y");?> <a href="<?php echo get_settings('home'); ?>" style="color:#F60;" target="_blank"><?php bloginfo('name'); ?></a></span></div>
		<?php endif; ?>

		<?php if(is_single() || is_page()): add_duoshuo_js_to_footer(); endif;?>
	</div>
</div>

<?php wp_footer(); ?>

</body>
</html>
