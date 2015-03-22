<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>My Items</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="<?php echo base_url()?>public/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>public/form/css/custom.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
<body>
<div class="main">

<div class="form_frame">
<?php print($my_form[0]['form_code']);?>
</div>
<br>
<div class="tip">
<p>This <a href="<?php echo base_url()?>forms/home/my_form?form_id=<?php echo $form_id;?>">Form</a> , The Item data you submit as follow:</p>
</div>
<br>
<div class="form_frame">
<?php 
array_shift($my_items[0]); //remove form_id item
echo "<pre>";
print_r($my_items[0]); 
echo "</pre>";

foreach($my_items[0] as $k=>$v){ 
echo $k.": ".$v."<br />"; 
}
?> 

</div>   
</div>
<br>
</body>
</html>