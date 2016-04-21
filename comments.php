<?php
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('.');
	if ( post_password_required() ) { ?>
	<div class="fuss nova">此文保护状态暂时无法查看！</div>
<?php return; } ?>

<div class="comment-main">

	<h3 class="comments-title" id="respond">发表评论</h3>

	<?php if ('open' == $post->comment_status) : ?>
	
		<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
		
			<div class="fuss nova">您必须<a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">登录</a>后才能发表评论。</div>
		
		<?php else : ?>
		
			<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">
				<?php if ( $user_ID ) : ?>
					<p class="c-form">您现在以 <a href="<?php echo get_option('siteurl'); ?>/wp-admin/"><?php echo $user_identity; ?></a> 的身份登录。<?php wp_loginout(); ?></p>
				<?php else : ?>
					<p>
						<label for="author"><small>昵称：</small></label><input type="text" name="author" class="comments-input" id="author" value="<?php echo $comment_author; ?>" size="10" tabindex="1" />&nbsp;&nbsp;
						<label for="email"><small>邮箱：</small></label>
						<input type="text" name="email" class="comments-input" id="email" value="<?php echo $comment_author_email; ?>" size="10" tabindex="2" />
					</p>
					
				<?php endif; ?>
					<p>
						<textarea onkeydown="if(event.ctrlKey&&event.keyCode==13){document.getElementById('submit').click();return false};" name="comment" id="comment-textarea" class="form-textarea" cols="100%" rows="5" tabindex="4"></textarea>
					</p>
					<p>
						<input id="submit" name="submit" type="submit" class="form-submit" tabindex="5" value="发表评论" />
						<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
						<span><small>(提交即表示您同意遵守我们的<a href="/about?ref=comment_bottom#policy" target="_blank" rel="nofollow">使用规则</a>)</small></span>
					</p>
				<?php do_action('comment_form', $post->ID); ?>
			</form>
			
		<?php endif; ?>
	
	<?php else : ?>
		<div class="fuss nova">太多因素导致此文不能继续被评论了！偶不多说，你不多想，大家都懂的。</div>
	<?php endif; ?>


	<div id="comments">
	
		<?php if ($comments) : ?>
		
			<h3 class="comments-title"><?php comments_number('没有评论', '共有 1 条评论', '共有 % 条评论' );?> <span class="comments-o"><?php comments_rss_link('订阅该文评论 RSS'); ?></span></h3>
			
			<div class="comment-list">
				<?php foreach ($comments as $comment) : ?>
				<?php if ( get_comment_type() == "comment" ) : ?>
					<div class="comment-main-content" id="comment-<?php comment_ID() ?>" >
						<div class="commentmeta"><span id="commentauthor-<?php comment_ID() ?>"> <?php comment_author() ?> </span><span>发表于：<?php comment_date('Y年m月d日 l') ?> <?php comment_time() ?><?php if ($comment->comment_approved == '0') : ?>[审核中！]<?php endif; ?> </span> </div>
						<div id="commentText-<?php comment_ID() ?>" ><?php comment_text() ?></div>
						<div class="comment-bottom"><span><a href="javascript:void(0);" onclick="reply('commentauthor-<?php comment_ID() ?>', 'comment-<?php comment_ID() ?>', 'comment-textarea');">[回复]</a></span></div>
					</div>
				<?php endif; ?>
				<?php endforeach; ?>
			</div>

		<?php endif; ?>
	
	</div>

</div>
