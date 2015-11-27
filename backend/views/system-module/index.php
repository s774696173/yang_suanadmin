<?php
use yii\widgets\LinkPager;
use yii\base\Object;
use backend\models\SystemModule;
use yii\bootstrap\ActiveForm;
$modelLabel = new SystemModule();

?>

<div class="row">

	<div class="box col-md-12">
		<div class="box-inner">
			<div class="box-header well" data-original-title="">
				<h2>
					<i class="glyphicon glyphicon-user"></i>模块
				</h2>
				<div class="box-icon">
					<button id="create_btn" type="button"
						class="btn btn-xs btn-primary">添&nbsp;&emsp;加</button>
					|
					<button id="delete_btn" type="button" class="btn btn-xs btn-danger">批量删除</button>
					<!-- 
					<a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a> 
					<a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
					<a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
					 -->
				</div>
			</div>
			<div class="box-content">
				<div id="alert_dialog" class="alert alert-success hide">
					<a href="#" class="close" data-dismiss="alert">&times;</a>
				</div>

				<table id="data_table"
					class="table table-striped table-bordered bootstrap-datatable datatable responsive">
					<thead>
						<tr>
						<?php
    
    echo '<th><label><input type="checkbox"></label></th>';
    echo '<th>' . $modelLabel->getAttributeLabel('code') . '</th>';
    echo '<th>' . $modelLabel->getAttributeLabel('display_label') . '</th>';
    echo '<th>' . $modelLabel->getAttributeLabel('has_lef') . '</th>';
    echo '<th>' . $modelLabel->getAttributeLabel('create_user') . '</th>';
    echo '<th>' . $modelLabel->getAttributeLabel('create_date') . '</th>';
    echo '<th>操作</th>';
    ?>

						</tr>
					</thead>
					<tbody>
					
		<?php
foreach ($models as $model) {
    echo '<tr>';
    echo '  <td><label><input type="checkbox" value="' . $model->id . '"></label></td>';
    echo '  <td>' . $model->code . '</td>';
    echo '  <td>' . $model->display_label . '</td>';
    echo '  <td>' . $model->has_lef . '</td>';
    echo '  <td>' . $model->create_user . '</td>';
    echo '  <td>' . $model->create_date . '</td>';
    echo '  <td class="center">';
    // onclick="editAction(##id##)"
    echo '      <a id="add_fun_btn" class="btn btn-success btn-sm" href="#"> <i class="glyphicon glyphicon-zoom-in icon-white"></i>添加功能</a>';
    echo '      <a id="view_btn" onclick="viewAction(' . $model->id . ')" class="btn btn-success btn-sm" href="#"> <i class="glyphicon glyphicon-zoom-in icon-white"></i>查看</a>';
    echo '      <a id="edit_btn" onclick="editAction(' . $model->id . ')" class="btn btn-info btn-sm" href="#"> <i class="glyphicon glyphicon-edit icon-white"></i>修改</a>';
    echo '      <a id="delete_btn" onclick="deleteAction(' . $model->id . ')" class="btn btn-danger btn-sm" href="#"> <i class="glyphicon glyphicon-trash icon-white"></i>删除</a>';
    echo '  </td>';
    echo '<tr/>';
}

?>
				
					</tbody>
				</table>
				
				<?= LinkPager::widget(['pagination' => $pages]); ?>
				
			</div>
		</div>
	</div>
	<!--/span-->

</div>
<!--/row-->




<div class="modal fade" id="edit_dialog" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3>Settings</h3>
			</div>
			<div class="modal-body">
                <?php $form = ActiveForm::begin(['id' => 'system_module_form', 'class'=>'form-horizontal', 'action'=>'index.php?r=system-module/save']); ?>

                <input type="hidden" class="form-control" id="id"
					name="SystemModule[id]" placeholder="">
				<div id="code_div" class="form-group">
					<label for="code" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("code")?></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="code"
							name="SystemModule[code]" placeholder="">
					</div>
					<div class="clearfix"></div>
				</div>

				<div id="display_label_div" class="form-group">
					<label for="display_label" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("display_label")?></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="display_label"
							name="SystemModule[display_label]" placeholder="">
					</div>
					<div class="clearfix"></div>
				</div>


				<div id="has_lef_div" class="form-group">
					<label for="has_lef" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("has_lef")?></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="has_lef"
							name="SystemModule[has_lef]" placeholder="">
					</div>
					<div class="clearfix"></div>
				</div>

				<div id="des_div" class="form-group">
					<label for="des" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("des")?></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="des"
							name="SystemModule[des]" placeholder="">
					</div>
					<div class="clearfix"></div>
				</div>

				<div id="entry_url_div" class="form-group">
					<label for="entry_url" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("entry_url")?></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="entry_url"
							name="SystemModule[entry_url]" placeholder="">
					</div>
					<div class="clearfix"></div>
				</div>

				<div id="display_order_div" class="form-group">
					<label for="display_order" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("display_order")?></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="display_order"
							name="SystemModule[display_order]" placeholder="">
					</div>
					<div class="clearfix"></div>
				</div>

				<div id="create_user_div" class="form-group">
					<label for="create_user" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("create_user")?></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="create_user"
							name="SystemModule[create_user]" placeholder="">
					</div>
					<div class="clearfix"></div>
				</div>

				<div id="create_date_div" class="form-group">
					<label for="create_date" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("create_date")?></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="create_date"
							name="SystemModule[create_date]" placeholder="">
					</div>
					<div class="clearfix"></div>
				</div>

				<div id="update_user_div" class="form-group">
					<label for="update_user" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("update_user")?></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="update_user"
							name="SystemModule[update_user]" placeholder="">
					</div>
					<div class="clearfix"></div>
				</div>

				<div id="update_date_div" class="form-group">
					<label for="update_date" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("update_date")?></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="update_date"
							name="SystemModule[update_date]" placeholder="">
					</div>
					<div class="clearfix"></div>
				</div>
				
			<?php ActiveForm::end(); ?>
            </div>
			<div class="modal-footer">
				<a href="#" class="btn btn-default" data-dismiss="modal">关闭</a> <a
					id="edit_dialog_ok" href="#" class="btn btn-primary">确定</a>
			</div>
		</div>
	</div>
</div>

<script>

function viewAction(id){
	initModel(id, 'view', 'fun');
}

function initEditSystemModule(data, type){
	if(type == 'create'){
		$("#id").val('');
		$("#code").val('');
		$("#display_label").val('');
		$("#has_lef").val('');
		$("#des").val('');
		$("#entry_url").val('');
		$("#display_order").val('');
		$("#create_user").val('');
		$("#create_date").val('');
		$("#update_user").val('');
		$("#update_date").val('');
	}
	else{
		$("#id").val(data.id);
		$("#code").val(data.code);
		$("#display_label").val(data.display_label);
		$("#has_lef").val(data.has_lef);
		$("#des").val(data.des);
		$("#entry_url").val(data.entry_url);
		$("#display_order").val(data.display_order);
		$("#create_user").val(data.create_user);
		$("#create_date").val(data.create_date);
		$("#update_user").val(data.update_user);
		$("#update_date").val(data.update_date);
	}
	
	if(type == "view"){
		$("#code").attr({readonly:true,disabled:true});
		$("#display_label").attr({readonly:true,disabled:true});
		$("#has_lef").attr({readonly:true,disabled:true});
		$("#des").attr({readonly:true,disabled:true});
		$("#entry_url").attr({readonly:true,disabled:true});
		$("#display_order").attr({readonly:true,disabled:true});
		$("#create_user").attr({readonly:true,disabled:true});
		$("#create_date").attr({readonly:true,disabled:true});
		$("#update_user").attr({readonly:true,disabled:true});
		$("#update_date").attr({readonly:true,disabled:true});
		$('#edit_dialog_ok').addClass('hidden');
	}
	else{
		$("#code").attr({readonly:false,disabled:false});
		$("#display_label").attr({readonly:false,disabled:false});
		$("#has_lef").attr({readonly:false,disabled:false});
		$("#des").attr({readonly:false,disabled:false});
		$("#entry_url").attr({readonly:false,disabled:false});
		$("#display_order").attr({readonly:false,disabled:false});
		$("#create_user").attr({readonly:false,disabled:false});
		$("#create_date").attr({readonly:false,disabled:false});
		$("#update_user").attr({readonly:false,disabled:false});
		$("#update_date").attr({readonly:false,disabled:false});
		$('#edit_dialog_ok').removeClass('hidden');
	}
	$('#edit_dialog').modal('show');
}


function addAction(id){
	
}
function initModel(id, type, fun){
	var csrf = $('meta[name="csrf-token"]').attr("content");
	$.ajax({
		   type: "POST",
		   url: "index.php?r=system-module/view",
		   data: {"id":id,"_csrf":csrf},
		   cache: false,
		   dataType:"json",
		   error: function (xmlHttpRequest, textStatus, errorThrown) {
			    alert("出错了，" + textStatus);
			},
		   success: function(data){
// 			   console.log(msg);
			   initEditSystemModule(data, type);
		   }
		});
}
function editAction(id){
	initModel(id, 'edit');
}

function deleteAction(id){
	alert_dialog('info');
	var ids = [];
	if(!!id == true){
		ids[0] = id;
	}
	else{
		var checkboxs = $('#data_table :checked');
	    if(checkboxs.size() > 0){
	        var c = 0;
	        for(i = 0; i < checkboxs.size(); i++){
	            var id = checkboxs.eq(i).val();
	            if(id != ""){
	            	ids[c++] = id;
	            }
	        }
	    }
	}
	if(ids.length > 0){
		confirm_dialog('请确认是否删除', function(){
			var csrf = $('meta[name="csrf-token"]').attr("content");
		    $.ajax({
				   type: "GET",
				   url: "index.php?r=system-module/delete",
				   data: {"ids":ids,"_csrf":csrf},
				   cache: false,
				   dataType:"json",
				   error: function (xmlHttpRequest, textStatus, errorThrown) {
					    alert("出错了，" + textStatus);
					},
				   success: function(data){
					   
				   }
				});
		});
	}
	else{
		alert_dialog('测试 11111式');
	}
    
}
function getSelectedIdValues(formId)
{
	var value="";
	$( formId + " :checked").each(function(i)
	{
		if(!this.checked)
		{
			return true;
		}
		value += this.value;
		if(i != $("input[name='id']").size()-1)
		{
			value += ",";
		}
	 });
	return value;
}
$('#edit_dialog_ok').click(function (e) {
    e.preventDefault();
	$('#system_module_form').submit();
});
$('#create_btn').click(function (e) {
    e.preventDefault();
    initEditSystemModule({}, 'create');
});
$('#delete_btn').click(function (e) {
    e.preventDefault();
    deleteAction('');
});

$('#system_module_form').bind('submit', function(e) {
	e.preventDefault();
	var id = $("#id").val();
	var action = id == "" ? "create" : "update&id=" + id;
    $(this).ajaxSubmit({
    	type: "post",
    	dataType:"json",
    	url: "index.php?r=system-module/" + action,
    	success: function(value) 
    	{
        	console.log(value);
//     		if(value.id && value.id != 0)
//     		{
//         		showAlertDialog("保存成功");
//         		$("#edit_adminMessage").dialog( "close" );
//         		displayDataListContentAjax();
//     		}
//     		else
//     		{
//     			$("#msg_error").html(typeof(value.AdminMessage_msg)== "undefined" ? "" : value.AdminMessage_msg[0]);
//     			$("#expiry_days_error").html(typeof(value.AdminMessage_expiry_days)== "undefined" ? "" : value.AdminMessage_expiry_days[0]);
//     			$("#create_user_error").html(typeof(value.AdminMessage_create_user)== "undefined" ? "" : value.AdminMessage_create_user[0]);
//     			$("#create_date_error").html(typeof(value.AdminMessage_create_date)== "undefined" ? "" : value.AdminMessage_create_date[0]);
//     			$("#update_user_error").html(typeof(value.AdminMessage_update_user)== "undefined" ? "" : value.AdminMessage_update_user[0]);
//     			$("#update_date_error").html(typeof(value.AdminMessage_update_date)== "undefined" ? "" : value.AdminMessage_update_date[0]);
//     		}
    	}
    });
});

</script>


