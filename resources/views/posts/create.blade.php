<!-- resources/views/posts/create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Создать новый пост</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input[type="text"], textarea { width: 100%; padding: 8px; }
        button { padding: 10px 15px; background: #4CAF50; color: white; border: none; }
    </style>
</head>
<body>
<h1>Создать пост</h1>
<form method="POST" action="{{ route('posts.store') }}">
    @csrf
    <div class="form-group">
        <label for="title">Заголовок:</label>
        <input type="text" id="title" name="title" required>
    </div>
    <div class="form-group">
        <label for="content">Текст:</label>
        <textarea id="content" name="content" rows="5" required></textarea>
    </div>
    <button type="submit">Сохранить</button>
</form>
</body>
</html>
