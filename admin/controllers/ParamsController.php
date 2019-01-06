<?php

namespace juraev\yii2dp\admin\controllers;

use Yii;
use juraev\yii2dp\admin\models\Params;
use juraev\yii2dp\admin\models\ParamsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use juraev\yii2dp\admin\form_factory\FormFactory;

/**
 * ParamsController implements the CRUD actions for Params model.
 */
class ParamsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Params models.
     * @return mixed
     */
    public function actionIndex()
    {
        $models = Params::find()->indexBy('id')->all();
//        echo "<h3><pre>";var_dump($models);die;
        if(Params::loadMultiple($models,Yii::$app->request->post()) && Params::validateMultiple($models)){
            foreach ($models as $model)
                $model->save(false);

            return $this->refresh();
        }
//        else{
//            echo "<h3><pre>";var_dump(Yii::$app->request->post());die;
//        }

        return $this->render('index', [
            'models' => $models,
        ]);
    }

    /**
     * Lists all Params models.
     * @return mixed
     */
    public function actionSave()
    {
        $models = Params::find()->indexBy('id')->all();
        Params::loadMultiple($models,Yii::$app->request->post());

        echo "<pre>";
        var_dump(Yii::$app->request->post(),$models);die;

        return $this->render('index', [
            'models' => $models,
        ]);
    }

    /**
     * Creates a new Params model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($type=false)
    {
        $model = new Params();
        if($type)
            $model->type = $type;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Params model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Params model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Params model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Params the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Params::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}