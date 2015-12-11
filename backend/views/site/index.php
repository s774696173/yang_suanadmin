<?php

?>


<div class="row">
	<div class="box col-md-12">
		<div class="box-inner">
			<div class="box-header well">
				<h2>
					<i class="glyphicon glyphicon-info-sign"></i> 首页
				</h2>

				<div class="box-icon">
				
				</div>
			</div>
			<div class="box-content">
				
					<table id="data_table"
					class="table table-striped table-bordered bootstrap-datatable datatable responsive">
					<!-- <thead>
						<tr>
	                           <th></th>
						      <th>操作</th>
						</tr>
					</thead>-->
					<tbody>
					   <?php foreach($sysInfo as $info){
					       echo '<tr>';
					       echo '  <td>'.$info['name'].'</td>';
					       echo '  <td>'.$info['value'].'</td>';
					       echo '</tr>';
					       
					   }?>
	                  
					</tbody>
				</table>
			
				
				
			</div>
		</div>
	</div>
</div>


