<!DOCTYPE html>
<html lang="ja">
<head>
    <title>Todoリスト</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Bootstrap CSSの読み込み --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container" style="margin-top:50px">
        <h1>Todoリスト追加</h1>

        <form action="{{ route('todos.store') }}" method="post" id="add_form">
            @csrf
            @method('POST')
            <div class="form-group">
                <label>やることを追加してください</label>
                <input id="add_body" type="text" name="body" class="form-control" placeholder="todo list" style="max-width:1000px;">
                @if($errors->any())
                @foreach($errors->all() as $error)
                <p class="text-danger">{{$error}}</p>
                @endforeach
                @endif
            </div>
            <button type="submit" class="btn btn-primary">追加する</button>
        </form>
        <h1 style="margin-top:50px">Todoリスト</h1>
        <table class="table table-striped" style="max-width:1000px; margin-top:20px;">
            {{-- <thead>
                <tr>
                  <th></th><th></th><th></th>
                </tr>
            </thead> --}}

            <tbody>
                @foreach($todos as $todo)
                <tr>
                    <td>{{$todo->body}}</td>
                    <td><form action="{{ route("todos.edit", ['todo' => $todo->id]) }}" method="post">
                    @csrf
                    @method('get')
                    <button type="submit" class="btn btn-primary">編集</button>
                    </form>
                </td>
                {{-- 削除ボタン --}}
                <td><form id="delete_{{$todo->id}}" action="{{ route("todos.delete", ['todo' => $todo->id ] ) }}" method="post">
                    @csrf
                    @method('post')
                <button onclick="deletePost(this);return false;" type="submit" class="btn btn-danger">削除</button>
                </form>
                </td>


                </tr>
            </tbody>
        @endforeach
        </table>

    
    
    </div>
    {{-- オプションのJavaScript --}}
  {{-- 最初にjQuery、次にPopper.js、次にBootstrap JS --}}
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
        var body_alert = "タスク内容を入力してください。";

        $('#add_form').submit(function(){
            if($('#add_body').val() == ""){
                alert(body_alert);
                return false;
            }
            else{
                $('#add_form').submit();
            }
        })



        function deletePost(e) {
            if(confirm('本当に削除してよろしいですか？')){
                document.getElementById('delete_' + e.dataset.id).submit();
            }
            else{
                window.alert('キャンセルされました');
                return false;
            }
        }
    </script>
    
</body>
</html>