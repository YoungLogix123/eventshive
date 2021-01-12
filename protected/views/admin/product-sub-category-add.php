

<div class="uk-width-1">
<a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/ProductSubCategory/Do/Add" class="uk-button"><i class="fa fa-plus"></i> <?php echo Yii::t("default","Add New")?></a>

<a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/ProductSubCategory" class="uk-button"><i class="fa fa-list"></i> <?php echo Yii::t("default","List")?></a>

</div>

<?php 
if (isset($_GET['id'])){
  if (!$data=Yii::app()->functions->GetProductSubCategory($_GET['id'])){
    echo "<div class=\"uk-alert uk-alert-danger\">".
    Yii::t("default","Sorry but we cannot find what your are looking for.")."</div>";
    return ;
  }
}
?>                                   

<div class="spacer"></div>

<form class="uk-form uk-form-horizontal forms" id="forms">
<?php echo CHtml::hiddenField('action','addProductSubCategory')?>
<?php echo CHtml::hiddenField('id',isset($_GET['id'])?$_GET['id']:"");?>
<?php if (!isset($_GET['id'])):?>
<?php echo CHtml::hiddenField("redirect",Yii::app()->request->baseUrl."/admin/ProductSubCategory/Do/Add")?>
<?php endif;?>

<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Shopping Category")?></label>
 <?php echo CHtml::dropDownList('shopping_category_id',isset($data['shopping_category_id'])?$data['shopping_category_id']:''
  ,(array)Yii::app()->functions->shoppigCategoryList(),
  array('class'=>"uk-form-width-large"))?>
</div>

<?php //echo CHtml::dropDownList('shopping_category_id',isset($data['shopping_category_id'])?$data['shopping_category_id']:'', (array)Yii::app()->functions->//shoppigCategoryList(),
//array(
//'ajax' => array(
//'type'=>'POST', //request type
//'url'=>Yii::app()->functions->productCategoryList(), //url to call.
//Style: CController::createUrl('currentController/methodToCall')
//'update'=>'#shopping_category_id', //selector to update
//'data'=>'js:javascript statement' 
//leave out the data key to pass all form values through
//))); 

//empty since it will be filled by the other dropdown
//echo CHtml::dropDownList('city_id','', array()); ?>

<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Product Category")?></label>
  <?php echo CHtml::dropDownList('product_category_id',
  isset($data['product_category_id'])?$data['product_category_id']:''
  ,(array)Yii::app()->functions->productCategoryList(),
  array('class'=>"uk-form-width-large"))?>
</div>

<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Product Sub Category Name")?></label>
  <?php 
  echo CHtml::textField('product_sub_category_name',
  isset($data['product_sub_category_name'])?$data['product_sub_category_name']:""
  ,array('class'=>"uk-form-width-large",'data-validation'=>"required"))
  ?>
</div>


<div class="uk-form-row"> 
  <label class="uk-form-label"><?php echo t("Upload Icon")?></label>
  <a href="javascript:;" id="sau_upload_file" 
   class="button uk-button" data-progress="sau_progress" data-preview="image_preview" data-field="ProductSubCategoryImage">
    <?php echo t("Browse")?>
  </a>
</div>
<div class="sau_progress"></div>

<div class="image_preview">
 <?php 
 $image=isset($data['photo'])?$data['photo']:'';
 if(!empty($image)){
  echo '<img src="'.FunctionsV3::getImage($image).'" class="uk-thumbnail" id="logo-small"  />';
  echo CHtml::hiddenField('ProductSubCategoryImage',$image);
  echo '<br/>';
  echo '<a href="javascript:;" class="sau_remove_file" data-preview="image_preview" >'.t("Remove image").'</a>';
 }
 ?>
</div>  

<div style="height:20px;"></div>
  
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