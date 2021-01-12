
<div class="uk-width-1">
<a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/offers/Do/Add" class="uk-button"><i class="fa fa-plus"></i> <?php echo Yii::t("default","Add New")?></a>
<a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/offers" class="uk-button"><i class="fa fa-list"></i> <?php echo Yii::t("default","List")?></a>
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
<?php echo CHtml::hiddenField('action','addOffersAdmin')?>
<?php echo CHtml::hiddenField('id',isset($_GET['id'])?$_GET['id']:"");?>
<?php if (!isset($_GET['id'])):?>
<?php echo CHtml::hiddenField("redirect",Yii::app()->request->baseUrl."/admin/offers/Do/Add")?>
<?php endif;?>
<input type="hidden" name="voucher_owner" id="voucher_owner" value="admin">
<?php 
if (isset($_GET['id'])){
	if (!$data=Yii::app()->functions->getOffers($_GET['id'])){
		echo "<div class=\"uk-alert uk-alert-danger\">".
		Yii::t("default","Sorry but we cannot find what your are looking for.")."</div>";
		return ;
	}	
}
?>                                 

<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Offer Percentage")?></label>
  <?php echo CHtml::textField('offer_percentage',
  isset($data['offer_percentage'])?number_format($data['offer_percentage'],0):""
  ,array(
  'class'=>'numeric_only',
  'data-validation'=>"required"
  ))?> %
  <p class="uk-text-muted uk-text-small">
<?php echo t("If you want 10% enter 10")?>
</p>

</div>

<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Orders Over")?></label>
  <?php echo CHtml::textField('offer_price',
  isset($data['offer_price'])?standardPrettyFormat($data['offer_price']):""
  ,array(
  'class'=>'numeric_only',
  'data-validation'=>"required"
  ))?>
</div>

<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Valid From")?></label>
  <?php echo CHtml::hiddenField('valid_from',isset($data['valid_from'])?$data['valid_from']:"")?>
  <?php echo CHtml::textField('valid_from2',
  isset($data['valid_from'])?$data['valid_from']:""
  ,array(
  'class'=>'j_date',
  'data-validation'=>"required",
  'data-id'=>"valid_from"
  ))?>
</div>

<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Valid To")?></label>
  <?php echo CHtml::hiddenField('valid_to',isset($data['valid_to'])?$data['valid_to']:"")?>
  <?php echo CHtml::textField('valid_to2',
  isset($data['valid_to'])?$data['valid_to']:""
  ,array(
  'class'=>'j_date',
  'data-validation'=>"required",
  'data-id'=>"valid_to"
  ))?>
</div>

<?php 
$applicable_to=array();
if (isset($data['applicable_to'])){
	$applicable_to=json_decode($data['applicable_to'],true);
	//dump($applicable_to);
}
?>
<div class="uk-form-row">
  <label class="uk-form-label"><?php echo t("Applicable to")?></label>
  <?php 
  echo CHtml::checkBox('applicable_to[]',
  in_array('delivery',(array)$applicable_to)?true:false
  ,array('value'=>'delivery'));
  echo "&nbsp;".t("Delivery");
  
  echo "&nbsp;";
  
  echo CHtml::checkBox('applicable_to[]',
  in_array('pickup',(array)$applicable_to)?true:false
  ,array('value'=>'pickup'));
  echo "&nbsp;".t("Pickup");
  
  echo "&nbsp;";
  
  //echo CHtml::checkBox('applicable_to[]',
  //in_array('dinein',(array)$applicable_to)?true:false
  //,array('value'=>'dinein'));
  //echo "&nbsp;".t("Dinein");
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
  <label class="uk-form-label"><?php echo Yii::t("default","Status")?></label>
  <?php echo CHtml::dropDownList('status',
  isset($data['status'])?$data['status']:"",
  (array)statusList(),          
  array(
  'class'=>'',
  'data-validation'=>"required"
  ))?>
</div>

<div class="uk-form-row">
<label class="uk-form-label"></label>
<input type="submit" value="<?php echo Yii::t("default","Save")?>" class="uk-button uk-form-width-medium uk-button-success">
</div>

</form>

 </fieldset>
</li>