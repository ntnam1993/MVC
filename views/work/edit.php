<?php require 'views/layouts/top.php' ?>
<div class="container">
    <h2>Edit Work</h2>
    <form action="/workEdit" method="POST" class="form-edit">
        <input type="hidden" name="id" value="<?php echo !empty($data) ? $data['id'] : '' ?>">
        <div class="form-group">
            <label for="email">Name Work:</label>
            <input type="text" name="name" class="form-control name" value="<?php echo $data['name'] ?>">
        </div>
        <div class="form-group start">
            <label>Start Date:</label>
            <div class="col-sm-12">
                <div class="col-sm-2">
                    <select class="form-control col-sm-4 year" name="year-start">
                        <option disabled selected>Year</option>
                        <?php echo getList(1971, 2030, $data['year-start']) ?>
                    </select>
                </div>
                <div class="col-sm-2">
                    <select class="form-control col-sm-4 month" name="month-start">
                        <option disabled selected>Month</option>
                        <?php echo getList(1, 12, $data['month-start']) ?>
                    </select>
                </div>
                <div class="col-sm-2">
                    <select class="form-control col-sm-4 date" name="date-start">
                        <input type="hidden" class="date-start" data-month="<?php echo $data['month-start'] ?>"
                               data-date="<?php echo $data['date-start'] ?>"
                               data-year="<?php echo $data['year-start'] ?>">
                    </select>
                </div>
                <div class="col-sm-2">
                    <select class="form-control col-sm-4 hour" name="hour-start">
                        <option disabled selected>Hour</option>
                        <?php echo getList(1, 24, $data['hour-start']) ?>
                    </select>
                </div>
                <div class="col-sm-2">
                    <select class="form-control col-sm-4 minute" name="minute-start">
                        <option disabled selected>Minute</option>
                        <?php echo getList(1, 60, $data['minute-start']) ?>
                    </select>
                </div>
                <div class="col-sm-2">
                    <select class="form-control col-sm-4 second" name="second-start">
                        <option disabled selected>Second</option>
                        <?php echo getList(1, 60, $data['second-start']) ?>
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
                        <?php echo getList(1971, 2030, $data['year-end']) ?>
                    </select>
                </div>
                <div class="col-sm-2">
                    <select class="form-control col-sm-4 month" name="month-end">
                        <option disabled selected>Month</option>
                        <?php echo getList(1, 12, $data['month-end']) ?>
                    </select>
                </div>
                <div class="col-sm-2">
                    <select class="form-control col-sm-4 date" name="date-end">
                        <input type="hidden" class="date-end" data-month="<?php echo $data['month-end'] ?>"
                               data-date="<?php echo $data['date-end'] ?>" data-year="<?php echo $data['year-end'] ?>">
                    </select>
                </div>
                <div class="col-sm-2">
                    <select class="form-control col-sm-4 hour" name="hour-end">
                        <option disabled selected>Hour</option>
                        <?php echo getList(1, 12, $data['hour-end']) ?>
                    </select>
                </div>
                <div class="col-sm-2">
                    <select class="form-control col-sm-4 minute" name="minute-end">
                        <option disabled selected>Minute</option>
                        <?php echo getList(1, 60, $data['minute-end']) ?>
                    </select>
                </div>
                <div class="col-sm-2">
                    <select class="form-control col-sm-4 second" name="second-end">
                        <option disabled selected>Second</option>
                        <?php echo getList(1, 60, $data['second-end']) ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="alert alert-danger" style="display: none;">
            <strong></strong>
        </div>
        <div class="form-group text-center">
            <a href="/" class="btn btn-default">Cancle</a>
            <button type="submit" class="btn btn-primary submit">Update</button>
        </div>
    </form>
</div>
<?php require 'views/layouts/bottom.php' ?>
