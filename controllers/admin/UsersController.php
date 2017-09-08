<?php

namespace app\controllers\admin;

use Yii;
use app\models\Users;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UsersController implements the CRUD actions for Users model.
 */
class UsersController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all Users models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(!Yii::$app->user->isGuest){
		
			if(Yii::$app->user->identity->adminGroup == 'superadmin'){  
		
				$this->layout = "superadmin";
				
				$dataProvider = new ActiveDataProvider([
					'query' => Users::find(),
				]);

				return $this->render('index', [
					'dataProvider' => $dataProvider,
				]);
				
			}
			else{
			  throw new NotFoundHttpException('The requested page does not exist.');
			}	
		}	
		else{
		  throw new NotFoundHttpException('The requested page does not exist.');
		}
		
		
        /*if(!Yii::$app->user->isGuest){
		
			if(Yii::$app->user->identity->adminGroup == 'superadmin'){  
		
        
				$dataProvider = new ActiveDataProvider([
					'query' => Users::find(),
				]);

				return $this->render('index', [
					'dataProvider' => $dataProvider,
				]);
				
			}
			else{
			  throw new NotFoundHttpException('The requested page does not exist.');
			}
		}	
		else{
		  throw new NotFoundHttpException('The requested page does not exist.');
		}*/
    }

    /**
     * Displays a single Users model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        if(!Yii::$app->user->isGuest){
		
			if(Yii::$app->user->identity->adminGroup == 'superadmin'){  
		
				$this->layout = "superadmin";
				
				return $this->render('view', [
					'model' => $this->findModel($id),
				]);
			}
			else{
			  throw new NotFoundHttpException('The requested page does not exist.');
			}	
		}	
		else{
		  throw new NotFoundHttpException('The requested page does not exist.');
		}
    }

    /**
     * Creates a new Users model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		if(!Yii::$app->user->isGuest){
		
			if(Yii::$app->user->identity->adminGroup == 'superadmin'){  
		
				$this->layout = "superadmin";

				$model = new Users();

				if ($model->load(Yii::$app->request->post()) && $model->save()) {
					return $this->redirect(['view', 'id' => $model->id]);
				} else {
					return $this->render('create', [
						'model' => $model,
					]);
				}
			}
			else{
			  throw new NotFoundHttpException('The requested page does not exist.');
			}
		}	
		else{
		  throw new NotFoundHttpException('The requested page does not exist.');
		}
    }

    /**
     * Updates an existing Users model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
		if(!Yii::$app->user->isGuest){
		
			if(Yii::$app->user->identity->adminGroup == 'superadmin'){  
		
				$this->layout = "superadmin";
				
				$model = $this->findModel($id);

				if ($model->load(Yii::$app->request->post()) && $model->save()) {
					return $this->redirect(['view', 'id' => $model->id]);
				} else {
					return $this->render('update', [
						'model' => $model,
					]);
				}
			}
			else{
			  throw new NotFoundHttpException('The requested page does not exist.');
			}
		}	
		else{
		  throw new NotFoundHttpException('The requested page does not exist.');
		}
    }

    /**
     * Deletes an existing Users model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
		if(!Yii::$app->user->isGuest){
		
			if(Yii::$app->user->identity->adminGroup == 'superadmin'){  
				
				$this->layout = "superadmin";
		
				$this->findModel($id)->delete();

				return $this->redirect(['index']);
				
			}
			else{
			  throw new NotFoundHttpException('The requested page does not exist.');
			}
		}	
		else{
		  throw new NotFoundHttpException('The requested page does not exist.');
		}
    }

    /**
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
