<?php
class StaticPage extends AppModel {

	var $name = 'StaticPage';
	var $validate = array(
		'body' => array('notempty')
	);

}
?>