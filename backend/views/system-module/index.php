<?php
use yii\widgets\LinkPager;
use yii\base\Object;
use backend\models\SystemModule;
$model = new SystemModule();
?>

<div class="row">
	<div class="box col-md-12">
		<div class="box-inner">
			<div class="box-header well" data-original-title="">
				<h2>
					<i class="glyphicon glyphicon-user"></i>模块
				</h2>
				
				
				<div class="box-icon">
				<button type="button" class="btn btn-xs btn-primary">添&nbsp;&emsp;加</button>|
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
						echo '<th>'.$model->getAttributeLabel('code').'</th>';
						echo '<th>'.$model->getAttributeLabel('display_label').'</th>';
						echo '<th>'.$model->getAttributeLabel('has_lef').'</th>';
						echo '<th>'.$model->getAttributeLabel('create_user').'</th>';
						echo '<th>'.$model->getAttributeLabel('create_date').'</th>';
						echo '<th>操作</th>';
						?>

						</tr>
					</thead>
					<tbody>
					
					    <?php
					       foreach($models as $model){
					           echo '<tr>';
					           echo '  <td><label><input type="checkbox" value="'.$model->id.'"></label></td>';
					           echo '  <td>'.$model->code.'</td>';
					           echo '  <td>'.$model->display_label.'</td>';
					           echo '  <td>'.$model->has_lef.'</td>';
					           echo '  <td>'.$model->create_user.'</td>';
					           echo '  <td>'.$model->create_date.'</td>';
					           echo '  <td class="center">';
					           echo '      <a id="add_fun_btn" class="btn btn-success btn-sm" href="#"> <i class="glyphicon glyphicon-zoom-in icon-white"></i>添加功能</a>';
					           echo '      <a id="view_btn" class="btn btn-success btn-sm" href="#"> <i class="glyphicon glyphicon-zoom-in icon-white"></i>查看</a>';
					           echo '      <a id="edit_btn" class="btn btn-info btn-sm" href="#"> <i class="glyphicon glyphicon-edit icon-white"></i>修改</a>';
					           echo '      <a id="delete_btn" class="btn btn-danger btn-sm" href="#"> <i class="glyphicon glyphicon-trash icon-white"></i>删除</a>';
					           echo '  </td>';
					           echo '<tr/>';
					       }
					    
					    ?>
					    <!-- 
						<tr>
							<td>David R</td>
							<td class="center">2012/01/01</td>
							<td class="center">Member</td>
							<td class="center"><span
								class="label-success label label-default">Active</span></td>
							<td class="center"><a class="btn btn-success" href="#"> <i
									class="glyphicon glyphicon-zoom-in icon-white"></i> View
							</a> <a class="btn btn-info" href="#"> <i
									class="glyphicon glyphicon-edit icon-white"></i> Edit
							</a> <a class="btn btn-danger" href="#"> <i
									class="glyphicon glyphicon-trash icon-white"></i> Delete
							</a></td>
						</tr>
						<tr>
							<td>Chris Jack</td>
							<td class="center">2012/01/01</td>
							<td class="center">Member</td>
							<td class="center"><span
								class="label-success label label-default">Active</span></td>
							<td class="center"><a class="btn btn-success" href="#"> <i
									class="glyphicon glyphicon-zoom-in icon-white"></i> View
							</a> <a class="btn btn-info" href="#"> <i
									class="glyphicon glyphicon-edit icon-white"></i> Edit
							</a> <a class="btn btn-danger" href="#"> <i
									class="glyphicon glyphicon-trash icon-white"></i> Delete
							</a></td>
						</tr>
						<tr>
							<td>Jack Chris</td>
							<td class="center">2012/01/01</td>
							<td class="center">Member</td>
							<td class="center"><span
								class="label-success label label-default">Active</span></td>
							<td class="center"><a class="btn btn-success" href="#"> <i
									class="glyphicon glyphicon-zoom-in icon-white"></i> View
							</a> <a class="btn btn-info" href="#"> <i
									class="glyphicon glyphicon-edit icon-white"></i> Edit
							</a> <a class="btn btn-danger" href="#"> <i
									class="glyphicon glyphicon-trash icon-white"></i> Delete
							</a></td>
						</tr>
						<tr>
							<td>Muhammad Usman</td>
							<td class="center">2012/01/01</td>
							<td class="center">Member</td>
							<td class="center"><span
								class="label-success label label-default">Active</span></td>
							<td class="center"><a class="btn btn-success" href="#"> <i
									class="glyphicon glyphicon-zoom-in icon-white"></i> View
							</a> <a class="btn btn-info" href="#"> <i
									class="glyphicon glyphicon-edit icon-white"></i> Edit
							</a> <a class="btn btn-danger" href="#"> <i
									class="glyphicon glyphicon-trash icon-white"></i> Delete
							</a></td>
						</tr>
						<tr>
							<td>Sheikh Heera</td>
							<td class="center">2012/02/01</td>
							<td class="center">Staff</td>
							<td class="center"><span class="label-default label label-danger">Banned</span>
							</td>
							<td class="center"><a class="btn btn-success" href="#"> <i
									class="glyphicon glyphicon-zoom-in icon-white"></i> View
							</a> <a class="btn btn-info" href="#"> <i
									class="glyphicon glyphicon-edit icon-white"></i> Edit
							</a> <a class="btn btn-danger" href="#"> <i
									class="glyphicon glyphicon-trash icon-white"></i> Delete
							</a></td>
						</tr>
						<tr>
							<td>Helen Garner</td>
							<td class="center">2012/02/01</td>
							<td class="center">Staff</td>
							<td class="center"><span class="label-default label label-danger">Banned</span>
							</td>
							<td class="center"><a class="btn btn-success" href="#"> <i
									class="glyphicon glyphicon-zoom-in icon-white"></i> View
							</a> <a class="btn btn-info" href="#"> <i
									class="glyphicon glyphicon-edit icon-white"></i> Edit
							</a> <a class="btn btn-danger" href="#"> <i
									class="glyphicon glyphicon-trash icon-white"></i> Delete
							</a></td>
						</tr>
						<tr>
							<td>Saruar Ahmed</td>
							<td class="center">2012/03/01</td>
							<td class="center">Member</td>
							<td class="center"><span
								class="label-warning label label-default">Pending</span></td>
							<td class="center"><a class="btn btn-success" href="#"> <i
									class="glyphicon glyphicon-zoom-in icon-white"></i> View
							</a> <a class="btn btn-info" href="#"> <i
									class="glyphicon glyphicon-edit icon-white"></i> Edit
							</a> <a class="btn btn-danger" href="#"> <i
									class="glyphicon glyphicon-trash icon-white"></i> Delete
							</a></td>
						</tr>
						<tr>
							<td>Ahemd Saruar</td>
							<td class="center">2012/03/01</td>
							<td class="center">Member</td>
							<td class="center"><span
								class="label-warning label label-default">Pending</span></td>
							<td class="center"><a class="btn btn-success" href="#"> <i
									class="glyphicon glyphicon-zoom-in icon-white"></i> View
							</a> <a class="btn btn-info" href="#"> <i
									class="glyphicon glyphicon-edit icon-white"></i> Edit
							</a> <a class="btn btn-danger" href="#"> <i
									class="glyphicon glyphicon-trash icon-white"></i> Delete
							</a></td>
						</tr>
						<tr>
							<td>Habib Rizwan</td>
							<td class="center">2012/01/21</td>
							<td class="center">Staff</td>
							<td class="center"><span
								class="label-success label label-default">Active</span></td>
							<td class="center"><a class="btn btn-success" href="#"> <i
									class="glyphicon glyphicon-zoom-in icon-white"></i> View
							</a> <a class="btn btn-info" href="#"> <i
									class="glyphicon glyphicon-edit icon-white"></i> Edit
							</a> <a class="btn btn-danger" href="#"> <i
									class="glyphicon glyphicon-trash icon-white"></i> Delete
							</a></td>
						</tr>
						<tr>
							<td>Rizwan Habib</td>
							<td class="center">2012/01/21</td>
							<td class="center">Staff</td>
							<td class="center"><span
								class="label-success label label-default">Active</span></td>
							<td class="center"><a class="btn btn-success" href="#"> <i
									class="glyphicon glyphicon-zoom-in icon-white"></i> View
							</a> <a class="btn btn-info" href="#"> <i
									class="glyphicon glyphicon-edit icon-white"></i> Edit
							</a> <a class="btn btn-danger" href="#"> <i
									class="glyphicon glyphicon-trash icon-white"></i> Delete
							</a></td>
						</tr>
						<tr>
							<td>Amrin Sana</td>
							<td class="center">2012/08/23</td>
							<td class="center">Staff</td>
							<td class="center"><span class="label-default label label-danger">Banned</span>
							</td>
							<td class="center"><a class="btn btn-success" href="#"> <i
									class="glyphicon glyphicon-zoom-in icon-white"></i> View
							</a> <a class="btn btn-info" href="#"> <i
									class="glyphicon glyphicon-edit icon-white"></i> Edit
							</a> <a class="btn btn-danger" href="#"> <i
									class="glyphicon glyphicon-trash icon-white"></i> Delete
							</a></td>
						</tr>
						<tr>
							<td>Sana Amrin</td>
							<td class="center">2012/08/23</td>
							<td class="center">Staff</td>
							<td class="center"><span class="label-default label label-danger">Banned</span>
							</td>
							<td class="center"><a class="btn btn-success" href="#"> <i
									class="glyphicon glyphicon-zoom-in icon-white"></i> View
							</a> <a class="btn btn-info" href="#"> <i
									class="glyphicon glyphicon-edit icon-white"></i> Edit
							</a> <a class="btn btn-danger" href="#"> <i
									class="glyphicon glyphicon-trash icon-white"></i> Delete
							</a></td>
						</tr>
						<tr>
							<td>Ifrah Jannat</td>
							<td class="center">2012/06/01</td>
							<td class="center">Admin</td>
							<td class="center"><span class="label-default label">Inactive</span>
							</td>
							<td class="center"><a class="btn btn-success" href="#"> <i
									class="glyphicon glyphicon-zoom-in icon-white"></i> View
							</a> <a class="btn btn-info" href="#"> <i
									class="glyphicon glyphicon-edit icon-white"></i> Edit
							</a> <a class="btn btn-danger" href="#"> <i
									class="glyphicon glyphicon-trash icon-white"></i> Delete
							</a></td>
						</tr>
						<tr>
							<td>Jannat Ifrah</td>
							<td class="center">2012/06/01</td>
							<td class="center">Admin</td>
							<td class="center"><span class="label-default label">Inactive</span>
							</td>
							<td class="center"><a class="btn btn-success" href="#"> <i
									class="glyphicon glyphicon-zoom-in icon-white"></i> View
							</a> <a class="btn btn-info" href="#"> <i
									class="glyphicon glyphicon-edit icon-white"></i> Edit
							</a> <a class="btn btn-danger" href="#"> <i
									class="glyphicon glyphicon-trash icon-white"></i> Delete
							</a></td>
						</tr>
						<tr>
							<td>Robert</td>
							<td class="center">2012/03/01</td>
							<td class="center">Member</td>
							<td class="center"><span
								class="label-warning label label-default">Pending</span></td>
							<td class="center"><a class="btn btn-success" href="#"> <i
									class="glyphicon glyphicon-zoom-in icon-white"></i> View
							</a> <a class="btn btn-info" href="#"> <i
									class="glyphicon glyphicon-edit icon-white"></i> Edit
							</a> <a class="btn btn-danger" href="#"> <i
									class="glyphicon glyphicon-trash icon-white"></i> Delete
							</a></td>
						</tr>
						<tr>
							<td>Dave Robert</td>
							<td class="center">2012/03/01</td>
							<td class="center">Member</td>
							<td class="center"><span
								class="label-warning label label-default">Pending</span></td>
							<td class="center"><a class="btn btn-success" href="#"> <i
									class="glyphicon glyphicon-zoom-in icon-white"></i> View
							</a> <a class="btn btn-info" href="#"> <i
									class="glyphicon glyphicon-edit icon-white"></i> Edit
							</a> <a class="btn btn-danger" href="#"> <i
									class="glyphicon glyphicon-trash icon-white"></i> Delete
							</a></td>
						</tr>
						<tr>
							<td>Brown Robert</td>
							<td class="center">2012/03/01</td>
							<td class="center">Member</td>
							<td class="center"><span
								class="label-warning label label-default">Pending</span></td>
							<td class="center"><a class="btn btn-success" href="#"> <i
									class="glyphicon glyphicon-zoom-in icon-white"></i> View
							</a> <a class="btn btn-info" href="#"> <i
									class="glyphicon glyphicon-edit icon-white"></i> Edit
							</a> <a class="btn btn-danger" href="#"> <i
									class="glyphicon glyphicon-trash icon-white"></i> Delete
							</a></td>
						</tr>
						<tr>
							<td>Usman Muhammad</td>
							<td class="center">2012/01/01</td>
							<td class="center">Member</td>
							<td class="center"><span
								class="label-success label label-default">Active</span></td>
							<td class="center"><a class="btn btn-success" href="#"> <i
									class="glyphicon glyphicon-zoom-in icon-white"></i> View
							</a> <a class="btn btn-info" href="#"> <i
									class="glyphicon glyphicon-edit icon-white"></i> Edit
							</a> <a class="btn btn-danger" href="#"> <i
									class="glyphicon glyphicon-trash icon-white"></i> Delete
							</a></td>
						</tr>
						<tr>
							<td>Abdullah</td>
							<td class="center">2012/02/01</td>
							<td class="center">Staff</td>
							<td class="center"><span class="label-default label label-danger">Banned</span>
							</td>
							<td class="center"><a class="btn btn-success" href="#"> <i
									class="glyphicon glyphicon-zoom-in icon-white"></i> View
							</a> <a class="btn btn-info" href="#"> <i
									class="glyphicon glyphicon-edit icon-white"></i> Edit
							</a> <a class="btn btn-danger" href="#"> <i
									class="glyphicon glyphicon-trash icon-white"></i> Delete
							</a></td>
						</tr>
						<tr>
							<td>Dow John</td>
							<td class="center">2012/02/01</td>
							<td class="center">Admin</td>
							<td class="center"><span class="label-default label">Inactive</span>
							</td>
							<td class="center"><a class="btn btn-success" href="#"> <i
									class="glyphicon glyphicon-zoom-in icon-white"></i> View
							</a> <a class="btn btn-info" href="#"> <i
									class="glyphicon glyphicon-edit icon-white"></i> Edit
							</a> <a class="btn btn-danger" href="#"> <i
									class="glyphicon glyphicon-trash icon-white"></i> Delete
							</a></td>
						</tr>
						<tr>
							<td>John R</td>
							<td class="center">2012/02/01</td>
							<td class="center">Admin</td>
							<td class="center"><span class="label-default label">Inactive</span>
							</td>
							<td class="center"><a class="btn btn-success" href="#"> <i
									class="glyphicon glyphicon-zoom-in icon-white"></i> View
							</a> <a class="btn btn-info" href="#"> <i
									class="glyphicon glyphicon-edit icon-white"></i> Edit
							</a> <a class="btn btn-danger" href="#"> <i
									class="glyphicon glyphicon-trash icon-white"></i> Delete
							</a></td>
						</tr>
						<tr>
							<td>Paul Wilson</td>
							<td class="center">2012/03/01</td>
							<td class="center">Member</td>
							<td class="center"><span
								class="label-warning label label-default">Pending</span></td>
							<td class="center"><a class="btn btn-success" href="#"> <i
									class="glyphicon glyphicon-zoom-in icon-white"></i> View
							</a> <a class="btn btn-info" href="#"> <i
									class="glyphicon glyphicon-edit icon-white"></i> Edit
							</a> <a class="btn btn-danger" href="#"> <i
									class="glyphicon glyphicon-trash icon-white"></i> Delete
							</a></td>
						</tr>
						<tr>
							<td>Wilson Paul</td>
							<td class="center">2012/03/01</td>
							<td class="center">Member</td>
							<td class="center"><span
								class="label-warning label label-default">Pending</span></td>
							<td class="center"><a class="btn btn-success" href="#"> <i
									class="glyphicon glyphicon-zoom-in icon-white"></i> View
							</a> <a class="btn btn-info" href="#"> <i
									class="glyphicon glyphicon-edit icon-white"></i> Edit
							</a> <a class="btn btn-danger" href="#"> <i
									class="glyphicon glyphicon-trash icon-white"></i> Delete
							</a></td>
						</tr>
						<tr>
							<td>Heera Sheikh</td>
							<td class="center">2012/01/21</td>
							<td class="center">Staff</td>
							<td class="center"><span
								class="label-success label label-default">Active</span></td>
							<td class="center"><a class="btn btn-success" href="#"> <i
									class="glyphicon glyphicon-zoom-in icon-white"></i> View
							</a> <a class="btn btn-info" href="#"> <i
									class="glyphicon glyphicon-edit icon-white"></i> Edit
							</a> <a class="btn btn-danger" href="#"> <i
									class="glyphicon glyphicon-trash icon-white"></i> Delete
							</a></td>
						</tr>
						<tr>
							<td>Sheikh Heera</td>
							<td class="center">2012/01/21</td>
							<td class="center">Staff</td>
							<td class="center"><span
								class="label-success label label-default">Active</span></td>
							<td class="center"><a class="btn btn-success" href="#"> <i
									class="glyphicon glyphicon-zoom-in icon-white"></i> View
							</a> <a class="btn btn-info" href="#"> <i
									class="glyphicon glyphicon-edit icon-white"></i> Edit
							</a> <a class="btn btn-danger" href="#"> <i
									class="glyphicon glyphicon-trash icon-white"></i> Delete
							</a></td>
						</tr>
						<tr>
							<td>Christopher</td>
							<td class="center">2012/08/23</td>
							<td class="center">Staff</td>
							<td class="center"><span class="label-default label label-danger">Banned</span>
							</td>
							<td class="center"><a class="btn btn-success" href="#"> <i
									class="glyphicon glyphicon-zoom-in icon-white"></i> View
							</a> <a class="btn btn-info" href="#"> <i
									class="glyphicon glyphicon-edit icon-white"></i> Edit
							</a> <a class="btn btn-danger" href="#"> <i
									class="glyphicon glyphicon-trash icon-white"></i> Delete
							</a></td>
						</tr>
						<tr>
							<td>Andro Christopher</td>
							<td class="center">2012/08/23</td>
							<td class="center">Staff</td>
							<td class="center"><span class="label-default label label-danger">Banned</span>
							</td>
							<td class="center"><a class="btn btn-success" href="#"> <i
									class="glyphicon glyphicon-zoom-in icon-white"></i> View
							</a> <a class="btn btn-info" href="#"> <i
									class="glyphicon glyphicon-edit icon-white"></i> Edit
							</a> <a class="btn btn-danger" href="#"> <i
									class="glyphicon glyphicon-trash icon-white"></i> Delete
							</a></td>
						</tr>
						<tr>
							<td>Jhon Doe</td>
							<td class="center">2012/06/01</td>
							<td class="center">Admin</td>
							<td class="center"><span class="label-default label">Inactive</span>
							</td>
							<td class="center"><a class="btn btn-success" href="#"> <i
									class="glyphicon glyphicon-zoom-in icon-white"></i> View
							</a> <a class="btn btn-info" href="#"> <i
									class="glyphicon glyphicon-edit icon-white"></i> Edit
							</a> <a class="btn btn-danger" href="#"> <i
									class="glyphicon glyphicon-trash icon-white"></i> Delete
							</a></td>
						</tr>
						<tr>
							<td>Lorem Ipsum</td>
							<td class="center">2012/03/01</td>
							<td class="center">Member</td>
							<td class="center"><span
								class="label-warning label label-default">Pending</span></td>
							<td class="center"><a class="btn btn-success" href="#"> <i
									class="glyphicon glyphicon-zoom-in icon-white"></i> View
							</a> <a class="btn btn-info" href="#"> <i
									class="glyphicon glyphicon-edit icon-white"></i> Edit
							</a> <a class="btn btn-danger" href="#"> <i
									class="glyphicon glyphicon-trash icon-white"></i> Delete
							</a></td>
						</tr>
						<tr>
							<td>Abraham</td>
							<td class="center">2012/03/01</td>
							<td class="center">Member</td>
							<td class="center"><span
								class="label-warning label label-default">Pending</span></td>
							<td class="center"><a class="btn btn-success" href="#"> <i
									class="glyphicon glyphicon-zoom-in icon-white"></i> View
							</a> <a class="btn btn-info" href="#"> <i
									class="glyphicon glyphicon-edit icon-white"></i> Edit
							</a> <a class="btn btn-danger" href="#"> <i
									class="glyphicon glyphicon-trash icon-white"></i> Delete
							</a></td>
						</tr>
						<tr>
							<td>Brown Blue</td>
							<td class="center">2012/03/01</td>
							<td class="center">Member</td>
							<td class="center"><span
								class="label-warning label label-default">Pending</span></td>
							<td class="center"><a class="btn btn-success" href="#"> <i
									class="glyphicon glyphicon-zoom-in icon-white"></i> View
							</a> <a class="btn btn-info" href="#"> <i
									class="glyphicon glyphicon-edit icon-white"></i> Edit
							</a> <a class="btn btn-danger" href="#"> <i
									class="glyphicon glyphicon-trash icon-white"></i> Delete
							</a></td>
						</tr>
						<tr>
							<td>Worth Name</td>
							<td class="center">2012/03/01</td>
							<td class="center">Member</td>
							<td class="center"><span
								class="label-warning label label-default">Pending</span></td>
							<td class="center"><a class="btn btn-success" href="#"> <i
									class="glyphicon glyphicon-zoom-in icon-white"></i> View
							</a> <a class="btn btn-info" href="#"> <i
									class="glyphicon glyphicon-edit icon-white"></i> Edit
							</a> <a class="btn btn-danger" href="#"> <i
									class="glyphicon glyphicon-trash icon-white"></i> Delete
							</a></td>
						</tr>
						-->
					</tbody>
				</table>
				
				<?= LinkPager::widget(['pagination' => $pages]); ?>
				
			</div>
		</div>
	</div>
	<!--/span-->

</div>
<!--/row-->




<div class="modal fade" id="edit_system_module" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Settings</h3>
            </div>
            <div class="modal-body">
                <p>Here settings can be configured...</p>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default" data-dismiss="modal">取消</a>
                <a href="#" class="btn btn-primary" data-dismiss="modal">确定</a>
            </div>
        </div>
    </div>
</div>

<script>
$('#view_btn').click(function (e) {
    e.preventDefault();
    $('#edit_system_module').modal('show');
});
$('#edit_btn').click(function (e) {
    e.preventDefault();
    $('#edit_system_module').modal('show');
});
</script>


