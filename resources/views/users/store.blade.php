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
				<div class="panel-heading">@lang("common.title.create_new_account")</div>

				<div class="panel-body">
					
				<form class="ui form" action="/user/store" method="post">
					{{ csrf_field() }}
					<div class="field">
						<label>
									
							@lang("common.label.already_account")<a href="../user">@lang("common.event.login")</a>
					
						</label>
					</div>
					<div class="ui error message"></div>
					<div class="required field">
						<label>@lang("common.label.nickname")</label>
						<input type="text" name="nickname" placeholder="Nick Name">
					</div>
					<div class="required field">
						<label>@lang("common.label.email")</label>
						<input type="email" name="email" placeholder="email@email.com">
					</div>
					<div class="required field">
						<label>@lang("common.label.password")</label>
						<input type="password" name="password" >
					</div>
					<div class="required field">
						<label>@lang("common.label.password_confirm")</label>
						<input type="password" name="passwordconfirm" >
					</div>
					<div class="field">
						<label>@lang("common.label.referral_emial")</label>
						<input type="text" name="referral-emial" >
					</div>
					<div class="field">
						<div class="ui checkbox">
						<input type="checkbox" tabindex="0" class="hidden" id="terms" class = "terms">
						<label for = "terms">@lang("common.label.terms_and_conditions_label")<a href="../user">@lang("common.label.terms_and_conditions")</a></label>
						</div>
					</div>
					<div class="field">
    <div class="ui checkbox">
      <input id="terms" type="checkbox">
      <label>I agree to the Terms and Conditions</label>
    </div>
  </div>
  <div class="ui checkbox">
    <input id="fun" type="checkbox">
    <label for="fun">Make my profile visible</label>
  </div>
					<button class="fluid ui red button" type="submit">@lang("common.title.create_new_account")</button>
					
				
					</form>


				</div>
			</div>
		</div>
	</div>
</div>
@endsection
