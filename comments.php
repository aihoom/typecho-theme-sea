<?php
if (!defined('__TYPECHO_ROOT_DIR__')) {
    exit;
}
?>
<div id="comments">
    <?php 
$this->comments()->to($comments);
?>
	 <?php 
if ($this->allow('comment')) {
    ?>
    <div id="<?php 
    $this->respondId();
    ?>" class="respond">
        <div class="cancel-comment-reply">
        <?php 
    $comments->cancelReply();
    ?>
        </div>
    
    	<h3 id="response"><?php 
    _e('添加新评论');
    ?></h3>
    	<form method="post" action="<?php 
    $this->commentUrl();
    ?>" id="comment-form" role="form">
            <?php 
    if ($this->user->hasLogin()) {
        ?>
    		<p><?php 
        _e('登录身份: ');
        ?><a href="<?php 
        $this->options->profileUrl();
        ?>"><?php 
        $this->user->screenName();
        ?></a>. <a href="<?php 
        $this->options->logoutUrl();
        ?>" title="Logout"><?php 
        _e('退出');
        ?> &raquo;</a></p>
            <?php 
    } else {
        ?>
    		<div class="form-item form-input">
				 <input type="text" name="author" id="author" class="text" value="<?php 
        $this->remember('author');
        ?>" title="昵称" placeholder="昵称*" required />
			 
    		
            <input type="email" name="mail" title="邮箱" class="text" placeholder="邮箱*" value="<?php 
        $this->remember('mail');
        ?>"<?php 
        if ($this->options->commentsRequireMail) {
            ?> required<?php 
        }
        ?> />
    		
    		
            <input type="url" name="url" id="url" title="网站" class="text" placeholder="网站" value="<?php 
        $this->remember('url');
        ?>"<?php 
        if ($this->options->commentsRequireURL) {
            ?> required<?php 
        }
        ?> />

    		</div>
            <?php 
    }
    ?>
    		<p>
			 <div class="form-item">
                <textarea rows="2" title="评论内容" placeholder="评论内容" name="text" id="textarea" class="textarea" required ><?php 
    $this->remember('text');
    ?></textarea>
         </div>
         </p>
    		<p>
<button class="btn btn-primary right" type="submit"><?php 
    _e('提交评论');
    ?></button></br>
            </p>
    	</form>
    </div>
    <?php 
} else {
    ?>
    <h3><?php 
    _e('评论已关闭');
    ?></h3>
    <?php 
}
?>
	
    <?php 
if ($comments->have()) {
    ?>
	<h3><?php 
    $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论'));
    ?></h3>
    
    <?php 
    $comments->listComments();
    ?>

    <?php 
    $comments->pageNav('&laquo; 前一页', '后一页 &raquo;');
    ?>
    
    <?php 
}
?>
</div>
<?php 