<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  @auth
  <p>Parabéns! Você está logado.</p>
  <form action="/logout" method="POST">
    @csrf
    <button>Log out</button>
  </form>
  <div>
    <h2>Cadastrar uma categoria de transação</h2>
    <form action="/category" method="POST">
      @csrf
      <input type="text" name="name" placeholder="nome da categoria de transação">
      <button>Salvar</button>
    </form>
  </div>
  <div>
    <h2>Cadastrar uma transação</h2>
    <form action="/transaction" method="POST">
      @csrf
        <label for="transaction_type">Tipo de Transação:</label>
        <select name="transaction_type" required>
            <option value="Recebeu">Recebeu</option>
            <option value="Pagou">Pagou</option>
        </select>

        <label for="value">Valor:</label>
        <input type="number" name="value" step="0.01" required>

        <label for="category">Categoria_ID:</label>
        <input type="text" name="category_id">
      <button>Salvar</button>
    </form>
  </div>

<!-- Categorias -->
<h2>Categorias</h2>
@foreach($categories as $category)
<div style="background-color: #D9D9D9; padding: 10px; margin: 10px;">
  <h3>{{$category['name']}}</h3>
  <p>Id: {{$category['id']}}</p>
  <form action="/category/{{$category['id']}}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Remover</button>
  </form>
</div>
@endforeach

<!-- Transações -->
<h2>Transações</h2>
@foreach($posts as $post)
<div style="background-color: #D9D9D9; padding: 10px; margin: 10px;">
  <h3>{{$post['transaction_type']}} {{$post['value']}}</h3>
  <p>Categoria: {{$post->category->name}}</p>
  <form action="/transaction/{{$post['id']}}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Remover</button>
  </form>
</div>
@endforeach

    @else

    <div>
    <h2>Register</h2>
    <form action="/user" method="POST">
      @csrf
      <input name="name" type="text" placeholder="name">
      <input name="cpf" type="text" placeholder="cpf">
      <input name="email" type="text" placeholder="email">
      <input name="password" type="password" placeholder="password">
      <button>Register</button>
    </form>
  </div>

  <div>
    <h2>Login</h2>
    <form action="/login" method="POST">
      @csrf
      <input name="loginname" type="text" placeholder="name">
      <input name="loginpassword" type="password" placeholder="password">
      <button>Log in</button>
    </form>
  </div>

  <h2>Transações</h2>
    @foreach($posts as $post)
    <div style="background-color: #D9D9D9; padding: 10px; margin: 10px;">
      <h3>{{$post['transaction_type']}} {{$post['value']}}</h3>
      <p>Usuário: {{$post->user->name}}</p>
      <p>Categoria: {{$post->category->name}}</p>
      
    </div>
    @endforeach
  @endauth
</body>
</html>