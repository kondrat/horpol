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
			
			$brand = $this->SubCategory->BrandsCategory->Brand->find('first', array('conditions' => array('Brand.id' => $this->params['named']['brand'] ),'fields' => array('Brand.id', 'Brand.logo','Brand.body','Brand.name'), 'contain' => false ) );	
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
			
			
			$subCats = $this->SubCategory->BrandsCategory->find('first', array('conditions' => array('category_id' => $this->params['named']['category'], 'brand_id' => $this->params['named']['brand'] ),'fields' => array(), 'contain' => array('Banner'=>array('fields'=>array('Banner.id','Banner.logo','Banner.url'),'order'=>array('BannersBrandsCategory.id'=>'DESC') ),
																																																																																																																						'SubCategory'=>array('fields'=>array('name','id','product_count'),'conditions'=> array('SubCategory.product_count <>'=>null) ),
																																																																																																																						'Category'=> array('fields'=>array('Category.id','Category.type','Category.name') ) 
																																																																																																																						) 
																																				) 
																													);				
			if ( $subCats != array() ) {
				$this->set('subCats', $subCats);
				
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
		if ( isset($this->params['named']['subcat']) && (int)Sanitize::paranoid($this->params['named']['subcat']) != null ) {
			$products = $this->SubCategory->find('first', array('conditions' => array('SubCategory.id' => $this->params['named']['subcat']),'fields'=>array('name'), 'contain' => array('Product'=>array('fields'=>array('Product.name','Product.logo','Product.logo1','Product.content1'),'order'=>array('Product.id'=>'DESC') ) ) ) );
			$this->set('products', $products);
			if($subCats['Category']['type'] == 3) {
				$this->render('indexType3');
			}
		} elseif( !isset($this->params['named']['subcat']) ) {
			//$brandInfo= $this->SubCategory->Brand->find('first', array('conditions' => array('SubCategory.id' => $subCat['0']['SubCategory']['id']), 'contain' => array('Product') ) );		
		} 
		
		if( isset($products['Product']) && $products['Product'] == array() ) {
			$this->Session->setFlash('В данном разделе отсутствуют товары', 'default', array('class' => "error") );
		} 
		

	}
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
		} else if( isset($this->params['named']['cat']) && !isset($this->params['named']['brand']) )  {
			$case = 1;
		}	else if ( isset($this->params['named']['cat']) && isset($this->params['named']['brand']) ) {
			$case = 2;
		}	
		

		switch($case) {
			case 1:
									
					$brands = $this->SubCategory->BrandsCategory->find('all',array('conditions'=>array('BrandsCategory.category_id'=>$this->params['named']['cat']),'fields'=>array('Brand.id','Brand.logo','Brand.name','Category.name'),'contain'=>array('Brand','Category')  ) );	


					if($brands != array()) {

						$catSelected = Set::extract ('/Category/.[:first]',$brands);
						$this->set('catSelected',$catSelected['0']);						
					
						foreach($brands as $brand) {
							$brandsOfCurCatId[] = $brand['Brand']['id'];
						}						
																
						$brandsAllTotal = $this->SubCategory->BrandsCategory->Brand->find('all',array('conditions'=>array(),'fields'=>array('Brand.id','Brand.logo','Brand.name'),'contain'=>false));	
						
						foreach($brandsAllTotal as $br) {
							$brandsOfCurCatId2[] = $br['Brand']['id'];					
						}
											
						$diff = array_diff ($brandsOfCurCatId2, $brandsOfCurCatId);																
						$brandsAll = $this->SubCategory->BrandsCategory->Brand->find('all',array('conditions'=>array('Brand.id'=> $diff ),'fields'=>array('Brand.id','Brand.logo','Brand.name'),'contain'=>false));	
						//$brandsAll = $this->SubCategory->BrandsCategory->Brand->find('all',array('conditions'=>array('Brand.id NOT'=> $brandsOfCurCatId ),'fields'=>array('Brand.id','Brand.logo','Brand.name'),'contain'=>false));	
						
																	
					} else {
						
						$catSelected = $this->SubCategory->BrandsCategory->Category->find('first',array('conditions'=>array('Category.id'=>$this->params['named']['cat']),'fields'=>array('Category.id','Category.name'),'contain'=>false));
						$this->set('catSelected',$catSelected['Category']);

						$brandsAll = $this->SubCategory->BrandsCategory->Brand->find('all',array('fields'=>array('Brand.id','Brand.logo','Brand.name'),'contain'=>false));
					}
					
				$this->set('brands',$brands);
				$this->set('brandsAll',$brandsAll);
				
				
				
				$this->render('brandList');							
			break;
			
			
			case 2:				
						
				$subCategories = $this->SubCategory->BrandsCategory->find('first',array('conditions'=>array('BrandsCategory.category_id'=>$this->params['named']['cat'],'BrandsCategory.brand_id'=>$this->params['named']['brand']),
																															//'fields'=>array('SubCategory.id','SubCategory.name','SubCategory.category_id','SubCategory.brand_id','SubCategory.product_count'),
																															'contain'=>	array('SubCategory'=>array('fields'=>array('id','name','product_count') ),
																																								'Category'=>array('fields'=>array('id','name','type') ),
																																								'Brand'=>array('fields'=>array('id','name','logo') ) ) 
																															)
																								);
				if(	$subCategories != array() ) {
					
					if(isset($this->params['named']['subcat'])&&$this->params['named']['subcat']!=null){

						$this->paginate['Product']['contain'] = false;
						$this->paginate['Product']['conditions'] = array('Product.subcategory_id'=>$this->params['named']['subcat']);
						$this->paginate['Product']['fields'] = array('Product.id','Product.subcategory_id','Product.name','Product.logo','Product.logo1');
						$this->paginate['Product']['limit'] = 24;
						$this->paginate['Product']['order'] = array('Product.created'=>'DESC');
						$products = $this->paginate('Product');																				
						$this->set('products',$products);		
										
						
						
						
						//getting id of the selected category																								
						foreach($subCategories['SubCategory'] as $subCategory) {
							if($subCategory['id'] == $this->params['named']['subcat']) {
								$subCatSelected = $subCategory['name'];
								$this->SubCategory->id = $this->params['named']['subcat'];	
								$this->SubCategory->saveField('url','1',false);	
								break;
							}	
						}
																			
																													
						$this->set('subCatSelected',$subCatSelected);		
					}
					
					$this->set('subCategories',$subCategories);
					$this->set('catSelected',$subCategories['Category']);
					$this->set('brandSelected',$subCategories['Brand']);	
					
					
					
					
					
									
				} else {
					
					$catSelected = $this->SubCategory->BrandsCategory->Category->find('first',array('conditions'=>array('Category.id'=>$this->params['named']['cat']),'fields'=>array('Category.id','Category.name'),'contain'=>false));					
					$this->set('catSelected',$catSelected['Category']);
					$brandSelected = $this->SubCategory->BrandsCategory->Brand->find('first',array('conditions'=>array('Brand.id'=>$this->params['named']['brand']),'fields'=>array('Brand.name','Brand.logo','Brand.id'),'contain'=>false));
					//$brandSelected['Category']['id'] = $catSelected['Category']['id'];					
					$this->set('brandSelected',$brandSelected['Brand']);
					
					$this->Session->setFlash('Ни одного подраздела еще не создано');
										
				}																			
	
				$this->render('subcatList');
			break;
			
			
			default:
			
				$categories = $this->SubCategory->BrandsCategory->Category->find('all',array('fields'=>array('Category.id','Category.type','Category.name'),'contain'=>false));
				$this->set('categories',$categories);
				
				$categoriesLast = array();
				$categoriesLast = $this->SubCategory->find('all',array('fields'=>array('SubCategory.id','SubCategory.brand_category_id','SubCategory.name','SubCategory.modified'),'contain'=> array( 'BrandsCategory'=>array('Brand'=>array('id','name','logo'),'Category'=>array('id','name') ) ),'limit'=>'5','order'=>array('SubCategory.modified'=>'DESC') ) );

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
	function admin_addInline() {
		if (!empty($this->data)) {
			//debug($this->data);
			if( !isset($this->data['SubCategory']['brand_category_id']) || $this->data['SubCategory']['brand_category_id'] == 0 ) {
				
				$this->data['BrandsCategory']['brand_id'] = $this->data['SubCategory']['brand_id'];
				$this->data['BrandsCategory']['category_id'] = $this->data['SubCategory']['category_id'];
				
				if($this->SubCategory->BrandsCategory->save($this->data) ) {
					$newBrandCatId = $this->SubCategory->BrandsCategory->id;
					$this->data['SubCategory']['brand_category_id'] = $newBrandCatId;	
				}else {
					$this->Session->setFlash('Подраздел не был создан Mistake','default',array('class'=>'er'));
					$this->redirect($this->referer());
				}	
			}
			
			
			
			$this->SubCategory->create();
			if ($this->SubCategory->save($this->data)) {
				$this->Session->setFlash('Создан новый подраздел');
				$this->redirect(array('action'=>'index','cat:'.$this->data['SubCategory']['category_id'],'brand:'.$this->data['SubCategory']['brand_id'],'subcat:'.$this->SubCategory->id));
				//$this->redirect($this->referer());
			} else {
				$this->Session->setFlash('Подраздел не был создан','default',array('class'=>'er'));
				$this->redirect(array('action'=>'index','cat:'.$this->data['SubCategory']['category_id']));
				//$this->redirect($this->referer());
			}

		}
	}
	
//--------------------------------------------------------------------
	function subCatEditName() {
			Configure::write('debug', 0);
			$this->layout = 'ajax'; 
	
				if ($this->RequestHandler->isAjax()) {	
					$this->data = $this->SubCategory->read(null, $this->data['SubCat']['id']);				
				} else {
					exit;
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
				$this->Session->setFlash('Название подраздела было сохранено1');
				$this->redirect($this->referer());
			} else {
				$this->Session->setFlash('Подраздел не был изменен. Попробйте еще раз');
				$this->redirect($this->referer());
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
		if ($this->SubCategory->delete($id)) {
			$this->Session->setFlash('Подраздел удален');
			$this->redirect($this->referer(), null, true);
		}
	}
//--------------------------------------------------------------------
}
?>