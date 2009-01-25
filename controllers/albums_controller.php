<?php
App::import('Sanitize');
class AlbumsController extends AppController {
	var $name = 'Albums';
	var $uses = array('Album', 'Brand');
	var $components = array('Upload');
	var $paginate = array('limit' => 9 );

//--------------------------------------------------------------------	
	function beforeFilter() {
        $this->Auth->allow( 'index');
        parent::beforeFilter();
        $this->Auth->autoRedirect = false;
    }
//--------------------------------------------------------------------
    function index(){
    	$this->cacheAction = "100 hours";
    	/*
    	App::import('Sanitize');
    	$id = (int)Sanitize::paranoid($id);
    	if( isset($id) && $id != null) {
    		
    	} else {
    	*/
			$this->paginate['Album'] = array(
											'contain' => 'Image.image',
											);
			$this->set('albums', $this->paginate());
		
    }
//--------------------------------------------------------------------
	function view($id = null) {
		//$this->subheaderTitle = 'НОВОСТИ';
		if ( (!$id) ||  ($this->Album->read(null, $id) == false ) ) {
			$this->Session->setFlash(__('Invalid Album.', true));
			$this->redirect( $this->Auth->redirect() );			
		} else {

			$this->set('album',null);

		}
	}
//--------------------------------------------------------------------
    function admin_index(){
    	if($this->Session->check('Album')){
    		$this->Session->del('Album');
    	}
		$this->Album->recursive = 1;
		$this->set('albums', $this->paginate());
    }
//--------------------------------------------------------------------
	function admin_add() {

		if (!empty($this->data)) {

			$this->Album->create();
			if ($this->Album->save($this->data)) {
				$this->Session->setFlash( 'Новый альбом был создан' );
				if($this->Session->check('Album')){
					$this->Session->del('Album');
				}
				$this->redirect( array('action' => 'index') );
			} else {
				
				$this->Session->setFlash('Новый альбом не был создан');
			}
		}
			
			
		//This use for the find('list') if we use smthname instead of name.
		//$this->User->displayField = 'username';
		//$users = $this->User->find('list');
		//$this->set( compact('users') );
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
		if ( (!$id) ||  ($this->Album->read(null, $id) == false ) ) {
			$this->Session->setFlash(__('Invalid Album.', true));
			$this->redirect( $this->Auth->redirect() );			
		} else {
			
			$this->set('album', $this->paginate());
		}
	}
	

	
	
}

?>
