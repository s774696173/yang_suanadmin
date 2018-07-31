
<?php
use yii\widgets\LinkPager;
use yii\base\Object;
use yii\bootstrap\ActiveForm;
use common\utils\CommonFun;
use yii\helpers\Url;

use common\models\Member;

$modelLabel = new \common\models\Member();
?>

<?php $this->beginBlock('header');  ?>
<!-- <head></head>中代码块 -->
<?php $this->endBlock(); ?>

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
          <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap table-responsive">
            <!-- row start search-->
          	<div class="row">
          	<div class="col-sm-12">
                <?php ActiveForm::begin(['id' => 'member-search-form', 'method'=>'get', 'options' => ['class' => 'form-inline'], 'action'=>Url::toRoute('member/index')]); ?>     
                
                  <div class="form-group" style="margin: 5px;">
                      <label><?=$modelLabel->getAttributeLabel('id')?>:</label>
                      <input type="text" class="form-control" id="query[id]" name="query[id]"  value="<?=isset($query["id"]) ? $query["id"] : "" ?>">
                  </div>

                  <div class="form-group" style="margin: 5px;">
                      <label><?=$modelLabel->getAttributeLabel('mobile')?>:</label>
                      <input type="text" class="form-control" id="query[mobile]" name="query[mobile]"  value="<?=isset($query["mobile"]) ? $query["mobile"] : "" ?>">
                  </div>

                  <div class="form-group" style="margin: 5px;">
                      <label><?=$modelLabel->getAttributeLabel('username')?>:</label>
                      <input type="text" class="form-control" id="query[username]" name="query[username]"  value="<?=isset($query["username"]) ? $query["username"] : "" ?>">
                  </div>
              <div class="form-group">
              	<a onclick="searchAction()" class="btn btn-primary btn-sm" href="#"> <i class="glyphicon glyphicon-zoom-in icon-white"></i>搜索</a>
           	  </div>
               <?php ActiveForm::end(); ?> 
            </div>
          	</div>
          	<!-- row end search -->
          	
          	<!-- row start -->
          	<div class="row">
          	<div class="col-sm-12 table-responsive">
          	<table id="data_table" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="data_table_info">
            <thead class="text-nowrap">
            <tr role="row">
            
            <?php 
              $orderby = isset($_GET['orderby']) ? $_GET['orderby'] : '';
		      echo '<th><input id="data_table_check" type="checkbox"></th>';
              echo '<th onclick="orderby(\'id\', \'desc\')" '.CommonFun::sortClass($orderby, 'id').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('id').'</th>';
              echo '<th onclick="orderby(\'mobile\', \'desc\')" '.CommonFun::sortClass($orderby, 'mobile').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('mobile').'</th>';
              echo '<th onclick="orderby(\'username\', \'desc\')" '.CommonFun::sortClass($orderby, 'username').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('username').'</th>';
              echo '<th onclick="orderby(\'by_ref\', \'desc\')" '.CommonFun::sortClass($orderby, 'by_ref').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('by_ref').'</th>';
              echo '<th onclick="orderby(\'ref_count\', \'desc\')" '.CommonFun::sortClass($orderby, 'ref_count').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('ref_count').'</th>';
              echo '<th onclick="orderby(\'from\', \'desc\')" '.CommonFun::sortClass($orderby, 'from').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('from').'</th>';
         
			?>
	
            <th tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >操作</th>
            </tr>
            </thead>
            <tbody>
            
            <?php
            foreach ($models as $model) {
                echo '<tr id="rowid_' . $model->id . '">';
                echo '  <td><label><input type="checkbox" value="' . $model->id . '"></label></td>';
                echo '  <td>' . $model->id . '</td>';
                echo '  <td>' . $model->mobile . '</td>';
                echo '  <td>' . $model->username . '</td>';
                //echo '  <td>' . $model->passwd . '</td>';
                echo '  <td>' . $model->by_ref . '</td>';
                echo '  <td>' . $model->ref_count . '</td>';
                //echo '  <td>' . $model->update_date . '</td>';
                //echo '  <td>' . $model->create_date . '</td>';
                //echo '  <td>' . $model->money . '</td>';
                //echo '  <td>' . $model->cost . '</td>';
                echo '  <td>' . $model->from . '</td>';
                echo '  <td class="center">';
                echo '      <a id="view_btn" onclick="viewAction(' . $model->id . ')" class="btn btn-primary btn-sm" href="#"> <i class="glyphicon glyphicon-zoom-in icon-white"></i>查看</a>';
                echo '      <a id="edit_btn" onclick="editAction(' . $model->id . ')" class="btn btn-primary btn-sm" href="#"> <i class="glyphicon glyphicon-edit icon-white"></i>修改</a>';
                echo '      <a id="delete_btn" onclick="deleteAction(' . $model->id . ')" class="btn btn-danger btn-sm" href="#"> <i class="glyphicon glyphicon-trash icon-white"></i>删除</a>';
                echo '  </td>';
                echo '</tr>';
            }
            
            ?>
            
           
           
            </tbody>
            <!-- <tfoot></tfoot> -->
          </table>
          </div>
          </div>
          <!-- row end -->
          
          <!-- row start -->
          <div class="row">
          	<div class="col-sm-5">
            	<div class="dataTables_info" id="data_table_info" role="status" aria-live="polite">
            		<div class="infos">
            		从<?= $pages->getPage() * $pages->getPageSize() + 1 ?>            		到 <?= ($pageCount = ($pages->getPage() + 1) * $pages->getPageSize()) < $pages->totalCount ?  $pageCount : $pages->totalCount?>            		 共 <?= $pages->totalCount?> 条记录</div>
            	</div>
            </div>
          	<div class="col-sm-7">
              	<div class="dataTables_paginate paging_simple_numbers" id="data_table_paginate">
              	<?= LinkPager::widget([
              	    'pagination' => $pages,
              	    'nextPageLabel' => '»',
              	    'prevPageLabel' => '«',
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
                <?php $form = ActiveForm::begin(["id" => "member-form", "class"=>"form-horizontal", "action"=>Url::toRoute("member/save")]); ?>                      
                 
          <input type="hidden" class="form-control" id="id" name="id" />

          <div id="mobile_div" class="form-group">
              <label for="mobile" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("mobile")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="mobile" name="Member[mobile]" placeholder="必填" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="username_div" class="form-group">
              <label for="username" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("username")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="username" name="Member[username]" placeholder="必填" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="passwd_div" class="form-group">
              <label for="passwd" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("passwd")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="passwd" name="Member[passwd]" placeholder="必填" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="by_ref_div" class="form-group">
              <label for="by_ref" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("by_ref")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="by_ref" name="Member[by_ref]" placeholder="必填" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="ref_count_div" class="form-group">
              <label for="ref_count" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("ref_count")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="ref_count" name="Member[ref_count]" placeholder="必填" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="update_date_div" class="form-group">
              <label for="update_date" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("update_date")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="update_date" name="Member[update_date]" placeholder="" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="create_date_div" class="form-group">
              <label for="create_date" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("create_date")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="create_date" name="Member[create_date]" placeholder="" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="money_div" class="form-group">
              <label for="money" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("money")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="money" name="Member[money]" placeholder="必填" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="cost_div" class="form-group">
              <label for="cost" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("cost")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="cost" name="Member[cost]" placeholder="必填" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="from_div" class="form-group">
              <label for="from" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("from")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="from" name="Member[from]" placeholder="必填" />
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
<?php $this->beginBlock('footer');  ?>
<!-- <body></body>后代码块 -->
 <script>
function orderby(field, op){
	 var url = window.location.search;
	 var optemp = field + " desc";
	 if(url.indexOf('orderby') != -1){
		 url = url.replace(/orderby=([^&?]*)/ig,  function($0, $1){ 
			 var optemp = field + " desc";
			 optemp = decodeURI($1) != optemp ? optemp : field + " asc";
			 return "orderby=" + optemp;
		   }); 
	 }
	 else{
		 if(url.indexOf('?') != -1){
			 url = url + "&orderby=" + encodeURI(optemp);
		 }
		 else{
			 url = url + "?orderby=" + encodeURI(optemp);
		 }
	 }
	 window.location.href=url; 
 }
 function searchAction(){
		$('#member-search-form').submit();
	}
 function viewAction(id){
		initModel(id, 'view', 'fun');
	}

 function initEditSystemModule(data, type){
	if(type == 'create'){
		$("#id").val('');
		$("#mobile").val('');
		$("#username").val('');
		$("#passwd").val('');
		$("#by_ref").val('');
		$("#ref_count").val('');
		$("#update_date").val('');
		$("#create_date").val('');
		$("#money").val('');
		$("#cost").val('');
		$("#from").val('');
		
	}
	else{
		$("#id").val(data.id);
    	$("#mobile").val(data.mobile);
    	$("#username").val(data.username);
    	$("#passwd").val(data.passwd);
    	$("#by_ref").val(data.by_ref);
    	$("#ref_count").val(data.ref_count);
    	$("#update_date").val(data.update_date);
    	$("#create_date").val(data.create_date);
    	$("#money").val(data.money);
    	$("#cost").val(data.cost);
    	$("#from").val(data.from);
    	}
	if(type == "view"){
      $("#id").attr({readonly:true,disabled:true});
      $("#mobile").attr({readonly:true,disabled:true});
      $("#username").attr({readonly:true,disabled:true});
      $("#passwd").attr({readonly:true,disabled:true});
      $("#by_ref").attr({readonly:true,disabled:true});
      $("#ref_count").attr({readonly:true,disabled:true});
      $("#update_date").attr({readonly:true,disabled:true});
      $("#update_date").parent().parent().show();
      $("#create_date").attr({readonly:true,disabled:true});
      $("#create_date").parent().parent().show();
      $("#money").attr({readonly:true,disabled:true});
      $("#money").parent().parent().show();
      $("#cost").attr({readonly:true,disabled:true});
      $("#cost").parent().parent().show();
      $("#from").attr({readonly:true,disabled:true});
	$('#edit_dialog_ok').addClass('hidden');
	}
	else{
      $("#id").attr({readonly:false,disabled:false});
      $("#mobile").attr({readonly:false,disabled:false});
      $("#username").attr({readonly:false,disabled:false});
      $("#passwd").attr({readonly:false,disabled:false});
      $("#by_ref").attr({readonly:false,disabled:false});
      $("#ref_count").attr({readonly:false,disabled:false});
      $("#update_date").attr({readonly:false,disabled:false});
      $("#update_date").parent().parent().hide();
      $("#create_date").attr({readonly:false,disabled:false});
      $("#create_date").parent().parent().hide();
      $("#money").attr({readonly:false,disabled:false});
      $("#money").parent().parent().hide();
      $("#cost").attr({readonly:false,disabled:false});
      $("#cost").parent().parent().hide();
      $("#from").attr({readonly:false,disabled:false});
		$('#edit_dialog_ok').removeClass('hidden');
		}
		$('#edit_dialog').modal('show');
}

function initModel(id, type, fun){
	
	$.ajax({
		   type: "GET",
		   url: "<?=Url::toRoute('member/view')?>",
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
		    $.ajax({
				   type: "GET",
				   url: "<?=Url::toRoute('member/delete')?>",
				   data: {"ids":ids},
				   cache: false,
				   dataType:"json",
				   error: function (xmlHttpRequest, textStatus, errorThrown) {
					    admin_tool.alert('msg_info', '出错了，' + textStatus, 'warning');
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
	$('#member-form').submit();
});

$('#create_btn').click(function (e) {
    e.preventDefault();
    initEditSystemModule({}, 'create');
});

$('#delete_btn').click(function (e) {
    e.preventDefault();
    deleteAction('');
});

$('#member-form').bind('submit', function(e) {
	e.preventDefault();
	var id = $("#id").val();
	var action = id == "" ? "<?=Url::toRoute('member/create')?>" : "<?=Url::toRoute('member/update')?>";
    $(this).ajaxSubmit({
    	type: "post",
    	dataType:"json",
    	url: action,
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
<?php $this->endBlock(); ?>