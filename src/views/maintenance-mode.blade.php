<html>
<head>
    <link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

    <style>
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            color: #B0BEC5;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .timer .number{
            font-size: 60px;
            color: #16a085;
            font-weight: bold;
        }
        .timer td{
            width: 200px;
            text-align: center;
        }
        .timer .text{
            color: #16a085;
            font-weight: bold;
        }

    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <h1>We will be back within</h1>
        <table class="timer">
            <tr class="number">
                <td class="day">0</td>
                <td class="hour">0</td>
                <td class="minute">0</td>
                <td class="second">0</td>
            </tr>
            <tr class="text">
                <td class="day">Day</td>
                <td class="hour">Hour</td>
                <td class="minute">Minute</td>
                <td class="second">Second</td>
            </tr>
        </table>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment-with-locales.min.js"></script>

<script>
    $(document).ready(function(){
        var up_time = moment("{{ config('maintenance-mode.up_time') }}");

        var timer_number_day = $(".timer .number .day");
        var timer_number_hour = $(".timer .number .hour");
        var timer_number_minute = $(".timer .number .minute");
        var timer_number_second = $(".timer .number .second");

        var timer_text_day = $(".timer .text .day");
        var timer_text_hour = $(".timer .text .hour");
        var timer_text_minute = $(".timer .text .minute");
        var timer_text_second = $(".timer .text .second");

        var interval = setInterval(function(){
            var current_time = moment();
            var duration = moment.duration(up_time.diff(current_time));

            var day = duration.days();
            var hour = duration.hours();
            var minute = duration.minutes();
            var second = duration.seconds();

            if(day <= 0 && hour <= 0 && minute <= 0 && second <= 0){
                clearInterval(interval);
                timer_number_day.text('0');
                timer_number_hour.text('0');
                timer_number_minute.text('0');
                timer_number_second.text('0');
                return;
            }

            timer_number_day.text(day);
            timer_number_hour.text(hour);
            timer_number_minute.text(minute);
            timer_number_second.text(second);

            if(day < 2) timer_text_day.text('day');
            else    timer_text_day.text('days');

            if(hour < 2) timer_text_hour.text('hour');
            else     timer_text_hour.text('hours');

            if(minute < 2) timer_text_minute.text('minute');
            else       timer_text_minute.text('minutes');

            if(second < 2) timer_text_second.text('second');
            else       timer_text_second.text('seconds');

        }, 1000);

    });
</script>


</body>
</html>
