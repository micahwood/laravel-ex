<div class="col-md-7 form-group">
  <h2>Order and rename your images</h2>
  {!! Form::open(['route' => ['image.update', $id], 'class' => 'form']) !!}
    <input type="hidden" name="_method" value="PUT">
      <ul class="list-group" id="sortable">
      @foreach($images as $image)
        <li class="list-group-item ui-state-default">
          <img src="{{ $image['thumbnail'] }}">
          <input type="text" name="title[]" value="{{ $image['title'] }}" class="form-control">
          <input type="hidden" name="url[]" value="{{ $image['url'] }}">
          <input type="hidden" name="thumbnail[]" value="{{ $image['thumbnail'] }}">
          <select name="categories[]">
            <option value="current" {{ $image['category'] == 'current' ? 'selected' : '' }}>Current</option>
            <option value="past" {{ $image['category'] == 'past' ? 'selected' : '' }}>Past</option>
            <option value="installed" {{ $image['category'] == 'installed' ? 'selected' : '' }}>Installed</option>
          </select>
          <span class="delete-icon glyphicon glyphicon-remove"></span>
        </li>
      @endforeach
      </ul>
    {!! Form::submit('Save Changes', ['class'=>'btn btn-primary']) !!}
  {!! Form::close() !!}
</div>
<script src="/packages/jquery-ui/js/jquery-ui-1.10.4.custom.min.js"></script>
<script>
  $("#sortable").sortable({placeholder: "list-group-item list-group-item-info"});
  $("#sortable").disableSelection();
  $(".delete-icon").on("click", function() { $(this).parent().remove(); });
</script>