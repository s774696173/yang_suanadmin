

<?php
use yii\widgets\LinkPager;
use yii\base\Object;
use yii\bootstrap\ActiveForm;
use backend\models\SystemLog;

$modelLabel = new \backend\models\SystemLog();
?>

<div class="row">

	<div class="box col-md-12">
		<div class="box-inner">
			<div class="box-header well" data-original-title="">
				<h2>
					<i class="glyphicon glyphicon-user"></i>数据列表
				</h2>
				<div class="box-icon">
					
				
				</div>
			</div>
			<div class="box-content">
			    <div id="msg_info">
                </div>
                <!-- 查询search -->
            <?php ActiveForm::begin(['id' => 'system-log-search-form', 'method'=>'get', 'options' => ['class' => 'form-inline'], 'action'=>'index.php?r=system-log/index']); ?>
            
            <!-- 
            <div class="form-group" style="margin: 5px;"> 
              <label>ID:</label>
              <input type="text" class="form-control" id="query[id]" name="query[id]"  value="<?=isset($query["id"]) ? $query["id"] : "" ?>"> 
            </div>     
            <div class="form-group" style="margin: 5px;"> 
              <label>控制器ID:</label>
              <input type="text" class="form-control" id="query[controller_id]" name="query[controller_id]"  value="<?=isset($query["controller_id"]) ? $query["controller_id"] : "" ?>"> 
            </div>                    
            <div class="form-group" style="margin: 5px;"> 
              <label>方法ID:</label>
              <input type="text" class="form-control" id="query[action_id]" name="query[action_id]"  value="<?=isset($query["action_id"]) ? $query["action_id"] : "" ?>"> 
            </div>    -->                  
            <div class="form-group" style="margin: 5px;"> 
              <label>访问地址:</label>
              <input type="text" class="form-control" id="query[url]" name="query[url]"  value="<?=isset($query["url"]) ? $query["url"] : "" ?>"> 
            </div> 
            <!--                 
            <div class="form-group" style="margin: 5px;"> 
              <label>模块:</label>
              <input type="text" class="form-control" id="query[module_name]" name="query[module_name]"  value="<?=isset($query["module_name"]) ? $query["module_name"] : "" ?>"> 
            </div>                    
            <div class="form-group" style="margin: 5px;"> 
              <label>功能:</label>
              <input type="text" class="form-control" id="query[func_name]" name="query[func_name]"  value="<?=isset($query["func_name"]) ? $query["func_name"] : "" ?>"> 
            </div>
             -->   
            <!-- 
            <div class="form-group" style="margin: 5px;"> 
              <label>方法:</label>
              <input type="text" class="form-control" id="query[right_name]" name="query[right_name]"  value="<?=isset($query["right_name"]) ? $query["right_name"] : "" ?>"> 
            </div> 
             -->                   
            <div class="form-group" style="margin: 5px;"> 
              <label>用户:</label>
              <input type="text" class="form-control" id="query[create_user]" name="query[create_user]"  value="<?=isset($query["create_user"]) ? $query["create_user"] : "" ?>"> 
            </div>                    
            <div class="form-group" style="margin: 5px;"> 
              <label>时间:</label>
              <input type="text" class="form-control" id="query[create_date]" name="query[create_date]"  value="<?=isset($query["create_date"]) ? $query["create_date"] : "" ?>"> 
            </div>        
           <div class="form-group">
              <a onclick="searchAction()" class="btn btn-primary btn-sm" href="#"> <i class="glyphicon glyphicon-zoom-in icon-white"></i>搜索</a>
           </div>
           <?php ActiveForm::end(); ?>                
				<table id="data_table"
					class="table table-striped table-bordered bootstrap-datatable datatable responsive">
					<thead>
						<tr>
						<?php
						      echo '<th><label><input id="data_table_check" type="checkbox"></label></th>';
						      
// 						      echo '<th>' . $modelLabel->getAttributeLabel('id'). '</th>';
						      
// 						      echo '<th>' . $modelLabel->getAttributeLabel('controller_id'). '</th>';
						      
// 						      echo '<th>' . $modelLabel->getAttributeLabel('action_id'). '</th>';
						      
						      echo '<th>' . $modelLabel->getAttributeLabel('url'). '</th>';
						      
// 						      echo '<th>' . $modelLabel->getAttributeLabel('module_name'). '</th>';
						      
						      echo '<th>' . $modelLabel->getAttributeLabel('func_name'). '</th>';
						      
// 						      echo '<th>' . $modelLabel->getAttributeLabel('right_name'). '</th>';
						      
						      echo '<th>' . $modelLabel->getAttributeLabel('client_ip'). '</th>';
						      
						      echo '<th>' . $modelLabel->getAttributeLabel('create_user'). '</th>';
						      
						      echo '<th>' . $modelLabel->getAttributeLabel('create_date'). '</th>';
						      
						      ?>
						      <th>操作</th>
						</tr>
					</thead>
					<tbody>
					
		<?php
foreach ($models as $model) {
    echo '<tr id="rowid_' . $model->id . '">';
    echo '  <td><label><input type="checkbox" value="' . $model->id . '"></label></td>';
//         echo '  <td>' . $model->id . '</td>';
//         echo '  <td>' . $model->controller_id . '</td>';
//         echo '  <td>' . $model->action_id . '</td>';
        echo '  <td>' . $model->url . '</td>';
//         echo '  <td>' . $model->module_name . '</td>';
        echo '  <td>' . $model->module_name .'->'. $model->func_name . '->' . $model->right_name . '</td>';
//         echo '  <td>' . $model->right_name . '</td>';
        echo '  <td>' . $model->client_ip . '</td>';
        
        echo '  <td>' . $model->create_user . '</td>';
        echo '  <td>' . $model->create_date . '</td>';
       
    echo '  <td class="center">';
   
    echo '      <a id="view_btn" onclick="viewAction(' . $model->id . ')" class="btn btn-primary btn-sm" href="#"> <i class="glyphicon glyphicon-zoom-in icon-white"></i>查看</a>';
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
                <?php $form = ActiveForm::begin(["id" => "system-log-form", "class"=>"form-horizontal", "action"=>"index.php?r=system-log/save"]); ?>                
                <input type="hidden" class="form-control" id="id" name="SystemLog[id]" >
                                    
                    <div id="controller_id_div" class="form-group">
    					<label for="controller_id" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("controller_id")?></label>
    					<div class="col-sm-10">
    						<input type="text" class="form-control" id="controller_id"
    							name="SystemLog[controller_id]" placeholder="">
    					</div>
    					<div class="clearfix"></div>
    				</div>
                                    
                    <div id="action_id_div" class="form-group">
    					<label for="action_id" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("action_id")?></label>
    					<div class="col-sm-10">
    						<input type="text" class="form-control" id="action_id"
    							name="SystemLog[action_id]" placeholder="">
    					</div>
    					<div class="clearfix"></div>
    				</div>
                                    
                    <div id="url_div" class="form-group">
    					<label for="url" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("url")?></label>
    					<div class="col-sm-10">
    						<input type="text" class="form-control" id="url"
    							name="SystemLog[url]" placeholder="">
    					</div>
    					<div class="clearfix"></div>
    				</div>
                                    
                    <div id="module_name_div" class="form-group">
    					<label for="module_name" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("module_name")?></label>
    					<div class="col-sm-10">
    						<input type="text" class="form-control" id="module_name"
    							name="SystemLog[module_name]" placeholder="">
    					</div>
    					<div class="clearfix"></div>
    				</div>
                                    
                    <div id="func_name_div" class="form-group">
    					<label for="func_name" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("func_name")?></label>
    					<div class="col-sm-10">
    						<input type="text" class="form-control" id="func_name"
    							name="SystemLog[func_name]" placeholder="">
    					</div>
    					<div class="clearfix"></div>
    				</div>
                                    
                    <div id="right_name_div" class="form-group">
    					<label for="right_name" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("right_name")?></label>
    					<div class="col-sm-10">
    						<input type="text" class="form-control" id="right_name"
    							name="SystemLog[right_name]" placeholder="">
    					</div>
    					<div class="clearfix"></div>
    				</div>
                                 
                    <div id="client_ip_div" class="form-group">
    					<label for="client_ip" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("client_ip")?></label>
    					<div class="col-sm-10">
    						<input type="text" class="form-control" id="client_ip"
    							name="SystemLog[client_ip]" placeholder="">
    					</div>
    					<div class="clearfix"></div>
    				</div>             
                                    
                    <div id="create_user_div" class="form-group">
    					<label for="create_user" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("create_user")?></label>
    					<div class="col-sm-10">
    						<input type="text" class="form-control" id="create_user"
    							name="SystemLog[create_user]" placeholder="">
    					</div>
    					<div class="clearfix"></div>
    				</div>
                                    
                    <div id="create_date_div" class="form-group">
    					<label for="create_date" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("create_date")?></label>
    					<div class="col-sm-10">
    						<input type="text" class="form-control" id="create_date"
    							name="SystemLog[create_date]" placeholder="">
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
function searchAction(){
	$('#system-log-search-form').submit();
}
function viewAction(id){
	initModel(id, 'view', 'fun');
}

function initEditSystemModule(data, type){
	if(type == 'create'){
		$("#id").val('');
		$("#controller_id").val('');
		$("#action_id").val('');
		$("#url").val('');
		$("#module_name").val('');
		$("#func_name").val('');
		$("#right_name").val('');
		$("#create_user").val('');
		$("#create_date").val('');
		
	}
	else{
		$("#id").val(data.id);
    	$("#controller_id").val(data.controller_id);
    	$("#action_id").val(data.action_id);
    	$("#url").val(data.url);
    	$("#module_name").val(data.module_name);
    	$("#func_name").val(data.func_name);
    	$("#right_name").val(data.right_name);
    	$("#client_ip").val(data.client_ip);
    	$("#create_user").val(data.create_user);
    	$("#create_date").val(data.create_date);
    	}
	if(type == "view"){
		$("#id").attr({readonly:true,disabled:true});
    	$("#controller_id").attr({readonly:true,disabled:true});
    	$("#action_id").attr({readonly:true,disabled:true});
    	$("#url").attr({readonly:true,disabled:true});
    	$("#module_name").attr({readonly:true,disabled:true});
    	$("#func_name").attr({readonly:true,disabled:true});
    	$("#right_name").attr({readonly:true,disabled:true});
    	$("#client_ip").attr({readonly:true,disabled:true});
    	$("#create_user").attr({readonly:true,disabled:true});
    	$("#create_date").attr({readonly:true,disabled:true});
    	$('#edit_dialog_ok').addClass('hidden');
	}
	else{
		$("#id").attr({readonly:false,disabled:false});
    	$("#controller_id").attr({readonly:false,disabled:false});
    	$("#action_id").attr({readonly:false,disabled:false});
    	$("#url").attr({readonly:false,disabled:false});
    	$("#module_name").attr({readonly:false,disabled:false});
    	$("#func_name").attr({readonly:false,disabled:false});
    	$("#right_name").attr({readonly:false,disabled:false});
    	$("#client_ip").attr({readonly:false,disabled:false});
    	$("#create_user").attr({readonly:false,disabled:false});
    	$("#create_date").attr({readonly:false,disabled:false});
    	$('#edit_dialog_ok').removeClass('hidden');
	}
	$('#edit_dialog').modal('show');
}


function addAction(id){
	
}
function initModel(id, type, fun){
	
	$.ajax({
		   type: "GET",
		   url: "index.php?r=system-log/view",
		   data: {"id":id},
		   cache: false,
		   dataType:"json",
		   error: function (xmlHttpRequest, textStatus, errorThrown) {
			    alert("出错了，" + textStatus);
			},
		   success: function(data){
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
			///var csrf = $('meta[name="csrf-token"]').attr("content"); // "_csrf":csrf
		    $.ajax({
				   type: "GET",
				   url: "index.php?r=system-log/delete",
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
					   window.location.reload();
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
	$('#system-log-form').submit();
});
$('#create_btn').click(function (e) {
    e.preventDefault();
    initEditSystemModule({}, 'create');
});
$('#delete_btn').click(function (e) {
    e.preventDefault();
    deleteAction('');
});

$('#system-log-form').bind('submit', function(e) {
	e.preventDefault();
	var id = $("#id").val();
	var action = id == "" ? "create" : "update&id=" + id;
    $(this).ajaxSubmit({
    	type: "post",
    	dataType:"json",
    	url: "index.php?r=system-log/" + action,
    	success: function(value) 
    	{
        	if(value.errno == 0){
        		$('#edit_dialog').modal('hide');
        		admin_tool.alert('msg_info', '添加成功', 'success');
        		window.location.reload();
        	}
        	else{
            	var json = value.data;
        		for(var key in json){
        			$('#' + key).attr({'data-placement':'bottom', 'data-content':json[key], 'data-toggle':'popover'}).addClass('popover-show').popover('show');
        			
        		}
        	}

    	}
    });
});

</script>


