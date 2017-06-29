@extends('admin.layout.index')

@section('css')
<link rel="stylesheet" type="text/css" href="/d/css/page_page.css">
@endsection

@section('content')
<html>
  
  <head></head>
  
  <body>
    <div class="mws-panel grid_8">
      <div class="mws-panel-header">
        <span>
          <i class="icon-table"></i>用户列表</span>
      </div>
      <div class="mws-panel-body no-padding">
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
          <div id="DataTables_Table_0_length" class="dataTables_length">
            <label>显示
              <select size="1" name="">
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="30">30</option>
                </select>条</label>
          </div>
          <div class="dataTables_filter" id="DataTables_Table_0_filter">
            <label>关键字:
              <input type="text" aria-controls="DataTables_Table_0" /></label>
			  <button>搜索</button>
              </div>
          <table class="mws-datatable mws-table dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
            <thead>
              <tr role="row">
               	<th>ID</th>
               	<th>用户名</th>
               	<th>年龄</th>
               	<th>手机</th>
               	<th>邮箱</th>
               	<th>注册时间</th>
               	<th>操作</th>

              </tr>
            </thead>
            <tbody role="alert" aria-live="polite" aria-relevant="all">
              @foreach($data as $k=>$v)
              <tr>
                <td>{{ $v['id']}}</td>
                <td>{{ $v['username']}}</td>
                <td>{{ $v['age']}}</td>
                <td>{{ $v['phone']}}</td>
                <td>{{ $v['email']}}</td>
                <td>{{ $v['ctime']}}</td>
                <td>
					<a href="">删除</a>
					<a href="">修改</a>
                </td>
             </tr>
             @endforeach
            </tbody>
          </table>
         	

  			<div class="" id="page_page">
				{!! $data->render() !!}	
  			</div>
          
        </div>
      </div>
    </div>
  </body>

</html>
@endsection


