<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Form Items</title>
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
<div class="tip">
FormId: <a target="_blank" href="<?php echo base_url()?>forms/home/my_form?form_id=<?php echo $row['_id'] ?>"><?php echo $row['_id'] ?></a> | Author: <?php echo $row['author'] ?> | <?php echo $row['create_time'] ?>
</div>
<?php endforeach; ?>  
<br>
<?php if (empty($form_items)) {
    echo "Sorry, The item is empty, please submit the form...";
} else {
?>

<table class="table table-bordered">
   <caption>Form Items</caption>
   <thead>
<tr>
<?php        
    foreach($form_items[0] as $k=>$v){ 
        echo "<td>".$k."</td>"; 
    }
?>
</tr>    
   </thead>
   <tbody>
<?php
foreach($form_items as $items_array)
{ 
?>    
      <tr>
<?php        
    foreach($items_array as $value){ 
        echo "<td>".$value."</td>"; 
    }
?>
      </tr>
<?php
}
?>
   </tbody>
</table>
<?php 
    } 
?>
<br>

</div>
</body>
</html>