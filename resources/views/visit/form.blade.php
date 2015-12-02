{!! Form::label('place', 'Location:', null, ['class' => 'form-label']) !!}
{!! Form::select('place_id', [null => 'Choose a Place'] + $places, $visit->place->id) !!}
{!! Form::submit('Choose', ['class' => 'btn btn-primary form-control']) !!}
