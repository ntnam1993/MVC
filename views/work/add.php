<?php require 'views/layouts/top.php' ?>
<div class="container">
    <h2>Add Work</h2>
    <form action="/workAdd" method="POST" class="form-add">
        <div class="form-group">
            <label for="email">Name Work:</label>
            <input type="text" name="name" class="form-control name">
        </div>
        <div class="form-group start">
            <label>Start Date:</label>
            <div class="col-sm-12">
                <div class="col-sm-2">
                    <select class="form-control col-sm-4 year" name="year-start">
                        <option disabled selected>Year</option>
                        <?php echo getList(1971, 2030) ?>
                    </select>
                </div>
                <div class="col-sm-2">
                    <select class="form-control col-sm-4 month" name="month-start">
                        <option disabled selected>Month</option>
                        <?php echo getList(1, 12) ?>
                    </select>
                </div>
                <div class="col-sm-2">
                    <select class="form-control col-sm-4 date" name="date-start">
                        <option disabled selected>Date</option>
                    </select>
                </div>
                <div class="col-sm-2">
                    <select class="form-control col-sm-4 hour" name="hour-start">
                        <option disabled selected>Hour</option>
                        <?php echo getList(1, 24) ?>
                    </select>
                </div>
                <div class="col-sm-2">
                    <select class="form-control col-sm-4 minute" name="minute-start">
                        <option disabled selected>Minute</option>
                        <?php echo getList(1, 60) ?>
                    </select>
                </div>
                <div class="col-sm-2">
                    <select class="form-control col-sm-4 second" name="second-start">
                        <option disabled selected>Second</option>
                        <?php echo getList(1, 60) ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group end">
            <label>End Date:</label>
            <div class="col-sm-12">
                <div class="col-sm-2">
                    <select class="form-control col-sm-4 year" name="year-end">
                        <option disabled selected>Year</option>
                        <?php echo getList(1971, 2030) ?>
                    </select>
                </div>
                <div class="col-sm-2">
                    <select class="form-control col-sm-4 month" name="month-end">
                        <option disabled selected>Month</option>
                        <?php echo getList(1, 12) ?>
                    </select>
                </div>
                <div class="col-sm-2">
                    <select class="form-control col-sm-4 date" name="date-end">
                        <option disabled selected>Date</option>
                    </select>
                </div>
                <div class="col-sm-2">
                    <select class="form-control col-sm-4 hour" name="hour-end">
                        <option disabled selected>Hour</option>
                        <?php echo getList(1, 12) ?>
                    </select>
                </div>
                <div class="col-sm-2">
                    <select class="form-control col-sm-4 minute" name="minute-end">
                        <option disabled selected>Minute</option>
                        <?php echo getList(1, 60) ?>
                    </select>
                </div>
                <div class="col-sm-2">
                    <select class="form-control col-sm-4 second" name="second-end">
                        <option disabled selected>Second</option>
                        <?php echo getList(1, 60) ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="alert alert-danger" style="display: none;">
            <strong></strong>
        </div>
        <div class="form-group text-center">
            <a href="/" class="btn btn-default">Cancle</a>
            <button type="submit" class="btn btn-primary submit">Submit</button>
        </div>
    </form>
</div>
<?php require 'views/layouts/bottom.php' ?>
