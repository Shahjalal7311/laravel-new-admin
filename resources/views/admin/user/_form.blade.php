@csrf
<!-- First Name Form Input -->
<div class="form-group @if ($errors->has('name')) has-error @endif">
    {!! Form::label('First Name', 'First Name') !!}
    {!! Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'First Name']) !!}
    @if ($errors->has('First Name')) <p class="help-block">{{ $errors->first('first_name') }}</p> @endif
</div>

<!-- First Name Form Input -->
<div class="form-group @if ($errors->has('name')) has-error @endif">
    {!! Form::label('Last Name', 'Last Name') !!}
    {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Last Name']) !!}
    @if ($errors->has('Last Name')) <p class="help-block">{{ $errors->first('last_name') }}</p> @endif
</div>

<!-- email Form Input -->
<div class="form-group @if ($errors->has('email')) has-error @endif">
    {!! Form::label('email', 'Email') !!}
    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
    @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
</div>

<!-- password Form Input -->
<div class="form-group @if ($errors->has('password')) has-error @endif">
    {!! Form::label('password', 'Password') !!}
    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
    @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
</div>

<!-- Roles Form Input -->
<div class="form-group @if ($errors->has('roles')) has-error @endif">
    {!! Form::label('roles[]', 'Roles') !!}
    {!! Form::select('roles[]', $roles, isset($user) ? $user->roles->pluck('id')->toArray() : null,  ['class' => 'form-control', 'multiple']) !!}
    @if ($errors->has('roles')) <p class="help-block">{{ $errors->first('roles') }}</p> @endif
</div>