{{ Form::open(['route' => 'image.store', 'class' => 'form', 'files' => true]) }}
  <h2 class="form-signup-heading">Add a new image</h2>

  @if($errors->has())
    <ul>
      @foreach ($errors->all() as $error)
        <li class="alert alert-danger">{{ $error }}</li>
      @endforeach
    </ul>
  @endif

  <div class="form-group">
    {{ Form::label('title', 'Picture title') }}
    {{ Form::text('title', null, ['class'=>'form-control', 'placeholder' => 'Title']) }}
  </div>

  <div class="form-group">
    {{ Form::label('category', 'Category') }}
    {{ Form::select('category', ['current' => 'current', 'past' => 'past', 'installed' => 'installed'], null, ['class' => 'form-control']) }}
  </div>

  <div class="form-group">
    {{ Form::label('artwork', 'Select the image') }}
    {{ Form::file('artwork', ['class'=>'form-control']) }}
  </div>

  {{ Form::submit('Upload', ['class'=>'btn btn-primary']) }}
{{ Form::close() }}