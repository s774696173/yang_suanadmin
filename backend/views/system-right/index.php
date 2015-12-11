

<?php
use yii\widgets\LinkPager;
use yii\base\Object;
use yii\bootstrap\ActiveForm;
use backend\models\SystemRight;

$modelLabel = new \backend\models\SystemRight();
?>

<div class="row">

	<div class="box col-md-12">
		<div class="box-inner">
			<div class="box-header well" data-original-title="">
				<h2>
					<i class="glyphicon glyphicon-user"></i>权限管理
				</h2>
				<div class="box-icon">
				    <?php 
				        if(empty(Yii::$app->request->referrer) == false){
				            //echo '<a href="'.Yii::$app->request->referrer.'" class="btn btn-xs btn-primary" style="width:50px;">返回</a>';
				            echo '<button type="button" onclick="javascript:window.location.href=\''.Yii::$app->request->referrer.'\';"
				                class="btn btn-xs btn-default">返回</button>';
				        }
				    ?>
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
						      
						      echo '<th>' . $modelLabel->getAttributeLabel('func_id'). '</th>';
						      
						      echo '<th>' . $modelLabel->getAttributeLabel('right_name'). '</th>';
						      
						      echo '<th>' . $modelLabel->getAttributeLabel('display_label'). '</th>';
						      
						      echo '<th>' . $modelLabel->getAttributeLabel('des'). '</th>';
						      
						      echo '<th>' . $modelLabel->getAttributeLabel('display_order'). '</th>';
						      
						      echo '<th>' . $modelLabel->getAttributeLabel('has_lef'). '</th>';
						      
						      echo '<th>' . $modelLabel->getAttributeLabel('create_user'). '</th>';
						      
						      echo '<th>' . $modelLabel->getAttributeLabel('create_date'). '</th>';
						      
// 						      echo '<th>' . $modelLabel->getAttributeLabel('update_user'). '</th>';
						      
// 						      echo '<th>' . $modelLabel->getAttributeLabel('update_date'). '</th>';
						      
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
        echo '  <td>' . $model->func_id . '</td>';
        echo '  <td>' . $model->right_name . '</td>';
        echo '  <td>' . $model->display_label . '</td>';
        echo '  <td>' . $model->des . '</td>';
        echo '  <td>' . $model->display_order . '</td>';
        echo '  <td>' . $model->has_lef . '</td>';
        echo '  <td>' . $model->create_user . '</td>';
        echo '  <td>' . $model->create_date . '</td>';
//         echo '  <td>' . $model->update_user . '</td>';
//         echo '  <td>' . $model->update_date . '</td>';
       
    echo '  <td class="center">';
    
    echo '      <a id="view_btn" class="btn btn-primary btn-sm" href="index.php?r=system-right-url/index&id='.$model->id.'"> <i class="glyphicon glyphicon-zoom-in icon-white"></i>action查看</a>';
    echo '      <a id="view_btn" onclick="manageAction(' . $model->id . ')" class="btn btn-primary btn-sm" href="#"> <i class="glyphicon glyphicon-zoom-in icon-white"></i>action管理</a>';
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



<!-- /// -->
<div class="modal fade" id="edit_dialog" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3 class="modal-title" id="myModalLabel">Settings</h3>
			</div>
			<div class="modal-body">
                <?php $form = ActiveForm::begin(["id" => "system-right-form", "class"=>"form-horizontal", "action"=>"index.php?r=system-right/save"]); ?>                
                    <input type="hidden" class="form-control" id="id" name="SystemRight[id]" >
                    <input type="hidden" class="form-control" id="func_id" name="SystemRight[func_id]" value="<?=$func_id?>">
                    <!-- 
                    <div id="func_id_div" class="form-group">
    					<label for="func_id" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("func_id")?></label>
    					<div class="col-sm-10">
    						<input type="text" class="form-control" id="func_id"
    							name="SystemRight[func_id]" placeholder="必填">
    					</div>
    					<div class="clearfix"></div>
    				</div>
                    -->     
                    <div id="right_name_div" class="form-group">
    					<label for="right_name" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("right_name")?></label>
    					<div class="col-sm-10">
    						<input type="text" class="form-control" id="right_name"
    							name="SystemRight[right_name]" placeholder="必填">
    					</div>
    					<div class="clearfix"></div>
    				</div>
                    <!-- 
                    <div id="display_label_div" class="form-group">
    					<label for="display_label" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("display_label")?></label>
    					<div class="col-sm-10">
    						<input type="text" class="form-control" id="display_label"
    							name="SystemRight[display_label]" placeholder="">
    					</div>
    					<div class="clearfix"></div>
    				</div>
                    -->
                    <div id="des_div" class="form-group">
    					<label for="des" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("des")?></label>
    					<div class="col-sm-10">
    						<input type="text" class="form-control" id="des"
    							name="SystemRight[des]" placeholder="">
    					</div>
    					<div class="clearfix"></div>
    				</div>
                                    
                    <div id="display_order_div" class="form-group">
    					<label for="display_order" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("display_order")?></label>
    					<div class="col-sm-10">
    						<input type="text" class="form-control" id="display_order"
    							name="SystemRight[display_order]" placeholder="">
    					</div>
    					<div class="clearfix"></div>
    				</div>
                    <!--               
                    <div id="has_lef_div" class="form-group">
    					<label for="has_lef" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("has_lef")?></label>
    					<div class="col-sm-10">
    						<input type="text" class="form-control" id="has_lef"
    							name="SystemRight[has_lef]" placeholder="必填">
    					</div>
    					<div class="clearfix"></div>
    				</div>
                           -->            
                    <div id="create_user_div" class="form-group">
    					<label for="create_user" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("create_user")?></label>
    					<div class="col-sm-10">
    						<input type="text" class="form-control" id="create_user"
    							name="SystemRight[create_user]" placeholder="">
    					</div>
    					<div class="clearfix"></div>
    				</div>
                                    
                    <div id="create_date_div" class="form-group">
    					<label for="create_date" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("create_date")?></label>
    					<div class="col-sm-10">
    						<input type="text" class="form-control" id="create_date"
    							name="SystemRight[create_date]" placeholder="">
    					</div>
    					<div class="clearfix"></div>
    				</div>
                                    
                    <div id="update_user_div" class="form-group">
    					<label for="update_user" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("update_user")?></label>
    					<div class="col-sm-10">
    						<input type="text" class="form-control" id="update_user"
    							name="SystemRight[update_user]" placeholder="">
    					</div>
    					<div class="clearfix"></div>
    				</div>
                                    
                    <div id="update_date_div" class="form-group">
    					<label for="update_date" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("update_date")?></label>
    					<div class="col-sm-10">
    						<input type="text" class="form-control" id="update_date"
    							name="SystemRight[update_date]" placeholder="">
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


<div class="modal fade" id="tree_dialog" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3 class="modal-title" id="myModalLabel">Settings</h3>
			</div>
			<div class="modal-body">
			   <input type="hidden" id="select_right_id" />
               <div id="treeview"/>        
            </div>
			<div class="modal-footer">
				<a href="#" class="btn btn-default" data-dismiss="modal">关闭</a> <a
					id="right_dialog_ok" href="#" class="btn btn-primary">确定</a>
			</div>
		</div>
	</div>
</div>


<script>
// 配置功能url
function changeCheckState(node, checked){
	if(!!node.nodes == true){
		var nodes = node.nodes;
		for(var i = 0; i < nodes.length; i++){
			var node1 = nodes[i];
			if(checked == true){
				$('#treeview').treeview('checkNode', [ node1.nodeId, { silent: true } ]);
			}
			else{
				$('#treeview').treeview('uncheckNode', [ node1.nodeId, { silent: true } ]);
			}
			changeCheckState(node1, checked);
		}
	}
}
function manageAction(right_id){
	$('#select_right_id').val(right_id);
	$.ajax({
		   type: "GET",
		   url: "index.php?r=system-right/right-url",
		   data: {'rightId':right_id},
		   cache: false,
		   dataType:"json",
		   error: function (xmlHttpRequest, textStatus, errorThrown) {
			    alert("出错了，" + textStatus);
			},
		   success: function(data){
			   //console.log(data);
				$('#treeview').treeview({
					data:data,
					showIcon: false,
			        showCheckbox: true,
			        levels: 1,
			        onNodeChecked: function(event, node) {
			          //console.log('======',node);
			          changeCheckState(node, true);
			        },
			        onNodeUnchecked: function (event, node) {
			        	changeCheckState(node, false);
			        }
					});
		   }
		});
	$('#tree_dialog').modal('show');
}

$('#right_dialog_ok').click(function(){
	var right_id = $('#select_right_id').val();
	var checkNodes = $('#treeview').treeview('getChecked');
// 	console.log(checkNodes);
// 	return;
	if(checkNodes.length > 0){
		var rightUrls = [];
		for(i = 0; i < checkNodes.length; i++){
			var node = checkNodes[i];
			if(node.type == 'a'){
				var url = {'c':node.c, 'a':node.a};
				rightUrls.push(url);
			}
		}
		$.ajax({
			   type: "GET",
			   url: "index.php?r=system-right/right-url-save",
			   data: {"rightUrls":rightUrls, 'rightId':right_id},
			   cache: false,
			   dataType:"json",
			   error: function (xmlHttpRequest, textStatus, errorThrown) {
				    alert("出错了，" + textStatus);
				},
			   success: function(data){
				   if(data.errno == 0){
					   admin_tool.alert('msg_info', '保存成功', 'success');
				   }
				   else{
					   admin_tool.alert('msg_info', '保存失败', 'error');
				   }
				   $('#tree_dialog').modal('hide');
			   }
			});
// 		console.log('====',rids);
	}
});
// 配置功能url结束

function viewAction(id){
	initModel(id, 'view', 'fun');
}

function initEditSystemModule(data, type){
	if(type == 'create'){
		$("#id").val('');
		//$("#func_id").val('');
		$("#right_name").val('');
		$("#display_label").val('');
		$("#des").val('');
		$("#display_order").val('');
		$("#has_lef").val('');
		$("#create_user").val('');
		$("#create_date").val('');
		$("#update_user").val('');
		$("#update_date").val('');
		
	}
	else{
		$("#id").val(data.id);
    	//$("#func_id").val(data.func_id);
    	$("#right_name").val(data.right_name);
    	$("#display_label").val(data.display_label);
    	$("#des").val(data.des);
    	$("#display_order").val(data.display_order);
    	$("#has_lef").val(data.has_lef);
    	$("#create_user").val(data.create_user);
    	$("#create_date").val(data.create_date);
    	$("#update_user").val(data.update_user);
    	$("#update_date").val(data.update_date);
    	}
	if(type == "view"){
		$("#id").attr({readonly:true,disabled:true});
    	$("#func_id").attr({readonly:true,disabled:true});
    	$("#right_name").attr({readonly:true,disabled:true});
    	//$("#display_label").attr({readonly:true,disabled:true});
    	$("#des").attr({readonly:true,disabled:true});
    	$("#display_order").attr({readonly:true,disabled:true});
    	$("#has_lef").attr({readonly:true,disabled:true});
    	$("#create_user").attr({readonly:true,disabled:true});
    	$("#create_user").parent().parent().show();
    	$("#create_date").attr({readonly:true,disabled:true});
    	$("#create_date").parent().parent().show();
    	$("#update_user").attr({readonly:true,disabled:true});
    	$("#update_user").parent().parent().show();
    	$("#update_date").attr({readonly:true,disabled:true});
    	$("#update_date").parent().parent().show();
    	$('#edit_dialog_ok').addClass('hidden');
	}
	else{
		$("#id").attr({readonly:false,disabled:false});
    	$("#func_id").attr({readonly:false,disabled:false});
    	$("#right_name").attr({readonly:false,disabled:false});
    	//$("#display_label").attr({readonly:false,disabled:false});
    	$("#des").attr({readonly:false,disabled:false});
    	$("#display_order").attr({readonly:false,disabled:false});
    	$("#has_lef").attr({readonly:false,disabled:false});
    	$("#create_user").attr({readonly:false,disabled:false});
    	$("#create_user").parent().parent().hide();
    	$("#create_date").attr({readonly:false,disabled:false});
    	$("#create_date").parent().parent().hide();
    	$("#update_user").attr({readonly:false,disabled:false});
    	$("#update_user").parent().parent().hide();
    	$("#update_date").attr({readonly:false,disabled:false});
    	$("#update_date").parent().parent().hide();
    	$('#edit_dialog_ok').removeClass('hidden');
	}
	$('#edit_dialog').modal('show');
}


function initModel(id, type, fun){
	
	$.ajax({
		   type: "GET",
		   url: "index.php?r=system-right/view",
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
				   url: "index.php?r=system-right/delete",
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
	$('#system-right-form').submit();
});
$('#create_btn').click(function (e) {
    e.preventDefault();
    initEditSystemModule({}, 'create');
});
$('#delete_btn').click(function (e) {
    e.preventDefault();
    deleteAction('');
});

$('#system-right-form').bind('submit', function(e) {
	e.preventDefault();
	var id = $("#id").val();
	var action = id == "" ? "create" : "update&id=" + id;
    $(this).ajaxSubmit({
    	type: "post",
    	dataType:"json",
    	url: "index.php?r=system-right/" + action,
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


