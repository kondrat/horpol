<?php
class Product extends AppModel {
	var $name = 'Product';
//-------------------------------------------------------------------- 
	var $actsAs = array('Containable');
//-------------------------------------------------------------------- 
	var $validate = array(
							

							'category_id' => array( 
												'notEmpty' => array(
																	'rule' => 'notEmpty',
																	//'required' => true,
																	'message' => 'Это поле не может быть пустым',
																	'last' => true,
																	),
												),
							
							'brand_id' => array( 
												'notEmpty' => array(
																	'rule' => 'notEmpty',
																	//'required' => true,
																	'message' => 'Это поле не может быть пустым',
																	'last' => true,
																	),
												
												),							

							'name' => array(
												'isUnique' => array(
																'rule' => 'isUnique',
																'required' => true,
																'message' => 'Это название уже занято ',
																
																),
												'notEmpty' => array(
																	'rule' => 'notEmpty',
																	'required' => true,
																	'message' => 'Это поле не может быть пустым',
																	'last' => true,
																	),
											),
						/*
							'url' => array(
												'isUnique' => array(
																'rule' => 'isUnique',
																'required' => true,
																'message' => 'This URL name has already been taken.',
																'last' => true,
																),
												'between' => array(
																	'rule' => array('between', 4, 15),
																	'message' => '4 and 15',
																	'required' => true,
																	),
											),
						*/
							'subcategory_id' => array( 
												'notEmpty' => array(
																	'rule' => 'notEmpty',
																	'required' => true,
																	'message' => 'Это поле не может быть пустым',
																	//'last' => true,
																	),
												
												),
																					
						);
//--------------------------------------------------------------------  
	var $belongsTo = array ('subCategory' => array(
											'className' => 'subCategory',
											'conditions' => '',
											'order' => '',
											'foreignKey' => 'subcategory_id',
											'counterCache' => true
											)
							);

//--------------------------------------------------------------------	
	function beforedelete () {
		$productToDel = array();
		$productToDel = $this->find('first', array( 'conditions' => array('Product.id' => $this->id),'fields' => array('Product.logo'), 'contain' => false ) );
		//debug($brandToDel);

		if( $productToDel != array() && $productToDel['Product']['logo'] != null ) {
			//debug( WWW_ROOT.'img'.DS.'catalog'.DS.$brandToDel['Brand']['logo']);
			@unlink( WWW_ROOT.'img/catalog/'.$productToDel['Product']['logo']);
		}

		return true;
	}
}
?>