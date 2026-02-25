<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso Restringido - Atlantes</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&family=Oswald:wght@500;700&display=swap" rel="stylesheet">
    <style>
        body { background-color: #000; color: #fff; font-family: 'Montserrat', sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .login-box { background-color: #111; padding: 40px; border-radius: 8px; border-top: 4px solid #D91023; width: 100%; max-width: 400px; text-align: center; box-shadow: 0 10px 25px rgba(0,0,0,0.5); }
        .login-box img { height: 80px; margin-bottom: 20px; }
        h2 { font-family: 'Oswald', sans-serif; color: #D91023; font-size: 2rem; margin-top: 0; }
        .form-group { margin-bottom: 20px; text-align: left; }
        label { display: block; margin-bottom: 8px; font-size: 0.9rem; color: #aaa; }
        input { width: 100%; padding: 12px; box-sizing: border-box; background-color: #050505; border: 1px solid #333; color: white; border-radius: 4px; }
        input:focus { border-color: #D91023; outline: none; }
        .btn-submit { background-color: #D91023; color: white; border: none; padding: 15px; width: 100%; font-weight: bold; border-radius: 4px; cursor: pointer; font-family: 'Oswald', sans-serif; font-size: 1.2rem; margin-top: 10px; }
        .btn-submit:hover { background-color: #fff; color: #D91023; }
        .error { color: #ff4d4d; font-size: 0.85rem; margin-top: 5px; }
    </style>
</head>
<body>
    <div class="login-box">
        <img src="{{ asset('images/logo.png') }}" alt="Atlantes Logo">
        <h2>ÁREA TÉCNICA</h2>
        
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>CORREO ELECTRÓNICO</label>
                <input type="email" name="email" required placeholder="admin@atlantes.es">
                @error('email') <div class="error">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label>CONTRASEÑA</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit" class="btn-submit">ENTRAR AL VESTUARIO</button>
        </form>
        <a href="{{ url('/') }}" style="color: #666; font-size: 0.8rem; text-decoration: none; display: block; margin-top: 20px;">Volver a la web pública</a>
    </div>
</body>
</html>