<?php
class BrandsController extends AppController {

	var $name = 'Brands';
	//var $helpers = array('Html', 'Form');
	var $components = array('Upload');
	var $paginate = array('limit' => 15);
//--------------------------------------------------------------------	
  function beforeFilter() {
        //$this->Auth->allow('index');
        parent::beforeFilter(); 
        $this->set('headerName','Бренды'); 
   }
//--------------------------------------------------------------------

	function admin_index() {
		$this->paginate['Brand'] = array('contain' => false );
		$this->paginate['Brand']['limit'] = 15;
		$this->paginate['Brand']['fields'] = array('Brand.id','Brand.name','Brand.logo');
		$this->set('br', $this->paginate());
	}
//--------------------------------------------------------------------
	function admin_view($id = null) {
		if ( (!$id) ||  ($this->Brand->read(null, $id) == false ) ) {
			$this->Session->setFlash(__('Invalid Brand.', true));
			$this->redirect(array('action'=>'index'));			
		} else {
			$this->set('brand', $this->Brand->read(null, $id));
		}
	}
//--------------------------------------------------------------------
	function admin_add() {
		if (!empty($this->data)) {
			$file = array();
			// set the upload destination folder
			$destination = WWW_ROOT.'img'.DS.'catalog'.DS;
			//debug($destination );
			// grab the file
			$file = $this->data['Brand']['userfile'];
			//debug($file);
			
			if ($file['error'] == 4) {
				$this->data['Brand']['logo'] = null;
				//$this->Session->setFlash('Файл не загружен');
				
			}else {
									
				// upload the image using the upload component
				$result = $this->Upload->upload($file, $destination, null, array('type' => 'resizecrop', 'size' => array('127', '70') ) );
					if ( $result != 1 ){
						$this->data['Brand']['logo'] = $this->Upload->result;
					} else {
						// display error
						$errors = $this->Upload->errors;
						// piece together errors
						if( is_array($errors) ) { 
							$errors = implode("<br />",$errors); 
						}	   
							$this->Session->setFlash($errors);
							$this->redirect(array('action' => 'add'), null, true);
					}
			}			
			
					
			if ( isset($this->data['Brand']['logo']) && $this->data['Brand']['logo'] != null ) {							
					$this->Brand->create();
					if ($this->Brand->save($this->data)) {
						$this->Session->setFlash('Брэнд был сохранен');
						$this->redirect(array('action'=>'index'));
					} else {
						$this->Session->setFlash('Брэнд не был сохранен');
						if (  isset($this->Upload->result) && $this->Upload->result != null) {
							@unlink($destination.$this->Upload->result);
						}
					}
			}

		}
	}
//--------------------------------------------------------------------
	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Несуществующий Брэнд');
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			
			$file = array();
			// set the upload destination folder
			$destination = WWW_ROOT.'img'.DS.'catalog'.DS;
			//debug($destination );
			// grab the file
			$file = $this->data['Brand']['userfile'];
			//debug($file);
			
			if ($file['error'] == 4) {
				unset($this->data['Brand']['logo']);
				//$this->Session->setFlash('Файл не загружен');
				
			}else {				
					// upload the image using the upload component
					$result = $this->Upload->upload($file, $destination, null, array('type' => 'resizecrop', 'size' => array('127', '70') ) );
					
					if ( $result != 1 ){
						if ( isset($this->data['Brand']['logo']) && $this->data['Brand']['logo'] != null) {
							$oldFile = $this->data['Brand']['logo'];
						}
						$this->data['Brand']['logo'] = $this->Upload->result;
					} else {
						// display error
						$errors = $this->Upload->errors;
						// piece together errors
						if( is_array($errors) ) { 
							$errors = implode("<br />",$errors); 
						}	   
							$this->Session->setFlash($errors);
							$this->redirect(array('action' => 'add'), null, true);
					}
			}
			
						
			if ($this->Brand->save($this->data)) {
				$this->Session->setFlash('Изменения сохранены');
				@unlink($destination.$oldFile);
				$this->redirect(array('action'=>'index'), null, true);
			} else {
				$this->Session->setFlash('Изменения не были сохранены. Попробуйте еще раз');
						if (  isset($this->Upload->result) && $this->Upload->result != null) {
							@unlink($destination.$this->Upload->result);
						}
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Brand->read(null, $id);
		}

	}
//--------------------------------------------------------------------
	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Brand', true));
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->Brand->del($id)) {
			$this->Session->setFlash(__('Brand deleted', true));			
			$this->redirect(array('action'=>'index'));
		}
	}
//--------------------------------------------------------------------
}
?>