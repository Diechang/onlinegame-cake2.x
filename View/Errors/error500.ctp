<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Errors
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
	$this->assign("title", "Internal Server Error");
	$this->set("pankuz_for_layout", "Internal Server Error");
?>
<section>
	<div class="flash">
		<div class="flash-title"><?php echo $message?></div>
		<div class="flash-body">
			<strong><?php echo __d('cake', 'Error'); ?>: </strong>
			<?php echo __d('cake', 'An Internal Error Has Occurred.'); ?>
		</div>
</section>
<?php
if (Configure::read('debug') > 0):
	echo $this->element('exception_stack_trace');
endif;
?>
