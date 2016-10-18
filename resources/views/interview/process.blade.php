<div class = 'ui top attached primary orange segment'>
    <h3 class="ui header">
      <i class="question icon"></i>
      <div class="content">
        Questions
        <div class="sub header"></div>
      </div>
    </h3>
    <div class = 'ui warning message'>
        You are required to click the 'Save' button for each of the questions separately. Once your answer is successfully saved, the title of question will turn green.</b>
    </div>
</div>
<div class = 'ui stacked attached secondary segment'>
	<div class="ui styled fluid accordion form">
		<?php foreach ($answers as $answer) { ?>
			<div class="positive title" id = 'ansTitle{{$answer->id}}' style="color:black">
				<i class="dropdown icon"></i>
				{{$answer->questions->question}}
			</div>
			<div class="content" id = 'ansContent{{$answer->id}}'>
				<div class = 'ui field'>
					<textarea id = 'answer{{$answer->id}}' rows='4'></textarea>
				</div>
				<button class="ui left labeled icon green button small saveanswer" answer = '{{$answer->id}}'>
				  <i class="save icon"></i>
				  Save
				</button>
			</div>
		<?php } ?>
	</div>
</div>
<div class = 'ui bottom attached tertiary segment'>
	<p>After you have completed all the questions, click on the button below to submit your answer and close this questionnnaire session!</p>
	<button class="ui left labeled icon orange small button" id = 'endQuestionnaire'>
		  <i class="right arrow icon"></i>
		  Submit
	</button>
</div>
<div class="ui modal" id = 'unansweredMessage'>
  <i class="close icon"></i>
  <div class="header">
    <i class = 'warning red icon'></i>Unanswered Questions
  </div>
  <div class="image content">
    <div class="description">
      <p>You have not answered all of the questions. Kinldy complete them before pressing the Submit button.</p>
    </div>
  </div>
  <div class="actions">
    <div class="ui positive right labeled icon button">
      Ok
      <i class="checkmark icon"></i>
    </div>
  </div>
</div>

<script>
$('.ui.accordion')
  .accordion()
;

$('#ansTitle' + (+<?php echo $answers[0]->id?>)).addClass('active');
$('#ansContent' + (+<?php echo $answers[0]->id?>)).addClass('active');
$('#answer' + (+<?php echo $answers[0]->id?>)).focus();

$('.button.saveanswer').click(function(){
	var thisq = $(this).attr('answer');
	var answer = $('#answer' + thisq).val();

	if (answer.length < 1) {
		$('#answer' + thisq).notify('The answer cannot be blank!');
	} else {
		$.post( "{{ URL::to('/')}}" + '/interview/save', { _token : '{{csrf_token()}}', answerId:thisq, answer:answer})
		  .done(function( data ) {
		    if (data == 1) {
		        $('#ansTitle' + thisq).css('background-color','#c0eac0');
		        $('#ansTitle' + thisq).removeClass('active');
		        $('#ansContent' + thisq).removeClass('active');
		        $('#ansTitle' + (+thisq + 1)).addClass('active');
		        $('#ansContent' + (+thisq + 1)).addClass('active');
		        $('#answer' + (+thisq + 1)).focus();
		    } else {
		        alert('Failed to Save!');
		    }
		}); 
	}
})

$('#endQuestionnaire').click(function(){
	$.get("{{URL::to('/')}}" + '/interview/check/' + '<?php echo $answers[0]->candidateId; ?>').done(function(data) {
		if (data == 1) {
			$('#unansweredMessage').modal('show');
		} else {
			contentloader('thanks', '#mainQSegment',function(){
				
			});
		}
	});
});
</script>
