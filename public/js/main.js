$(document).ready(function () {
    $('.table .btn-danger').on('click', function () {
        var url = $(this).data('url');
        $('a.btn-primary').attr('href', url);
    });
    $(".form-edit .date-start, .form-edit .date-end")
    $("select[name=month-start], select[name=year-start]").on('change', function () {
        var month = $("select[name=month-start]").val();
        var year = $("select[name=year-start]").val();
        if (month && year) {
            html = getDate(month, year);
            $("select[name=date-start]").html(html);
        }
    });
    $("select[name=month-end], select[name=year-end]").on('change', function () {
        var month = $("select[name=month-end]").val();
        var year = $("select[name=year-end]").val();
        if (month && year) {
            html = getDate(month, year);
            $("select[name=date-end]").html(html);
        }
    });
    autoloadEditDate();

    $(".form-add, .form-edit").validate({
        rules: {
            "name": {
                required: true,
                maxlength: 15
            },
            "year-start": {
                required: true,
            },
            "month-start": {
                required: true,
            },
            "date-start": {
                required: true,
            },
            "hour-start": {
                required: true,
            },
            "minute-start": {
                required: true,
            },
            "second-start": {
                required: true,
            },
            "year-end": {
                required: true,
            },
            "month-end": {
                required: true,
            },
            "date-end": {
                required: true,
            },
            "hour-end": {
                required: true,
            },
            "minute-end": {
                required: true,
            },
            "second-end": {
                required: true,
            }
        },
        messages: {
            "name": {
                required: "Please enter your name",
            },
            "year-start": {
                required: "Please enter year start !",
            },
            "month-start": {
                required: "Please enter month start !",
            },
            "date-start": {
                required: "Please enter date start !",
            },
            "hour-start": {
                required: "Please enter hour start !",
            },
            "minute-start": {
                required: "Please enter minute start !",
            },
            "second-start": {
                required: "Please enter second start !",
            },
            "year-end": {
                required: "Please enter year end !",
            },
            "month-end": {
                required: "Please enter month end !",
            },
            "date-end": {
                required: "Please enter date end !",
            },
            "hour-end": {
                required: "Please enter hour end !",
            },
            "minute-end": {
                required: "Please enter minute end !",
            },
            "second-end": {
                required: "Please enter second end !",
            }
        },
        submitHandler: function (form) {
            startTime = $("select[name=month-start]").val() + " " + $("select[name=date-start]").val() + " " + $("select[name=year-start]").val() + " " + $("select[name=hour-start]").val() + ":" + $("select[name=minute-start]").val() + ":" + $("select[name=second-start]").val();
            endTime = $("select[name=month-end]").val() + " " + $("select[name=date-end]").val() + " " + $("select[name=year-end]").val() + " " + $("select[name=hour-end]").val() + ":" + $("select[name=minute-end]").val() + ":" + $("select[name=second-end]").val();
            var start = new Date(startTime);
            var end = new Date(endTime);
            if (start.getTime() > end.getTime()) {
                $('.alert-danger').css('display', 'block');
                $('.alert-danger strong').html('<p>Please try again ! Start date must be less than end date .</p>');
            } else {
                form.submit();
            }
        }
    });
});

function autoloadEditDate() {
    $(".form-edit .date-start, .form-edit .date-end").each(function () {
        var _this = $(this);
        var month = _this.data('month');
        var year = _this.data('year');
        var date = _this.data('date');
        html = getDate(month, year, date);
        _this.parent().find('select').html(html);
    });
}

function getDate(month, year, key = null) {
    var html = (key != null) ? '' : '<option disabled>Date</option>';
    numberDate = new Date(year, month, 0).getDate();
    for (i = 1; i <= numberDate; i++) {
        selected = '';
        if ((key != null) && (key == i)) {
            selected = "selected";
        }
        html += "<option value='" + i + "'" + selected + ">" + i + "</option>";
    }
    return html;
}