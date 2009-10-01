<?php
class Product extends AppModel {
	var $name = 'Product';
//-------------------------------------------------------------------- 
	var $actsAs = array('Containable');
//-------------------------------------------------------------------- 
	var $validate = array(
							/*

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

												'notEmpty' => array(
																	'rule' => 'notEmpty',
																	'required' => true,
																	'message' => 'Это поле не может быть пустым',
																	'last' => true,
																	),
											),

							'subcategory_id' => array( 
												'notEmpty' => array(
																	'rule' => 'notEmpty',
																	'required' => true,
																	'message' => 'Это поле не может быть пустым',
																	//'last' => true,
																	),
												
												),
												*/
																					
						);
//--------------------------------------------------------------------  
	var $belongsTo = array ('SubCategory' => array(
											'className' => 'SubCategory',
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