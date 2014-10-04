<?php

namespace demogorgorn\cssmap;

use demogorgorn\cssmap\CssMapWidgetAssets;
use Yii;
use yii\base\InvalidParamException;
use yii\base\Widget;
use yii\helpers\Html;
use yii\web\View;
use yii\helpers\Url;

/**
 * ServicesWidget
 * 
 * @author Oleg MARTEMJANOV <demogorgorn@gmail.com>
 */
class CssMapWidget extends Widget 
{
	/**
	 * @var array the HTML attributes for the widget container tag.
	 */
	public $options = [];

	public $items = [];

	public $loadingText = 'Loading...';
	
	/**
	 * Initializes the widget.
	 */
	public function init()
	{
		parent::init();
		if (!isset($this->options['id'])) {
			$this->options['id'] = 'map-continents';
		}
	}

	public function run()
	{

		CssMapWidgetAssets::register($this->view);

		echo Html::beginTag('div', $this->options) . "\n";
		echo Html::beginTag('ul', ['class' => 'continents']) . "\n";

		$i = 1;
        foreach($this->items as $item) 
		{
			if (!isset($item['title']))
				throw new InvalidParamException("Option 'title' is required!");

			$url = isset($item['url']) ? Url::to($item['url']) : '#';

			$output = Html::a($item['title'], $url);
			$class = 'c' . $i;

			echo Html::tag('li', $output, ['class' => $class]) . "\n";

			$i++;
		}
             
        echo Html::endTag('ul') . "\n";
        echo Html::endTag('div') . "\n";
		

        $this->registerScript();

	}

	protected function registerScript()
    {
        $view = $this->getView();

    	$view->registerJs("	$('#{$this->options['id']}').cssMap({size:650,loadingText:'{$this->loadingText}'});");
    }

}
?>


