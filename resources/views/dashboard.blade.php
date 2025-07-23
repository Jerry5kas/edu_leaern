<x-layouts.main>
        <div class="font-bold text-center text-2xl">
            Welcome to Dashboard
        </div>

        @if($user)
            <h2 class="font-semibold text-center text-xl">Hi, {{ $user->name }}</h2>
        @else
            <p class="text-center text-red-500">You are not logged in</p>
        @endif

</x-layouts.main>
