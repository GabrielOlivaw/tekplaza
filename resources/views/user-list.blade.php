@extends('layouts.default')
@section('content')
<div id="user-list-view" class="forum-item-list">
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
    
    <!-- TOAST ROLE CHANGE -->
	<div id="toastChangeRole" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000">
		<div class="toast-header">
        <strong class="mr-auto">@lang('website.actions-role-change')</strong>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="toast-body">
        @lang('website.role-change-success')
      </div>
    </div>
    
    <!-- TOAST BAN -->
	<div id="toastBan" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000">
		<div class="toast-header">
        <strong class="mr-auto">@lang('website.actions-ban-user')</strong>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="toast-body">
        @lang('website.ban-success')
      </div>
    </div>

	<h1>@lang('website.user-list')</h1>
	
	@if(session()->has('error'))
	<div class="errorMessage bg-danger text-white m-3 p-3">{{ session()->get('error') }}</div>
	@endif
	
	<div id="user-list" class="list-items">
		<table class="table table-striped">
			<thead>
				<tr>
					<th scope="col">@lang('website.name')</th>
					<th scope="col">@lang('website.role')</th>
					@auth
					<th scope="col">@lang('website.actions')</th>
					@endauth
				</tr>
			</thead>
			<tbody>
        		@foreach($users as $user)
        		<tr id="user{{ $user->id }}">
        			<td class="user-name">{{$user->name}}</td>
        			<td class="user-role">{{$user->role}}</td>
        			@auth
        			<td class="action-buttons">
        				@if($user->id != auth()->user()->id)
        				<button type="button" class="btn btn-primary" 
        					data-toggle="modal" data-target="#messageModal" 
        					data-userid="{{$user->id}}" data-username="{{$user->name}}">
        					@lang('website.actions-message')
    					</button>
    					@if(auth()->user()->id_role == 1 
    						&& (auth()->user()->id == 1 || $user->id_role > 1))
    					<button type="button" class="btn btn-warning changeRoleButton" 
        					data-toggle="modal" data-target="#changeRoleModal" 
        					data-userid="{{$user->id}}" data-username="{{$user->name}}"
        					data-userrole = "{{$user->id_role}}">
        					@lang('website.actions-role-change')
    					</button>
    					@endif
        				@if(auth()->user()->id_role < $user->id_role)
        				<button type="button" class="btn btn-danger" 
        					data-toggle="modal" data-target="#banModal" 
        					data-userid="{{$user->id}}" data-username="{{$user->name}}">
        					@lang('website.actions-ban')
    					</button>
        				@endif
        				@endif
        			</td>
        			@endauth
        		</tr>
        		@endforeach
			</tbody>
		</table>
		<div class="float-right">
			{{ $users->links() }}
		</div>
		
		<!-- MODAL ENVIAR MENSAJE -->
		<div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true">
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
                    <label for="message-content" class="col-form-label">@lang('website.actions-message-content')</label>
                    <textarea class="form-control" id="message-content" name="message-content"></textarea>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('website.actions-cancel')</button>
                <button id="modalSendMessage" type="button" class="btn btn-primary">@lang('website.actions-message')</button>
              </div>
            </div>
          </div>
        </div>
        
        <!-- MODAL CAMBIAR ROL -->
		<div class="modal fade" id="changeRoleModal" tabindex="-1" role="dialog" aria-labelledby="changeRoleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="changeRoleModalLabel">@lang('website.actions-role-change')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              	<label for="change-role" class="col-form-label">@lang('website.new-role')</label>
                <select class="form-control" id="change-role" name="change-role">
                </select>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('website.actions-cancel')</button>
                <button id="modalChangeRole" type="button" class="btn btn-primary">@lang('website.actions-confirm')</button>
              </div>
            </div>
          </div>
        </div>
        
        <!-- MODAL BANEAR USUARIO -->
        <div class="modal fade" id="banModal" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="banModalLabel">@lang('website.actions-ban-to') <span></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form>
                  <div class="form-group">
                  	<label for="ban-days" class="col-form-label">@lang('website.actions-ban-days')</label>
                  	<input class="form-control" type="number" id="ban-days" name="ban-days" min="1" value="1">
                  
                    <label for="ban-motive" class="col-form-label">@lang('website.actions-ban-motive')</label>
                    <textarea class="form-control" id="ban-motive" name="ban-motive"></textarea>
                    
                    <label for="ban-subforum" class="col-form-label">@lang('website.subforum')</label>
                    <select class="form-control" id="ban-subforum" name="ban-subforum">
                    	@foreach($subforums as $subforum)
                    	<option value="{{ $subforum->id }}">{{ $subforum->name }}</option>
                    	@endforeach
                    </select>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('website.actions-cancel')</button>
                <button id="modalBanUser" type="button" class="btn btn-danger">@lang('website.actions-ban')</button>
              </div>
            </div>
          </div>
        </div>
	</div>
</div>
<script>
	var sendMessageUrl = "{{ route('send-message') }}";
	var banUserUrl = "{{ route('ban-user') }}";
	var changeRoleUrl = "{{ route('change-role') }}";
	var roles = @json($roles)
</script>
@endsection