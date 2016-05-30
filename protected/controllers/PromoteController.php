<?php

class PromoteController extends Controller
{
	public function actionCreate()
	{
		$model = new PromoteCodes();

        /*
     {
        "User":{"name":"John", "surname":"Doe", "gender":"Male", "username":"john_user", "email":"example@example.com"},
        "WifiArea":{"id":"123"},
        "Parameters"={"key": "value"},
        "Tenant"={}
    }
        */

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        $errors = array();
        //$promoteCodeParams = $_POST['PromoteCodes'];
        $promoteCodeParams = $_POST;
        if (!empty($promoteCodeParams['User'])) {
            $model->setAttribute("user_info", json_encode($promoteCodeParams['User']));
        } else {
            $errors[] = "Thiếu tham số 'User'";
        }
        if (isset($promoteCodeParams['Tenant'])) {
            $model->setAttribute("tenant_info", json_encode($promoteCodeParams['Tenant']));
        }
        if (isset($promoteCodeParams['WifiArea'])) {
            $model->setAttribute("wifi_area", json_encode($promoteCodeParams['WifiArea']));
        }
        if (isset($promoteCodeParams['Parameters'])) {
            $model->setAttribute("parameters", json_encode($promoteCodeParams['Parameters']));
        }
        if (isset($promoteCodeParams['Discount'])) {
            $model->setAttribute("discount", json_encode($promoteCodeParams['Discount']));
        } else {
            $model->setAttribute("discount", "20%");
        }



        if (count($errors) == 0) {
            $duplicate = true;
            $code = "";
            while ($duplicate) {
                $code = substr(md5(microtime()),rand(0,26),8);
                $oldRecord = PromoteCodes::model()->findAll(array(
                    'condition'=>'code=:code',
                    'params'=>array(':code'=>$code)
                ));
                if (count($oldRecord) == 0) {
                    $duplicate = false;
                    break;
                }
            }
            $model->setAttribute("code", $code);
            $model->setAttribute("created_at", date("Y/m/d H:i:s"));
            if(!$model->save()) {
                $errors[] = "Lưu dữ Promote code bị lỗi";
            }
        }

        $this->layout = 'promote';
        $this->render('create', array(
            'model' => $model,
            'errors' => $errors
        ));
	}

    public function actionNew()
    {
        $model = new PromoteCodes();

        $this->render('new', array(
            'model' => $model
        ));
    }

    public function actionView()
    {
        $code = "";
        if (isset($_GET['code'])) {
            $code = $_GET['code'];
        }
        $model = PromoteCodes::model()->findAll(array(
            'condition'=>'code=:code',
            'params'=>array(':code'=>$code)
        ));
        if (count($model) == 0) {
            $code = "";
        } else {
            $model = $model[0];
        }
        $this->render('view',array(
            'model'=>$model,
            'code'=>$code
        ));
    }

    public function loadModel($id)
    {
        $model = PromoteCodes::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }
}