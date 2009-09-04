<?php
class Category extends AppModel {

	var $name = 'Category';
	var $actsAs = array('Containable');
	var $validate = array(
							'name' => array( 
	
												'notEmpty' => array( 
																
					       											'rule' => 'notEmpty',
					        										'message' => 'Это поле не может быть пустым',
					        									),
											'un' => array( 
											       	'rule' => 'isUnique',
        											'message' => 'Категория с таким названием уже существует.',
        											),
 
												),
							'type' => array( 
												'notEmpty' => array( 
																
					       											'rule' => 'notEmpty',
					        										'message' => 'Необходимо выбрать тип категории',
					        									),
 
												),
							/*
							'slogan' => array( 
												'notEmpty' => array( 
																
					       											'rule' => 'notEmpty',
					        										'message' => 'Это поле не может быть пустым',
					        									),
 
												)
							*/
						);


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
 

//--------------------------------------------------------------------
      
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