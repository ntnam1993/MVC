// Basic config
$(document).ready(function () {
    // Basic config
    // var calendar = new Calendar("calendarContainer", "small",
    //     [ "Monday", 3 ],
    //     [ "#ffc107", "#ffa000", "#ffffff", "#ffecb3" ],
    // {
    //     days: [ "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday",  "Saturday" ],
    //         months: [ "January", "Feburary", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ],
    //     indicator: false,
    //     placeholder: "<span>Custom Placeholder</span>"
    // });
    var calendar = new Calendar("calendarContainer",         // HTML container ID,                                                                     Required
        "medium",                     // Size: (small, medium, large)                                                           Required
        ["Sunday", 3],               // [ Starting day, day abbreviation length ]                                              Required
        ["#ffc19c",                 // Primary Color                                                                          Required
            "#ff9e80",                 // Primary Dark Color                                                                     Required
            "#ffffff",                 // Text Color                                                                             Required
            "#ffe492"],               // Text Dark Color                                                                        Required
        { // Following is optional
            days: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
            months: ["January", "Feburary", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
            indicator: true,         // Day Event Indicator                                                                    Optional
            indicator_type: 1,       // Day Event Indicator Type (0 not to display num of events, 1 to display num of events)  Optional
            indicator_pos: "bottom", // Day Event Indicator Position (top, bottom)                                             Optional
            placeholder: "<span>Custom Placeholder</span>"
        });
    var data = createDummyData(JSON.parse($('.works').val()));

    function createDummyData(works) {
        var data = {};
        count = $('.works').data('count');
        for (var i = 0; i < count; i++) {
            var startString = works[i].start;
            var endString = works[i].end;
            var start = new Date(works[i].start);
            var end = new Date(works[i].end);

            //year
            if (!(start.getFullYear() in data)) {
                data[start.getFullYear()] = {};
            }
            if (!(end.getFullYear() in data)) {
                data[end.getFullYear()] = {};
            }
            //month
            if (!((start.getMonth() + 1) in data[start.getFullYear()]) && !((start.getMonth() + 1) in data[end.getFullYear()])) {
                data[start.getFullYear()][start.getMonth() + 1] = {};
            }
            if (!((end.getMonth() + 1) in data[end.getFullYear()]) && !((end.getMonth() + 1) in data[end.getFullYear()])) {
                data[end.getFullYear()][end.getMonth() + 1] = {};
            }
            //date
            if (!(start.getDate() in data[start.getFullYear()][start.getMonth() + 1]) && !(start.getDate() in data[end.getFullYear()][end.getMonth() + 1])) {
                data[start.getFullYear()][start.getMonth() + 1][start.getDate()] = [
                    {
                        startTime: startString,
                        endTime: endString,
                        text: works[i].name
                    }
                ];
            } else {
                if (!(start.getDate() in data[start.getFullYear()][start.getMonth() + 1])) {
                    data[start.getFullYear()][start.getMonth() + 1][end.getDate()].push([
                        {
                            startTime: startString,
                            endTime: endString,
                            text: works[i].name
                        }
                    ]);
                } else {
                    ata[start.getFullYear()][start.getMonth() + 1][start.getDate()].push([
                        {
                            startTime: startString,
                            endTime: endString,
                            text: works[i].name
                        }
                    ]);
                }
            }
            if (!(end.getDate() in data[end.getFullYear()][end.getMonth() + 1]) && !(end.getDate() in data[end.getFullYear()][end.getMonth() + 1])) {
                data[end.getFullYear()][end.getMonth() + 1][end.getDate()] = [
                    {
                        startTime: startString,
                        endTime: endString,
                        text: works[i].name
                    }
                ];
            } else {
                if (!(end.getDate() in data[end.getFullYear()][end.getMonth() + 1])) {
                    data[end.getFullYear()][end.getMonth() + 1][start.getDate()].push([
                        {
                            startTime: startString,
                            endTime: endString,
                            text: works[i].name
                        }
                    ]);
                } else {
                    data[end.getFullYear()][end.getMonth() + 1][end.getDate()].push([
                        {
                            startTime: startString,
                            endTime: endString,
                            text: works[i].name
                        }
                    ]);
                }
            }
        }
        return data;
    }

    _url = 'ajax-get-work';
    _method = 'get';
    _data = {};


    var organizer = new Organizer("organizerContainer", calendar, data);
    // Days Block click listener

});