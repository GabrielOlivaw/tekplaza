@extends('layouts.default')
@section('content')
<div id="messages-view" class="forum-item-list">

	<!-- TOAST MENSAJE -->
	<div id="toastMessage" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000">
		<div class="toast-header">
        <strong class="mr-auto">@lang('website.message')</strong>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="toast-body">
        @lang('website.message-success')
      </div>
    </div>
    
	<h1>@lang('website.messages')</h1>
	
	@if(session()->has('error'))
	<div class="errorMessage bg-danger text-white m-3 p-3">{{ session()->get('error') }}</div>
	@endif
	
	<button type="button" class="btn btn-primary" 
		data-toggle="modal" data-target="#messagesModal">
		@lang('website.actions-message')
	</button>
	
	@auth
	<div id="message-list" class="list-items">
		@if($messages->isEmpty())
		<p class="infoMessage bg-info text-white m-3 p-3">@lang('website.message-empty')</p>
		@endif
		@foreach($messages as $message)
		<div id="{{$message->id}}" class="forum-item message-item">
			<h5>{{$message->from_name}}</h5>
			<p>{{$message->content}}</p>
			<p>@lang('website.message-date', ['date' => $message->created_at])</p>
			<form action="{{ route('delete-message', ['message' => $message]) }}" method="post">
				@method('DELETE')
				@csrf
				<input type="submit" class="btn btn-danger" value="@lang('website.actions-delete')">
			</form>
		</div>
		@endforeach
		<div class="float-right">
			{{ $messages->links() }}
		</div>
	</div>
	@endauth
	
	<!-- MODAL ENVIAR MENSAJE -->
		<div class="modal fade" id="messagesModal" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="messageModalLabel">@lang('website.actions-message-to') <span></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form>
                  <div class="form-group">
                  	<label for="userTo" class="col-form-label">@lang('website.user')</label>
                    <select class="form-control" id="userTo" name="userTo">
                    	@foreach($users as $user)
                    	<option value="{{ $user->id }}">{{ $user->name }}</option>
                    	@endforeach
                    </select>
                  	<p id="errorUser" class="text-danger"></p>
                  	
                    <label for="messages-content" class="col-form-label">@lang('website.actions-message-content')</label>
                    <textarea class="form-control" id="messages-content" name="messages-content"></textarea>
                    <p id="errorContent" class="text-danger"></p>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('website.actions-cancel')</button>
                <button id="messagesModalSendMessage" type="button" class="btn btn-primary">@lang('website.actions-message')</button>
              </div>
            </div>
          </div>
        </div>
</div>
<script>
	var sendMessageUrl = "{{ route('send-message') }}";
</script>
@endsection