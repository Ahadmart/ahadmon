<?php

class AppController extends PublicController {

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {

        if (!$this->allowIp(CHttpRequest::getUserHostAddress())) {
            throw new CHttpException(403, 'Akses ditolak - Anda tidak memiliki izin untuk mengakses halaman ini!');
        }

        if (Yii::app()->user->isGuest) {
            $this->redirect($this->createUrl('/app/login'));
        }
        else {
            $roles = AuthAssignment::model()->assignedList(Yii::app()->user->id);
            $this->render('index', array(
                'roles' => $roles
            ));
        }
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {

        if (!$this->allowIp(CHttpRequest::getUserHostAddress())) {
            throw new CHttpException(403, 'Akses ditolak - Anda tidak memiliki izin untuk mengakses halaman ini!');
        }

        $model = new LoginForm;

        // if it is ajax validation request
        /*
          if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
          echo CActiveForm::validate($model);
          Yii::app()->end();
          }
         */

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

}
