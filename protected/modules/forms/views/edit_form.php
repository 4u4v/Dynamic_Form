<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Edit Form</title>
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
              <form id="form-code" class="form-code" action="<?php echo base_url()?>forms/home/update_form" method="post">
                  <input name="form_code" type="hidden" id="render" value="" />
                  <button id="save" class="btn btn-info">Update Form</button>
                  <button id="cancel" class="btn btn-danger">Cancel and Back</button>
              </form>
            </div>

            <hr>
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
        </div>
        <!-- / Building Form. -->
      </div>
    </div> <!-- /container -->

    <script data-main="<?php echo base_url()?>public/form/js/main-built.js" src="<?php echo base_url()?>public/form/js/require.js" ></script>
  </body>
</html>