<?php if (isset($questions[0])) { ?>
<table class = 'ui table'>
    <thead>
        <tr>
            <th class = 'center aligned'>Order</th>
            <th class = 'left aligned'>Question</th>
            <th class = 'center aligned'>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($questions as $question) { ?>
            <tr>
                <td class = 'center aligned'>{{$question->num}}</td>
                <td>{{$question->question}}</td>
                <td class = 'center aligned'>
                    <div class = 'ui red tiny deletequestion button' questionid = '{{$question->id}}' >Delete</div>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php } else { ?>
    <div class = 'ui positive message'>
        There are no questions currently. Add one!
    </div>
<?php } ?>

<div class="ui messages modal">
  
  <div class="header" id = 'messagesheader'>
    
  </div>
  <div class="image content">
    <div class="description" id = 'messagescontent'>
      
    </div>
  </div>
  <div class="actions">
    <span id = 'ismsgmodalclose'>
      
    </span>
    <div class="ui positive right labeled icon button" id = 'messageok'>
      Ok
      <i class="checkmark icon"></i>
    </div>
  </div>
</div>
