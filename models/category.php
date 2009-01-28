<?php
class Category extends AppModel {

	var $name = 'Category';
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
	/*
	var $hasAndBelongsToMany = array(
			'Brand' => array('className' => 'Brand',
						'joinTable' => 'brands_categories',
						'foreignKey' => 'category_id',
						'associationForeignKey' => 'brand_id',
						'unique' => true,
						'conditions' => '',
						'fields' => '',
						'order' => '',
						'limit' => '',
						'offset' => '',
						'finderQuery' => '',
						'deleteQuery' => '',
						'insertQuery' => ''
						)

					);
	*/

//--------------------------------------------------------------------
    var $hasMany = array(
        'SubCategory' => array(
            'className'     => 'SubCategory',
            'foreignKey'    => 'category_id',
            'conditions'    => '',
            'order'    => '',
            'limit'        => '',
        )
    );  
/**
 *Cleaning the cached left menu element after save
 *
 *
 */
	function afterSave() {
		clearCache('element_leftMenu_menu_leftMainMenu', 'views',null); 
	} 

}
?>