<?php
	class FckHelper extends Helper {

		function load($field, $width = 400) {
			
			$field = explode('.', $field);
				if(empty($field[1])) {
					// need to know how to call a model from a helper
				} else {
					$model = $field[0];
					$controller = $field[1];
				}

        //require_once (WWW_ROOT.'js'.DS.'fck'.DS.'fckeditor.php');
				App::import('Vendor', 'fckeditor');
              $oFCKeditor = new FCKeditor('data['.$model.']['.$controller.']') ;

              $oFCKeditor->BasePath = '/horpol/js/fck/';

              $oFCKeditor->Value	= $this->data[$model][$controller];

              $oFCKeditor->Height	= $width;

              $oFCKeditor->Create();

          }

	}
?>
