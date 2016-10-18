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
                        Interview<br>Candidates
                    </h2>
                </div>
            </div>
        </div>
        <div class = 'ui top attached primary orange segment'>
            <h3 class="ui header">
              <i class="list icon"></i>
              <div class="content">
                List of Candidates
                <div class="sub header"></div>
              </div>
            </h3>
            <div class = 'ui warning message'>
               Click on the view button to view the answers from candidates.</b>
            </div>
        </div>
        <div class = 'ui stacked attached secondary segment'>
            <table class = 'ui table'>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Email Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($candidates as $candidate) { ?>
                        <tr>
                            <td>{{$candidate->firstName}}</td>
                            <td>{{$candidate->position}}</td>
                            <td>{{$candidate->email}}</td>
                            <td>
                                <button class = 'ui small button viewcandidate' candidate = '{{$candidate->id}}'>View</button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <script>
            $('.viewcandidate').click(function(){
                var candidate = $(this).attr('candidate');
                window.location.href = "<?php echo URL::to('/') ?>" + '/admin/results/' + candidate;
            })
        </script>
    </body>
</html>



