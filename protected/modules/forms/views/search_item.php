<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Search Result</title>
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
<h3>Search Result:</h3>
<?php foreach($result_list as $row) : ?>
<li>
Item: <a target="_blank" href="<?php echo site_url('forms/home/my_item').'?item_id='.$row['_id'];?>"><?php echo $row['_id'] ?></a> => 
Form: <a target="_blank" href="<?php echo site_url('forms/home/my_form').'?form_id='.$row[0];?>"><?php echo $row[0] ?></a>
</li>
<?php endforeach; ?>    

<br>
</div>
</body>
</html>