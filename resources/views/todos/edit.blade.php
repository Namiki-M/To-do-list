<!DOCTYPE html>
<html lang="ja">
<head>
    <title>Todoリスト更新</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Bootstrap CSSの読み込み --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container" style="margin-top:50px">
        <h1>Todoリスト更新</h1>

        <form action="{{ route('todos.update', ['todo' => $todo->id ])}}" method="post" id="add_form">
            @csrf
            @method('post')
            <div class="form-group">
                <label>やることを追加してください</label>
                <input type="text" name="body" class="form-control" placeholder="todo list" style="max-width:1000px;" value="{{ $todo->body }}" id="add_body">
            </div>
            <button type="submit" class="btn btn-primary">更新する</button>
        </form>
    
    
    </div>
    {{-- オプションのJavaScript --}}
  {{-- 最初にjQuery、次にPopper.js、次にBootstrap JS --}}
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>

        var body_alert = "情報を入力してください。";

        $('#add_form').submit(function(){
            if($('#add_body').val() == ""){
                alert(body_alert);
                return false;
            }
            else{
                $('#add_form').submit();
            }
        })
    </script>
    
</body>
</html>