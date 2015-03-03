<html>
        <body>
   @include('auth.check')
        <form name="input" action="findbook" method="post">
        查找图书信息: 
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="text" name="bookname" />
        <input type="submit" value="搜索" />
        </form>
        <h4>图书信息</h4>                      
                <table width="400" border="1">
	<tr>
	       <th align="left">书名</th>
	       <th align="right">ISBN</th>
                        <th align="right">状态</th>
                </tr>   
@foreach($book  as $books)
            <tr>
          <td align = "left">{{ $books -> bookname }}</td>
          <td align = "right">{{ $books -> isbn }}</td>
          <td align = "right">{{ $books -> state }}</td>
         </tr>
    @endforeach
        </table>

    </body>
    </html>