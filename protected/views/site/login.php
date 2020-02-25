<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/sb-admin-2.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/cbc-theme.css" />
    <link href="css/login/sb-admin.css" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

</head>
<body class="bg-dark">
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'login-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
)); ?>



  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header bg-dark">
        <div class="profile-section bg " >
                    <div class="heading-title">
                        <h3 class="pulla-center"></h3>
                        <h4></h4>
                    </div>
                </div>
      </div>
      <div class="card-body">
        
          <div class="form-group">
            <div class="form-label-group">
            <?php echo $form->textField($vm->model,'username', array('tabindex'=>'1', 'class'=>'form-control', 'value'=>'', 'autocomplete'=>'off', 'placeholder'=>'Username', 'autofocus'=>'autofocus')); ?>
            <label for="LoginForm_username">Username</label>
            <?php echo $form->error($vm->model,'username'); ?>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
                <?php echo $form->passwordField($vm->model,'password', array('tabindex'=>'2', 'class'=>'form-control', 'value'=>'', 'placeholder'=>'Password')); ?>
              <label for="LoginForm_password">Password</label>
                <?php echo $form->error($vm->model,'password'); ?>
            </div>
          </div>
<!--           <div class="form-group">
            <?php if ($vm->model->scenario == 'withCaptcha' && CCaptcha::checkRequirements()): ?>
    
          <div class="form-group">
            <div class="form-label-group">
                <?php echo $form->textField($vm->model, 'verifyCode',array('class'=>'form-control',"placeholder" => 'Verification Code', "autocomplete"=>'off')); ?>
                <label for="LoginForm_verifyCode">Verify Code</label>
                <br/>
                <?php $this->widget('CCaptcha', array('id'=>'captahca_id','clickableImage' => false,'showRefreshButton'=>true,'captchaAction'=>'captcha')); ?>
          </div>
         </div>
     

        <?php echo $form->error($vm->model, 'verifyCode'); ?> <?php endif; ?>
          </div> -->
          <!-- <?php echo CHtml::submitButton('Login', array('tabindex'=>'4', 'class'=>'pull-right btn-dark btn btn-block login_btn', 'value'=>'Log In')); ?> -->
          <a class="pull-right btn-dark btn btn-block login_btn" tabindex = "4">Log In</a>
        
        <div class="text-center">
          <?php echo $form->hiddenField($vm->model,'ucrypt',array()); ?>
          <?php echo $form->hiddenField($vm->model,'pcrypt',array()); ?>
        </div>
      </div>
    </div>
  </div>

                                
<?php $this->endWidget(); ?>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/CryptoJS v3.1.2/rollups/aes.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/CryptoJS v3.1.2/rollups/pbkdf2.js"></script>

    

    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/granim.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/CryptoJS v3.1.2/rollups/aes.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/CryptoJS v3.1.2/rollups/pbkdf2.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-3.2.1.min.js"></script>
    
<style type="text/css">
    .bg
    {
        background-image: url(./images/finallogo.png) ;
        background-size: cover;
        background-size: 73%  100%;
        
    }
    .card
    {
        border: 1px solid #343a40;
    }

</style>>
    <script type="text/javascript">

        var u = $('#LoginForm_username');
        var p = $('#LoginForm_password');
        var v = $('#LoginForm_verifyCode');

        var uc = $('#LoginForm_ucrypt');
        var pc = $('#LoginForm_pcrypt');

        u.val('');
        p.val('');

        function encryptLogin()
        {

            var key = CryptoJS.enc.Hex.parse('<?php echo $vm->key_string; ?>');
            var iv = CryptoJS.enc.Hex.parse('<?php echo $vm->iv_string; ?>');

            var ue = CryptoJS.AES.encrypt(u.val(), key, {iv : iv});
            ue = ue.ciphertext.toString(CryptoJS.enc.Base64);
            var pe = CryptoJS.AES.encrypt(p.val(), key, {iv : iv});
            pe = pe.ciphertext.toString(CryptoJS.enc.Base64);

            uc.val(ue);
            pc.val(pe);

            u.val('');
            p.val('');

            $('#login-form').submit();
        }

        $(document).on('click','.login_btn',function() {
            encryptLogin();
        });

        u.keydown(function (event) {
            var keypressed = event.keyCode || event.which;
            if (keypressed == 13) {
                encryptLogin();
            }
        });

        p.keydown(function (event) {
            var keypressed = event.keyCode || event.which;
            if (keypressed == 13) {
                encryptLogin();
            }
        });
        v.keydown(function (event) {
            var keypressed = event.keyCode || event.which;
            if (keypressed == 13) {
                encryptLogin();
            }
        });

    </script>
</body>
</html>
