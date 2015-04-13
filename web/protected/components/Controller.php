<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
        
        protected $menuItem;
        
        public function init()
        {    
            if (!empty($_GET['language']))
                Yii::app()->language = $_GET['language'];
            Yii::app()->name = Yii::t('site', 'sitename');
            parent::init();
        }
        
        public function createMultilanguageReturnUrl($lang='en'){
            if (count($_GET)>0){
                $arr = $_GET;
                $arr['language']= $lang;
            }
            else 
                $arr = array('language'=>$lang);
            return $this->createUrl('', $arr);
        }

        protected function GetArray($modelName, $key, $value, $dbCriteria = null)
        {
            $data = array();
            $dataProvider = new CActiveDataProvider($modelName);
            if ($dbCriteria != null)
                $dataProvider->setCriteria($dbCriteria);
            foreach($dataProvider->getData() as $activeRecord)
            {
                $data[$activeRecord->getAttribute($key)] = $activeRecord->getAttribute($value);
            }
            return $data;
        }
}