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
        <div class = 'ui basic segment' id = 'mainQSegment'>
            <div class = 'ui top attached primary orange segment'>
                <h3 class="ui header">
                  <i class="info icon"></i>
                  <div class="content">
                    Basic Information
                    <div class="sub header"></div>
                  </div>
                </h3>
                <div class = 'ui warning message'>
                    Please provide the following details to proceed with the Interview Questionnaire!
                </div>
            </div>
            <div class = 'ui stacked bottom attached secondary segment'>
                <div class = 'ui form'>
                    <div class = 'ui two fields'>
                        <div class = 'ui field'>
                            <label>Full Name</label>
                            <input type="text" name="firstName" id = "firstName">
                        </div>
                        <div class = 'ui field'>
                            <label>Position Applied</label>
                            <input type="text" name="position" id = "position">
                        </div>
                    </div>
                    <div class = 'ui field'>
                        <label>Email Address</label>
                        <input type="text" name="email" id = "email">
                    </div>
                    <button class="ui left labeled icon green small button" id = 'saveCandidate'>
                      <i class="right arrow icon"></i>
                      Start Questionnaire
                    </button>
                </div>
            </div>
        </div>
        <script>
        $('#saveCandidate').click(function(){
            var name = $('#firstName').val();
            var position = $('#position').val();
            var email = $('#email').val();

            if (name.length < 1) {
                $('#firstName').notify("First Name has to be defined!");
            } else if (position.length < 0) { 
                $('#position').notify("Position cannot be blank!");
            } else if (email.length < 1) {
                $('#email').notify("Email Address cannot be blank!");
            } else {
                $.post( "{{ URL::to('/')}}" + '/candidate/save', { _token : '{{csrf_token()}}', firstName:name, position:position, email:email})
                  .done(function( data ) {
                    if (data >= 1) {
                        contentloader('interview/' + data, '#mainQSegment',function(){

                        });
                    } else {
                        alert('Failed to Save!');
                    }
                }); 
            }
        });

        var contentloader = function (link, target, callback) {
                    var dimmer = $(target).html();
                    $(target).html(dimmer);            
                    $.get('<?php echo URL::to('/');?>' + "/" + link , function(data){      
                        $(target).html(data);
                        //$('.pagedata.active.dimmer').removeClass('active');
                        callback();
            })};
        </script>
    </body>
</html>
