<?php

class Image extends AppModel {

	public $name = 'Image';
	var $actsAs = array('Containable');
	var $validate = array(
							'name' => array(
												/*
												 'alphaNumeric' => array( 
																		
																		'rule' => 'alphaNumeric',
																		'required' => true,
																		'message' => 'Только буквы и цифры'
																		),
												*/
												'betweenRus' => array(
																	'rule' => array( 'betweenRus', 2, 150, 'name'),
																	'message' => 'От 2 до 150 знаков',
																	),
												/*
												'checkUnique' => array( 
																		'rule' =>  array('checkUnique', 'name'),
																		'message' => 'Это имя уже существует'
																	),
												*/
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
    var $belongsTo = array(
        'Album' => array(
            'className'    => 'Album',
            'foreignKey'    => 'album_id',
            'counterCache' => true,
        )
    ); 
//-------------------------------------------------------------------

	var $imgToDel = null;
	
	function beforeDelete() {
		$d = $this->read(null,$this->id);
		$this->imgToDel = $d['Image']['image'];
		return true;
	}

//-------------------------------------------------------------------

	function afterDelete() {
		if( $this->imgToDel != null) {
			@unlink( WWW_ROOT.'img'.DS.'gallery'.DS.'b'.DS.$this->imgToDel);
			@unlink( WWW_ROOT.'img'.DS.'gallery'.DS.'s'.DS.$this->imgToDel);
		}
	} 

}
?>
