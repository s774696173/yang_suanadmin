

<?php
use yii\widgets\LinkPager;
use yii\base\Object;
use backend\models\SystemModule;
use yii\bootstrap\ActiveForm;
use backend\models\Testlog;

$modelLabel = new \backend\models\Testlog();
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
						      
						      
						      echo '<th>' . $modelLabel->getAttributeLabel('name'). '</th>';
						      
						      
						      echo '<th>' . $modelLabel->getAttributeLabel('method'). '</th>';
						      
						      
						      echo '<th>' . $modelLabel->getAttributeLabel('create_time'). '</th>';
						      
						      
						      echo '<th>' . $modelLabel->getAttributeLabel('c1'). '</th>';
						      
						      
						      echo '<th>' . $modelLabel->getAttributeLabel('c2'). '</th>';
						      
						      
						      echo '<th>' . $modelLabel->getAttributeLabel('c3'). '</th>';
						      
						      
						      echo '<th>' . $modelLabel->getAttributeLabel('c4'). '</th>';
						      
						      
						      echo '<th>' . $modelLabel->getAttributeLabel('c5'). '</th>';
						      
						      
						      echo '<th>' . $modelLabel->getAttributeLabel('c6'). '</th>';
						      
						      
						      echo '<th>' . $modelLabel->getAttributeLabel('c7'). '</th>';
						      
						      
						      echo '<th>' . $modelLabel->getAttributeLabel('c8'). '</th>';
						      
						      
						      echo '<th>' . $modelLabel->getAttributeLabel('c9'). '</th>';
						      
						      
						      echo '<th>' . $modelLabel->getAttributeLabel('c10'). '</th>';
						      
						      
						      ?>
						      <th>操作</th>
						 
						      
				<!-- 		      
                            foreach($tableColumnInfo as $column){
//                                 'name' => array(
//                                     'name' => 'name',
//                                     'defaultValue' => '',
//                                     'enumValues' => null,
//                                     'isPrimaryKey' => false,
//                                     'phpType' => 'string',
//                                     'precision' => '10',
//                                     'scale' => '',
//                                     'size' => '10',
//                                     'type' => 'string',
//                                     'unsigned' => false,
//                                     'label'=>$this->getAttributeLabel('name'),
//                                     'inputtype' => 'text',
//                                     'displaylist' => true,
//                                     'searchble' => false,
//                                     'readonly' => false,
//                                     'order' => false,
//                                     'udc'=>'',
//                                 ),
                                echo 'echo ';
                            }
 -->

						</tr>
					</thead>
					<tbody>
					
		<?php
foreach ($models as $model) {
    echo '<tr id="rowid_' . $model->id . '">';
    echo '  <td><label><input type="checkbox" value="' . $model->id . '"></label></td>';
        echo '  <td>' . $model->id . '</td>';
        echo '  <td>' . $model->name . '</td>';
        echo '  <td>' . $model->method . '</td>';
        echo '  <td>' . $model->create_time . '</td>';
        echo '  <td>' . $model->c1 . '</td>';
        echo '  <td>' . $model->c2 . '</td>';
        echo '  <td>' . $model->c3 . '</td>';
        echo '  <td>' . $model->c4 . '</td>';
        echo '  <td>' . $model->c5 . '</td>';
        echo '  <td>' . $model->c6 . '</td>';
        echo '  <td>' . $model->c7 . '</td>';
        echo '  <td>' . $model->c8 . '</td>';
        echo '  <td>' . $model->c9 . '</td>';
        echo '  <td>' . $model->c10 . '</td>';
       
    echo '  <td class="center">';
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
                <?php $form = ActiveForm::begin(["id" => "testlog-form", "class"=>"form-horizontal", "action"=>"index.php?r=testlog/save"]); ?>                
                <input type="hidden" class="form-control" id="id" name="Testlog[id]" >
                                    
                    <div id="name_div" class="form-group">
    					<label for="name" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("name")?></label>
    					<div class="col-sm-10">
    						<input type="text" class="form-control" id="name"
    							name="Testlog[name]" placeholder="">
    					</div>
    					<div class="clearfix"></div>
    				</div>
                                    
                    <div id="method_div" class="form-group">
    					<label for="method" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("method")?></label>
    					<div class="col-sm-10">
    						<input type="text" class="form-control" id="method"
    							name="Testlog[method]" placeholder="">
    					</div>
    					<div class="clearfix"></div>
    				</div>
                                    
                    <div id="create_time_div" class="form-group">
    					<label for="create_time" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("create_time")?></label>
    					<div class="col-sm-10">
    						<input type="text" class="form-control" id="create_time"
    							name="Testlog[create_time]" placeholder="">
    					</div>
    					<div class="clearfix"></div>
    				</div>
                                    
                    <div id="c1_div" class="form-group">
    					<label for="c1" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("c1")?></label>
    					<div class="col-sm-10">
    						<input type="text" class="form-control" id="c1"
    							name="Testlog[c1]" placeholder="必填">
    					</div>
    					<div class="clearfix"></div>
    				</div>
                                    
                    <div id="c2_div" class="form-group">
    					<label for="c2" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("c2")?></label>
    					<div class="col-sm-10">
    						<input type="text" class="form-control" id="c2"
    							name="Testlog[c2]" placeholder="">
    					</div>
    					<div class="clearfix"></div>
    				</div>
                                    
                    <div id="c3_div" class="form-group">
    					<label for="c3" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("c3")?></label>
    					<div class="col-sm-10">
    						<input type="text" class="form-control" id="c3"
    							name="Testlog[c3]" placeholder="">
    					</div>
    					<div class="clearfix"></div>
    				</div>
                                    
                    <div id="c4_div" class="form-group">
    					<label for="c4" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("c4")?></label>
    					<div class="col-sm-10">
    						<input type="text" class="form-control" id="c4"
    							name="Testlog[c4]" placeholder="">
    					</div>
    					<div class="clearfix"></div>
    				</div>
                                    
                    <div id="c5_div" class="form-group">
    					<label for="c5" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("c5")?></label>
    					<div class="col-sm-10">
    						<input type="text" class="form-control" id="c5"
    							name="Testlog[c5]" placeholder="">
    					</div>
    					<div class="clearfix"></div>
    				</div>
                                    
                    <div id="c6_div" class="form-group">
    					<label for="c6" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("c6")?></label>
    					<div class="col-sm-10">
    						<input type="text" class="form-control" id="c6"
    							name="Testlog[c6]" placeholder="">
    					</div>
    					<div class="clearfix"></div>
    				</div>
                                    
                    <div id="c7_div" class="form-group">
    					<label for="c7" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("c7")?></label>
    					<div class="col-sm-10">
    						<input type="text" class="form-control" id="c7"
    							name="Testlog[c7]" placeholder="">
    					</div>
    					<div class="clearfix"></div>
    				</div>
                                    
                    <div id="c8_div" class="form-group">
    					<label for="c8" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("c8")?></label>
    					<div class="col-sm-10">
    						<input type="text" class="form-control" id="c8"
    							name="Testlog[c8]" placeholder="">
    					</div>
    					<div class="clearfix"></div>
    				</div>
                                    
                    <div id="c9_div" class="form-group">
    					<label for="c9" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("c9")?></label>
    					<div class="col-sm-10">
    						<input type="text" class="form-control" id="c9"
    							name="Testlog[c9]" placeholder="">
    					</div>
    					<div class="clearfix"></div>
    				</div>
                                    
                    <div id="c10_div" class="form-group">
    					<label for="c10" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("c10")?></label>
    					<div class="col-sm-10">
    						<input type="text" class="form-control" id="c10"
    							name="Testlog[c10]" placeholder="">
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
				$("#name").val('');
				$("#method").val('');
				$("#create_time").val('');
				$("#c1").val('');
				$("#c2").val('');
				$("#c3").val('');
				$("#c4").val('');
				$("#c5").val('');
				$("#c6").val('');
				$("#c7").val('');
				$("#c8").val('');
				$("#c9").val('');
				$("#c10").val('');
			}
	else{
				$("#id").val(data.id);
	    		$("#name").val(data.name);
	    		$("#method").val(data.method);
	    		$("#create_time").val(data.create_time);
	    		$("#c1").val(data.c1);
	    		$("#c2").val(data.c2);
	    		$("#c3").val(data.c3);
	    		$("#c4").val(data.c4);
	    		$("#c5").val(data.c5);
	    		$("#c6").val(data.c6);
	    		$("#c7").val(data.c7);
	    		$("#c8").val(data.c8);
	    		$("#c9").val(data.c9);
	    		$("#c10").val(data.c10);
	    	}
	if(type == "view"){
				$("#id").attr({readonly:true,disabled:true});
        		$("#name").attr({readonly:true,disabled:true});
        		$("#method").attr({readonly:true,disabled:true});
        		$("#create_time").attr({readonly:true,disabled:true});
        		$("#c1").attr({readonly:true,disabled:true});
        		$("#c2").attr({readonly:true,disabled:true});
        		$("#c3").attr({readonly:true,disabled:true});
        		$("#c4").attr({readonly:true,disabled:true});
        		$("#c5").attr({readonly:true,disabled:true});
        		$("#c6").attr({readonly:true,disabled:true});
        		$("#c7").attr({readonly:true,disabled:true});
        		$("#c8").attr({readonly:true,disabled:true});
        		$("#c9").attr({readonly:true,disabled:true});
        		$("#c10").attr({readonly:true,disabled:true});
        		$('#edit_dialog_ok').addClass('hidden');
	}
	else{
				$("#id").attr({readonly:false,disabled:false});
        		$("#name").attr({readonly:false,disabled:false});
        		$("#method").attr({readonly:false,disabled:false});
        		$("#create_time").attr({readonly:false,disabled:false});
        		$("#c1").attr({readonly:false,disabled:false});
        		$("#c2").attr({readonly:false,disabled:false});
        		$("#c3").attr({readonly:false,disabled:false});
        		$("#c4").attr({readonly:false,disabled:false});
        		$("#c5").attr({readonly:false,disabled:false});
        		$("#c6").attr({readonly:false,disabled:false});
        		$("#c7").attr({readonly:false,disabled:false});
        		$("#c8").attr({readonly:false,disabled:false});
        		$("#c9").attr({readonly:false,disabled:false});
        		$("#c10").attr({readonly:false,disabled:false});
        		$('#edit_dialog_ok').removeClass('hidden');
	}
	$('#edit_dialog').modal('show');
}


function addAction(id){
	
}
function initModel(id, type, fun){
	
	$.ajax({
		   type: "GET",
		   url: "index.php?r=testlog/view",
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
				   url: "index.php?r=testlog/delete",
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
	$('#testlog-form').submit();
});
$('#create_btn').click(function (e) {
    e.preventDefault();
    initEditSystemModule({}, 'create');
});
$('#delete_btn').click(function (e) {
    e.preventDefault();
    deleteAction('');
});

$('#testlog-form').bind('submit', function(e) {
	e.preventDefault();
	var id = $("#id").val();
	var action = id == "" ? "create" : "update&id=" + id;
    $(this).ajaxSubmit({
    	type: "post",
    	dataType:"json",
    	url: "index.php?r=testlog/" + action,
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


