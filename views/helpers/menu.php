<?php

class MenuHelper extends AppHelper {

	var $button = array	(
						 //0
						  array(
						  		'link' => '/za/',
								'name' => 'Home',
								'style' => '',
								'class' => 'home'
								),
						//1
						  array(
						  		'link' => '/za/users/login/',
								'name' => 'Sign in',
								'style' => '',
								'class' => 'session'
								),
						//2
						  array(
						  		'link' => '/za/users/logout/',
								'name' => 'Sign out',
								'style' => '',
								'class' => 'session'
								),
						//3
						  array(
						  		'link' => '/za/users/reg/',
								'name' => 'Sign up',
								'style' => '',
								'class' => 'session'
								),
						//4
						  array(
						  		'link' => '/ez_cake/roles/',
								'name' => 'Roles',
								'style' => ''
								),
						//5
						  array(
						  		'link' => '/ez_cake/posts/',
								'name' => 'Posts',
								'style' => ''
								),

						//6
						  array(
						  		'link' => '/ez_cake/users',
								'name' => 'Users',
								'style' => ''
								),
						//7
						  array(
						  		'link' => '/ez_cake/accounts/',
								'name' => 'My Account',
								'style' => ''
								)

						 );
					 
	var $buttons_set = array	(
									'default' => array(
													'top' => array(0, 1, 2, 3),
													'bottom' => array(3, 2),
													),
									'home' => array(
													'top' => array(0, 1, 2, 3),
													'top2' => array(1, 3),
													'top3' => array(2),
													'top4' => array(0, 6, 7, 8, 9, 12),
													'bottom' => array(0, 2, 6, 4, 5, 11),
													),
												
									'users' => array(
													 'top' => array(1, 2, 3, 4),
													 'bottom' => array(1, 2, 3, 4),
													 ),
								);
	

						


	function testmenu ($key = 'default', $position = 'top') {
	
		if( !array_key_exists($key, $this->buttons_set) || !array_key_exists($position, $this->buttons_set[$key]) ) {		
			$key = 'default';
			$position = 'top';			
		} 		
		foreach ($this->buttons_set[$key][$position] as $k => $v) {
			
			if ( !empty($this->button[$v]['class']) ) {
				$aa = $this->button[$v]['class'];
			} else {
				$aa = '';
			}
			$tags[$k] = '<li class="'.$aa.'"><a href="'.$this->button[$v]['link'].'"><span style="'.$this->button[$v]['style'].'">'. __( $this->button[$v]['name'],true). '</span></a></li>';
		}
		
		$menu = join('', $tags);
		echo $menu;
		
	}
	
	
	function testsubheader ($user = null, $key = 'EZ new start', $data = '') {
		$color = "#FF9797";
		if ( $user != null ) {
			$user = ucwords( strtolower($user) );
		} else {
			$user = 'Guest';
			$color = "#fec";
		}
		echo $key.' | Week '.date('W D').' | '.date('jS F Y'). ' >><span style="color:'.$color.'"><i>'.$user .'</i></span>';
	}
}


?>