<html>
	<body>
                   @include('auth.check')
                   {{$name = Auth::user()->name  }}
                <form name="input" action="findbook'" method="post">
                查找图书信息: 
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="text" name="bookname" />
                <input type="submit" value="搜索" />
                </form>
                <h4>{{$title}}</h4>                      
		<table width="400" border="1">
			<tr>
				<th align="left">书名</th>
				<th align="right">ISBN</th>
				<th align="right">{{$bookstat}}</th>
			</tr>
		@foreach ($books->books  as $book)
                		<tr>
			<td align="left">{{$book->bookname}}</td>
			<td align="right">{{$book->isbn }}</td>
			<td align="right"><a href = "{{url("back/$name/$book->isbn")}}">back</a></td>										
		</tr>
		@endforeach
		</table>
		@include('menu.usermenu')
		 @if(Auth::user()->name == 'admin')
                	@include('menu.adminmenu')
                	@endif
		</body>
		</html>