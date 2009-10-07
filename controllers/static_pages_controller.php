<?php
class StaticPagesController extends AppController {

	var $name = 'StaticPages';
	var $helpers = array('Fck');
//--------------------------------------------------------------------	
  function beforeFilter() {
        $this->Auth->allow('view');
        parent::beforeFilter(); 
        $this->set('headerName','Бренды'); 
   }
//--------------------------------------------------------------------


	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid StaticPage.', true));
			$this->redirect(array('controller'=>'pages','action'=>'index'));
		}
		
		if (isset($this->params['requested'])) {
			$stPage = $this->StaticPage->read(null, $id);
			return $stPage;
		} else {
			exit();
			$this->set('staticPage', $this->StaticPage->read(null, $id));
		}		
		
		
		
		
		
	}

//--------------------------------------------------------------------
	function admin_index() {
		$staticPages = $this->StaticPage->find('all',array('fields'=>array('id','name')));
		$this->set('staticPages', $staticPages);
	}
//--------------------------------------------------------------------
	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid StaticPage.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('staticPage', $this->StaticPage->read(null, $id));
	}

//--------------------------------------------------------------------
	function pagesEditBody() {
		Configure::write('debug', 0);
		$this->layout = 'ajax'; 

			if ($this->RequestHandler->isAjax()) {
				$this->data = $this->StaticPage->read(null, $this->data['StaticPage']['id']);				
			} else {
				exit;
			}
				
	}
	
//--------------------------------------------------------------------
	function admin_add() {
		if (!empty($this->data)) {
			$this->StaticPage->create();
			if ($this->StaticPage->save($this->data)) {
				$this->Session->setFlash(__('The StaticPage has been saved', true));
				$this->redirect($this->referer());
			} else {
				$this->Session->setFlash(__('The StaticPage could not be saved. Please, try again.', true));
			}
		}
	}
//--------------------------------------------------------------------
	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid StaticPage', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->StaticPage->save($this->data)) {
				$this->Session->setFlash('Изменения сохранены');
				$this->redirect($this->referer());
			} else {
				$this->Session->setFlash('Изменения не были сохранены. Проверьте дату','default','er');
			}
		}
		if (empty($this->data)) {
			$this->data = $this->StaticPage->read(null, $id);
		}
	}
//--------------------------------------------------------------------
	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for StaticPage', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->StaticPage->del($id)) {
			$this->Session->setFlash(__('StaticPage deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>