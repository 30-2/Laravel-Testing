@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h1>Submit a link</h1>
            <form action="/submit" method="post">
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        Please fix the following errors
                    </div>
                @endif

                {!! csrf_field() !!}
                
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ old('title') }}">
                    @if($errors->has('title'))
                        <span class="help-block">{{ $errors->first('title') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                    <label for="url">Url</label>
                    <input type="text" class="form-control" id="url" name="url" placeholder="URL" value="{{ old('url') }}">
                    @if($errors->has('url'))
                        <span class="help-block">{{ $errors->first('url') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" placeholder="description">{{ old('description') }}</textarea>
                    @if($errors->has('description'))
                        <span class="help-block">{{ $errors->first('description') }}</span>
                    @endif
                </div>
                <div class="ui slider checkbox">
                <input type="checkbox" name="newsletter" id="newsletter">
                <label>Accept terms and conditions</label>
                </div>
                <div class="ui toggle checkbox">
                <input type="checkbox" name="public">
                <label>Subscribe to weekly newsletter</label>
                </div>
                <div class="ui basic modal">
                    <div class="ui icon header">
                        <i class="archive icon"></i>
                        Archive Old Messages
                    </div>
                    <div class="content">
                        <p>Your inbox is getting full, would you like us to enable automatic archiving of old messages?</p>
                    </div>
                    <div class="actions">
                        <div class="ui red basic cancel inverted button">
                        <i class="remove icon"></i>
                        No
                        </div>
                        <div class="ui green ok inverted button">
                        <i class="checkmark icon"></i>
                        Yes
                        </div>
                    </div>
                </div>
               
                <button type="submit" class="btn btn-default">Submit</button>

                
            </form>
        </div>
    </div>
@endsection