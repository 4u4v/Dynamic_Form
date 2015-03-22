<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Form Update</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="<?php echo base_url()?>public/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>public/form/css/custom.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
<body>
<div class="main">

<div class="tip">
<p>Your form was update successfully!</p>
<p><?php echo anchor('forms/home', 'Go home...'); ?></p>
<p>The form you create as below:</p>
</div>
<br>
<div class="form_frame">
<?php 
echo $update_code;
?>
</div>
<br>
</div>

</body>
</html>