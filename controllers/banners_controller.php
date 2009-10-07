<?php
class BannersController extends AppController {

	var $name = 'Banners';
	var $components = array('Upload');
	
//--------------------------------------------------------------------	
  function beforeFilter() {
        //$this->Auth->allow('view');
        parent::beforeFilter(); 
        $this->set('headerName','Бренды'); 
   }
//--------------------------------------------------------------------

	function admin_index() {
		$conditions = array();	
		if(isset($this->params['named']['type'])&&$this->params['named']['type'] != null) {
			$conditions = array('Banner.type'=>$this->params['named']['type']);
		} 
		
		
		$banners = $this->Banner->find('all',array('conditions'=>$conditions,'contain'=>false));
		$this->set('banners', $banners);
	}
	
//--------------------------------------------------------------------

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Banner.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('banner', $this->Banner->read(null, $id));
	}
//--------------------------------------------------------------------	
	function admin_append($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Banner', true));
			$this->redirect(array('action'=>'index'));
		}

		$banner = $this->Banner->read(array('id','logo','type'), $id);
		$this->set('banner',$banner);
		
		if(isset($banner['Banner']['type'])&&$banner['Banner']['type']== 1){
			
			
			
		}
		
		$categories = $this->Banner->Category->find('all',array('fields'=>array('id','name','type'),'contain'=>array('Banner'=>array('id') )));
		$this->set('categories',$categories);
		
	}
//--------------------------------------------------------------------
	function admin_glue() {
				
				if( isset($this->data['Category']['Category']) ){
					
					$CatCat = $this->data['Category']['Category'];
					$this->data['Category']['Category'] = array();
					
					foreach( $CatCat as $cc){
						if($cc != 0){
							$this->data['Category']['Category'][] = $cc;
						}
					}

		
		
		
				$this->Banner->create();
				if ($this->Banner->save($this->data)) {
					$this->Session->setFlash('Баннер был прикреплен');
					$this->redirect(array('action'=>'index'));
				} else {
						$this->Session->setFlash('Баннер не был прикреплен');
				}
				
			} else {
				$this->Session->setFlash('Баннер не был прикреплен');
			}				
				
	}
//--------------------------------------------------------------------
	function admin_add() {
		if (!empty($this->data)) {
			
			$bannerSize = array('700', '70');
			
			
			if( !empty($this->data['Banner']['type']) ) {
				if ($this->data['Banner']['type'] == 2 ) {
					$bannerSize = array('500', '70');
				}
			} 
			
			$file = array();
			// set the upload destination folder
			$destination = WWW_ROOT.'img'.DS.'banner'.DS;
			//debug($destination );
			// grab the file
			$file = $this->data['Banner']['userfile'];
			//debug($file);
			
			if ($file['error'] == 4) {
				$this->data['Banner']['logo'] = null;
				$this->Session->setFlash('Файл не загружен');
				
			}else {
									
				// upload the image using the upload component
				$result = $this->Upload->upload($file, $destination, null, array('type' => 'resizecrop', 'size' => $bannerSize ) );
					if ( $result != 1 ){
						$this->data['Banner']['logo'] = $this->Upload->result;
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
			
			if ( isset($this->data['Banner']['logo']) && $this->data['Banner']['logo'] != null ) {	
						
				$this->Banner->create();
				if ($this->Banner->save($this->data)) {
					$this->Session->setFlash('Баннер был сохранен');
					$this->redirect(array('action'=>'index'));
				} else {
						$this->Session->setFlash('Баннер не был сохранен');
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
			$this->Session->setFlash(__('Invalid Banner', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Banner->save($this->data)) {
				$this->Session->setFlash(__('The Banner has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Banner could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Banner->read(null, $id);
		}
		$categories = $this->Banner->Category->find('list');
		$this->set(compact('categories'));
	}
//--------------------------------------------------------------------
	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Banner', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Banner->del($id)) {
			$this->Session->setFlash(__('Banner deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>