@extends('admin.layout.index')


@section('content')
	
	@if (count($errors) > 0)		
	    <div class="mws-form-message error">
	    	<font size="5">添加失败</font>
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif

	<div class="mws-panel grid_8">
         <div class="mws-panel-header">
              <span>用户添加</span>
         </div>	 
         <div class="mws-panel-body no-padding">
              <form class="mws-form" action="/admin/user/insert" method="post">
                   <div class="mws-form-inline">
                    	<div class="mws-form-row">
                    		<label class="mws-form-label">用户名:</label>
                    			<div class="mws-form-item">
                    				<input type="text" class="small" name="username" value="{{ old('username') }}"> 
                    			</div>
                    	</div>	
                   </div>

                   <div class="mws-form-inline">
                    	<div class="mws-form-row">
                    		<label class="mws-form-label">密码:</label>
                    			<div class="mws-form-item">
                    				<input type="password" class="small" name="password" value=""> 
                    			</div>
                    	</div>
                   </div>

                   <div class="mws-form-inline">
                    	<div class="mws-form-row">
                    		<label class="mws-form-label">确认密码:</label>
                    			<div class="mws-form-item">
                    				<input type="password" class="small" name="repassword" value=""> 
                    			</div>
                    	</div>
                   </div>

                    <div class="mws-form-inline">
                    	<div class="mws-form-row">
                    		<label class="mws-form-label">年龄:</label>
                    			<div class="mws-form-item">
                    				<input type="text" class="small" name="age" value="{{ old('age') }}"> 
                    			</div>
                    	</div>	
                   </div>

                    <div class="mws-form-inline">
                    	<div class="mws-form-row">
                    		<label class="mws-form-label">手机号:</label>
                    			<div class="mws-form-item">
                    				<input type="text" class="small" name="phone" value="{{ old('phone') }}"> 
                    			</div>
                    	</div>
                   </div>

                    <div class="mws-form-inline">
                    	<div class="mws-form-row">
                    		<label class="mws-form-label">邮箱:</label>
                    			<div class="mws-form-item">
                    				<input type="text" class="small" name="email" value="{{ old('email') }}"> 
                    			</div>
                    	</div>
                   </div>
					{{ csrf_field() }}
                   <div class="mws-button-row">
                    	<input type="submit" value="提交" class="btn btn-danger">
                    	<input type="reset" value="重置" class="btn ">
                   </div>
              </form>
         </div>    	
    </div>

@endsection