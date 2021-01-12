
<div class="uk-width-1">
<a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/ProductSubCategory1/Do/Add" class="uk-button"><i class="fa fa-plus"></i> <?php echo Yii::t("default","Add New")?></a>

<a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/ProductSubCategory1" class="uk-button"><i class="fa fa-list"></i> <?php echo Yii::t("default","List")?></a>

</div>

<form id="frm_table_list" method="POST" >
<input type="hidden" name="action" id="action" value="ProductSubCategory1List">
<input type="hidden" name="tbl" id="tbl" value="product_sub_category1">
<input type="hidden" name="clear_tbl"  id="clear_tbl" value="clear_tbl">
<input type="hidden" name="whereid"  id="whereid" value="product_sub_category1_id">
<input type="hidden" name="slug" id="slug" value="/admin/ProductSubCategory1/Do/Add">
<table id="table_list" class="uk-table uk-table-hover uk-table-striped uk-table-condensed">  
   <thead>
        <tr>
            <th width="2%"><?php echo Yii::t("default","ID")?></th>
            <th width="9%"><?php echo Yii::t("default","Product Sub Category 4 Name")?></th>
            <th width="7%"><?php echo Yii::t("default","Product Sub Category Name")?></th>
            <th width="7%"><?php echo Yii::t("default","Product Category Name")?></th>
            <th width="7%"><?php echo Yii::t("default","Shopping Category Name")?></th>
            <th width="4%"><?php echo Yii::t("default","Icon")?></th>            
            <th width="3%"><?php echo Yii::t("default","Date Created")?></th>            
        </tr>
    </thead>
    <tbody>    
    </tbody>
</table>
<div class="clear"></div>
</form>

