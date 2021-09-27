<?php
 
namespace app\controllers;
 
use app\models\Land;
use app\modules\admin\models\Managers;
use Yii;
use yii\web\Controller;
use yii\web\HttpException;
 
class LandController extends Controller
{
 
 
    public function actionMain()
    {
        $this->view->params['hideTitle'] = true;
        $this->layout = 'main';
        $model = Land::findByUrl('index');
        $managers = Managers::findById($model->id);
        if (empty($model))
            throw new HttpException('Страница не найдена.', 404);
 
        return $this->render('view', ['model' => $model,'managers' =>$managers]);
    }
 
    public function actionView($url)
    {
        $this->layout = 'main_land';
        $model = Land::findByUrl($url);
        $managers = Managers::findById($model->manager);
        if (empty($model))
            throw new HttpException('Страница не найдена.', 404);
 
        return $this->render('view', ['model' => $model, 'managers' =>$managers]);
    }
 
 
}
?>
