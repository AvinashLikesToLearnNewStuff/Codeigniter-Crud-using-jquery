<!DOCTYPE html>
<html>

<head>
    <title>My Table</title>
    <!-- Add Tailwind CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.15/tailwind.min.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-3.6.4.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="overflow-hidden sm:rounded-lg">
            <table class="table-auto border-collapse w-full">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Code</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Discount</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Validity Start</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Validity End</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Edit</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Delete</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php foreach ($abc as $row) { ?>
                        <tr>
                            <td class="px-4 py-2 whitespace-nowrap"><?php echo $row['code']; ?></td>
                            <td class="px-4 py-2 whitespace-nowrap"><?php echo $row['discount']; ?></td>
                            <td class="px-4 py-2 whitespace-nowrap"><?php echo $row['validity_start']; ?></td>
                            <td class="px-4 py-2 whitespace-nowrap"><?php echo $row['validity_end']; ?></td>
                            <td class="px-4 py-2 whitespace-nowrap"><a href="<?php echo base_url() . "index.php/CouponController/edit/" . $row['id']; ?> ">Edit</a></td>
                            <td class="px-4 py-2  whitespace-nowrap"><a href="" id='submit' class="delete-btn">Delete</a></td>
                        </tr>
                    <?php   } ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.delete-btn').click(function() {
                $.post('<?php echo base_url(); ?>' + 'index.php/CouponController/delete/' +
                    '<?php echo $row['id']; ?>',
                    function(response) {
                        alert(response.message);
                    }, 'json'
                );
            });
        });
    </script>

</body>

</html>