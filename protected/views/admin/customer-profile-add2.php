

<div class="uk-width-1">
<a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/CustomerProfile2/Do/Add" class="uk-button"><i class="fa fa-plus"></i> <?php echo Yii::t("default","Add New")?></a>

<a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/CustomerProfile2" class="uk-button"><i class="fa fa-list"></i> <?php echo Yii::t("default","List")?></a>

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
 <?php echo CHtml::dropDownList('Shopping_category_id',
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