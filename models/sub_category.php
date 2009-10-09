<?php
class SubCategory extends AppModel {
	
	var $name = 'SubCategory';
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
												'checkUnique' => array(           
																		'rule' =>  array('checkUnique'),
																		'message' => 'Это название уже занято'
																		),
												/*
												'isUnique' => array(
																'rule' => 'isUnique',
																'required' => true,
																'message' => 'This SubCatName has already been taken.',
																
																),
												*/
												'notEmpty' => array(
																	'rule' => 'notEmpty',
																	//'required' => true,
																	'message' => 'Пожалуйста, введите название',
																	'last' => true,
																	),
											),
																					
						);
		
//-------------------------------------------------------------------- 
	var $actsAs = array('Containable');
//-------------------------------------------------------------------- 
	var $belongsTo = array (
							/*
							'Category' => array(
											'className' => 'Category',
											'foreignKey' => 'category_id',
											'counterCache' => true),
							'Brand' => array( 
											'className' => 'Brand',
											'foreignKey' => 'brand_id'),
							*/			
											
											
							'BrandsCategory' => array( 
											'className' => 'BrandsCategory',
											'foreignKey' => 'brand_category_id')
							);

//--------------------------------------------------------------------	
	var $hasMany = array('Product' => array(
							            'className'     => 'Product',
							            'foreignKey'    => 'subcategory_id',
							            'conditions'    => '',
							            'order'    => '',
							            'limit'        => '',
							            'dependent'=> true
							        )
						);
	/**
	 *Checking if subCat name is unique for the given category name and brand name.
	 */
	function checkUnique($data) {
    	$valid = false;
      		$caunt = $this->find('count',array('conditions' => array('SubCategory.name' => $this->data['SubCategory']['name'],'SubCategory.category_id' => $this->data['SubCategory']['category_id'], 'SubCategory.brand_id' => $this->data['SubCategory']['brand_id'] ), 'contain' =>false) );
			if ( $caunt == null ) {
				//debug($caunt);
				$valid = true;
			}
        return $valid;
   }
	/**
	 * Checking of the possibility to del the SubCategory. Ex: if it contain any goods we can't del it.
	 */
	/*
	function beforeDelete() {
		$caunt = array();
		$caunt = $this->find('first',array('conditions' => array('SubCategory.id' => $this->id), 'contain' => array('Product') ) );
		if ( isset( $caunt['Product'] ) && $caunt['Product'] != array() ) {
			return false;
		} else {
			return true;
		}
	}
	*/
}
?>