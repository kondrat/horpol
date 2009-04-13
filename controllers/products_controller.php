<?php
class ProductsController extends AppController {

	var $name = 'Products';
	var $helpers = array('Html', 'Form');
	var $paginate = array('limit' => 5);
	var $components = array('Upload');
	var $uses = array('Product', 'Brand','Category', 'SubCategory');
//--------------------------------------------------------------------	
  function beforeFilter() {
        //$this->Auth->allow('view', 'index');
        parent::beforeFilter(); 
        $this->layout = 'default'; 
    }
//--------------------------------------------------------------------

	function admin_index($id = null) {
		if ( $id != null ) {
			$conditions = array('subcategory_id' => $id);
			$this->set('dataToShow',$this->Product->find('all', array('conditions' => $conditions, 
																	'contain'=> array('subCategory.name' => 
																												array('Category.name',
																														'Category.type',
																														'Brand.name',
																														'Brand.logo',
																														'Brand.id'
																														) 
																												),
																	'fields' => array('id','name','subcategory_id') 
																	) 
														) 
							);
		} else {
			$conditions = array();
			$this->set('dataToShow',null);
		}
		$this->paginate['Product'] = array(
			'contain' => false,
			'limit' => 10,
			'order' => array('Product.created' => 'desc'),
			'conditions' => $conditions,
		);

		$this->set('products', $this->paginate());
	}
//--------------------------------------------------------------------
	function admin_view($id = null) {
		if ( (!$id) ||  ($this->Product->read(null, $id) == false ) ) {
			$this->Session->setFlash(__('Invalid Product.', true));
			$this->redirect(array('action'=>'index'));			
		} else {
			$this->set('product', $this->Product->read(null, $id));
		}
	}
//--------------------------------------------------------------------
/*
	function index() {
		$this->Product->recursive = 0;
		$this->set('products', $this->paginate());
	}
*/
//--------------------------------------------------------------------
	function admin_add() {
		//debug($this->Session->read());
		/**
		 * to see if validation is passed
		 */
		$status = false;
		/**
		 * used to skip the function if session params are isset.
		 */
		$skip = false;
		
		/**
		 * If we have data in session we use them.
		 * If we have param "cache" we clean the data
		 * If we have param "category" we start a new conditions
		 */
		if ($this->Session->check('CatBrandData') ) {
			if ( isset($this->params['named']['cache']) &&  $this->params['named']['cache'] == false || isset($this->params['form']['category']) ) {
				$this->Session->del('CatBrandData');
			} else {
				$skip = true;
			}
		}
		/**
		 * If we get with controller with the params
		 */
		if ( isset($this->params['named']['category']) && isset($this->params['named']['brand']) && $this->params['named']['cache'] == false && isset($this->params['named']['cat']) ) {
			$this->data['Product']['category_id'] = $this->params['named']['category'];
			$this->data['Product']['brand_id'] = $this->params['named']['brand'];
			$this->Session->write('CatBrandData.ses', true );
			$this->Session->write('CatBrandData.subcatFinal.id', $this->params['named']['cat']);
			$currentSubCat = $this->SubCategory->find('first', array( 'conditions' => array('subCategory.id' => $this->params['named']['cat'] ), 'fields' => array('subCategory.name'), 'contain'=>false ) );	
			//debug($currentSubCat);
			$this->Session->write('CatBrandData.subcatFinal.id', $this->params['named']['cat'] );	
			$this->Session->write('CatBrandData.subcatFinal.name', $currentSubCat['subCategory']['name'] );
			//$skip = true;
		}


		if ( !empty($this->data) || $this->Session->check('CatBrandData.ses') ) {
						 
			 			
			if ( ( empty($this->data['Product']['category_id']) || empty($this->data['Product']['brand_id']) ) && $skip == false ) {
				//debug($this->data);
				
				$this->Product->set( $this->data );
				
 				if ( $this->Product->validates() == false ) {
 					
					$er = $this->Product->invalidFields();
					if ( isset($er['category_id']) || isset($er['brand_id']) ) {
						
						$cat = $this->Category->find('list',array('contain' => false));
						$this->set( compact('cat') );
				
						$brands = $this->Brand->find('list');
						$this->set( compact('brands') );
						
						$this->Session->setFlash('Вы должны выбрать Категорию и Брэнд');
						$this->render('catselect'); 
						//he we won't move forward
					} 
 					
 				} 
 			} else {
 				/** 
 				 *So the validation of the subcategory_id and brand_id id OK
 				 */
 				$status = true;
 				if( !$this->Session->check('CatBrandData.category.id') ) { 
 					$this->Session->write('CatBrandData.category.id', $this->data['Product']['category_id'] );
 					$this->Session->write('CatBrandData.brand.id', $this->data['Product']['brand_id'] );
 				}
 			}
			

			if ( $status == true || $skip == true ) {
				/**
				 * no data saved in session yet
				 */
				if ( $skip == false ) {
					$catName = $this->Category->find('first', array('conditions' => array( 'Category.id' => $this->Session->read('CatBrandData.category.id') ), 'contain' => false, 'fields' => array('id','name','type') ) );
					$this->Session->write('CatBrandData.category.name',$catName['Category']['name'] );
					$this->Session->write('CatBrandData.category.type',$catName['Category']['type'] );
					
					$brandName = $this->Brand->find('first', array('conditions' => array( 'Brand.id' => $this->Session->read('CatBrandData.brand.id') ), 'contain' => false, 'fields' => array('id','logo','name') ) );	
					$this->Session->write('CatBrandData.brand.name', $brandName['Brand']['name'] );	
					$this->Session->write('CatBrandData.brand.logo', $brandName['Brand']['logo'] );	

					/**
					 *Setting subcategry array for choosing.
					 */				
					$subcat = $this->SubCategory->find('all', array('conditions' => array( 'subCategory.category_id' => $this->Session->read('CatBrandData.category.id'), 'subCategory.brand_id' => $this->Session->read('CatBrandData.brand.id') ), 'contain' => false, 'fields' => array('id', 'name') ) );
	
					if ( $subcat == array() ) { //we haven't yet any subcategories, we need to create one first
						$this->Session->setFlash('Создайте Подраздел для выбранных Категории и Брэнда');
						$this->redirect(array('controller' => 'sub_categories', 'action'=>'add', 'category:'.$this->data['Product']['category_id'], 'brand:'.$this->data['Product']['brand_id']),null,true);
					}
					$this->Session->write('CatBrandData.subcat', $subcat );
					
				} 
				
				//saving module
				if ( isset($this->data['Product']['name']) ) {
					
					if ( $this->Session->check('CatBrandData.subcatFinal.id') && $this->Session->read('CatBrandData.subcatFinal.id') != null ) {
						$this->data['Product']['subcategory_id'] = $this->Session->read('CatBrandData.subcatFinal.id');
					}
					
					/**
					 * We uploading the product photo first
					 *
					 */

						$file = array();
						// set the upload destination folder
						$destination = WWW_ROOT.'img'.DS.'catalog'.DS;
						//debug($destination );
						// grab the file
						$file = $this->data['Product']['userfile'];
						//debug($file);
				
						if ($file['error'] == 4) {
							$this->data['Product']['logo'] = 'default.jpg';
							//$this->Session->setFlash('Файл не загружен');
							
						}else {
												
							// upload the image using the upload component
							$result = $this->Upload->upload($file, $destination, null, array('type' => 'resizecrop', 'size' => array('150', '100') ) );
								if ( $result != 1 ){
									$this->data['Product']['logo'] = $this->Upload->result;
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
					
					
					
					
					
					
					//debug($this->data);
					
					
											
						$this->Product->create();
						if ($this->Product->save($this->data)) {						
							if ( isset($this->data['Product']['remember_cat']) && $this->data['Product']['remember_cat'] == 1 ) {
								$this->Session->write('CatBrandData.ses', true );
								$bla = $this->SubCategory->find('first', array( 'conditions' => array('SubCategory.id' => $this->data['Product']['subcategory_id'] ), 'fields' => array('SubCategory.name') ) );	
								$this->Session->write('CatBrandData.subcatFinal.id', $this->data['Product']['subcategory_id'] );	
								$this->Session->write('CatBrandData.subcatFinal.name', $bla['subCategory']['name'] );					
							} 
									
							$this->Session->setFlash('Товар был сохранен в базе');
							$this->redirect( array('action'=>'index',$this->data['Product']['subcategory_id']),null,true );
						} else {
							$this->Session->setFlash('Товар не был сохранен, попробуте еще раз');
							if (  isset($this->Upload->result) && $this->Upload->result != null) {
								@unlink($destination.$this->Upload->result);
							}
						}												
											
				}	
			}						
						
		}
		


		if ( empty($this->data) && !$this->Session->check('CatBrandData.ses') ) {
			$cat = $this->Category->find('list',array('contain' => false));
			$this->set( compact('cat') );
	
			$brands = $this->Brand->find('list',array('contain' => false) );
			$this->set( compact('brands') );
			$this->render('catselect');
		} 
			

	}
//--------------------------------------------------------------------
	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Несуществующий товар');
			$this->redirect(array('action'=>'index'));
		}

		$pageParam = Router::parse($this->referer());
		if(isset($pageParam['named']['page']) && $pageParam['named']['page'] != null) {
			$this->Session->write('editPage',$pageParam['named']['page']);
		}

		if (!empty($this->data)) {		
			$file = array();
			// set the upload destination folder
			$destination = WWW_ROOT.'img'.DS.'catalog'.DS;
			//debug($destination );
			// grab the file
			$file = $this->data['Product']['userfile'];
			//debug($file);
			
			if ($file['error'] == 4) {
				unset($this->data['Product']['logo']);
				//$this->Session->setFlash('Файл не загружен');
				
			}else {				
					// upload the image using the upload component
					$result = $this->Upload->upload($file, $destination, null, array('type' => 'resizecrop', 'size' => array('150', '100') ) );
					
					if ( $result != 1 ){
						if ( isset($this->data['Product']['logo']) && $this->data['Product']['logo'] != null) {
							$oldFile = $this->data['Product']['logo'];
							
						}
						$this->data['Product']['logo'] = $this->Upload->result;
					} else {
						// display error
						$errors = $this->Upload->errors;
						// piece together errors
						if( is_array($errors) ) { 
							$errors = implode("<br />",$errors); 
						}	   
							$this->Session->setFlash($errors);
							$this->redirect(array('action' => 'edit'), null, true);
					}
			}		
		
		

			if ($this->Product->save($this->data)) {
				$this->Session->setFlash('Изменения сохранены');
				@unlink($destination.$oldFile);
				if ( $this->Session->check('editPage') ) {
					$this->redirect( array('action'=>'index',$this->data['Product']['subcategory_id'],'page:'.$this->Session->read('editPage') ) );
				} else {
					$this->redirect(array('action'=>'index',$this->data['Product']['subcategory_id']));
				}
				
			} else {
				$this->Session->setFlash('Изменения не были сохранены. Попробуйте еще раз');
						$this->data['Product']['logo'] = $oldFile;
						if (  isset($this->Upload->result) && $this->Upload->result != null) {
							@unlink($destination.$this->Upload->result);
						}
			}
		}
		if (empty($this->data)) {
			$toEdit = $this->Product->find('first',array('conditions' => array('Product.id'=>$id),'fields'=>array('Product.id','Product.name','Product.logo','Product.subcategory_id','Product.content1'),'contain'=>array('subCategory' => array('fields'=>array('id'),'Category.type') ) ) );
			$this->data = $toEdit;
			$this->set('catType',$toEdit['subCategory']);
		}

	}
//--------------------------------------------------------------------
	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Несуществующий товар');
			$this->redirect(array('controller' => 'sub_categories', 'action'=>'index'));
		} else {
			$del = $this->Product->find('first', array('conditions' => array('Product.id' => $id),'fields' => array('id','subcategory_id'), 'contain' => false ) );
		}
		if ($this->Product->del($id)) {
			$this->Session->setFlash('Товар удален');
			$this->redirect(array('action'=>'index',$del['Product']['subcategory_id']));
		}
	}
//--------------------------------------------------------------------
	function admin_delall() {
		if ( isset($this->data['Product']) ) {
			$count = 0;
			foreach($this->data['Product']['id'] as $value) {  
				if($value != 0) { 
					if($this->Product->del($value) ){
						$count = 1; 
					} 
				}  
			}
			if ($count == 0) {
				$this->Session->setFlash('Вы не выбрали товары');
			} else {
				$this->Session->setFlash('Товары удалены');
			}
			$this->redirect($this->referer());
		}
	}
//--------------------------------------------------------------------
}
?>