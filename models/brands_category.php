<?php
class BrandsCategory extends AppModel {
	
	var $name = 'BrandsCategory';
	var $validate = array();
		
//-------------------------------------------------------------------- 
	var $actsAs = array('Containable');
//-------------------------------------------------------------------- 
	
	var $belongsTo = array (
							'Category' => array(
											'className' => 'Category',
											'conditions' => '',
											'order' => '',
											'foreignKey' => 'category_id',
											'counterCache' => true),
							'Brand' => array( 
											'className' => 'Brand',
											'foreignKey' => 'brand_id')
							);
	
//--------------------------------------------------------------------	
	var $hasMany = array('SubCategory' => array(
							            'className'     => 'SubCategory',
							            'foreignKey'    => 'brand_category_id',
							            'conditions'    => '',
							            'order'    => '',
							            'limit'        => '',
							            'dependent'=> true
							        )
						);

    var $hasAndBelongsToMany = array(
        'Banner' =>
            array(
                'className'              => 'Banner',
                'joinTable'              => 'banners_brands_categories',
                'foreignKey'             => 'brand_category_id',
                'associationForeignKey'  => 'banner_id',
                'unique'                 => true
            )
    );




}
?>