<?php
/**
 * Assets class file
 *
 * @author Oleg Martemjanov
 */
namespace demogorgorn\uikit\cssmap;

use yii\web\AssetBundle;
use Yii;

class CssMapWidgetAssets extends AssetBundle
{
	public $sourcePath = '@map/assets';
	public $basePath = '@webroot/assets';
	public $js = [ 'jquery.cssmap.js',
	];
	public $css = [
		'map.css',
	];
	public $depends = [
		'yii\web\JqueryAsset',
	];

	public function init() {
		Yii::setAlias('@map', __DIR__);
		return parent::init();
	}
}