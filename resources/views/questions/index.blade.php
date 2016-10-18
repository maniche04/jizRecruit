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
        <script type="text/javascript" src="{{ URL::asset('js/notify.min.js') }}"></script>
        <link rel="stylesheet" href="{{ URL::asset('sui/semantic.min.css') }}" />
     <!--    <link rel="stylesheet" href="{{ URL::asset('fonts/fonts.css') }}" /> -->

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Lato', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
                padding:3px;
            }

            {

            }
        </style>
    </head>
    <body>
        <div class = 'ui stacked inverted blue segment'>
            Jizan Perfumes LLC - Questionnaire
        </div>
        <div class = 'ui grid'>
            <div class = 'ui ten wide column' id = 'questionslist'>
                
            </div>
            <div class = 'ui six wide column'>
                <div class = 'ui top attached green segment'>Add New</div>
                <div class = 'ui bottom attached secondary segment form'>
                    <div class = 'ui field'>
                        <input id = 'questionnum' type="number" name="num" placeholder = "Enter the Priority">
                    </div>
                    <div class = 'ui field'>
                        <input id = 'questiontext' type="text" name="question" placeholder = "Enter the Question Here!">
                    </div>
                    <div class = 'ui green button' id = 'savequestion'>Save</div>
                </div>
            </div>
        </div>
    </body>
    <script>

        $(document).ready(function () {
          var contentloader = function (link, target, callback) {
                      var dimmer = $(target).html();
                      $(target).html(dimmer);            
                      $.get('<?php echo URL::to('/');?>' + "/" + link , function(data){      
                          $(target).html(data);
                          //$('.pagedata.active.dimmer').removeClass('active');
                          var messagecallback = function() {
                                //nothing here
                              }

                          $('#messageok').click(function(){
                              messagecallback();
                          })

                          $('.button.deletequestion').click(function(){
                               var thisquestion = $(this).attr('questionid');
                               messagecallback = function(){
                                $.get( '<?php echo URL::to('/');?>' + '/question/delete/' + thisquestion)
                                  .done(function( data ) {
                                    if (data == 1) {
                                      loadQuestions();
                                    } else {
                                      alert('Could not delete the question!');
                                    }
                                }); 
                              }

                            $('#ismsgmodalclose').html("<div class='ui negative right labeled icon blue button'>Cancel<i class='ban icon'></i></div>");
                            $('#messagesheader').html('<i class = "large warning triangle red icon"></i>Confirmation Required!'); 
                            $('#messagescontent').html('<p style="color:red;font-weight:700;font-size:1.1em">This will delete the question from the System.<br><br>THIS ACTION CANNOT BE UNDONE!</p>');
                            $('.messages.modal').modal('show');
                          })
                     });
                  }

                  var loadQuestions = function(){
                    contentloader('question/all','#questionslist');
                  };

                  loadQuestions();

                  $('#savequestion').click(function(){
                      var num = $('#questionnum').val();
                      var text = $('#questiontext').val();

                      if (num.length < 1) {
                          $('#questionnum').notify("Priority has to be defined!");
                      } else if (text.length < 0) { 
                          $('#questiontext').notify("Question cannot be blank!");
                      } else {
                          $.post( "{{ URL::to('/')}}" + '/question/save', { _token : '{{csrf_token()}}', questionnum:num, questiontext:text})
                            .done(function( data ) {
                              $('#questionnum').val(+num + 10);
                              $('#questiontext').val('');
                              loadQuestions();
                              $('#questiontext').focus();
                          }); 
                      }
                  });
        });

        
    </script>
</html>
