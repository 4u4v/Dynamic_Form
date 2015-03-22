<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Dynamic Form Design</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Dynamic Form Design">

    <link href="<?php echo base_url()?>public/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>public/form/css/custom.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
<body>
    <div class="container">
      <div class="row clearfix">
            <!-- Components -->
        <div class="col-md-6">
          <h2>Drag & Drop components</h2>
          <hr>
          <div class="tabbable">
            <ul class="nav nav-tabs" id="formtabs">
              <!-- Tab nav -->
            </ul>
            <form class="form-horizontal" id="components" role="form">
              <fieldset>
                <div class="tab-content">
                  <!-- Tabs of snippets go here -->
                </div>
              </fieldset>
            </form>
          </div>
        </div>
        <!-- / Components -->
        <!-- Building Form. -->
        <div class="col-md-6">
          <div class="clearfix">
            <h2>Design Your Form</h2>
            <hr>
            <div id="build">
              <form id="target" class="form-horizontal">
              </form>
            </div>
            <hr>
            <div id="code">
              <form id="form-code" class="form-code" action="<?php echo base_url()?>forms/home/create_form" method="post">
                  <input name="form_code" type="hidden" id="render" />
                  <label class="control-label" for="author">Author:</label>
                  <input class="input-medium" type="text" name="author">
                  <button id="save" class="btn btn-info">Save Form</button>
                  <button id="cancel" class="btn btn-danger">Cancel</button>
              </form>
            </div>
            <hr>
            <ul>
            <?php foreach($forms_list as $row) : ?>
              <li>
            <a target="_blank" href="<?php echo site_url('forms/home/my_form').'?form_id='.$row['_id'];?>"><?php echo "form-".$row['_id'] ?></a>
             | <?php echo $row['author'] ?> | <?php echo $row['create_time'] ?> | <a target="_blank" href="<?php echo site_url('forms/home/form_items').'?form_id='.$row['_id'];?>"><?php echo "form_items"; ?></a>
              </li>
            <?php endforeach; ?>
            </ul>
            <hr>
              <form class="form" action="<?php echo base_url()?>forms/home/search_form" method="get">
              <label class="control-label" for="search_form">Search form:</label>
              <select class="" name="select_option">
                <option value="form_id">Form Id</option>
                <option value="author">Author</option>
                <option value="form_code">Form Code</option>
              </select>
              <input class="input-medium" type="text" name="keyword">
              <button id="save" class="btn btn-info">Search form</button>
              </form>
            <hr>
            <ul>            
            <?php foreach($items_list as $row) : ?>
              <li>
            <a target="_blank" href="<?php echo site_url('forms/home/my_item').'?item_id='.$row['_id'];?>"><?php echo "item-".$row['_id'] ?></a>
             =&gt; <?php echo "form-".$row[0] ?>
              </li>
            <?php endforeach; ?>
            </ul>
            <hr>
              <form class="form" action="<?php echo base_url()?>forms/home/search_item" method="get">
              <label class="control-label" for="search_item">Search item:</label>
              <select class="" name="select_option">
                <option value="form_id">Form Id</option>
                <option value="item_id">Item Id</option>
                <option value="component">Component</option>
              </select>
              <input class="input-medium" type="text" name="keyword">
              <button id="save" class="btn btn-info">Search item</button>
              </form>
          </div>
        </div>
        <!-- / Building Form. -->
      </div>
    </div> <!-- /container -->

    <script data-main="<?php echo base_url()?>public/form/js/main-built.js" src="<?php echo base_url()?>public/form/js/require.js" ></script>
  </body>
</html>