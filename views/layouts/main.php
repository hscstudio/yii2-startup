<?php
use yii\helpers\Html;
use frontend\widgets\Nav;
use frontend\widgets\NavBar;
use frontend\widgets\SideNavBar;
use frontend\widgets\SideNav;
use frontend\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="skin-blue sidebar-mini">
    <?php $this->beginBody() ?>
	<!-- Site wrapper -->
    <div class="wrapper">
		
		<?php
			NavBar::begin([
				'brandLabel' => 'My Company',
				'brandUrl' => Yii::$app->homeUrl,
				'options' => [
					'class' => 'navbar-static-top',
				],
			]);
			$menuItems = [
				['encode'=>false,'label' => '<i class="fa fa-home"></i>', 'url' => ['/site/index']],
				['type'=>'messages','label' => '#', 'url' => ['/messages/index'],'items'=>[
					['label' => 'Support Team', 'url' => ['/messages/view','id'=>1], 'image'=>Url::to('adminlte/img/user2-160x160.jpg'), 'description'=>'Why not buy a new awesome theme?', 'time'=>'5 mins'],
					['label' => 'Marketing Team', 'url' => ['/messages/view','id'=>2], 'image'=>Url::to('adminlte/img/user2-160x160.jpg'), 'description'=>'Why not buy a new awesome server?', 'time'=>'2 mins'],
				]],				
				['type'=>'notifications','label' => '#', 'url' => ['/notifications/index'],'items'=>[
					['label' => 'Support Team', 'url' => ['/notifications/view','id'=>1], ],
					['label' => 'Support Team', 'url' => ['/notifications/view','id'=>3], ],
					['label' => 'Support Team', 'url' => ['/notifications/view','id'=>4], ],
					['label' => 'Support Team', 'url' => ['/notifications/view','id'=>2], ],
					['label' => 'Support Team', 'url' => ['/notifications/view','id'=>2], ],
					['label' => 'Support Team', 'url' => ['/notifications/view','id'=>2], ],
					['label' => 'Support Team', 'url' => ['/notifications/view','id'=>2], ],
					['label' => 'Support Team', 'url' => ['/notifications/view','id'=>2], ],
				]],
				['type'=>'tasks','label' => '#', 'url' => ['/tasks/index'],'items'=>[
					['label' => 'Migration', 'url' => ['/tasks/view','id'=>1], 'color'=>'aqua', 'percent'=>'10'],
					['label' => 'Backup', 'url' => ['/tasks/view','id'=>1], 'color'=>'red', 'percent'=>'75'],
					['label' => 'Analyze', 'url' => ['/tasks/view','id'=>1], 'color'=>'yellow', 'percent'=>'25'],
					['label' => 'Tutorial', 'url' => ['/tasks/view','id'=>1], 'color'=>'lime', 'percent'=>'50'],
				]],
				['label' => 'Page', 'url' => '#',
					'items'=>[
						['label' => 'Contact', 'url' => ['/site/contact']],
						['label' => 'About', 'url' => ['/site/about']],
					]
				],				
			];
			
			if (Yii::$app->user->isGuest) {
				$menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
				$menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
			} else {
				$menuItems[] = [
					'type'=>'user',
					'label' => '#', 
					'url' => ['/tasks/index'],
					'logoutUrl' => ['/site/logout'],
					'profileUrl' => ['/site/profile'],
					'image'=>Url::to('adminlte/img/user2-160x160.jpg'),
					'username'=>Yii::$app->user->identity->username,
					'position'=>'User',
					'join'=>'Member since '.date('m,Y',Yii::$app->user->identity->created_at),
					'items'=>[]
				];
				/*
				$menuItems[] = [
					'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
					
					'linkOptions' => ['data-method' => 'post']
				];*/
			}
			$menuItems[] = ['type'=>'control','label' => '#', 'url' => '#'];
			echo Nav::widget([
				'options' => ['class' => 'navbar-nav'],
				'items' => $menuItems,
			]);
			NavBar::end();
		?>
        

      <!-- =============================================== -->
	
      <!-- Left side column. contains the sidebar -->
		<?php
		$user = [];
		if (!Yii::$app->user->isGuest) {
			$user['image']=	Url::to('adminlte/img/user2-160x160.jpg');
			$user['username']=	Yii::$app->user->identity->username;
		}
		
		SideNavBar::begin([
			'user' => $user,
			'search' => [
				'method'=> 'post',
				'action'=> Url::to(['site/search']),
			],
			'options' => [
				'class' => 'navbar-static-top',
			],
		]);
		
		$menuItems = [
			['label' => 'Dashboard', 'url' => '#', 'icon' => 'fa fa-dashboard'],
			['label' => 'Layouts Options', 'url' => '#', 'icon' => 'fa fa-files-o'],
			['label' => 'Widgets', 'url' => ['site/widgets'], 'icon' => 'fa fa-th'],
			['label' => 'Charts', 'url' => ['site/charts'], 'icon' => 'fa fa-pie-chart'],
			['label' => 'UI Elements', 'url' => '#', 'icon' => 'fa fa-laptop'],
			['label' => 'Forms', 'url' => '#', 'icon' => 'fa fa-edit'],
			['label' => 'Tables', 'url' => '#', 'icon' => 'fa fa-table'],
			['label' => 'Calendar', 'url' => '#', 'icon' => 'fa fa-calendar'],
			['label' => 'Mailbox', 'url' => '#', 'icon' => 'fa fa-envelope'],
			['label' => 'Examples', 'url' => '#', 'icon' => 'fa fa-folder'],
			['label' => 'Multilevel', 'url' => '#', 'icon' => 'fa fa-share',
				'items'=>[
					['label' => 'Level', 'url' => '#', 'icon' => 'fa fa-angle-right'],
					['label' => 'Level', 'url' => '#', 'icon' => 'fa fa-angle-right',
						'items'=>[
							['label' => 'Sub Level', 'url' => '#', 'icon' => 'fa fa-angle-right'],
							['label' => 'Sub Level', 'url' => '#', 'icon' => 'fa fa-angle-right',
								'items'=>[
									['label' => 'Sub Level', 'url' => '#', 'icon' => 'fa fa-angle-right'],
									['label' => 'Sub Level', 'url' => '#', 'icon' => 'fa fa-angle-right'],
									['label' => 'Sub Level', 'url' => '#', 'icon' => 'fa fa-angle-right'],
								]
							],
							['label' => 'Sub Level', 'url' => '#', 'icon' => 'fa fa-angle-right'],
						]
					],
					['label' => 'Level', 'url' => '#', 'icon' => 'fa fa-angle-right'],
				]
			],
			['label' => 'Documentation', 'url' => '#', 'icon' => 'fa fa-book'],			
		];
		echo SideNav::widget([
			'header' => 'MAIN NAVIGATION',
			'options' => ['class' => 'sidebar-menu'],
			'items' => $menuItems,
		]);
		
		SideNavBar::end();
		?>
      
      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
		<?php 
		if(isset($this->params['breadcrumbs'])){ ?>
        <section class="content-header">
			<?= Breadcrumbs::widget([
			'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
			]) ?>
			<br>
        </section>
		<?php } ?>

        <!-- Main content -->
        <section class="content">
          <?= $content ?>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://www.hafidmukhlasin.com">Hafid Mukhlasin</a>.</strong> All rights reserved.
      </footer>
      
      <!-- Control Sidebar -->      
      <aside class="control-sidebar control-sidebar-dark">                
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class='control-sidebar-menu'>
              <li>
                <a href='javascript::;'>
                  <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                    <p>Will be 23 on April 24th</p>
                  </div>
                </a>
              </li>
              <li>
                <a href='javascript::;'>
                  <i class="menu-icon fa fa-user bg-yellow"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                    <p>New phone +1(800)555-1234</p>
                  </div>
                </a>
              </li>
              <li>
                <a href='javascript::;'>
                  <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                    <p>nora@example.com</p>
                  </div>
                </a>
              </li>
              <li>
                <a href='javascript::;'>
                  <i class="menu-icon fa fa-file-code-o bg-green"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                    <p>Execution time 5 seconds</p>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3> 
            <ul class='control-sidebar-menu'>
              <li>
                <a href='javascript::;'>               
                  <h4 class="control-sidebar-subheading">
                    Custom Template Design
                    <span class="label label-danger pull-right">70%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                  </div>                                    
                </a>
              </li> 
              <li>
                <a href='javascript::;'>               
                  <h4 class="control-sidebar-subheading">
                    Update Resume
                    <span class="label label-success pull-right">95%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                  </div>                                    
                </a>
              </li> 
              <li>
                <a href='javascript::;'>               
                  <h4 class="control-sidebar-subheading">
                    Laravel Integration
                    <span class="label label-waring pull-right">50%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                  </div>                                    
                </a>
              </li> 
              <li>
                <a href='javascript::;'>               
                  <h4 class="control-sidebar-subheading">
                    Back End Framework
                    <span class="label label-primary pull-right">68%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                  </div>                                    
                </a>
              </li>               
            </ul><!-- /.control-sidebar-menu -->         

          </div><!-- /.tab-pane -->
          <!-- Stats tab content -->
          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">            
            <form method="post">
              <h3 class="control-sidebar-heading">General Settings</h3>
              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Report panel usage
                  <input type="checkbox" class="pull-right" checked />
                </label>
                <p>
                  Some information about this general settings option
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Allow mail redirect
                  <input type="checkbox" class="pull-right" checked />
                </label>
                <p>
                  Other sets of options are available
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Expose author name in posts
                  <input type="checkbox" class="pull-right" checked />
                </label>
                <p>
                  Allow the user to show his name in blog posts
                </p>
              </div><!-- /.form-group -->

              <h3 class="control-sidebar-heading">Chat Settings</h3>

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Show me as online
                  <input type="checkbox" class="pull-right" checked />
                </label>                
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Turn off notifications
                  <input type="checkbox" class="pull-right" />
                </label>                
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Delete chat history
                  <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                </label>                
              </div><!-- /.form-group -->
            </form>
          </div><!-- /.tab-pane -->
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class='control-sidebar-bg'>
	  </div>
    </div><!-- ./wrapper -->
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
