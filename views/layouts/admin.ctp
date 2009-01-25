<?php
/* SVN FILE: $Id: default.ctp 7690 2008-10-02 04:56:53Z nate $ */
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) :  Rapid Development Framework <http://www.cakephp.org/>
 * Copyright 2005-2008, Cake Software Foundation, Inc.
 *								1785 E. Sahara Avenue, Suite 490-204
 *								Las Vegas, Nevada 89104
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright		Copyright 2005-2008, Cake Software Foundation, Inc.
 * @link				http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
 * @package			cake
 * @subpackage		cake.cake.libs.view.templates.layouts
 * @since			CakePHP(tm) v 0.10.0.1076
 * @version			$Revision: 7690 $
 * @modifiedby		$LastChangedBy: nate $
 * @lastmodified	$Date: 2008-10-02 00:56:53 -0400 (Thu, 02 Oct 2008) $
 * @license			http://www.opensource.org/licenses/mit-license.php The MIT License
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $html->charset(); ?>
	<title>
		<?php __('Hor Pol:'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $html->meta('icon');

		echo $html->css('cake.generic');
		echo $html->css('adminStyle');

		echo $scripts_for_layout;
	?>
</head>
<body>
	<div class="userZone">
		<?php echo $html->link('На Сайт', '/'); ?>
	</div>
	<div id="container">
		<h1 class="admin" align="center" style="background-color:#ff5e5e">Admin page</h1>
		
		<?php 
			
			if ( $session->check('Auth.User.id') ) {
				echo '<div>';
					echo '<p class="username"> Пользователь: '.$session->read('Auth.User.username').'</p>';
					//echo '<p class= "logout">'.$html->link('Выход', array('controller' => 'users', 'action' => 'logout') ).'</p>'; 
				echo '</div>';
			}
		?>
		<div style="clear:both"></div>
		<?php echo $this->element('menu/menu'); ?>
			
		<div id="content">

			<?php $session->flash(); ?>

			<?php echo $content_for_layout; ?>

		</div>
		<div id="footer">

		</div>
	</div>
	<?php echo $cakeDebug; ?>
</body>
</html>