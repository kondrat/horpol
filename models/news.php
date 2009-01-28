<?php

class News extends AppModel {

	public $name = 'News';
	

	/**
	 *Cleaning the cached left menu element after save
	 *
	 *
	 */
	function afterSave() {
		//clearCache('horpol.php', 'views',null);
		clearCache('element_twoNews_news_twoNews', 'views',null); 
	} 
	/**
	 *Cleaning the cached left menu element after delete
	 *
	 *
	 */
	function afterDelete() {
		clearCache('element_twoNews_news_twoNews', 'views',null); 
	} 	
}
?>
