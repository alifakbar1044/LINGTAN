<!DOCTYPE html>
<html>
<head>
    <title>Formulir</title>
    <!-- Tambahkan CSS jika diperlukan -->
</head>
<body>
    <h1>Formulir Pendaftaran</h1>
    <form action="{{ url('/submit-form') }}" method="POST">
        @csrf <!-- Token CSRF untuk keamanan -->
        <div>
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">Kata Sandi:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Daftar</button>
    </form>
    @if(session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif
</body>
</html>
