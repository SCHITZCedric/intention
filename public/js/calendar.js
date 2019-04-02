
(function($) {
    'use strict';
    $(function() {
        if ($('#calendar').length) {
            $('#calendar').fullCalendar({

                plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list'],
                locale: 'fr',

                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,basicWeek,basicDay,listMonth'
                },


                defaultDate: moment(),
                height: 600,
                navLinks: true, // can click day/week names to navigate views
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                events:[
                    {
                            title: 'All Day Event',
                            description: 'description for All Day Event',
                            start: '2019-04-01'
                          },
                          {
                            title: 'Long Event',
                            description: 'description for Long Event',
                            start: '2019-04-07',
                            end: '2019-04-10'
                          },
                          {
                            groupId: '999',
                            title: 'Repeating Event',
                            description: 'description for Repeating Event',
                            start: '2019-04-09'
                          },

                ],
                eventColor: '#621cbb',
                eventTextColor: '#ffffff'
            })
        }
    });
})(jQuery);
