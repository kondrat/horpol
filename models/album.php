<?php

class Album extends AppModel {

	public $name = 'Album';
	var $actsAs = array('Containable');
	var $validate = array(
							'name' => array( 'alphaNumeric' => array( 
																		'rule' => 'alphaNumeric',
																		'required' => true,
																		'message' => 'Только буквы и цифры'
																		),
												'betweenRus' => array(
																	'rule' => array( 'betweenRus', 2, 150, 'name'),
																	'message' => 'От 2 до 150 знаков'
																	),
												'checkUnique' => array( 
																		'rule' =>  array('checkUnique', 'name'),
																		'message' => 'Этот логин уже занят'
																	),
												),
						);
//--------------------------------------------------------------------
	function betweenRus($data, $min, $max, $key) {
		//debug($data);
		$length = mb_strlen($data[$key], 'utf8');

		if ($length >= $min && $length <= $max) {
			return true;
		} else {
			return false;
		}
	}

//--------------------------------------------------------------------														
	function checkUnique($data, $fieldName) {
    	$valid = false;
    	if(isset($fieldName) && $this->hasField($fieldName)) {
      		$valid = $this->isUnique(array($fieldName => $data));
     	}
        return $valid;
   }	
//--------------------------------------------------------------------
    var $hasMany = array(
        'Image' => array(
            'className'     => 'Image',
            'foreignKey'    => 'album_id',
            'conditions'    => '',
            'order'    => '',
            'limit'        => '',
            'dependent'    => true,
        )
    );  

}
?>
