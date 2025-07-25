<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<div class="bg-white p-6 rounded-lg shadow-md w-full max-w-sm">
    <h2 class="text-2xl font-bold mb-4 text-center">Admin Login</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-2 rounded mb-3">
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.login') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}"
                   class="w-full p-2 border border-gray-300 rounded mt-1" required>
        </div>

        <div class="mb-4">
            <label for="password" class="block text-sm font-medium">Password</label>
            <input type="password" name="password" id="password"
                   class="w-full p-2 border border-gray-300 rounded mt-1" required>
        </div>

        <button type="submit"
                class="w-full bg-blue-600 text-white p-2 rounded hover:bg-blue-700">
            Login
        </button>
    </form>

    <p class="text-center text-sm mt-4">
        Don't have an account?
        <a href="{{ route('admin.register') }}" class="text-blue-600 hover:underline">Register User</a>
    </p>
</div>

</body>
</html>
