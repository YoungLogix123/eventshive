
<div class="uk-width-1">
<a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/voucher/Do/Add" class="uk-button"><i class="fa fa-plus"></i> <?php echo Yii::t("default","Add New")?></a>
<a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/voucher" class="uk-button"><i class="fa fa-list"></i> <?php echo Yii::t("default","List")?></a>
</div>

<div class="spacer"></div>

<div id="error-message-wrapper"></div>

<ul data-uk-tab="{connect:'#tab-content'}" class="uk-tab uk-active">
<li class="uk-active"><a href="#"><?php echo t("Groceries")?></a></li>
<li class=""><a href="#"><?php echo Yii::t("default","Fruits & Vegetables")?></a></li>
<li class=""><a href="#"><?php echo Yii::t("default","Meal Plans")?></a></li>
<li class=""><a href="#"><?php echo Yii::t("default","Fitness")?></a></li>
<li class=""><a href="#"><?php echo Yii::t("default","Wellness")?></a></li>
<li class=""><a href="#"><?php echo Yii::t("default","Delivery")?></a></li>
</ul> 


<ul class="uk-switcher uk-margin " id="tab-content">
<li class="uk-active">
    <fieldset> 

<form class="uk-form uk-form-horizontal forms" id="forms">
<?php echo CHtml::hiddenField('action','addVoucherNew')?>
<?php echo CHtml::hiddenField('id',isset($_GET['id'])?$_GET['id']:"");?>
<input type="hidden" name="voucher_owner" id="voucher_owner" value="admin">
<?php if (!isset($_GET['id'])):?>
<?php echo CHtml::hiddenField("redirect",Yii::app()->request->baseUrl."/admin/voucher/Do/Add")?>
<?php endif;?>

<?php 
$has_already_used=false;
if (isset($_GET['id'])){
	if (!$data=Yii::app()->functions->getVoucherCodeByIdNew($_GET['id'])){
		echo "<div class=\"uk-alert uk-alert-danger\">".
		Yii::t("default","Sorry but we cannot find what your are looking for.")."</div>";
		return ;
	} 	
	
	if (isset($data['found'])){
		if ( $data['found']>0){
			$has_already_used=true;
		}
	}
}
?>                                 

<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Voucher Title")?></label>
  <?php echo CHtml::textField('voucher_name',$data['voucher_name'],
  array(
    'data-validation'=>'required' ,
    'class'=>"voucher_name"
  ))?>
</div>
<?php if ($has_already_used):?>
<p class="uk-text-small uk-text-danger"><?php echo t("This voucher has already been used editing the voucher name may cause error on the system")?></p>
<?php echo CHtml::hiddenField('disabled_voucher_code')?>
<?php endif;?>

<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Voucher Code")?></label>
  <?php echo CHtml::textField('voucher_code',
  isset($data['voucher_code'])?($data['voucher_code']):""
  ,array(
  'class'=>'numeric_only',
  'data-validation'=>"required"
  ))?>
</div>

<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Type")?></label>  
  <?php
echo CHtml::dropDownList('voucher_type',$data['voucher_type'],
Yii::app()->functions->voucherType(),array(
  'data-validation'=>"required"
))
?>
</div>

<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Discount")?></label>  
  <?php echo CHtml::textField('amount',
  normalPrettyPrice($data['amount'])
  ,array('data-validation'=>'required','class'=>'numeric_only'))?>
  <span class="uk-text-muted"><?php echo Yii::t("default","Voucher amount discount.")?></span>
</div>

<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Expiration")?></label>  
  <?php
  echo CHtml::hiddenField('expiration',$data['expiration']);
  echo CHtml::textField('expiration1',FormatDateTime($data['expiration'],false),
  array(
 'class'=>'j_date' ,
 'data-id'=>'expiration',
 'data-validation'=>"required"
))
?>
</div>

<?php 
$joining_merchant=isset($data['joining_merchant'])?json_decode($data['joining_merchant'],true):'';
?>
<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Applicable to merchant")?></label>  
  <?php
echo CHtml::dropDownList('joining_merchant[]',(array)$joining_merchant,
(array)Yii::app()->functions->merchantList(true),array(
  //'data-validation'=>"required",
  'multiple'=>true,
  'class'=>"chosen"
))
?>
</div>
<p class="uk-text-muted uk-text-small">
<?php echo t("leave empty if you want to apply to all merchants")?>
</p>

<div class="uk-form-row">
<label class="uk-form-label"><?php echo Yii::t("default","Link Products Shopping Category")?></label>
<?php echo CHtml::dropDownList('link_products_shopping_category[]',
isset($data['shopping_category_link_products'])?(array)json_decode($data['shopping_category_link_products']):"",
(array)Yii::app()->functions->LinkProductsShoppingCategory(true),          
array('class'=>'uk-form-width-large chosen','multiple'=>true,'data-validation'=>""))?>
</div>

<div class="uk-form-row">
<label class="uk-form-label"><?php echo Yii::t("default","Link Products Product Category")?></label>
<?php echo CHtml::dropDownList('link_products_product_category[]',
isset($data['product_category_link_products'])?(array)json_decode($data['product_category_link_products']):"",
(array)Yii::app()->functions->LinkProductsProductCategory(true),          
array('class'=>'uk-form-width-large chosen','multiple'=>true,'data-validation'=>""))?>
</div>

<div class="uk-form-row">
<label class="uk-form-label"><?php echo Yii::t("default","Link Products Product Sub Category")?></label>
<?php echo CHtml::dropDownList('link_products_product_sub_category[]',
isset($data['product_sub_category_link_products'])?(array)json_decode($data['product_sub_category_link_products']):"",
(array)Yii::app()->functions->LinkProductsProductSubCategory(true),          
array('class'=>'uk-form-width-large chosen','multiple'=>true,'data-validation'=>""))?>
</div>

<div class="uk-form-row">
<label class="uk-form-label"><?php echo Yii::t("default","Link Products Product Sub Category 4")?></label>
<?php echo CHtml::dropDownList('link_products_product_sub_category4[]',
isset($data['product_sub_category4_link_products'])?(array)json_decode($data['product_sub_category4_link_products']):"",
(array)Yii::app()->functions->LinkProductsProductSubCategory4(true),          
array('class'=>'uk-form-width-large chosen','multiple'=>true,'data-validation'=>""))?>
</div>

<div class="uk-form-row">
<label class="uk-form-label"><?php echo Yii::t("default","Link Products Product Sub Category 5")?></label>
<?php echo CHtml::dropDownList('link_products_product_sub_category5[]',
isset($data['product_sub_category5_link_products'])?(array)json_decode($data['product_sub_category5_link_products']):"",
(array)Yii::app()->functions->LinkProductsProductSubCategory5(true),          
array('class'=>'uk-form-width-large chosen','multiple'=>true,'data-validation'=>""))?>
</div>

<div class="uk-form-row">
<label class="uk-form-label"><?php echo Yii::t("default","Link Products Product Item")?></label>
<?php echo CHtml::dropDownList('link_products_product_item[]',
isset($data['product_Item_link_products'])?(array)json_decode($data['product_Item_link_products']):"",
(array)Yii::app()->functions->ProductItemLinkProducts(true),          
array('class'=>'uk-form-width-large chosen','multiple'=>true,'data-validation'=>""))?>
</div>

<div class="uk-form-row">
  <label class="uk-form-label"><?php echo t("Status") ?></label>
  <?php echo CHtml::dropDownList('status',
  isset($data['status'])?$data['status']:"",
  (array)statusList(), 
  array(
  'class'=>'uk-form-width-large',
  'data-validation'=>"required"
  ))?>
</div>

<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Used only once")?></label>  
  <?php  
  echo CHtml::checkBox('used_once',
  $data['used_once']==2?true:false,
  array( 
  'class'=>"icheck",
  'value'=>2
))
?>
</div>


<div class="uk-form-row">
<label class="uk-form-label"></label>
<input type="submit" value="<?php echo Yii::t("default","Save")?>" class="uk-button uk-form-width-medium uk-button-success">
</div>

</form>

  </fieldset>
</li>