    <div class="form-group">
        {!! Form::label('placename', 'Place:', null, ['class' => 'form-label']) !!}
        {!! Form::text('placename', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('location', 'Location:', null, ['class' => 'form-label']) !!}
        {!! Form::text('location', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('active', 'Active:', null, ['class' => 'form-label']) !!}
        {!! Form::checkbox('active', null) !!}
    </div>
    <hr />



        @foreach ($cuisines as $cuisine)
        <div class="checkbox">
            <label>
                {!! Form::checkbox('cuisine[' . $cuisine->id . ']', $cuisine->id, $cuisineIDs->search($cuisine->id), ['class' => 'form-checkbox']) !!} {{ $cuisine->cuisinename }}
            </label>
        </div>
        @endforeach
    
    {!! Form::submit('Update Place', ['class' => 'btn btn-primary form-control']) !!}
