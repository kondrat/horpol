<?php

class News extends AppModel {

	public $name = 'News';

	var $validate = array(					

							'name' => array(

												'notEmpty' => array(
																	'rule' => 'notEmpty',
																	'required' => false,
																	'message' => 'Это поле не может быть пустым',
																	'last' => true,
																	)
											)
							);	





	/**
	 *Cleaning the cached news element after save
	 *
	 *
	 */
	function afterSave() {
		//clearCache('horpol.php', 'views',null);
		clearCache('element_twoNews_news_twoNews', 'views',null); 
	} 
	/**
	 *Cleaning the cached news element after delete
	 *
	 *
	 */
	function afterDelete() {
		clearCache('element_twoNews_news_twoNews', 'views',null); 
	} 	
}
?>
