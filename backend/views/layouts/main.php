<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';

$system_menus = Yii::$app->user->identity->getSystemMenus();
$system_rights = Yii::$app->user->identity->getSystemRights();
$route = $this->context->route;
$absoluteUrl = Yii::$app->request->absoluteUrl;
$funInfo = isset($system_rights[$this->context->route]) == true ? $system_rights[$route] : null;
$otherMenu = true;

//检查是否为主菜单，主菜单不需要添加返回上一层菜单
if(isset($funInfo) == true && $funInfo['entry_url'] != $this->context->route){
    $referrer = Yii::$app->request->referrer;
    if(empty($referrer) == false){
        $referrer = urldecode($referrer);
        $system_menus_current = isset(Yii::$app->session['system_menus_current']) == true ? Yii::$app->session['system_menus_current'] : [];
        //检查当前URL是否已经在导航菜单中
        $inCurrent = false;
        foreach($system_menus_current as $key=>$m){
            if($inCurrent == true){
                unset($system_menus_current[$key]);
                
            }
            else if($m['route'] == $route){
                $inCurrent = true;
            }
        }
        if($inCurrent == false){
            $funLast = count($system_menus_current) > 0 ? $system_menus_current[count($system_menus_current) - 1] : null;
            // 检查当前url是否和前一个相同，判断是否刷新
            if($funLast['route'] != $route){
                $system_menus_current[] = ['url'=>$absoluteUrl,'route'=>$route, 'right_name'=>$funInfo['right_name']];
                
            }
        }
        Yii::$app->session['system_menus_current'] = $system_menus_current;
    }
    else{
        $otherMenu = false;
    }
}
else{
    $otherMenu = false;
}
if($otherMenu == false){
    Yii::$app->session['system_menus_current'] = null;
}
?>
<!-- topbar starts -->
<?php $this->beginContent('@backend/views/layouts/main_main.php');?>
<div class="navbar navbar-default" role="navigation">

	<div class="navbar-inner">
		<button type="button" class="navbar-toggle pull-left animated flip">
			<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span>
			<span class="icon-bar"></span> <span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="#"> <img alt="Charisma Logo"
			src="img/logo20.png" class="hidden-xs" /> <span>21so</span></a>

		<!-- user dropdown starts -->
		<div class="btn-group pull-right">
			<button class="btn btn-default dropdown-toggle"
				data-toggle="dropdown">
				<i class="glyphicon glyphicon-user"></i>
				<span class="hidden-sm hidden-xs"> <?php echo Yii::$app->user->identity->uname;?></span> 
				<span class="caret"></span>
			</button>
			<ul class="dropdown-menu">
				<!-- <li><a href="#">Profile</a></li>  -->
				<li class="divider"></li>
				<?php 
				    echo '<li><a href="'.Url::toRoute('site/logout').'">Logout</a></li>';
				?>
				<!-- <li><a href="login.html">Logout</a></li>  -->
			</ul>
		</div>
		<!-- user dropdown ends -->

		<!-- theme selector starts -->
		<div class="btn-group pull-right theme-container animated tada">
			<button class="btn btn-default dropdown-toggle"
				data-toggle="dropdown">
				<i class="glyphicon glyphicon-tint"></i><span
					class="hidden-sm hidden-xs"> 更换主题 / 皮肤</span> <span
					class="caret"></span>
			</button>
			<ul class="dropdown-menu" id="themes">
				<li><a data-value="classic" href="#"><i class="whitespace"></i>
						Classic</a></li>
				<li><a data-value="cerulean" href="#"><i class="whitespace"></i>
						Cerulean</a></li>
				<li><a data-value="cyborg" href="#"><i class="whitespace"></i>
						Cyborg</a></li>
				<li><a data-value="simplex" href="#"><i class="whitespace"></i>
						Simplex</a></li>
				<li><a data-value="darkly" href="#"><i class="whitespace"></i>
						Darkly</a></li>
				<li><a data-value="lumen" href="#"><i class="whitespace"></i> Lumen</a></li>
				<li><a data-value="slate" href="#"><i class="whitespace"></i> Slate</a></li>
				<li><a data-value="spacelab" href="#"><i class="whitespace"></i>
						Spacelab</a></li>
				<li><a data-value="united" href="#"><i class="whitespace"></i>
						United</a></li>
			</ul>
		</div>
		<!-- theme selector ends -->
<!-- 
		<ul class="collapse navbar-collapse nav navbar-nav top-menu">
			<li><a href="#"><i class="glyphicon glyphicon-globe"></i> Visit Site</a></li>
			<li class="dropdown"><a href="#" data-toggle="dropdown"><i
					class="glyphicon glyphicon-star"></i> Dropdown <span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					<li><a href="#">Action</a></li>
					<li><a href="#">Another action</a></li>
					<li><a href="#">Something else here</a></li>
					<li class="divider"></li>
					<li><a href="#">Separated link</a></li>
					<li class="divider"></li>
					<li><a href="#">One more separated link</a></li>
				</ul></li>
			<li>
				<form class="navbar-search pull-left">
					<input placeholder="Search"
						class="search-query form-control col-md-10" name="query"
						type="text">
				</form>
			</li>
		</ul>
 -->
	</div>
</div>
<!-- topbar ends -->
<div class="ch-container">
	<div class="row">

		<!-- left menu starts -->
		<div class="col-sm-2 col-lg-2">
			<div class="sidebar-nav">
				<div class="nav-canvas">
					<div class="nav-sm nav nav-stacked"></div>
					<ul class="nav nav-pills nav-stacked main-menu">
						<li class="nav-header">Main</li>

						<li <?=(empty($funInfo['entry_url']) == true ? ' class="active"' : '' )?>>
						  <a class="ajax-link" href="index.php?r=site/index"><i
								class="glyphicon glyphicon-home"></i>&nbsp;<span>首页</span></a>
								
						</li>
						<?php 
						
						foreach($system_menus as $menu){
						    echo '<li class="accordion">';
						    echo '    <a href="#"><i class="glyphicon glyphicon-plus"></i>&nbsp;<span>'.$menu['label'].'</span></a>';
						    echo '    <ul class="nav nav-pills nav-stacked">';
						    $funcList = $menu['funcList'];
						    foreach($funcList as $fun){
						        echo '    <li ' .( $fun['url'] == $funInfo['entry_url'] ? ' class="active"' : '' ). '>
			                                 <a href="'.Url::to([$fun['url']]).'"><i class="glyphicon glyphicon-list-alt"></i>&nbsp;<span>'.$fun['label'].'</span></a>
		                                  </li>';
						    }
						    echo '    </ul>';
						    echo '</li>';
						}
						
						?>
							
					</ul>
					
				</div>
			</div>
		</div>
		<!--/span-->
		<!-- left menu ends -->

		<noscript>
			<div class="alert alert-block col-md-12">
				<h4 class="alert-heading">Warning!</h4>

				<p>
					You need to have <a href="http://en.wikipedia.org/wiki/JavaScript"
						target="_blank">JavaScript</a> enabled to use this site.
				</p>
			</div>
		</noscript>

		<div id="content" class="col-lg-10 col-sm-10">
			<!-- content starts -->
			<div>
				<ul class="breadcrumb">
				    <?php
				    if(isset($funInfo['module_name']) == true && isset($funInfo['func_name']) == true){
                        echo '<li><a href="#">'.$funInfo['module_name'].'</a></li>';
                        echo '<li><a href="'.Url::toRoute($funInfo['entry_url']).'">'.$funInfo['func_name'].'</a></li>';
                        
                        $system_menus_current = isset(Yii::$app->session['system_menus_current']) == true ? Yii::$app->session['system_menus_current'] : [];
                        foreach($system_menus_current as $m){
//                             $system_menus_current[] = ['url'=>Yii::$app->request->referrer,'id'=>$referrer, 'right_name'=>$funref['right_name']];
                            echo '<li><a href="'.$m['url'].'">'.$m['right_name'].'</a></li>';
                        }
				    }
				    else{
				        echo '<li><a href="#">首页</a></li>';
				       
				    }
				    ?>
					<!-- <li><a href="index.php?r=site/test&id=1">test</a></li>  -->
					
				</ul>
			</div>
			

			
			<?= $content ?>
			<!-- content ends -->
		</div>
		<!--/#content.col-md-0-->
	</div>
	<!--/fluid-row-->



	<hr>

	<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
		aria-labelledby="myModalLabel" aria-hidden="true">

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
					<a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
					<a href="#" class="btn btn-primary" data-dismiss="modal">Save
						changes</a>
				</div>
			</div>
		</div>
	</div>

	<footer class="row">
		<p class="col-md-9 col-sm-9 col-xs-12 copyright">
			&copy; <a href="http://usman.it" target="_blank">21so</a>
			2012 - 2015
		</p>

		<p class="col-md-3 col-sm-3 col-xs-12 powered-by">
			Powered by: <a href="http://usman.it/free-responsive-admin-template">21so</a>
		</p>
	</footer>

</div>
<!--/.fluid-container-->
<?php $this->endContent();?>

