

<div class="uk-width-1">
<a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/CustomerProfile/Do/Add" class="uk-button"><i class="fa fa-plus"></i> <?php echo Yii::t("default","Add New")?></a>

<a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/CustomerProfile" class="uk-button"><i class="fa fa-list"></i> <?php echo Yii::t("default","List")?></a>

</div>

<?php 
if (isset($_GET['id'])){
  if (!$data=Yii::app()->functions->GetCustomerProfile($_GET['id'])){
    echo "<div class=\"uk-alert uk-alert-danger\">".
    Yii::t("default","Sorry but we cannot find what your are looking for.")."</div>";
    return ;
  }
}
?>                                   

<div class="spacer"></div>

<form class="uk-form uk-form-horizontal forms" id="forms">
<?php echo CHtml::hiddenField('action','addCustomerProfile')?>
<?php echo CHtml::hiddenField('id',isset($_GET['id'])?$_GET['id']:"");?>
<?php if (!isset($_GET['id'])):?>
<?php echo CHtml::hiddenField("redirect",Yii::app()->request->baseUrl."/admin/CustomerProfile/Do/Add")?>
<?php endif;?>

<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Profile Name")?></label>
  <?php 
  echo CHtml::textField('profile_name',
  isset($data['profile_name'])?$data['profile_name']:""
  ,array('class'=>"uk-form-width-large",'data-validation'=>"required"))
  ?>
</div>

<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Saluatation")?></label>
 <?php echo CHtml::dropDownList('saluation',
isset($data['saluation'])?$data['saluation']:"",
(array)salutation(),          
array(
'class'=>'uk-form-width-small','data-validation'=>"required"))?>
</div>

<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","First Name")?></label>
  <?php 
  echo CHtml::textField('first_name',
  isset($data['first_name'])?$data['first_name']:""
  ,array('class'=>"uk-form-width-large",'data-validation'=>"required"))
  ?>
</div>

<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Last Name")?></label>
  <?php 
  echo CHtml::textField('last_name',
  isset($data['last_name'])?$data['last_name']:""
  ,array('class'=>"uk-form-width-large",'data-validation'=>"required"))
  ?>
</div>

<div class="uk-form-row"> 
  <label class="uk-form-label"><?php echo t("Profile Image")?></label>
  <a href="javascript:;" id="sau_upload_file" 
   class="button uk-button" data-progress="sau_progress" data-preview="image_preview" data-field="CustomerProfileImage">
    <?php echo t("Browse")?>
  </a>
</div>
<div class="sau_progress"></div>

<div class="image_preview">
 <?php 
 $image=isset($data['photo'])?$data['photo']:'';
 if(!empty($image)){
  echo '<img src="'.FunctionsV3::getImage($image).'" class="uk-thumbnail" id="logo-small"  />';
  echo CHtml::hiddenField('CustomerProfileImage',$image);
  echo '<br/>';
  echo '<a href="javascript:;" class="sau_remove_file" data-preview="image_preview" >'.t("Remove image").'</a>';
 }
 ?>
</div>  

<div style="height:20px;"></div>

<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Date of birth")?></label>
  <?php echo CHtml::hiddenField('dob',isset($data['dob'])?$data['dob']:"")?>
  <?php echo CHtml::textField('valid_from2',
  isset($data['dob'])?$data['dob']:""
  ,array(
  'class'=>'j_date',
  'data-validation'=>"required",
  'data-id'=>"valid_from"
  ))?>
</div>

<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Gender")?></label>
  <?php echo CHtml::dropDownList('gender',
isset($data['gender'])?$data['gender']:"",
(array)gender(),          
array(
'class'=>'uk-form-width-small','data-validation'=>"required"))?>
</div>

<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Email ID")?></label>
  <?php 
  echo CHtml::textField('email_id',
  isset($data['email_id'])?$data['email_id']:""
  ,array('class'=>"uk-form-width-large",'data-validation'=>"required"))
  ?>
</div>

<div class="uk-form-row">
          <label class="uk-form-label"><?php echo Yii::t("default","Country")?></label>
          <?php echo CHtml::dropDownList('country_name',
          isset($data['country_name'])?$data['country_name']:"",
          (array)Yii::app()->functions->CountryListMerchant(),          
          array(
          'class'=>'uk-form-width-large',
          'data-validation'=>"required"
          ))?>
        </div>

<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Mobile Number")?></label>
  <?php 
  echo CHtml::textField('mobile_number',
  isset($data['mobile_number'])?$data['mobile_number']:""
  ,array('class'=>"numeric_only addon_price",'data-validation'=>"required"))
  ?>
  <span class="uk-text-muted"><?php echo Yii::t("default","Eg: 0412 345 678")?></span>
</div>

<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Office Phone")?></label>
  <?php 
  echo CHtml::textField('office_phone',
  isset($data['office_phone'])?$data['office_phone']:""
  ,array('class'=>"numeric_only addon_price",'data-validation'=>""))
  ?>
  <span class="uk-text-muted"><?php echo Yii::t("default","Eg: (02) 9876 5432")?></span>
</div>

<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Home Phone")?></label>
  <?php 
  echo CHtml::textField('home_phone',
  isset($data['home_phone'])?$data['home_phone']:""
  ,array('class'=>"numeric_only addon_price",'data-validation'=>""))
  ?>
  <span class="uk-text-muted"><?php echo Yii::t("default","Eg: (02) 9876 5432")?></span>
</div>

<div class="uk-form-row">
          <label class="uk-form-label"><?php echo Yii::t("default","Street address")?></label>
          <?php echo CHtml::textField('street',
          isset($data['street'])?$data['street']:""
          ,array(
          'class'=>'uk-form-width-large',
          'data-validation'=>"required"
          ))?>
</div>

<div class="uk-form-row">
          <label class="uk-form-label"><?php echo Yii::t("default","City")?></label>
          <?php echo CHtml::textField('city',
          isset($data['city'])?$data['city']:""
          ,array(
          'class'=>'uk-form-width-large',
          'data-validation'=>"required"
          ))?>
</div>

<div class="uk-form-row">
          <label class="uk-form-label"><?php echo Yii::t("default","Post code/Zip code")?></label>
          <?php echo CHtml::textField('post_code',
          isset($data['post_code'])?$data['post_code']:""
          ,array(
          'class'=>'uk-form-width-large',
          'data-validation'=>"required"
          ))?>
</div>
        
<div class="uk-form-row">
    <label class="uk-form-label"><?php echo Yii::t("default","State/Region")?></label>
    <?php echo CHtml::textField('state',
    isset($data['state'])?$data['state']:""
    ,array(
    'class'=>'uk-form-width-large',
    'data-validation'=>"required"
    ))?>
</div>   

<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Wedding Anniversary")?></label>
  <?php echo CHtml::hiddenField('wedding_anniversary',isset($data['wedding_anniversary'])?$data['wedding_anniversary']:"")?>
  <?php echo CHtml::textField('valid_from1',
  isset($data['wedding_anniversary'])?$data['wedding_anniversary']:""
  ,array(
  'class'=>'j_date',
  'data-validation'=>"",
  'data-id'=>"valid_from"
  ))?>
</div>

<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Languages")?></label>
  <?php 
  echo CHtml::textField('languages',
  isset($data['languages'])?$data['languages']:""
  ,array('class'=>"uk-form-width-large",'data-validation'=>""))
  ?>
</div>

<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Occupation")?></label>
  <?php 
  echo CHtml::textField('occupation',
  isset($data['occupation'])?$data['occupation']:""
  ,array('class'=>"uk-form-width-large",'data-validation'=>""))
  ?>
</div>

<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Employment Status")?></label>
   <?php echo CHtml::dropDownList('employment_status',
isset($data['employment_status'])?$data['employment_status']:"",
(array)employmentStatus(),          
array(
'class'=>'uk-form-width-large','data-validation'=>""))?>
</div>

<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Marital Status")?></label>
   <?php echo CHtml::dropDownList('marital_status',
isset($data['marital_status'])?$data['marital_status']:"",
(array)maritalStatus(),          
array(
'class'=>'uk-form-width-large','data-validation'=>""))?>
</div>

<!--<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Course / Meal")?></label>
  <?php echo CHtml::textArea('course_meal',
  isset($data['course_meal'])?$data['course_meal']:""
  ,array(
  'class'=>'uk-form-width-large' 
  ))?>
  </div>

<div class="uk-form-row">
    <label class="uk-form-label"><?php echo Yii::t("default","Goal / Purpose")?></label>
  <?php echo CHtml::textArea('goal_purpose',
  isset($data['goal_purpose'])?$data['goal_purpose']:""
  ,array(
  'class'=>'uk-form-width-large' 
  ))?>
  </div>

  <div class="uk-form-row">
    <label class="uk-form-label"><?php echo Yii::t("default","Cooking for / Suitable for")?></label>
  <?php echo CHtml::textArea('cooking_for_suitable_for',
  isset($data['cooking_for_suitable_for'])?$data['cooking_for_suitable_for']:""
  ,array(
  'class'=>'uk-form-width-large' 
  ))?>
  </div>

  <div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Cooking Style / Type")?></label>
  <?php 
  echo CHtml::textField('cooking_style_type',
  isset($data['cooking_style_type'])?$data['cooking_style_type']:""
  ,array('class'=>"uk-form-width-large",'data-validation'=>"required"))
  ?>
</div>

<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Cuisine")?></label>
  <?php 
  echo CHtml::textField('cuisine',
  isset($data['cuisine'])?$data['cuisine']:""
  ,array('class'=>"uk-form-width-large",'data-validation'=>"required"))
  ?>
</div>

<div class="uk-form-row">
    <label class="uk-form-label"><?php echo Yii::t("default","Key Ingredients")?></label>
  <?php echo CHtml::textArea('key_ingredients',
  isset($data['key_ingredients'])?$data['key_ingredients']:""
  ,array(
  'class'=>'uk-form-width-large' 
  ))?>
  </div>

  <div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Difficulty Level")?></label>
  <?php 
  echo CHtml::textField('difficulty_level',
  isset($data['difficulty_level'])?$data['difficulty_level']:""
  ,array('class'=>"uk-form-width-large",'data-validation'=>"required"))
  ?>
</div>

<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Quick & Easy")?></label>
  <?php 
  echo CHtml::textField('quick_and_easy',
  isset($data['quick_and_easy'])?$data['quick_and_easy']:""
  ,array('class'=>"uk-form-width-large",'data-validation'=>"required"))
  ?>
</div>

<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Holidays & Occasions")?></label>
  <?php 
  echo CHtml::textField('holidays_and_occasions',
  isset($data['holidays_and_occasions'])?$data['holidays_and_occasions']:""
  ,array('class'=>"uk-form-width-large",'data-validation'=>"required"))
  ?>
</div>

<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Dish Type")?></label>
  <?php 
  echo CHtml::textField('dish_type',
  isset($data['dish_type'])?$data['dish_type']:""
  ,array('class'=>"uk-form-width-large",'data-validation'=>"required"))
  ?>
</div>

<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Special Diets")?></label>
  <?php 
  echo CHtml::textField('special_diets',
  isset($data['special_diets'])?$data['special_diets']:""
  ,array('class'=>"uk-form-width-large",'data-validation'=>"required"))
  ?>
</div>

<div class="uk-form-row">
    <label class="uk-form-label"><?php echo Yii::t("default","Allergies")?></label>
  <?php echo CHtml::textArea('allergies',
  isset($data['allergies'])?$data['allergies']:""
  ,array(
  'class'=>'uk-form-width-large' 
  ))?>
  </div>

  <div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Dietary Preference")?></label>
  <?php 
  echo CHtml::textField('dietary_preferences',
  isset($data['dietary_preferences'])?$data['dietary_preferences']:""
  ,array('class'=>"uk-form-width-large",'data-validation'=>"required"))
  ?>
</div>-->


<div class="uk-form-row">
<label class="uk-form-label"></label>
<input type="submit" value="<?php echo Yii::t("default","Save")?>" class="uk-button uk-form-width-medium uk-button-success">
</div>

</form>