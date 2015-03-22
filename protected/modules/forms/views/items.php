<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Submit data</title>
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
<p>Your Form Data was submitted successfully!</p>
</div>
<br>
<div class="form_frame">
<?php 
//echo "<pre>";
//print_r($items); 
//echo "</pre>";

$oid_arr = (array)$items['_id'];
?> 
<p>Your submit item_id is:<a href="<?php echo base_url().'forms/home/my_item?item_id='.$oid_arr['$id'];?>" target="_blank"><?php echo $oid_arr['$id']; ?></a>, please remember it used to find.</p>
</div>   
</div>
<br>
</body>
</html>