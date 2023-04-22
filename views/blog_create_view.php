<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Blog - CRUD Application</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/bootstrap.min.css' ?>">
</head>

<body>
    <div class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="" class="navbar-brand">CRUD Application</a>
            <hr class="my-2">
        </div>
    </div>
    <form name="create_blog_post" action="<?php echo base_url() . 'index.php/Blog_controller/edit/' . $blog['id'] ?>" method="post">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">
                            <input type="text" name="title" value="<?php echo set_value('title') ?>" class="form-control">
                            Blog Title
                        </label>
                        <?php echo form_error('name'); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="text" value="<?php echo set_value('description') ?>" name="description" class="form-control">
                        Description
                    </div>

                    <?php echo form_error('name'); ?>
                    <?php echo form_error('description'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <button class="btn btn-primary">
                            Create
                        </button>
                        <a href="<?php echo base_url() . 'index.php/Blog_controller/index'; ?>" class="btn btn-danger">
                            Cancel
                        </a>

                    </div>
                </div>
            </div>
        </div>
</body>

</form>

</html>