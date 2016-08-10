<?php
use yii\widgets\LinkPager;
use yii\base\Object;
use yii\bootstrap\ActiveForm;
use backend\models\SystemModule;

$modelLabel = new \backend\models\SystemModule();
//$modelLabel = new \common\models\SolrTokenizerCompany();
?>

<?php $this->beginBlock('header');  ?>
<!-- <head></head>中代码块 -->
<?php $this->endBlock(); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Data Tables
    <small>advanced tables</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Tables</a></li>
    <li class="active">Data tables</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
      
        <div class="box-header">
          <h3 class="box-title">数据列表</h3>
          <div class="box-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
                <button id="create_btn" type="button" class="btn btn-xs btn-primary">添&nbsp;&emsp;加</button>
        			|
        		<button id="delete_btn" type="button" class="btn btn-xs btn-danger">批量删除</button>
            </div>
          </div>
        </div>
        <!-- /.box-header -->
        
        <div class="box-body">
          <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <!-- row start 搜索-->
          	<div class="row">
          	<div class="col-sm-12">
            	<!-- 查询search -->
                <?php ActiveForm::begin(['id' => 'solr-tokenizer-company-search-form', 'method'=>'get', 'options' => ['class' => 'form-inline'], 'action'=>'index.php?r=solr-tokenizer-company/index']); ?>     
                <div class="form-group" style="margin: 5px;"> 
                  <label>分词:</label>
                  <input type="text" class="form-control" id="query[name]" name="query[name]"  value="<?=isset($query["name"]) ? $query["name"] : "" ?>"> 
                </div>                    
                        
                <div class="form-group" style="margin: 5px;"> 
                  <label>拼音:</label>
                  <input type="text" class="form-control" id="query[pinyin]" name="query[pinyin]"  value="<?=isset($query["pinyin"]) ? $query["pinyin"] : "" ?>"> 
                </div>                    
                <div class="form-group" style="margin: 5px;"> 
                  <label>同义词:</label>
                  <input type="text" class="form-control" id="query[tongyi]" name="query[tongyi]"  value="<?=isset($query["tongyi"]) ? $query["tongyi"] : "" ?>"> 
                </div>                        
               <div class="form-group">
                  <a onclick="searchAction()" class="btn btn-primary btn-sm" href="#"> <i class="glyphicon glyphicon-zoom-in icon-white"></i>搜索</a>
               </div>
               <?php ActiveForm::end(); ?>   
            </div>
                    
          	</div>
          	<!-- row end -->
          	
          	<!-- row start -->
          	<div class="row">
          	<div class="col-sm-12">
          	<table id="data_table" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="data_table_info">
            <thead>
            <tr role="row">
            
            <?php
						      echo '<th><input id="data_table_check" type="checkbox"></th>';
						      echo '<th class="sorting" tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('id').'</th>';
						      //echo '<th>' . $modelLabel->getAttributeLabel('id'). '</th>';
						      
						      //echo '<th>' . $modelLabel->getAttributeLabel('code'). '</th>';
						      echo '<th class="sorting" tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('code').'</th>';
						      
						      //echo '<th>' . $modelLabel->getAttributeLabel('display_label'). '</th>';
						      echo '<th class="sorting" tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('display_label').'</th>';
						      
						      //echo '<th>' . $modelLabel->getAttributeLabel('has_lef'). '</th>';
						      
						      //echo '<th>' . $modelLabel->getAttributeLabel('des'). '</th>';
						      echo '<th class="sorting" tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('des').'</th>';
						      
						      //echo '<th>' . $modelLabel->getAttributeLabel('entry_url'). '</th>';
						      
						      //echo '<th>' . $modelLabel->getAttributeLabel('display_order'). '</th>';
						      echo '<th class="sorting" tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('display_order').'</th>';
						      
						      //echo '<th>' . $modelLabel->getAttributeLabel('create_user'). '</th>';
						      echo '<th class="sorting" tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('create_user').'</th>';
						      
						      //echo '<th>' . $modelLabel->getAttributeLabel('create_date'). '</th>';
						      echo '<th class="sorting" tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('create_date').'</th>';
						      
						      //echo '<th>' . $modelLabel->getAttributeLabel('update_user'). '</th>';
						      
						      //echo '<th>' . $modelLabel->getAttributeLabel('update_date'). '</th>';
						      
						      ?>
						      <!-- <th>操作</th>  -->
                              <th tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >操作</th>
            
            
            
         
            </tr>
            </thead>
            <tbody>
            <?php
                $row = 0;
                foreach ($models as $model) {
                    $class = $row % 2 == 0 ? ' class="odd" ' : ' class="even" ';
                    echo '<tr id="rowid_' . $model->id . '" '.$class.'>';
                    echo '  <td><label><input type="checkbox" value="' . $model->id . '"></label></td>';
                    echo '  <td class="center">' . $model->id . '</td>';
                    echo '  <td class="center">' . $model->code . '</td>';
                    echo '  <td class="center">' . $model->display_label . '</td>';
                    echo '  <td class="center">' . $model->des . '</td>';
                    echo '  <td class="center">' . $model->display_order . '</td>';
                    echo '  <td class="center">' . $model->create_user . '</td>';
                    echo '  <td class="center">' . $model->create_date . '</td>';
                       
                    echo '  <td class="center">';
                    echo '      <a id="view_btn" class="btn btn-primary btn-sm" href="index.php?r=system-function/index&id='. $model->id .'"> <i class="glyphicon glyphicon-zoom-in icon-white"></i>功能管理</a>';
                    echo '      <a id="view_btn" onclick="viewAction(' . $model->id . ')" class="btn btn-primary btn-sm" href="#"> <i class="glyphicon glyphicon-zoom-in icon-white"></i>查看</a>';
                    echo '      <a id="edit_btn" onclick="editAction(' . $model->id . ')" class="btn btn-primary btn-sm" href="#"> <i class="glyphicon glyphicon-edit icon-white"></i>修改</a>';
                    echo '      <a id="delete_btn" onclick="deleteAction(' . $model->id . ')" class="btn btn-danger btn-sm" href="#"> <i class="glyphicon glyphicon-trash icon-white"></i>删除</a>';
                    echo '  </td>';
                    echo '</tr>';
                    $row++;
                }
            ?>
            <!-- 
            <tr role="row" class="odd">
              <td class="sorting_1">Gecko</td>
              <td>Firefox 1.0</td>
              <td>Win 98+ / OSX.2+</td>
              <td>1.7</td>
              <td>A</td>
            </tr>
            <tr role="row" class="even">
              <td class="sorting_1">Gecko</td>
              <td>Firefox 1.5</td>
              <td>Win 98+ / OSX.2+</td>
              <td>1.8</td>
              <td>A</td>
            </tr>
            <tr role="row" class="odd">
              <td class="sorting_1">Gecko</td>
              <td>Firefox 2.0</td>
              <td>Win 98+ / OSX.2+</td>
              <td>1.8</td>
              <td>A</td>
            </tr>
            <tr role="row" class="even">
              <td class="sorting_1">Gecko</td>
              <td>Firefox 3.0</td>
              <td>Win 2k+ / OSX.3+</td>
              <td>1.9</td>
              <td>A</td>
            </tr>
            -->
           
            </tbody>
            <!-- 
            <tfoot>
            <tr>
            	<th rowspan="1" colspan="1">Rendering engine</th>
            	<th rowspan="1" colspan="1">Browser</th>
            	<th rowspan="1" colspan="1">Platform(s)</th>
            	<th rowspan="1" colspan="1">Engine version</th>
            	<th rowspan="1" colspan="1">CSS grade</th>
            </tr>
            </tfoot>
             -->
          </table>
          </div>
          </div>
          <!-- row end -->
          
          <!-- row start -->
          <div class="row">
          	<div class="col-sm-5">
            	<div class="dataTables_info" id="data_table_info" role="status" aria-live="polite">
            		<div class="infos">
            		从 <?= $pages->getPage() * $pages->getPageSize() + 1 ?>
            		到 <?= ($pageCount = ($pages->getPage() + 1) * $pages->getPageSize()) < $pages->totalCount ?  $pageCount : $pages->totalCount?>
            		 共 <?= $pages->totalCount?> 条记录</div>
            	</div>
            </div>
          	<div class="col-sm-7">
          	
          		
          	
              	<div class="dataTables_paginate paging_simple_numbers" id="data_table_paginate">

              	<?= LinkPager::widget([
              	    "pagination" => $pages,
              	    'nextPageLabel' => '下一页',
              	    'prevPageLabel' => '上一页',
              	    'firstPageLabel' => '首页',
              	    'lastPageLabel' => '尾页',
              	]); ?>	
              	
              	</div>
          	</div>
		  </div>
		  <!-- row end -->
        </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->

<div class="modal fade" id="edit_dialog" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3>Settings</h3>
			</div>
			<div class="modal-body">
                <?php $form = ActiveForm::begin(["id" => "system-module-form", "class"=>"form-horizontal", "action"=>"index.php?r=system-module/save"]); ?>                
                <input type="hidden" class="form-control" id="id" name="SystemModule[id]" >
                                    
                    <div id="code_div" class="form-group">
    					<label for="code" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("code")?></label>
    					<div class="col-sm-10">
    						<input type="text" class="form-control" id="code"
    							name="SystemModule[code]" placeholder="必填">
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
                     
                    <div id="des_div" class="form-group">
    					<label for="des" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("des")?></label>
    					<div class="col-sm-10">
    						<input type="text" class="form-control" id="des"
    							name="SystemModule[des]" placeholder="">
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
                  
                			<?php ActiveForm::end(); ?>            </div>
			<div class="modal-footer">
				<a href="#" class="btn btn-default" data-dismiss="modal">关闭</a> <a
					id="edit_dialog_ok" href="#" class="btn btn-primary">确定</a>
			</div>
		</div>
	</div>
</div>
<?php $this->beginBlock('footer');  ?>
<!-- <body></body>后代码块 -->
 <script>

 function viewAction(id){
		initModel(id, 'view', 'fun');
	}

	function initEditSystemModule(data, type){
		// 值初始化
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
		else{ // update view
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
	    // 控件显示初始化
		if(type == "view"){
			$("#id").attr({readonly:true,disabled:true});
	    	$("#code").attr({readonly:true,disabled:true});
	    	$("#display_label").attr({readonly:true,disabled:true});
	    	$("#has_lef").attr({readonly:true,disabled:true});
	    	$("#des").attr({readonly:true,disabled:true});
	    	$("#entry_url").attr({readonly:true,disabled:true});
	    	$("#display_order").attr({readonly:true,disabled:true});
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
		else{ // create update
			$("#id").attr({readonly:false,disabled:false});
	    	$("#code").attr({readonly:false,disabled:false});
	    	$("#display_label").attr({readonly:false,disabled:false});
	    	$("#has_lef").attr({readonly:false,disabled:false});
	    	$("#des").attr({readonly:false,disabled:false});
	    	$("#entry_url").attr({readonly:false,disabled:false});
	    	$("#display_order").attr({readonly:false,disabled:false});
	    	$("#create_user").attr({readonly:true,disabled:true});
	    	$("#create_user").parent().parent().hide();
	    	$("#create_date").attr({readonly:true,disabled:true});
	    	$("#create_date").parent().parent().hide();
	    	$("#update_user").attr({readonly:true,disabled:true});
	    	$("#update_user").parent().parent().hide();
	    	$("#update_date").attr({readonly:true,disabled:true});
	    	$("#update_date").parent().parent().hide();
	    	$('#edit_dialog_ok').removeClass('hidden');
		}
		$('#edit_dialog').modal('show');
	}


	function addAction(id){
		
	}
	function initModel(id, type, fun){
		
		$.ajax({
			   type: "GET",
			   url: "index.php?r=system-module/view",
			   data: {"id":id},
			   cache: false,
			   dataType:"json",
			   error: function (xmlHttpRequest, textStatus, errorThrown) {
				    alert("出错了，" + textStatus);
				},
			   success: function(data){
//	 			   console.log(msg);
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
					   url: "index.php?r=system-module/delete",
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
		$('#system-module-form').submit();
	});
	$('#create_btn').click(function (e) {
	    e.preventDefault();
	    initEditSystemModule({}, 'create');
	});
	$('#delete_btn').click(function (e) {
	    e.preventDefault();
	    deleteAction('');
	});

	$('#system-module-form').bind('submit', function(e) {
		e.preventDefault();
		var id = $("#id").val();
		var action = id == "" ? "create" : "update&id=" + id;
	    $(this).ajaxSubmit({
	    	type: "post",
	    	dataType:"json",
	    	url: "index.php?r=system-module/" + action,
	    	success: function(value) 
	    	{
	    		//console.log(value);
	        	if(value.errno == 0){
	        		$('#edit_dialog').modal('hide');
	        		admin_tool.alert('msg_info', '添加成功', 'success');
	        		window.location.reload();
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


 
//   $(function () {
//     $('#example1').DataTable({
//       "paging": true,
//       "lengthChange": false,
//       "searching": false,
//       "ordering": true,
//       "info": true,
//       "autoWidth": false
//     });
//   });
</script>
<?php $this->endBlock(); ?>
