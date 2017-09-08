<?php

namespace app\controllers\admin;

use Yii;
use app\models\Artists;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ArtistsController implements the CRUD actions for Artists model.
 */
class ArtistsController extends Controller
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
     * Lists all Artists models.
     * @return mixed
     */
    public function actionIndex()
    {

		if(!Yii::$app->user->isGuest){
		
			if(Yii::$app->user->identity->adminGroup == 'superadmin'){  
				
				$this->layout = "superadmin";
				
				$dataProvider = new ActiveDataProvider([
					'query' => Artists::find(),
				]);

				return $this->render('index', [
					'dataProvider' => $dataProvider,
				]);
			
		   }
		   
			if(Yii::$app->user->identity->adminGroup == 'admin'){  

				$this->layout = "admin";
				
				$dataProvider = new ActiveDataProvider([
					'query' => Artists::find(),
				]);

				return $this->render('index', [
					'dataProvider' => $dataProvider,
				]);
			
		   }
 
		}	
		else{
		  throw new NotFoundHttpException('The requested page does not exist.');
		}
		
		
		/*if(!Yii::$app->user->isGuest){
		
			if(Yii::$app->user->identity->adminGroup == 'superadmin' || Yii::$app->user->identity->adminGroup == 'admin'){  

				$dataProvider = new ActiveDataProvider([
					'query' => Artists::find(),
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
		}	*/
    }

    /**
     * Displays a single Artists model.
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
			
			if(Yii::$app->user->identity->adminGroup == 'admin'){  
		
				$this->layout = "admin";
				
				return $this->render('view', [
					'model' => $this->findModel($id),
				]);
        
			}
			
		}	
		else{
			 throw new NotFoundHttpException('The requested page does not exist.');
		}
		
       /*if(!Yii::$app->user->isGuest){
		
			if(Yii::$app->user->identity->adminGroup == 'superadmin' || Yii::$app->user->identity->adminGroup == 'admin'){  
		
        
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
		}*/	
      
    }

    /**
     * Creates a new Artists model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        
       if(!Yii::$app->user->isGuest){
		
			if(Yii::$app->user->identity->adminGroup == 'superadmin'){  
		
				$this->layout = "superadmin";
				
				$model = new Artists();

				if ($model->load(Yii::$app->request->post()) && $model->save()) {
					return $this->redirect(['view', 'id' => $model->id]);
				} else {
					return $this->render('create', [
						'model' => $model,
					]);
				}
				
			}
			
			if(Yii::$app->user->identity->adminGroup == 'admin'){  
		
				$this->layout = "admin";
				
				$model = new Artists();

				if ($model->load(Yii::$app->request->post()) && $model->save()) {
					return $this->redirect(['view', 'id' => $model->id]);
				} else {
					return $this->render('create', [
						'model' => $model,
					]);
				}
				
			}
			
		}	
		else{
			 throw new NotFoundHttpException('The requested page does not exist.');
		}
					
       /*if(!Yii::$app->user->isGuest){
		
			if(Yii::$app->user->identity->adminGroup == 'superadmin' || Yii::$app->user->identity->adminGroup == 'admin'){  
		
				$model = new Artists();

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
		}*/			
    }

    /**
     * Updates an existing Artists model.
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
			
			if(Yii::$app->user->identity->adminGroup == 'admin'){  
		
				$this->layout = "admin";
        
				$model = $this->findModel($id);

				if ($model->load(Yii::$app->request->post()) && $model->save()) {
					return $this->redirect(['view', 'id' => $model->id]);
				} else {
					return $this->render('update', [
						'model' => $model,
					]);
				}
				
			}
			
		}	
		else{
			 throw new NotFoundHttpException('The requested page does not exist.');
		}	
		
      /*  if(!Yii::$app->user->isGuest){
		
			if(Yii::$app->user->identity->adminGroup == 'superadmin' || Yii::$app->user->identity->adminGroup == 'admin'){  
		
        
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
		}*/	
    }

    /**
     * Deletes an existing Artists model.
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
			
			if(Yii::$app->user->identity->adminGroup == 'admin'){  

				$this->layout = "admin";
				
				$this->findModel($id)->delete();

				return $this->redirect(['index']);
			}
			
		}	
		else{
			 throw new NotFoundHttpException('The requested page does not exist.');
		}	
					
       /*if(!Yii::$app->user->isGuest){
		
			if(Yii::$app->user->identity->adminGroup == 'superadmin' || Yii::$app->user->identity->adminGroup == 'admin'){  

				$this->findModel($id)->delete();

				return $this->redirect(['index']);
		
		
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
     * Finds the Artists model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Artists the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Artists::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
