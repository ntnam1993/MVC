<?php
require 'views/layouts/top.php';
?>
<div class="container">
    <h2>Calendar Work</h2>
    <br>
    <input type="hidden" class="works" value='<?php echo json_encode($works); ?>' data-count="<?php echo $count ?>">
    <div class="row">
        <div class="col-sm-7">
            <div id="calendarContainer"></div>
        </div>
        <div class="col-sm-2">
            <div id="organizerContainer"></div>
        </div>
    </div>
    <div class="col-sm-12 text-center back-calendar">
        <a href="/" class="btn btn-default">Back</a>
    </div>
</div>
<?php require 'views/layouts/bottom.php' ?>
<?php require 'views/layouts/delete-modal.php' ?>
<script>
    <?php require 'public/js/calendar.js'?>
</script>
