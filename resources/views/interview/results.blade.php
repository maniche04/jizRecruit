<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <script type="text/javascript" src="{{ URL::asset('js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('sui/semantic.min.js') }}"></script>
        <link rel="stylesheet" href="{{ URL::asset('sui/semantic.min.css') }}" />
        <script type="text/javascript" src="{{ URL::asset('js/notify.min.js') }}"></script>
        <link rel="stylesheet" href="{{ URL::asset('fonts/fonts.css') }}" />

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'PT Sans', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
                padding:3px;
                padding-top:0px;
                background-image: url('img/background.png');
                background-size:100% 100%;
            }

        </style>
    </head>
    <body>
        <div class = 'ui stacked segment'>
            <div class = 'ui grid'>
                <div class = 'ui eight wide column'>
                    <img class = 'ui small image' src="{{URL::asset('img/jizanlogo.png')}}">
                </div>
                <div class = 'ui eight wide right aligned column'>
                    <h2 class = 'ui orange header' style="padding-top:0px;padding-right:4px">
                        Interview<br>Questionnaire
                    </h2>
                </div>
            </div>
        </div>
        <div class = 'ui top attached primary orange segment'>
        	<h3 class = 'ui orange header'>
                {{$candidate[0]->firstName}} ({{$candidate[0]->position}})
            </h3>
        </div>
        <div class = 'ui stacked attached secondary segment'>
        	<div class="ui styled fluid accordion">
                <?php foreach ($answers as $answer) { ?>
                    <div class="title" style="color:black">
                        <i class="dropdown icon"></i>
                        {{$answer->questions->question}}
                    </div>
                    <div class="content">
                        <p>{{$answer->answer}}</p>
                    </div>
                <?php } ?>
        	</div>
        </div>
        <script>
        $('.ui.accordion')
          .accordion()
        ;
        </script>
    </body>
</html>


