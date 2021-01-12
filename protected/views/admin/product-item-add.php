

<div class="uk-width-1">
<a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/ProductItem/Do/Add" class="uk-button"><i class="fa fa-plus"></i> <?php echo Yii::t("default","Add New")?></a>

<a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/ProductItem" class="uk-button"><i class="fa fa-list"></i> <?php echo Yii::t("default","List")?></a>

</div>

<?php 

//$multi_option_Selected='';
//$multi_option_value_selected='';
//$data=array();

if (isset($_GET['id'])){
  if (!$data=Yii::app()->functions->GetProductItem($_GET['id'])){
    echo "<div class=\"uk-alert uk-alert-danger\">".
    Yii::t("default","Sorry but we cannot find what your are looking for.")."</div>";
    return ;
  }

  //$multi_option_Selected=isset($data['multi_option'])?(array)json_decode($data['multi_option']):false;
  //$multi_option_value_selected=isset($data['multi_option_value'])?(array)json_decode($data['multi_option_value']):false;

}
?>                                   

<div class="spacer"></div>

<form class="uk-form uk-form-horizontal forms" id="forms">
<?php echo CHtml::hiddenField('action','addProductItem')?>
<?php echo CHtml::hiddenField('id',isset($_GET['id'])?$_GET['id']:"");?>
<?php if (!isset($_GET['id'])):?>
<?php echo CHtml::hiddenField("redirect",Yii::app()->request->baseUrl."/admin/ProductItem/Do/Add")?>
<?php endif;?>

<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Shopping Category")?></label>
 <?php echo CHtml::dropDownList('shopping_category_id',
  isset($data['shopping_category_id'])?$data['shopping_category_id']:''
  ,(array)Yii::app()->functions->shoppigCategoryList(),
  array('class'=>"uk-form-width-large"))?>
</div>

<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Product Category")?></label>
  <?php echo CHtml::dropDownList('product_category_id',
  isset($data['product_category_id'])?$data['product_category_id']:''
  ,(array)Yii::app()->functions->productCategoryList(),
  array('class'=>"uk-form-width-large"))?>
</div>

<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Product Sub Category")?></label>
  <?php echo CHtml::dropDownList('product_sub_category_id',
  isset($data['product_sub_category_id'])?$data['product_sub_category_id']:''
  ,(array)Yii::app()->functions->productSubCategoryList(),
  array('class'=>"uk-form-width-large"))?>
</div>

<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Product Sub Category 4")?></label>
  <?php echo CHtml::dropDownList('product_sub_category1_id',
  isset($data['product_sub_category4_id'])?$data['product_sub_category4_id']:''
  ,(array)Yii::app()->functions->productSubCategory4List(),
  array('class'=>"uk-form-width-large"))?>
</div>

<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Product Sub Category 5")?></label>
  <?php echo CHtml::dropDownList('product_sub_category2_id',
  isset($data['product_sub_category5_id'])?$data['product_sub_category5_id']:''
  ,(array)Yii::app()->functions->productSubCategory5List(),
  array('class'=>"uk-form-width-large"))?>
</div>

<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Product Item Name")?></label>
  <?php 
  echo CHtml::textField('product_item_name',
  isset($data['product_item_name'])?$data['product_item_name']:""
  ,array('class'=>"uk-form-width-large",'data-validation'=>"required"))
  ?>
</div>

<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Product Description")?></label>
  <?php echo CHtml::textArea('product_item_description',
  isset($data['product_item_description'])?$data['product_item_description']:""
  ,array(
  'class'=>'uk-form-width-large' 
  ))?>
  </div>

<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Wholesale Price")?></label>
  <?php 
  echo CHtml::textField('wholesale_price',
  isset($data['wholesale_price'])?$data['wholesale_price']:""
  ,array('class'=>"numeric_only addon_price",'data-validation'=>"required"))
  ?>
</div>

<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Regular Price")?></label>
  <?php 
  echo CHtml::textField('regular_price',
  isset($data['regular_price'])?$data['regular_price']:""
  ,array('class'=>"numeric_only addon_price",'data-validation'=>"required"))
  ?>
</div>

<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Sale Price")?></label>
  <?php 
  echo CHtml::textField('sale_price',
  isset($data['sale_price'])?$data['sale_price']:""
  ,array('class'=>"numeric_only addon_price",'data-validation'=>"required"))
  ?>
</div>

<div class="uk-form-row">
<label class="uk-form-label"><?php echo Yii::t("default","Featured Product")?></label>
<?php echo CHtml::dropDownList('featured_product',
isset($data['featured_product'])?$data['featured_product']:"",
(array)featuredProduct(),          
array(
'class'=>'uk-form-width-medium',
'data-validation'=>"required"
))?>
</div>


<div class="uk-form-row"> 
  <label class="uk-form-label"><?php echo t("Featured Image")?></label>
  <a href="javascript:;" id="sau_upload_file" 
   class="button uk-button" data-progress="sau_progress" data-preview="image_preview" data-field="FeaturedImage">
    <?php echo t("Browse")?>
  </a>
</div>
<div class="sau_progress"></div>

<div class="image_preview">
 <?php 
 $image=isset($data['photo'])?$data['photo']:'';
 if(!empty($image)){
  echo '<img src="'.FunctionsV3::getImage($image).'" class="uk-thumbnail" id="logo-small"  />';
  echo CHtml::hiddenField('FeaturedImage',$image);
  echo '<br/>';
  echo '<a href="javascript:;" class="sau_remove_file" data-preview="image_preview" >'.t("Remove image").'</a>';
 }
 ?>
</div>
<div style="height:20px;"></div>

  
<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Quantity")?></label>
  <?php 
  echo CHtml::textField('quantity',
  isset($data['quantity'])?$data['quantity']:""
  ,array('class'=>"numeric_only addon_price",'data-validation'=>"required"))
  ?>
</div>

<div class="uk-form-row">
<label class="uk-form-label"><?php echo Yii::t("default","Stock Status")?></label>
<?php echo CHtml::dropDownList('stock_status',
isset($data['stock_status'])?$data['stock_status']:"",
(array)stockStatus(),          
array(
'class'=>'uk-form-width-medium',
'data-validation'=>"required"
))?>
</div>

<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Size")?></label>
  <?php echo CHtml::dropDownList('size',
  isset($data['size'])?$data['size']:''
  ,(array)Yii::app()->functions->sizeDropdown(),
  array('class'=>"uk-form-width-large"))?>
</div>

<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Weight")?></label>
  <?php 
  echo CHtml::textField('weight',
  isset($data['weight'])?$data['weight']:""
  ,array('class'=>"numeric_only addon_price",'data-validation'=>"required"))
  ?>
 <?php echo CHtml::dropDownList('length',
isset($data['length'])?$data['length']:"",
(array)lengthMeasure(),          
array(
'class'=>'uk-form-width-small','data-validation'=>"required"))?>
</div>



<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Dimensions")?></label>
  <?php 
  echo CHtml::textField('dimensions',
  isset($data['dimensions'])?$data['dimensions']:""
  ,array('class'=>"uk-form-width-large",'data-validation'=>"required"))
  ?>
</div>

<div class="uk-form-row">
<label class="uk-form-label"><?php echo Yii::t("default","Special Tags")?></label>
<?php echo CHtml::dropDownList('special_tags',
isset($data['special_tags'])?$data['special_tags']:"",
(array)featuredProduct(),          
array(
'class'=>'uk-form-width-medium',
'data-validation'=>"required"
))?>
</div>

<div class="uk-form-row">
<label class="uk-form-label"><?php echo Yii::t("default","Shopping Category Link Products")?></label>
<?php echo CHtml::dropDownList('link_products_shopping_category[]',
isset($data['shopping_category_link_products'])?(array)json_decode($data['shopping_category_link_products']):"",
(array)Yii::app()->functions->LinkProductsShoppingCategory(true),          
array('class'=>'uk-form-width-large chosen','multiple'=>true,'data-validation'=>""))?>
</div>

<div class="uk-form-row">
<label class="uk-form-label"><?php echo Yii::t("default","Product Category Link Products")?></label>
<?php echo CHtml::dropDownList('link_products_product_category[]',
isset($data['product_category_link_products'])?(array)json_decode($data['product_category_link_products']):"",
(array)Yii::app()->functions->LinkProductsProductCategory(true),          
array('class'=>'uk-form-width-large chosen','multiple'=>true,'data-validation'=>""))?>
</div>

<div class="uk-form-row">
<label class="uk-form-label"><?php echo Yii::t("default","Product Sub Category Link Products")?></label>
<?php echo CHtml::dropDownList('link_products_product_sub_category[]',
isset($data['product_sub_category_link_products'])?(array)json_decode($data['product_sub_category_link_products']):"",
(array)Yii::app()->functions->LinkProductsProductSubCategory(true),          
array('class'=>'uk-form-width-large chosen','multiple'=>true,'data-validation'=>""))?>
</div>

<div class="uk-form-row">
<label class="uk-form-label"><?php echo Yii::t("default","Product Sub Category 4 Link Products")?></label>
<?php echo CHtml::dropDownList('link_products_product_sub_category4[]',
isset($data['product_sub_category4_link_products'])?(array)json_decode($data['product_sub_category4_link_products']):"",
(array)Yii::app()->functions->LinkProductsProductSubCategory4(true),          
array('class'=>'uk-form-width-large chosen','multiple'=>true,'data-validation'=>""))?>
</div>

<div class="uk-form-row">
<label class="uk-form-label"><?php echo Yii::t("default","Product Sub Category 5 Link Products")?></label>
<?php echo CHtml::dropDownList('link_products_product_sub_category5[]',
isset($data['product_sub_category5_link_products'])?(array)json_decode($data['product_sub_category5_link_products']):"",
(array)Yii::app()->functions->LinkProductsProductSubCategory5(true),          
array('class'=>'uk-form-width-large chosen','multiple'=>true,'data-validation'=>""))?>
</div>

<div class="uk-form-row">
<label class="uk-form-label"><?php echo Yii::t("default","Product Item Link Products")?></label>
<?php echo CHtml::dropDownList('product_item_link_products[]',
isset($data['product_item_link_products'])?(array)json_decode($data['product_item_link_products']):"",
(array)Yii::app()->functions->ProductItemLinkProducts(true),          
array('class'=>'uk-form-width-large chosen','multiple'=>true,'data-validation'=>""))?>
</div>

<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Reviews")?></label>
  <?php echo CHtml::textArea('reviews',
  isset($data['reviews'])?$data['reviews']:""
  ,array(
  'class'=>'uk-form-width-large' 
  ))?>
  </div>

<div class="uk-form-row">
<label class="uk-form-label"><?php echo Yii::t("default","Status")?></label>
<?php echo CHtml::dropDownList('status',
isset($data['status'])?$data['status']:"",
(array)statusList(),          
array(
'class'=>'uk-form-width-medium',
'data-validation'=>"required"
))?>
</div>

<div class="uk-form-row">
<label class="uk-form-label"></label>
<input type="submit" value="<?php echo Yii::t("default","Save")?>" class="uk-button uk-form-width-medium uk-button-success">
</div>

</form>