<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo L('title'); ?></title>
    </head>
    <body>
    <ul>
        <?php var_dump($forms_list); ?>
            <?php foreach($forms_list as $row) : ?>
              <li>
             <a target="_blank" href="<?php echo site_url('forms/home/my_form').'?id='.$row['_id'];?>"><?php echo "form".$row['_id'] ?></a>
             | <?php echo $row['author'] ?> | <?php echo $row['create_time'] ?>
              </li>
            <?php endforeach; ?>
            </ul>    
    </body>
</html>
