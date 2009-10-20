<?php
class AlbumsController extends AppController {
	var $name = 'Albums';
	var $components = array('Upload');
	var $paginate = array('limit' => 15 );

//--------------------------------------------------------------------	
	function beforeFilter() {
        $this->Auth->allow( 'index');
        parent::beforeFilter();
        $this->Auth->autoRedirect = false;
    }
//--------------------------------------------------------------------
    function index(){
    	$this->cacheAction = "10000 hours";
 
			$this->paginate['Album'] = array(
											'contain' => 'Image.image',
											);
			$this->set('albums', $this->paginate());
		
    }
//--------------------------------------------------------------------
	function view($id = null) {
		
		if ( (!$id) ||  ($this->Album->read(null, $id) == false ) ) {
			$this->Session->setFlash(__('Invalid Album.', true));
			$this->redirect( $this->Auth->redirect() );			
		} else {

			$this->set('album',null);

		}
	}
//--------------------------------------------------------------------
    function admin_index(){
    	$this->set('headerName','Фотоальбомы');

			$albums = $this->Album->find('all',array('order'=>array('Album.id'=>'DESC'),'contain'=>'Image.image'));
			$this->set('albums', $albums);
    }
//--------------------------------------------------------------------
	function admin_add() {
		$this->set('headerName','Фотоальбомы');
		if (!empty($this->data)) {
			$this->Album->create();
			if ($this->Album->save($this->data)) {
				$this->Session->setFlash( 'Новый альбом был создан' );
				$this->redirect( array('action' => 'index') );
			} else {
				
				$this->Session->setFlash('Новый альбом не был создан','default',array('class'=>'er'));
				$this->redirect( $this->referer() );
			}
		}
	}
//--------------------------------------------------------------------
	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Album', true));
			$this->redirect( array('action'=>'index') );
		}
		if ($this->Album->del($id)) {
			if ($this->Session->check('Album')){
				$this->Session->del('Album');
			}
			$this->Session->setFlash('Альбом удален');
			$this->redirect( array('action' => 'index') );
		}
	}
//--------------------------------------------------------------------

	function admin_edit($id = null) {
		$this->set('headerName','Фотоальбомы');
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Несуществующтй альбом');
			$this->redirect( $this->Auth->redirect() );
		}

	
		if (isset($id) && $id != null) {
			if ($this->Session->check('Album')){
				if($this->Session->read('Album.Id') != $id) {
					$this->Session->del('Album');
					$dataToSes = $this->Album->find('first',array('conditions' => array('Album.id' => $id ), 'fields' => array('id','name') ) );
					$this->Session->write('Album.Id',$dataToSes['Album']['id'] );
					$this->Session->write('Album.Name', $dataToSes['Album']['name']);
				}
			} else {
				$dataToSes = $this->Album->find('first',array('conditions' => array('Album.id' => $id ), 'fields' => array('id','name') ) );
				$this->Session->write('Album.Id',$dataToSes['Album']['id'] );
				$this->Session->write('Album.Name', $dataToSes['Album']['name']);				
			}

		}
			
		
		
		
		if (!empty($this->data)) {
			if ($this->Album->save($this->data)) {
				if($this->Session->check('Album')){
					$this->Session->del('Album.name');
					$this->Session->write('Album.name',$this->data['Album']['name']);
					//$this->Session->write('Album.name',$this->data['Album']['name']);					
				}
				$this->Session->setFlash('Изменения были сохраненны');
				$this->redirect( array('action' => 'index') );
			} else {
				$this->Session->setFlash('Изменения не были сохраненны');
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Album->read(null, $id);
		}
		$images = $this->Album->Image->find('all', array('conditions'=>array('Image.album_id' => $id), 'contain' => false ) );
		$this->set('images', $images);
		/**
		 * setting albums for adding the photos
		 */
		$this->set('albumId', $id);
	}

//--------------------------------------------------------------------
	function admin_view($id = null) {
		$this->set('headerName','Фотоальбомы');
		$this->data = $this->Album->read(null, $id);
		if ( (!$id) ||  ( $this->data = $this->Album->read(null, $id) == false ) ) {
			//$this->Session->setFlash(__('Invalid Album1.', true));
			$this->redirect( $this->Auth->redirect() );			
		} else {

			$album = $this->Album->find('first',array('conditions'=>array('Album.id' => $id),'contain'=>array('Image'=>array('order'=>array('Image.id'=>'DESC') ) ) ) );						
			$this->set('album', $album);
		}
	}
	
//--------------------------------------------------------------------
	function albumEditName() {
		Configure::write('debug', 0);
		$this->layout = 'ajax';
		$this->autorender = false;
		if ($this->data) {
			if ($this->RequestHandler->isAjax()) {		
									
						$this->Album->id = (int)$this->data['Album']['id'];
						if($this->Album->saveField('name',trim($this->data['Album']['name']) ) ) {
								echo trim($this->data['Album']['name']);
						} else {
							//echo 	$this->data['Album']['id'];
						}			
						exit;		
			}	
		}		
	}
	
	
}

?>
