<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Blog - CRUD Application</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/bootstrap.min.css' ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        body {
            padding-top: 70px;
            /* Set padding for the body to avoid overlapping with the navbar */
        }

        .navbar {
            position: fixed;
            /* Set the navbar to fixed position */
            top: 0;
            /* Set the navbar to the top of the page */
            width: 100%;
            /* Set the navbar width to 100% */
            z-index: 999;
            /* Set a high z-index to make sure the navbar is on top of everything */
        }
    </style>
</head>

<body>
    <a href="<?php echo base_url() . 'index.php/Blog_controller/create_blog' ?>" class='btn'>create blog</a>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">View Blog Application</a>
    </nav>
    <div class="container">
        <h3>List Blogs</h3>
        <hr class="my-2">
        <div id="headerMsg"></div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($blogs)) {
                            foreach ($blogs as $blog) { ?>
                                <tr>
                                    <td><?php echo $blog['id'] ?></td>
                                    <td><?php echo $blog['title'] ?></td>
                                    <td><?php echo $blog['description'] ?></td>
                                    <td><?php echo $blog['status'] ?></td>
                                    <td>
                                        <a href="<?php echo base_url() . 'index.php/Blog_controller/edit/' . $blog['id'] ?>">Edit</a>
                                    </td>
                                    <td>



                                        <!-- yahan se mai blog ka id le ke data-id me daal raha hu  -->
                                        <button class="delete-btn" data-id="<?php echo $blog['id']; ?>">Delete</button>






                                    </td>

                                </tr>
                            <?php }
                        } else { ?>
                            <tr>
                                <td colspan="6">Records not found</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        // jab document ready ho toh function chalao
        $(document).ready(function() {


            $('body').on('click', '.delete-btn', function() {
                //$.blockUI();
                $delete_box = confirm('Do you want to Delete');
                if ($delete_box) {

                    var blogid = $(this).attr('data-id');

                    $.post('<?php echo base_url(); ?>' + 'index.php/blog_controller/ajax_delete', {
                            blogid: blogid,
                        },
                        function(response) {
                            $('#headerMsg').empty();
                            $("html, body").animate({
                                scrollTop: 0
                            }, "slow");
                            if (response.status == 200) {
                                $('#headerMsg').empty();
                                $('#headerMsg').html("<div class='alert alert-success  '><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
                                $("#headerMsg").fadeTo(2000, 500).slideUp(500, function() {
                                    $('#headerMsg').empty();
                                    window.location.reload();
                                });

                            } else {
                                $('#headerMsg').empty();
                                $('#headerMsg').html("<div class='alert alert-danger  '><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
                                $("#headerMsg").fadeTo(2000, 500).slideUp(500, function() {
                                    $('#headerMsg').empty();
                                });
                            }

                        }, 'json');

                } else {
                    return false;
                }

            });

        });
    </script>
</body>

</html>