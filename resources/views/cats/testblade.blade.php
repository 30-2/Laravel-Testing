{{ Form::open() }}


{{ Form::label('name', 'Your Name', array('class' => 'mylabel')) }}
{{ Form::text('first_name', 'Chuck', array('class' => 'field')) }}

{{ Form::password('secret', array('class' => 'field')) }}

{{ Form::close() }}