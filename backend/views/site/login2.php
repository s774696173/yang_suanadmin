<?php
use yii\bootstrap\ActiveForm;
?>
<div class="ch-container">
	<div class="row">

		<div class="row">
			<div class="col-md-12 center login-header">
				<h2>Welcome to Admin</h2>
			</div>
			<!--/span-->
		</div>
		<!--/row-->

		<div class="row">
			<div class="well col-md-5 center login-box">
				<div class="alert alert-info">Please login with your Username and
					Password.</div>
				
			<?php $form = ActiveForm::begin(['id' => 'login-form', 'class'=>'form-horizontal', 'action'=>'index.php?r=site/login']); ?>

				<fieldset>
					<div class="input-group input-group-lg">
						<span class="input-group-addon"><i
							class="glyphicon glyphicon-user red"></i></span> <input
							name="username" id="username" type="text" class="form-control"
							placeholder="Username">
					</div>
					<div class="clearfix"></div>
					<br>

					<div class="input-group input-group-lg">
						<span class="input-group-addon"><i
							class="glyphicon glyphicon-lock red"></i></span> <input
							name="password" id="password" type="password"
							class="form-control" placeholder="Password">
					</div>
					<div class="clearfix"></div>

					<div class="input-prepend">
						<label class="remember" for="remember"><input type="checkbox"
							name="remember" id="remember" value="y"> Remember me</label>
					</div>
					<div class="clearfix"></div>

					<p class="center col-md-5">
						<button type="submit" class="btn btn-primary">Login</button>
					</p>
				</fieldset>
				<!-- </form>  -->
			<?php ActiveForm::end(); ?>
		</div>
			<!--/span-->
		</div>
		<!--/row-->
	</div>
	<!--/fluid-row-->
</div>
<!--/.fluid-container-->