<?php
class NewsController extends AppController {
	var $name = 'News';
	var $paginate = array('limit' => 5, 'order' => array( 'News.created' => 'desc') );
	var $helpers = array('Fck');
	
//--------------------------------------------------------------------	
	function beforeFilter() {
        $this->Auth->allow('view', 'index');
        parent::beforeFilter();
        $this->Auth->autoRedirect = false;
    }
//--------------------------------------------------------------------
    function index(){
    	
		$this->subheaderTitle = 'НОВОСТИ';
		$this->News->recursive = 0;
		
		if (isset($this->params['requested'])) {
			$twoNews = $this->News->find('all', array( 'conditions' => array(), 'order' => array( 'News.created' => 'desc'), 'limit' => 2 ) );
			return $twoNews;
		} else {
			$this->cacheAction = "10000 hours";
			$this->set('listNews', $this->paginate());
		}
		
		//$text = Flay::fragment($a[0]['News']['body'],7);
		//debug( $text );
		
		
    }
//--------------------------------------------------------------------
	function view($id = null) {
		$this->cacheAction = "10000 hours";

		if ( (!$id) ||  ($this->News->read(null, $id) == false ) ) {
			$this->Session->setFlash(__('Invalid News.', true));
			$this->redirect( $this->Auth->redirect() );			
		} else {
			$this->set('news', $this->News->read(null, $id));
			$listNews = $this->News->find('all',array('conditions' => array('News.id <>' => $id), 'limit' => 5, 'order' => array('News.created' => 'desc') ) ); 
			$this->set('listNews', $listNews);
			//$this->set('referer', $this->referer() );
		}
	}
	
/**
 *Admin index page
 *
 *
 */
    function admin_index(){
    	$this->set('headerName','Новости');
			$this->News->recursive = 0;
			$twoNews = $this->News->find('all', array( 'conditions' => array(), 'order' => array( 'News.created' => 'desc') ) );

			$this->set('allnews', $this->paginate());
		
		
    }

//--------------------------------------------------------------------
	function admin_add() {
		$this->set('headerName','Новости');
		if (!empty($this->data)) {
			$this->News->create();
			if ($this->News->save($this->data)) {
				$this->Session->setFlash( 'Новость была добавлена' );
				$this->redirect( array('action' => 'index') );
			} else {
				$this->Session->setFlash('Новость не была добавлена','default',array('class'=>'er'));
			}
		}
		//This use for the find('list') if we use smthname instead of name.
		//$this->User->displayField = 'username';
		//$users = $this->User->find('list');
		//$this->set( compact('users') );
	}
//--------------------------------------------------------------------
	function admin_delete($id = null) {
		$this->set('headerName','Новости');
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for News', true));
			$this->redirect( array('action'=>'index') );
		}
		if ($this->News->del($id)) {
			$this->Session->setFlash('Новость удалена');
			$this->redirect( array('action' => 'index') );
		}
	}
//--------------------------------------------------------------------
	function admin_edit($id = null) {
		$this->set('headerName','Новости');
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid News', true));
			$this->redirect( $this->Auth->redirect() );
		}
		if (!empty($this->data)) {
			if ($this->News->save($this->data)) {
				$this->Session->setFlash('Изменения сохранены');
				$this->redirect($this->referer());
			} else {
				$this->Session->setFlash('Изменения не были сохранены. Попробуйте еще раз');
			}
		}
		if (empty($this->data)) {
			$this->data = $this->News->read(null, $id);
		}
		//$dealers = $this->News->User->find('list');
		//$this->set(compact('dealers'));
	}

//--------------------------------------------------------------------
/**
 *Admin view of the news
 *
 *
 */
	function admin_view($id = null) {
		$this->set('headerName','Новости');
		
		if ( (!$id) ||  ($this->News->read(null, $id) == false ) ) {
			$this->Session->setFlash(__('Invalid News.', true));
			$this->redirect( $this->Auth->redirect() );			
		} else {
			$this->set('news', $this->News->read(null, $id));
		}
	}
//--------------------------------------------------------------------
	function newsEditName() {
		Configure::write('debug', 0);
		$this->layout = 'ajax';
		$this->autorender = false;
		if ($this->data) {
			if ($this->RequestHandler->isAjax()) {		
									
						$this->News->id = (int)$this->data['News']['id'];
						if($this->News->saveField('name',trim($this->data['News']['name']) ) ) {
								echo trim($this->data['News']['name']);
						} else {
							
						}			
						exit;		
			}	
		}		
	}
//--------------------------------------------------------------------
	function newsEditBody() {
		Configure::write('debug', 0);
		$this->layout = 'ajax'; 

			if ($this->RequestHandler->isAjax()) {
				//$this->data = $this->Category->read(null, 3);	
				$this->data = $this->News->read(null, $this->data['News']['id']);				
			} else {
				exit;
			}
				
	}
	
//--------------------------------------------------------------------
	function newsEditData() {
		Configure::write('debug', 0);
		$this->layout = 'ajax'; 

			if ($this->RequestHandler->isAjax()) {		
				if (!empty($this->data)&&$this->data['News']['data'] != null) {
					if ($this->News->save($this->data)) {
						
					} else {
						
					}
				}
				if (empty($this->data)) {
					$this->data = $this->News->read(null, $this->data['News']['id']);
				}
		}
	}

//--------------------------------------------------------------------
}

?>
