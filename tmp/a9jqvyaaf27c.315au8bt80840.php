<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Admin</title>

        <!-- Bootstrap -->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- end of Bootstrap -->

    </head>

    <body>
        <div class="container">
            <div class="jumbotron">

                <table class="table table-striped">
                    <tr>
                        <!-- defines table headings -->
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>address</th>
                        <th>address2</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Zip</th>
                    </tr>

                    <?php foreach (($resultGetParticipants?:[]) as $each): ?>
                        <tr>
                            <td><?= ($each['participant_id']) ?></td>
                            <td><?= ($each['first_name']) ?> <?= ($each['last_name']) ?></td>
                            <td><?= ($each['email']) ?></td>
                            <td><?= ($each['phone']) ?></td>
                            <td><?= ($each['address_one']) ?></td>
                            <td><?= ($each['address_two']) ?></td>
                            <td><?= ($each['city']) ?></td>
                            <td><?= ($each['state']) ?></td>
                            <td><?= ($each['zip']) ?></td>
                            <!-- not used
                            <td>
                                <?php if ($each['premium']  == 1): ?>
                                    
                                        <input type="checkbox" checked>
                                    
                                    <?php else: ?>
                                        <input type="checkbox">
                                    
                                <?php endif; ?>
                            </td>
                            -->
                        </tr>
                    <?php endforeach; ?>
                </table>

            </div>
        </div>
    </body>
</html>