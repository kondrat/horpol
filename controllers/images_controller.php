<?php
class ImagesController extends AppController {
	var $name = 'Images';
	var $components = array('Upload');
	var $paginate = array('limit' => 12 );

//--------------------------------------------------------------------	
	function beforeFilter() {
        $this->Auth->allow('index');
        parent::beforeFilter();
        $this->Auth->autoRedirect = false;
    }
//--------------------------------------------------------------------
    function index($id = null){
    	$this->cacheAction = "10000 hours";
    	//$this->layout = 'image';
    	$albumData = array();
    	App::import('Sanitize');
    	$id = (int)Sanitize::paranoid($id);
    	$albumData = $this->Image->Album->read(null, $id);
    	//debug($albumData);
		if ( (!$id) ||  $albumData == false || !isset($albumData['Album']['image_count']) || $albumData['Album']['image_count'] == 0 ) {
			
			$this->Session->setFlash('Вы не выбрали альбом');
			$this->redirect( array('controller' => 'albums', 'action' => 'index'),null, true );			
		}
			
    	$this->paginate['Image'] = array(
    										'conditions' => array('Image.album_id' => $id ),
    										'contain' => array('Album.name'),
    										'limit' => 12
    									);
    	$images = $this->paginate();

						foreach($images as $image) {
							$imagesId[] = $image['Image']['id'];
						}	


 
 			$imagesTotal = $this->Image->find('all',array('conditions' => array('Image.album_id' => $id ),'contain'=>false ) );
 
						foreach($imagesTotal as $imageT) {
							$imagesId2[] = $imageT['Image']['id'];					
						} 
 						$diff = array_diff ($imagesId2, $imagesId);	
 			$restImgs = $this->Image->find('all',array('conditions' => array('Image.album_id' => $id,'Image.id'=>$diff ),'contain'=>false ) );		
 						
 						
 			$this->set('restImgs', $restImgs);
 
			$this->set('images', $images);
    }

//--------------------------------------------------------------------
	function view($id = null) {
		
		if ( (!$id) ||  ($this->Image->read(null, $id) == false ) ) {
			$this->Session->setFlash('Фото отсутствует');
			$this->redirect( $this->Auth->redirect() );			
		} else {

			$this->set( 'image', $this->Image->read(null, $id) );
		}

	}
//--------------------------------------------------------------------
	function admin_view($id = null) {
		$this->set('headerName','Фотоальбомы');
		if ( (!$id) ||  ($this->Image->read(null, $id) == false ) ) {
			$this->Session->setFlash('Фото отсутствует');
			$this->redirect( $this->Auth->redirect() );			
		} else {
			$this->set( 'image', $this->Image->read(null, $id) );
		}

	}

//--------------------------------------------------------------------
	function admin_add() {
		$this->set('headerName','Фотоальбомы');
		if ( isset($this->params['named']['cache']) && $this->params['named']['cache'] == false ) {
			$this->Session->del('Album');
		}
		

		if (!empty($this->data)) {
			$file = array();
			// set the upload destination folder
			$destinationB = WWW_ROOT.'img'.DS.'gallery'.DS.'b'.DS;
			$destinationS = WWW_ROOT.'img'.DS.'gallery'.DS.'s'.DS;

			// grab the file
			$file = $this->data['Image']['userfile'];
			//debug($file);
			if ($file['error'] == 4) {	
				$this->Session->setFlash('Файл не загружен');			
			} else {									
					// upload the image using the upload component
					for ( $i=0; $i<=1; $i++) {
						switch($i) {
							case(0):
								$result = $this->Upload->upload($file, $destinationB, null, array('type' => 'resize', 'size' => '600' ) );
								if ($result != 1) {
									$this->data['Image']['image'] = $this->Upload->result;
								}
								break;
							case(1):
								$result = $this->Upload->upload($file, $destinationS, null, array('type' => 'resizecrop', 'size' => array('100', '100') ) ); 
								break;
						}
						if ( $result == 1 ) {
							// display error
							$errors = $this->Upload->errors;
							// piece together errors
							if( is_array($errors) ) { 
								$errors = implode("<br />",$errors); 
							}
			   
								$this->Session->setFlash($errors);
								@unlink($destinationB.$this->data['Image']['image']);
								$this->redirect(array('action' => 'add'), null, true);
						}					
					}
						
			}		
			
			if ( isset($this->data['Image']['image']) && $this->data['Image']['image'] != null ){
				
				if ( $this->Session->check('Album.Id') ) {
					$this->data['Image']['album_id'] = $this->Session->read('Album.Id');
				} else {
					$this->data['Image']['album_id'] = $this->data['Image']['Album'];
				}
				
				$this->Image->create();
				if ($this->Image->save($this->data)) {
				
					
					$this->Session->setFlash( 'Фотография была сохранена' );
					$this->redirect( array('controller' => 'albums','action' => 'edit',$this->data['Image']['album_id']) );
				} else {					
					$this->Session->setFlash('Фотография не была сохранена');
					//$this->data['Image']['image'] = 
					if ($this->Upload->result != null) {
						@unlink($destinationB.$this->Upload->result);
						@unlink($destinationS.$this->Upload->result);
					}
				}
			}
			
			
		}



		
		//debug($albums);
		

			$albums = $this->Image->Album->find('list');
			$this->set( compact('albums') );

			$this->set('selected', 1);

		
	}
//--------------------------------------------------------------------
	function admin_delete($id = null) {

		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Image', true));
			$this->redirect( array('action'=>'index') );
		}
		if ($this->Image->del($id)) {
			
			$this->Session->setFlash('Фотография удалена');
			if ($this->Session->check('Album')){
				$this->redirect( array('controller'=>'albums','action' => 'edit', $this->Session->read('Album.Id') ), null, true );
			} else {
				$this->redirect( array('controller'=>'albums','action' => 'index'),null,true );
			}
			
			//$this->redirect( $this->referer() );
		} else {
			$this->Session->setFlash('Фотография не была удалена');
			$this->redirect( array('controller'=>'albums','action' => 'index') );
		}
	}
//--------------------------------------------------------------------
	function admin_edit($id = null) {
		$this->set('headerName','Фотоальбомы');
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Photo', true));
			$this->redirect( $this->Auth->redirect() );
		}
		if (!empty($this->data)) {
			if ($this->Image->save($this->data)) {
				$this->Session->setFlash('Фотография была изменена');
					if ($this->Session->check('Album')){
						$this->redirect( array('controller'=>'albums','action' => 'edit', $this->Session->read('Album.Id') ), null, true );
					} else {
						$this->redirect( array('controller'=>'albums','action' => 'index'),null,true );
					}
			} else {
				$this->Session->setFlash('Фотография не была изменена');
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Image->read(null, $id);
			$this->set('image',$this->data);
		}

	}

//--------------------------------------------------------------------
}

?>
