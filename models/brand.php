<?php
class Brand extends AppModel {

	var $name = 'Brand';
	var $actsAs = array('Containable');
	var $validate = array(
							'name' => array( 
												/*
												'alphaNumeric' => array( 
																		'rule' => 'alphaNumeric',
																		'required' => true,
																		'message' => 'Допустимы только буквы и цифры',
																		),
												*/
												'checkUnique' => array( 
																		'rule' =>  array('checkUnique', 'name'),
																		'message' => 'Брэнд с таким названием уже существует',
																	)
												)
						);
//--------------------------------------------------------------------
    var $hasMany = array(
        'SubCategory' => array(
            'className'     => 'SubCategory',
            'foreignKey'    => 'brand_id',
            'conditions'    => array(),
            'order'    => '',
            'limit'        => '',
            'dependent'=> true,
        )
    );  
//--------------------------------------------------------------------														
	function checkUnique($data, $fieldName) {
    	$valid = false;
    	if( isset($fieldName) && $this->hasField($fieldName) ) {
      		$valid = $this->isUnique( array($fieldName => $data) );
     	}
        return $valid;
   }
//--------------------------------------------------------------------
	function beforedelete () {
		$brandToDel = array();
		$brandToDel = $this->find('first', array( 'condiotions' => array('Brand.id' => $this->id),'fields' => array('Brand.logo'), 'contain' => false ) );
		//debug($brandToDel);
		if( $brandToDel != array() && $brandToDel['Brand']['logo'] != null ) {
			//debug( WWW_ROOT.'img'.DS.'catalog'.DS.$brandToDel['Brand']['logo']);
			@unlink( WWW_ROOT.'img/catalog/'.$brandToDel['Brand']['logo']);
		}
		return true;
	}

}
?>