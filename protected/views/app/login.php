<?php
/* @var $this AppController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . ' - Login';
?>
<div class="row" style="margin-top: 45px">
    <div class="medium-6 medium-centered large-4 large-centered columns">
        <div class="block">
            <div class="top-bar block-header">
                <ul class="title-area">
                    <li class="name" style="margin: 8px 15px"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/logo-login.png" /></li>
                </ul>
            </div>
            <div class="block-content">
                <div class="form">
                    <?php
                    $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'login-form',
                        //'enableClientValidation' => true,
                        'clientOptions' => array(
                            'validateOnSubmit' => true,
                            'inputContainer' => '.input'
                        ),
                    ));
                    ?>
                    <div class="row">
                        <div class="small-12 columns">
                            <?php //echo $form->labelEx($model, 'username');  ?>
                            <?php echo $form->textField($model, 'username', array('placeholder' => 'Nama User', 'accesskey' => 'n')); ?>
                            <?php echo $form->error($model, 'username', array('class' => 'error')); ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="small-12 columns">
                            <?php //echo $form->labelEx($model, 'password');  ?>
                            <?php echo $form->passwordField($model, 'password', array('placeholder' => 'Password', 'accesskey' => 'p')); ?>
                            <?php echo $form->error($model, 'password', array('class' => 'error')); ?>
                        </div>
                    </div>
                    <?php
                    /*
                      <div class="row rememberMe">
                      <div class="small-12 columns">
                      <?php echo $form->checkBox($model, 'rememberMe'); ?>
                      <?php echo $form->label($model, 'rememberMe'); ?>
                      <?php echo $form->error($model, 'rememberMe'); ?>
                      </div>
                      </div>
                     */
                    ?>
                    <div class="row">
                        <div class="small-12 columns">
                            <?php echo CHtml::submitButton('Login', array('class' => 'tiny bigfont button small-12')); ?>
                        </div>
                    </div>
                    <?php $this->endWidget(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    $(document).ready(function() {
        $("#LoginForm_username").focus();
    });
</script>