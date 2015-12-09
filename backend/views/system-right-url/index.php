

<?php
use yii\widgets\LinkPager;
use yii\base\Object;
use backend\models\SystemModule;
use yii\bootstrap\ActiveForm;
use backend\models\SystemRightUrl;

$modelLabel = new \backend\models\SystemRightUrl();
?>

<div class="row">

	<div class="box col-md-12">
		<div class="box-inner">
			<div class="box-header well" data-original-title="">
				<h2>
					<i class="glyphicon glyphicon-user"></i>访问URL
				</h2>
				<div class="box-icon">
					<button id="create_btn" type="button"
						class="btn btn-xs btn-primary">添&nbsp;&emsp;加</button>
					|
					<button id="delete_btn" type="button" class="btn btn-xs btn-danger">批量删除</button>
				
				</div>
			</div>
			<div class="box-content">
			    <div id="msg_info">
                </div>
				<table id="data_table"
					class="table table-striped table-bordered bootstrap-datatable datatable responsive">
					<thead>
						<tr>
						
						<?php
						      echo '<th><label><input id="data_table_check" type="checkbox"></label></th>';
						      
						      
						      echo '<th>' . $modelLabel->getAttributeLabel('id'). '</th>';
						      
						      
						      echo '<th>' . $modelLabel->getAttributeLabel('right_id'). '</th>';
						      
						      
						      echo '<th>' . $modelLabel->getAttributeLabel('url'). '</th>';
						      
						      
						      echo '<th>' . $modelLabel->getAttributeLabel('para_name'). '</th>';
						      
						      
						      echo '<th>' . $modelLabel->getAttributeLabel('para_value'). '</th>';
						      
						      
						      echo '<th>' . $modelLabel->getAttributeLabel('create_user'). '</th>';
						      
						      
						      echo '<th>' . $modelLabel->getAttributeLabel('create_date'). '</th>';
						      
						      
						      echo '<th>' . $modelLabel->getAttributeLabel('update_user'). '</th>';
						      
						      
						      echo '<th>' . $modelLabel->getAttributeLabel('update_date'). '</th>';
						      
						      
						      ?>
						      <th>操作</th>

						</tr>
					</thead>
					<tbody>
					
		<?php
foreach ($models as $model) {
    echo '<tr id="rowid_' . $model->id . '">';
    echo '  <td><label><input type="checkbox" value="' . $model->id . '"></label></td>';
        echo '  <td>' . $model->id . '</td>';
        echo '  <td>' . $model->right_id . '</td>';
        echo '  <td>' . $model->url . '</td>';
        echo '  <td>' . $model->para_name . '</td>';
        echo '  <td>' . $model->para_value . '</td>';
        echo '  <td>' . $model->create_user . '</td>';
        echo '  <td>' . $model->create_date . '</td>';
        echo '  <td>' . $model->update_user . '</td>';
        echo '  <td>' . $model->update_date . '</td>';
       
    echo '  <td class="center">';
   
    echo '      <a id="view_btn" onclick="viewAction(' . $model->id . ')" class="btn btn-primary btn-sm" href="#"> <i class="glyphicon glyphicon-zoom-in icon-white"></i>查看</a>';
    echo '      <a id="edit_btn" onclick="editAction(' . $model->id . ')" class="btn btn-primary btn-sm" href="#"> <i class="glyphicon glyphicon-edit icon-white"></i>修改</a>';
    echo '      <a id="delete_btn" onclick="deleteAction(' . $model->id . ')" class="btn btn-danger btn-sm" href="#"> <i class="glyphicon glyphicon-trash icon-white"></i>删除</a>';
    echo '  </td>';
    echo '<tr/>';
}

?>
				
					</tbody>
				</table>
				
				<?= LinkPager::widget(["pagination" => $pages]); ?>				
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
                <?php $form = ActiveForm::begin(["id" => "system-right-url-form", "class"=>"form-horizontal", "action"=>"index.php?r=system-right-url/save"]); ?>                
                <input type="hidden" class="form-control" id="id" name="SystemRightUrl[id]" >
                                    
                    <div id="right_id_div" class="form-group">
    					<label for="right_id" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("right_id")?></label>
    					<div class="col-sm-10">
    						<input type="text" class="form-control" id="right_id"
    							name="SystemRightUrl[right_id]" placeholder="必填">
    					</div>
    					<div class="clearfix"></div>
    				</div>
                                    
                    <div id="url_div" class="form-group">
    					<label for="url" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("url")?></label>
    					<div class="col-sm-10">
    						<input type="text" class="form-control" id="url"
    							name="SystemRightUrl[url]" placeholder="">
    					</div>
    					<div class="clearfix"></div>
    				</div>
                                    
                    <div id="para_name_div" class="form-group">
    					<label for="para_name" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("para_name")?></label>
    					<div class="col-sm-10">
    						<input type="text" class="form-control" id="para_name"
    							name="SystemRightUrl[para_name]" placeholder="">
    					</div>
    					<div class="clearfix"></div>
    				</div>
                                    
                    <div id="para_value_div" class="form-group">
    					<label for="para_value" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("para_value")?></label>
    					<div class="col-sm-10">
    						<input type="text" class="form-control" id="para_value"
    							name="SystemRightUrl[para_value]" placeholder="">
    					</div>
    					<div class="clearfix"></div>
    				</div>
                                    
                    <div id="create_user_div" class="form-group">
    					<label for="create_user" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("create_user")?></label>
    					<div class="col-sm-10">
    						<input type="text" class="form-control" id="create_user"
    							name="SystemRightUrl[create_user]" placeholder="">
    					</div>
    					<div class="clearfix"></div>
    				</div>
                                    
                    <div id="create_date_div" class="form-group">
    					<label for="create_date" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("create_date")?></label>
    					<div class="col-sm-10">
    						<input type="text" class="form-control" id="create_date"
    							name="SystemRightUrl[create_date]" placeholder="">
    					</div>
    					<div class="clearfix"></div>
    				</div>
                                    
                    <div id="update_user_div" class="form-group">
    					<label for="update_user" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("update_user")?></label>
    					<div class="col-sm-10">
    						<input type="text" class="form-control" id="update_user"
    							name="SystemRightUrl[update_user]" placeholder="">
    					</div>
    					<div class="clearfix"></div>
    				</div>
                                    
                    <div id="update_date_div" class="form-group">
    					<label for="update_date" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("update_date")?></label>
    					<div class="col-sm-10">
    						<input type="text" class="form-control" id="update_date"
    							name="SystemRightUrl[update_date]" placeholder="">
    					</div>
    					<div class="clearfix"></div>
    				</div>
                			<?php ActiveForm::end(); ?>            </div>
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
				$("#right_id").val('');
				$("#url").val('');
				$("#para_name").val('');
				$("#para_value").val('');
				$("#create_user").val('');
				$("#create_date").val('');
				$("#update_user").val('');
				$("#update_date").val('');
			}
	else{
				$("#id").val(data.id);
	    		$("#right_id").val(data.right_id);
	    		$("#url").val(data.url);
	    		$("#para_name").val(data.para_name);
	    		$("#para_value").val(data.para_value);
	    		$("#create_user").val(data.create_user);
	    		$("#create_date").val(data.create_date);
	    		$("#update_user").val(data.update_user);
	    		$("#update_date").val(data.update_date);
	    	}
	if(type == "view"){
				$("#id").attr({readonly:true,disabled:true});
        		$("#right_id").attr({readonly:true,disabled:true});
        		$("#url").attr({readonly:true,disabled:true});
        		$("#para_name").attr({readonly:true,disabled:true});
        		$("#para_value").attr({readonly:true,disabled:true});
        		$("#create_user").attr({readonly:true,disabled:true});
        		$("#create_date").attr({readonly:true,disabled:true});
        		$("#update_user").attr({readonly:true,disabled:true});
        		$("#update_date").attr({readonly:true,disabled:true});
        		$('#edit_dialog_ok').addClass('hidden');
	}
	else{
				$("#id").attr({readonly:false,disabled:false});
        		$("#right_id").attr({readonly:false,disabled:false});
        		$("#url").attr({readonly:false,disabled:false});
        		$("#para_name").attr({readonly:false,disabled:false});
        		$("#para_value").attr({readonly:false,disabled:false});
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
	
	$.ajax({
		   type: "GET",
		   url: "index.php?r=system-right-url/view",
		   data: {"id":id},
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
		admin_tool.confirm('请确认是否删除', function(){
			console.log(this);
			///var csrf = $('meta[name="csrf-token"]').attr("content"); // "_csrf":csrf
		    $.ajax({
				   type: "GET",
				   url: "index.php?r=system-right-url/delete",
				   data: {"ids":ids},
				   cache: false,
				   dataType:"json",
				   error: function (xmlHttpRequest, textStatus, errorThrown) {
					    alert("出错了，" + textStatus);
					},
				   success: function(data){
					   for(i = 0; i < ids.length; i++){
						   $('#rowid_' + ids[i]).remove();
					   }
					   admin_tool.alert('msg_info', '删除成功', 'success');
				   }
				});
		});
	}
	else{
		admin_tool.alert('msg_info', '请先选择要删除的数据', 'warning');
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
	$('#system-right-url-form').submit();
});
$('#create_btn').click(function (e) {
    e.preventDefault();
    initEditSystemModule({}, 'create');
});
$('#delete_btn').click(function (e) {
    e.preventDefault();
    deleteAction('');
});

$('#system-right-url-form').bind('submit', function(e) {
	e.preventDefault();
	var id = $("#id").val();
	var action = id == "" ? "create" : "update&id=" + id;
    $(this).ajaxSubmit({
    	type: "post",
    	dataType:"json",
    	url: "index.php?r=system-right-url/" + action,
    	success: function(value) 
    	{
    		//console.log(value);
        	if(value.errno == 0){
        		$('#edit_dialog').modal('hide');
        		admin_tool.alert('msg_info', '添加成功', 'success');
        	}
        	else{
            	var json = value.data;
        		for(var key in json){
        			console.log(key+':'+json[key]);
        			$('#' + key).attr({'data-placement':'bottom', 'data-content':json[key], 'data-toggle':'popover'}).addClass('popover-show').popover('show');
        			
        		}
        	}

    	}
    });
});

</script>


