<?php
require 'views/layouts/top.php';
?>
    <div class="container">
        <h2>Todo List</h2>
        <table class="table">
            <?php if (!empty($_SESSION)) {
                ?>
                <div class="alert alert-success">
                    <strong> <?php echo $_SESSION["success"] ?></strong>
                </div>
            <?php }
            if (isset($_SESSION)) {
                $_SESSION = [];
            }
            ?>
            <div>
                <a href="workAdd" class="btn btn-primary">Add</a>
                <a href="calendar" class="btn btn-default pull-right">Calendar Work</a>
            </div>
            <thead>
            <tr>
                <th>Work Name</th>
                <th>Stating Date</th>
                <th>Ending Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (!empty($works) && (count($works) > 0)) {
                foreach ($works as $work) {
                    ?>
                    <tr>
                        <td><?php echo $work->name ?></td>
                        <td><?php echo $work->start ?></td>
                        <td><?php echo $work->end ?></td>
                        <td><?php echo getStatus($work->start, $work->end) ?></td>
                        <td>
                            <a href="workEdit?id=<?php echo $work->id ?>" class="btn btn-warning">Edit</a>
                            <button data-url="workDelete?id=<?php echo $work->id ?>" data-toggle="modal"
                                    data-target="#delete" class="btn btn-danger">Delete
                            </button>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="4" class="text-center">Empty Data</td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
<?php require 'views/layouts/bottom.php' ?>
<?php require 'views/layouts/delete-modal.php' ?>