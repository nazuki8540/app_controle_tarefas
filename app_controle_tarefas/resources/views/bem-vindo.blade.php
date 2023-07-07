site da aplicação

@auth

    <h1>usuário atenticado</h1>
    <p>ID {{auth::user()->id}}</p>
    <p>nome: {{auth::user()->name}}</p>
    <p>email: {{auth::user()->email}}</p>

@endauth

@guest

Olá visitante!

@endguest