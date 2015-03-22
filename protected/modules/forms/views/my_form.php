<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>My Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="<?php echo base_url()?>public/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>public/form/css/custom.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
<body>
<div class="main">
<br>

<?php foreach($my_form as $row) : ?>

<div class="form_frame">
<?php echo $row['form_code'] ?>
</div>
<br>  
<div class="tip">
Author: <?php echo $row['author'] ?> | <?php echo $row['create_time'] ?>
</div>

<?php endforeach; ?>    

<br>

</div>
</body>
</html>