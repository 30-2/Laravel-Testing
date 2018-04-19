@extends('layouts.app')

@section('content')
<div class="container">
	<!--
		TODO: To remove this flash message part as it is for demo
     
	-->
	
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">

                <!-- to do
                    use common name for header, label and button name -->
				<div class="panel-heading">@lang("common.label.create_staff")</div>

				<div class="panel-body">
					<form class="form-horizontal" method="POST" action="{{ route('store') }}">
						@if (session('max'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('max') }}
                            </div>
                        @endif

						{{ csrf_field() }}

                        <div class="form-group">
							<label for="name" class="col-md-4 control-label"></label>

							<div class="col-md-6">
            					<a href="../user">
                					<button type="button" class="" name="list">
                						@lang("common.label.staff_user_list")
                					</button>
            					</a>

							</div>
						</div>

						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
							<label for="name" class="col-md-4 control-label">@lang("common.label.name")</label>

							<div class="col-md-6">
								<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus> @if ($errors->has('name'))
								<span class="help-block">
									<strong>{{ $errors->first('name') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
							<label for="email" class="col-md-4 control-label">@lang("common.label.member_email_address")</label>

							<div class="col-md-6">
								<input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}"> @if ($errors->has('email'))
								<span class="help-block">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
							<label for="password" class="col-md-4 control-label">@lang("common.label.password")</label>

							<div class="col-md-6">
								<input id="password" type="password" class="form-control" name="password"> @if ($errors->has('password'))
								<span class="help-block">
									<strong>{{ $errors->first('password') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
							<label for="password-confirm" class="col-md-4 control-label">@lang("common.label.confirm_password")</label>

							<div class="col-md-6">
								<input id="password-confirm" type="password" class="form-control" name="password_confirmation"> @if ($errors->has('password_confirmation'))
								<span class="help-block">
									<strong>{{ $errors->first('password_confirmation') }}</strong>
								</span>
								@endif
							</div>
						</div>
						<input id="alert" type="hidden" class="" name="alert" value="@if (session('alert') == 'success'){!! session('alert') !!}@else{!! 'no' !!}@endif">
						<input id="status" type="hidden" class="" name="status" value="@if ($status){!! $status !!}@else{!! '' !!}@endif">
						<input id="username" type="hidden" class="" name="username" value="{{ Auth::user()->name }}">

						<div class="form-group">
							<label for="" class="col-md-4 control-label">@lang("common.label.status")</label>

							<div class="col-md-6">
								<input id="status-enable" type="radio" class="" name="valid" value="1" @if (old('valid') == "1") { {!! 'checked' !!} } @else { @if (old('valid') != "0") { {!! 'checked' !!} } @endif } @endif> @lang("common.label.enable")
								<input id="status-disable" type="radio" class="" name="valid" value="0" @if (old('valid') == "0") { {!! 'checked' !!} } @endif> @lang("common.label.disable")
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary" name="register">
									@lang("common.event.register")
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
