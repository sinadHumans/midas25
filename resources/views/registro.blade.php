<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
  </head>
  <body>
    <form action="{{ route('usuario.create') }}" method="POST">
        @csrf
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="name@example.com">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email</label>
        <input type="text" class="form-control" id="email"  name="email"placeholder="name@example.com">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">clave</label>
        <input type="text" class="form-control" id="password" name="password" placeholder="name@example.com">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Estatus</label>
        <input type="text" class="form-control" id="estatus" name="estatus" placeholder="name@example.com">
      </div>


      <button type="submit">REgistrar</button>
    </form>
  </body>
</html>
