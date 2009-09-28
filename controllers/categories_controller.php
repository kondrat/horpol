<?php
class CategoriesController extends AppController {

	var $name = 'Categories';
	var $paginate = array('limit' => 15  );
	var $helpers = array('Fck');
	
//--------------------------------------------------------------------	
  function beforeFilter()
    {
        $this->Auth->allow('index','brand');
        parent::beforeFilter(); 
        $this->layout = 'default'; 
    }
//--------------------------------------------------------------------

	function index() {
		$a = $this->Category->find('all', array( 'conditions' => array('Category.active'=>'1'), 'order' => array( 'Category.pos' => 'asc'), 'fields' => array('id','name'), 'limit' => 50,'contain'=>false ) );		
		
		if (isset($this->params['requested'])) {
			return $a;
		} else {
			$this->set('a', $a);
		}

	}
//--------------------------------------------------------------------
	function brand($id = null) {
		$this->cacheAction = "10000 hours";
		$cat = array();
		$a = array();
		
		$id = (int)($id);
		if ( $id != null ) { 
			$cat = $this->Category->find('first', array('conditions' => array('Category.id' => $id),'fields' => array('id','type','title','name','body','slogan'), 'contain' => false) );
		} else {
			$this->Session->setFlash('Не выбран пункт меню');
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
			
			$brands = $this->Category->SubCategory->find('all',array('conditions'=>array('SubCategory.category_id'=>$id),'fields'=>array('Brand.id','Brand.logo','Brand.name'),'group' => array('SubCategory.brand_id') ,'contain'=>array('Brand') ) );



			//debug($a);
			if ( $brands == array() ) {
				$this->Session->setFlash('В данной категории отсутствуют товары.');
				$this->redirect( array('controller' => 'pages', 'action' => 'index'), null, true );
			}
				$this->set('cat', $cat);
				$this->set('brands',$brands);
		}//end switch	
	
	}

//--------------------------------------------------------------------

	function admin_index() {
		$categories = array();
		$this->set('headerName','Категории');
		//$this->paginate['Category']['contain'] = false;
		//$this->paginate['Category']['limit'] = 15;
		//$this->set('categories', $this->paginate() );
		$categories = $this->Category->find('all',array('order'=>'pos','fields'=>array('Category.id','Category.name','Category.pos'),'contain'=>false) );
		$this->set('categories', $categories );
	}
//--------------------------------------------------------------------
	function admin_view($id = null) {
		$this->set('headerName','Категории');
		if ( (!$id) ||  ($this->Category->read(null, $id) == false ) ) {
			$this->Session->setFlash('Несуществующая категория');
			$this->redirect(array('action'=>'index'));			
		} else {
			$category = $this->Category->find('first',array('conditions'=>array('Category.id'=>$id),'contain'=>false));
			$this->set('category', $category);
		}
	}
//--------------------------------------------------------------------
	function admin_add() {
		$this->set('headerName','Категории');
		if (!empty($this->data)) {
			
			$this->data['Category']['title'] = (isset($this->data['Category']['name']))?$this->data['Category']['name']:null;
			
			$this->Category->create();
			if ($this->Category->save($this->data)) {
				$this->Session->setFlash('Категория была сохранена');
				$this->redirect(array('action'=>'index'), null, true);
			} else {
				$this->Session->setFlash('Категория не была сохранена','default',array('class'=>'er'));
			}
		}

	}
//--------------------------------------------------------------------
	function admin_edit($id = null) {
		$this->set('headerName','Категории');
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Несуществующая категория');
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Category->save($this->data)) {
				$this->Session->setFlash('Изменения сохранены');
				$this->redirect($this->referer());
			} else {
				$this->Session->setFlash('Изменения не были сохранены. Попробуйте еще раз');
			}
		}
		if (empty($this->data)) {
			$this->Category->recurcive = -1;
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
	function sort() {
		Configure::write('debug', 0);
		$this->autoRender = false;
		if ($this->RequestHandler->isAjax()) {		
			if($_POST['item']) {
				foreach($_POST['item'] as $k=>$v){
					$this->Category->id = $v;
					$this->Category->saveField('pos',$k);							
				}			
			}			
			echo json_encode( array('hi'=> 'ok') );
			exit;		
		}			
	}
//--------------------------------------------------------------------
	function catEditName() {
		Configure::write('debug', 0);
		$this->layout = 'ajax';
		$this->autorender = false;
		if ($this->data) {
			if ($this->RequestHandler->isAjax()) {		
									
						$this->Category->id = (int)$this->data['Category']['id'];
						if($this->Category->saveField('name',trim($this->data['Category']['name']) ) ) {
								echo trim($this->data['Category']['name']);
						} else {
							//echo 	$this->data['Category']['id'];
						}			
						exit;		
			}	
		}		
	}
//--------------------------------------------------------------------
	function catEditType() {
		Configure::write('debug', 0);
		$this->layout = 'ajax';
		if ($this->data) {
			if ($this->RequestHandler->isAjax()) {											
						$this->Category->id = (int)$this->data['Category']['id'];
						if($this->Category->saveField('type',trim($this->data['Category']['type']) ) ) {
								$this->set('catEditType', trim($this->data['Category']['type']) );
						}	else {
							echo 'za';
							exit;
							$this->set('blin','blin');
						}				
		
			}	
		}		
	}
//--------------------------------------------------------------------
	function catEditSlogan() {
		Configure::write('debug', 0);
		$this->layout = 'ajax';
		$this->autorender = false;
		if ($this->data) {
			if ($this->RequestHandler->isAjax()) {		
									
						$this->Category->id = (int)$this->data['Category']['id'];
						if($this->Category->saveField('slogan',trim($this->data['Category']['slogan']) ) ) {
								echo trim($this->data['Category']['slogan']);
						} else {
							//echo 	$this->data['Category']['id'];
						}			
						exit;		
			}	
		}		
	}
//--------------------------------------------------------------------
	function catEditBody() {
		Configure::write('debug', 0);
		$this->layout = 'ajax'; 

			if ($this->RequestHandler->isAjax()) {
				//$this->data = $this->Category->read(null, 3);	
				$this->data = $this->Category->read(null, $this->data['Category']['id']);				
			} else {
				exit;
			}
				
	}
	
//--------------------------------------------------------------------	
}
?>