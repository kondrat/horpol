<?php
class subCategoriesController extends AppController {

	var $name = 'subCategories';
	var $paginate = array('limit' => 20);
	//var $cacheAction;// = "1 hour";
//--------------------------------------------------------------------	
  function beforeFilter() {
        $this->Auth->allow('view', 'index');
        parent::beforeFilter(); 
        $this->layout = 'default'; 
    }
//--------------------------------------------------------------------
	function index() {
		$this->cacheAction = "10000 hours";
		App::import('Sanitize');		
		/**
		 *In this module we setting the path to the current Brand logo.
		 */
		$brand = array();
		if ( isset($this->params['named']['brand']) && (int)Sanitize::paranoid($this->params['named']['brand']) != null ) {
			$brand = $this->SubCategory->Brand->find('first', array('conditions' => array('Brand.id' => $this->params['named']['brand'] ),'fields' => array('Brand.id', 'Brand.logo','Brand.body','Brand.name'), 'contain' => false ) );	
			if ( $brand != array() ) {
				$this->set('brand', $brand);
			} else {
				$this->Session->setFlash('Brand wasn\'t found in database');
				$this->redirect('/', null, true);				
			}		
		} else {
			$this->Session->setFlash('Brand wasn\'t found in database');
			$this->redirect('/', null, true);
		}
		
		/**
		 *In this module we setting the set of the subcategories.
		 */		
		$category = array();
		if ( isset($this->params['named']['category']) && (int)Sanitize::paranoid($this->params['named']['category']) != null ) {
			//$t = $this->SubCategory->Category->find('all', array('conditions' => array('Category.id'=>$this->params['named']['category'] ) ) );
			//$this->set('t',$t);
			$category = $this->params['named']['category'];
			$this->set('category',$category);
			$subCat = $this->SubCategory->find('all', array('conditions' => array('SubCategory.category_id' => $this->params['named']['category'], 'SubCategory.brand_id' => $this->params['named']['brand'] ),'fields' => array('SubCategory.name','SubCategory.id'), 'contain' => array('Category'=> array('fields'=>array('Category.id','Category.type','Category.name') ) ) ) );				
			if ( $subCat != array() ) {
				$this->set('subCat', $subCat);
				
			} else {
				$this->Session->setFlash('SubCat wasn\'t found in database');
				$this->redirect('/', null, true);				
			}		
		} else {
			$this->Session->setFlash('SubCat wasn\'t found in database');
			$this->redirect('/', null, true);
		}

		/**
		 *In this module we setting the set of the products.
		 */		
		$products = array();
		if ( isset($this->params['named']['cat']) && (int)Sanitize::paranoid($this->params['named']['cat']) != null ) {
			$products = $this->SubCategory->find('first', array('conditions' => array('SubCategory.id' => $this->params['named']['cat']),'fields'=>array('id','name'), 'contain' => array('Product'=>array('fields'=>array('Product.name','Product.logo','Product.content1') ) ) ) );
			$this->set('products', $products);
			if($subCat['0']['Category']['type'] == 3) {
				$this->render('indexType3');
			}
		} elseif( !isset($this->params['named']['cat']) ) {
			//$brandInfo= $this->SubCategory->Brand->find('first', array('conditions' => array('SubCategory.id' => $subCat['0']['SubCategory']['id']), 'contain' => array('Product') ) );		
		} 
		
		if( isset($products['Product']) && $products['Product'] == array() ) {
			$this->Session->setFlash('В данном разделе отсутствуют товары', 'default', array('class' => "error") );
		} 
		
		
		
		//debug($products);
		//$this->SubCategory->recursive = 2;
		//$this->set('subCat', $this->paginate());
	}
//--------------------------------------------------------------------
/*
	function admin_index() {
		$this->set('headerName','Товары');
		
		
		
		
		
			if ( isset($this->params['named']['category']) && $this->params['named']['category'] != null ) {
				
				$cond['Category.id'] = $this->params['named']['category'];
				
				if ( isset( $this->params['named']['brand'] ) && $this->params['named']['brand'] != null) {
					$cond['Brand.id'] = $this->params['named']['brand'];
					$this->data['SubCategory']['brand'] = $this->params['named']['brand'];
				} elseif( isset( $this->params['url']['brand'] ) && $this->params['url']['brand'] != null) {
					$cond['Brand.id'] = $this->params['url']['brand'];
					$this->data['SubCategory']['brand'] = $this->params['url']['brand'];
					$this->params['named']['brand'] = $this->params['url']['brand'];
				}
			$this->paginate['SubCategory'] = array(
													'limit' => 12,
													'conditions' => $cond,
													'order' => array('Brand.name' => 'desc'),
													'fields' => array('id', 'category_id', 'brand_id','name','product_count'),
													'contain' => array('Category' => array('fields'=>array('id','name')), 'Brand.logo', 'Brand.id' ),
													);
			
			if( $this->paginate() == array() ) {
				$this->redirect( array('action'=>'index'), null, true);
			}
			$this->set('subCat', $this->paginate());
			
			$brands = $this->SubCategory->find('all',array('conditions' => array('category_id'=> $this->params['named']['category'] ) ,'contain' => false) );
			$a = $this->SubCategory->query("SELECT DISTINCT `Brand`.`id` ,`Brand`.`name`, `Brand`.`logo` FROM `sub_categories` AS `SubCategory` LEFT JOIN `brands` AS `Brand` ON (`SubCategory`.`brand_id` = `Brand`.`id`) WHERE `SubCategory`.`category_id` =". $this->params['named']['category'] );
			//$this->set( 'brands', $a );
			
		} else {			
			$categories = $this->SubCategory->Category->find('all');
			$this->set( 'categories', $categories );
			$this->render('catlist');
		}
		
		
	}
	
	
	
*/	
//--------------------------------------------------------------------
	function admin_index() {		
		$this->set('headerName','Товары');

		
		$categories = array();
		$brands = array();
		$brandsAll = array();
		$subCategories = array();
		$brandsOfCurCatId = array(0);
		$case = null;

		if( !isset($this->params['named']['cat']) && !isset($this->params['named']['brand']) ) {
			$case = 0;
		} else if( isset($this->params['named']['cat']) && !isset($this->params['named']['brand']) || (isset($this->params['named']['brands'])&&isset($this->params['named']['brand'])=='all') )  {
			$case = 1;
		}	else if ( isset($this->params['named']['cat']) && isset($this->params['named']['brand'])&&$this->params['named']['brand']!='all' ) {
			$case = 2;
		}	
		
		
			
		//debug($case);
		switch($case) {
			case 1:
					
				$catSelected = $this->SubCategory->Category->find('first',array('conditions'=>array('Category.id'=>$this->params['named']['cat']),'fields'=>array('Category.id','Category.name'),'contain'=>false));
				$this->set('catSelected',$catSelected['Category']['name']);
				
					//$brands = $this->SubCategory->Brand->find('all',array('fields'=>array('Brand.id','Brand.logo','Brand.name'),'contain'=>false));
					$brands = $this->SubCategory->find('all',array('conditions'=>array('SubCategory.category_id'=>$this->params['named']['cat']),'fields'=>array('Brand.id','Brand.logo','Brand.name'),'group' => array('SubCategory.brand_id'),'contain'=>array('Brand')  ) );	
					if($brands != array()) {
						foreach($brands as $brand) {
							$brandsOfCurCatId[] = $brand['Brand']['id'];
						}
						$brandsAll = $this->SubCategory->Brand->find('all',array('conditions'=>array('Brand.id NOT'=> $brandsOfCurCatId ),'fields'=>array('Brand.id','Brand.logo','Brand.name'),'contain'=>false));						
					} else {
						$brandsAll = $this->SubCategory->Brand->find('all',array('fields'=>array('Brand.id','Brand.logo','Brand.name'),'contain'=>false));
					}
					
				$this->set('brands',$brands);		
				$this->set('brandsAll',$brandsAll);
				$this->render('brandList');							
			break;
			
			
			case 2:
				//echo 'two';				
				$subCategories = $this->SubCategory->find('all',array('conditions'=>array('SubCategory.category_id'=>$this->params['named']['cat'],'SubCategory.brand_id'=>$this->params['named']['brand']),
																															'fields'=>array('SubCategory.id','SubCategory.name','SubCategory.category_id','SubCategory.brand_id','SubCategory.product_count'),
																															'contain'=>	array('Category'=>array('fields'=>'name'),
																																								'Brand'=>array('fields'=>'name') ) 
																															)
																								);
				if(	$subCategories != array() ) {
					$this->set('subCategories',$subCategories);
					$this->set('catSelected',$subCategories[0]['Category']['name']);
					$this->set('brandSelected',$subCategories['0']['Brand']['name']);					
				} else {
					$catSelected = $this->SubCategory->Category->find('first',array('conditions'=>array('Category.id'=>$this->params['named']['cat']),'fields'=>array('Category.id','Category.name'),'contain'=>false));					
					$this->set('catSelected',$catSelected['Category']['name']);
					$brandSelected = $this->SubCategory->Brand->find('first',array('conditions'=>array('Brand.id'=>$this->params['named']['brand']),'fields'=>array('Brand.name','Brand.logo'),'contain'=>false));					
					$this->set('brandSelected',$brandSelected);
					$this->Session->setFlash('Ни одного подраздела еще не создано');
				}																			
	
				$this->render('subcatList');
			break;
			default:
				//echo 'default';				
				$categories = $this->SubCategory->Category->find('all',array('fields'=>array('Category.id','Category.name'),'contain'=>false));
				$this->set('categories',$categories);
				
				$categoriesLast = array();
				$categoriesLast = $this->SubCategory->find('all',array('fields'=>array('SubCategory.id','SubCategory.name','SubCategory.modified','Category.name','Brand.name','Brand.logo'),'contain'=> array('Brand','Category'),'limit'=>'5','order'=>array('SubCategory.modified'=>'DESC') ) );
				$this->set('categoriesLast',$categoriesLast);				
				
				
				
				$this->render('catList');			
			break;
		}		


			

	}



	
	
//--------------------------------------------------------------------
	function admin_view($id = null) {
		$this->set('headerName','Подразделы');
		if ( (!$id) ||  ($this->SubCategory->read(null, $id) == false ) ) {
			$this->Session->setFlash(__('Invalid Product.', true));
			$this->redirect(array('action'=>'index'));			
		} else {
			$this->set('product', $this->SubCategory->read(null, $id));
		}
	}
//--------------------------------------------------------------------
	function admin_add() {
		$this->set('headerName','Подразделы');	
		/**
		 * No validation yet
		 */
		$status = false;
		/**
		 * Initionalicing of the input params
		 */
		$category = null;
		if ( isset($this->params['named']['category']) && $this->params['named']['category'] != null) {
			$category = $this->params['named']['category'];
			$this->data['SubCategory']['category_id'] = $category;
			$this->set('par1', $category);
		}
		
		$brand = null;
		if ( isset($this->params['named']['brand']) && $this->params['named']['brand'] != null) {
			$brand = $this->params['named']['brand'];
			$this->data['SubCategory']['brand_id'] = $brand;
			$this->set('par2', $brand);
		}	
		
		if ( isset($this->data['SubCategory']['category_id']) && $this->data['SubCategory']['category_id'] != null ) {
				$categoryData = array();
				$categoryData = $this->SubCategory->Category->find('first', array( 'conditions' => array('Category.id' => $this->data['SubCategory']['category_id']), 'fields'=>array('id','name'), 'contain'=>false ) );
					if( isset($categoryData) && $categoryData != array() ) {
						$this->set('categoryData', $categoryData);
					} else {
						$this->redirect( array('action' => 'index'), null, true);
					}
		}
		if ( isset($this->data['SubCategory']['brand_id']) && $this->data['SubCategory']['brand_id'] != null ) {					
				$brandData = array();
				$brandData = $this->SubCategory->Brand->find('first', array( 'conditions' => array('Brand.id' => $this->data['SubCategory']['brand_id']), 'fields'=>array('id','name','logo'), 'contain'=>false ) );
					if( isset($brandData) && $brandData != array() ) {
						$this->set('brandData', $brandData);
					} else {
						$this->redirect( array('action' => 'index'), null, true);
					}	
		}			
					
									
		/**
		 * setting some cases
		 * $case 2 if we have no any initial params.
		 */	
		$case = 2;	 
		if ($category && $brand) {
			$case = 0;
		} elseif ($category && !$brand) {
			$case = 1;
		} else {
			$case = 2;
		}
		
		
		switch ($case) {
			
			case 0:							
				$status = true;
			break;
			
			case 1:								
				if ( !isset($this->data['SubCategory']['brand_id']) ){					
					$brands = $this->SubCategory->Brand->find('list');
					$this->set( compact('brands') );				
					$this->render('catselect');
				} else {					
					$this->SubCategory->set( $this->data );									
	 				if ( $this->SubCategory->validates() == false ) {
					
							$brands = $this->SubCategory->Brand->find('list');
							$this->set( compact('brands') );
							
							$this->Session->setFlash('Вы должны выбрать Бренд');
							$this->render('catselect'); 						
		
	 				} else {
						$this->set('par1', $category);
						$this->set('par2', $this->data['SubCategory']['brand_id']);
						$status = true;
					}
	 			}		
						
			break;
			case 2:
				$this->SubCategory->set( $this->data );
				
 				if ( $this->SubCategory->validates() == false ) {	
						
						$cat = $this->SubCategory->Category->find('list',array('contain' => false));
						$this->set( compact('cat') );
				
						$brands = $this->SubCategory->Brand->find('list');
						$this->set( compact('brands') );
						
						$this->Session->setFlash('Вы должны выбрать Категорию и Брэнд');
						$this->render('catselect'); 
 					
 				} else {
						$this->set('par1', $this->data['SubCategory']['category_id']);
						$this->set('par2', $this->data['SubCategory']['brand_id']); 
						$status = true;
 				}			
			break;
		}
		
		/**
		 * General saving block
		 */
		

		if (!empty($this->data)) {
			
			//debug($this->data);
				

			if ( $status == true ) {
											
				$subcat = $this->SubCategory->find('all', array('conditions' => array( 'SubCategory.category_id' => $this->data['SubCategory']['category_id'], 'SubCategory.brand_id' => $this->data['SubCategory']['brand_id']), 'contain' => false, 'fields' => array('name') ) );	
				$this->set('subcat', $subcat);
				
				if ( isset($this->data['SubCategory']['name']) ) {								
						$this->SubCategory->create();
						if ($this->SubCategory->save($this->data)) {
							$this->Session->setFlash('Подраздел создан');
							$this->redirect(array('action'=>'index','category:'.$this->data['SubCategory']['category_id']),null,true);
						} else {
							$this->Session->setFlash('Подраздел не был создан. Попробйте еще раз');
						}						
						
											
				}	
			}
			
						
						
						
		}
		
		

		if ( empty($this->data) ) {
			$cat = $this->SubCategory->Category->find('list',array('contain' => false));
			$this->set( compact('cat') );
	
			$brands = $this->SubCategory->Brand->find('list');
			$this->set( compact('brands') );
		
			$this->render('catselect');
		} 
			

	}
//--------------------------------------------------------------------
	function admin_edit($id = null) {
		$this->set('headerName','Подразделы');
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid SubCategory', true));
			$this->redirect(array('action'=>'index'), null, true);
		}
		if (!empty($this->data)) {
			if ($this->SubCategory->save($this->data)) {
				$this->Session->setFlash('Название подраздела было сохранено');
				$this->redirect(array('action'=>'index'), null, true);
			} else {
				$this->Session->setFlash('Подраздел не был создан. Попробйте еще раз');
			}
		}
		if (empty($this->data)) {
			$this->data = $this->SubCategory->read(null, $id);
		}
	}
//--------------------------------------------------------------------
	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Подраздел не найден');
			$this->redirect(array('action'=>'index'), null, true);
		}
		if ($this->SubCategory->del($id)) {
			$this->Session->setFlash('Подраздел удален');
			$this->redirect(array('action'=>'index'), null, true);
		}
	}
//--------------------------------------------------------------------
}
?>