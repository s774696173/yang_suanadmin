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
					<button type="button" class="btn btn-xs btn-primary">添&nbsp;&emsp;加</button>
					|
					<button type="button" class="btn btn-xs btn-danger">批量删除</button>

					<!-- 
					<a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a> 
					<a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
					<a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
					 -->
				</div>

			</div>
			<div class="box-content">


				<table
					class="table table-striped table-bordered bootstrap-datatable datatable responsive">
					<thead>
						<tr>
						<?php
    // `id` `code` `display_label` `has_lef` `des` `entry_url` `display_order` `create_user` `create_date`
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
            echo '      <a id="view_btn" onclick="viewAction()" class="btn btn-success btn-sm" href="#"> <i class="glyphicon glyphicon-zoom-in icon-white"></i>查看</a>';
            echo '      <a id="edit_btn" class="btn btn-info btn-sm" href="#"> <i class="glyphicon glyphicon-edit icon-white"></i>修改</a>';
            echo '      <a id="delete_btn" class="btn btn-danger btn-sm" href="#"> <i class="glyphicon glyphicon-trash icon-white"></i>删除</a>';
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




<div class="modal fade" id="edit_system_module" tabindex="-1"
	role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3>Settings</h3>
			</div>
			<div class="modal-body">
                <?php $form = ActiveForm::begin(['id' => 'login-form', 'class'=>'form-horizontal', 'action'=>'index.php?r=site/login']); ?>

				<div class="form-group">
					<label for="id" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("id")?></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="id" name="id"
							placeholder="">
					</div>
				</div>
				<div class="clearfix"></div>
				<br />

				<div class="form-group">
					<label for="code" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("code")?></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="code" name="code"
							placeholder="">
					</div>
				</div>
				<div class="clearfix"></div>
				<br />
				
				<div class="form-group">
					<label for="display_label" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("display_label")?></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="display_label" name="display_label"
							placeholder="">
					</div>
				</div>
				<div class="clearfix"></div>
				<br />

                <div class="form-group">
					<label for="has_lef" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("has_lef")?></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="has_lef" name="has_lef"
							placeholder="">
					</div>
				</div>
				<div class="clearfix"></div>
				<br />
				
				<div class="form-group">
					<label for="des" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("des")?></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="des" name="des"
							placeholder="">
					</div>
				</div>
				<div class="clearfix"></div>
				<br />
				
				<div class="form-group">
					<label for="entry_url" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("entry_url")?></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="entry_url" name="entry_url"
							placeholder="">
					</div>
				</div>
				<div class="clearfix"></div>
				<br />

                <div class="form-group">
					<label for="display_order" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("display_order")?></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="display_order" name="display_order"
							placeholder="">
					</div>
				</div>
				<div class="clearfix"></div>
				<br />
				
				<div class="form-group">
					<label for="create_user" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("create_user")?></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="create_user" name="create_user"
							placeholder="">
					</div>
				</div>
				<div class="clearfix"></div>
				<br />
				
				<div class="form-group">
					<label for="create_date" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("create_date")?></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="create_date" name="create_date"
							placeholder="">
					</div>
				</div>
				<div class="clearfix"></div>
				<br />
				
				<div class="form-group">
					<label for="update_user" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("update_user")?></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="update_user" name="update_user"
							placeholder="">
					</div>
				</div>
				<div class="clearfix"></div>
				<br />
				
				<div class="form-group">
					<label for="update_date" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("update_date")?></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="update_date" name="update_date"
							placeholder="">
					</div>
				</div>
				<div class="clearfix"></div>
				<br />
				
				
				
			<?php ActiveForm::end(); ?>
            </div>
			<div class="modal-footer">
				<a href="#" class="btn btn-default" data-dismiss="modal">取消</a> <a
					href="#" class="btn btn-primary" data-dismiss="modal">确定</a>
			</div>
		</div>
	</div>
</div>

<script>

function viewAction(){
// 	console.log(arguments);
// 	alert("===");
// 	for(var i=0;i<arguments.length;i++)
// 		 console.log(arguments[i]);
 	$('#edit_system_module').modal('show');

}
// $('#view_btn').click(function (e) {
//     e.preventDefault();
//     $('#edit_system_module').modal('show');
//     $('#edit_system_module').on('show.bs.modal', function () {
//   	  // 执行一些动作...
//   	})
// });
$('#edit_btn').click(function (e) {
    e.preventDefault();
    $('#edit_system_module').modal('show');
});
</script>


