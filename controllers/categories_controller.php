<?php
class CategoriesController extends AppController {

	var $name = 'Categories';
	var $helpers = array('Html', 'Form');
	var $paginate = array('limit' => 10  );
	var $uses = array('Category','Brand','SubCategory');
//--------------------------------------------------------------------	
  function beforeFilter()
    {
        $this->Auth->allow('index','brand');
        parent::beforeFilter(); 
        $this->layout = 'default'; 
    }
//--------------------------------------------------------------------

	function index() {
		$this->Category->recursive = -1;
		$a = $this->Category->find('all', array( 'conditions' => array(), 'order' => array( 'Category.id' => 'asc'), 'fields' => array('id','name'), 'limit' => 50 ) );		
		//debug($a);
		
		if (isset($this->params['requested'])) {
			return $a;
		} else {
			$this->set('a', $a);
		}

	}
//--------------------------------------------------------------------
	function brand($id = null) {
		$this->cacheAction = "10 hours";
		$cat = array();
		$a = array();
		App::import('Sanitize');
		$id = (int)Sanitize::paranoid($id);
		if ( $id != null ) { 
			$cat = $this->Category->find('first', array('conditions' => array('Category.id' => $id),'fields' => array('id','type','name','body'), 'contain' => false) );
		} else {
			$this->Session->setFlash(__('Не выбран пункт меню', true));
			$this->redirect( array('controller' => 'pages', 'action' => 'index'), null, true );
		}	
		
		switch($cat['Category']['type']) {
			case 2:
				$products = $this->Category->SubCategory->find('first', array('conditions' => array('SubCategory.category_id' => $id ),'fields' => array('id', 'category_id'),'contain' => array('Product') ) );
				$this->set('cat', $cat);
				$this->set('products', $products);
				$this->render('case2');				
			break;
			default:
					/*
					$this->Category->recursive = 1;	
					$a = $this->Category->find('first', array( 'conditions' => array('Category.id' => $id ) ) );
					*/
					//$a = $this->SubCategory->find('all', array( 'conditions' => array('SubCategory.category_id' => $id), 'contain' => array('Brand') )  );
			$a = $this->SubCategory->query("SELECT DISTINCT `Brand`.`id` ,`Brand`.`name`, `Brand`.`logo` FROM `sub_categories` AS `SubCategory` LEFT JOIN `brands` AS `Brand` ON (`SubCategory`.`brand_id` = `Brand`.`id`) WHERE `SubCategory`.`category_id` =". $id);
			//debug($a);
			if ( $a == array() ) {
				$this->Session->setFlash('В данной категории отсутствуют товары.');
				$this->redirect( array('controller' => 'pages', 'action' => 'index'), null, true );
			}
				$this->set('cat', $cat);
				$this->set('brands',$a);	
		}//end switch	
	
	}

//--------------------------------------------------------------------

	function admin_index() {
		$this->Category->recursive = 0;
		$caties = $this->Category->find('all');
		//echo 'cat';
		$this->set('cat', $this->paginate(  ) );
	}
//--------------------------------------------------------------------
	function admin_view($id = null) {
		if ( (!$id) ||  ($this->Category->read(null, $id) == false ) ) {
			$this->Session->setFlash(__('Invalid Category.', true));
			$this->redirect(array('action'=>'index'));			
		} else {
			$this->set('category', $this->Category->read(null, $id));
		}
	}
//--------------------------------------------------------------------
	function admin_add() {
		if (!empty($this->data)) {
			debug($this->data);
			$this->Category->create();
			if ($this->Category->save($this->data)) {
				$this->Session->setFlash('Категория была сохранена');
				$this->redirect(array('action'=>'index'), null, true);
			} else {
				$this->Session->setFlash('Категория не была сохранена');
			}
		}

	}
//--------------------------------------------------------------------
	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Category', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Category->save($this->data)) {
				$this->Session->setFlash('Изменения сохранены');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('Изменения не были сохранены. Попробуйте еще раз');
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Category->read(null, $id);
		}

	}
//--------------------------------------------------------------------
	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Category', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Category->del($id)) {
			$this->Session->setFlash('Категория удалена');
			$this->redirect(array('action'=>'index'));
		}
	}
//--------------------------------------------------------------------
}
?>