<div class="flash flash-<?php echo (!empty($type)) ? $type : "danger"?>">
	<div class="flash-title"><?php echo $message?></div>
	<?php if(!empty($body)):?><div class="flash-body"><?php echo $body?></div><?php endif;?>
</div>