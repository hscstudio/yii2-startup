<?php
namespace hscstudio\startup;

use Yii;
use yii\bootstrap\BootstrapAsset;
use yii\bootstrap\BootstrapPluginAsset;
use yii\helpers\ArrayHelper;
/**
 * Description of Module
 *
 * @author Hafid Mukhlasin
 */
class Module extends \yii\base\Module implements \yii\base\BootstrapInterface
{	
    public function init()
    {
        parent::init();
    }

    /**
     * 
     * @param \yii\web\Application $app
     */
    public function bootstrap($app)
    {	
		$view = $app->getView();
		$pathMap=[];
		$pathMap['@app/views/layouts'] = '@hscstudio/startup/views/layouts';		
		$pathMap['@app/views/site'] = '@hscstudio/startup/views/site';		
		if (!empty($pathMap)) {
			$view->theme = Yii::createObject([
				'class' => 'yii\base\Theme',
				'pathMap' => $pathMap
			]);
		}
		
		$assets = $view->assetManager->publish('@hscstudio/startup/assets');		
		
    }
}
