<x-layout>


<div class="min-h-screen bg-gray-100 flex items-center justify-center">
    <div class="bg-white shadow-lg rounded-lg p-8 max-w-md w-full text-center">
        <h1 class="text-3xl font-bold mb-4 text-blue-600">Dashboard</h1>
        <p class="text-gray-700 text-lg mb-6">
            Welcome, <span class="font-semibold text-pink-500">{{ Auth::user()->name }}</span>!
        </p>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="bg-pink-500 hover:bg-pink-600 text-white font-bold py-2 px-4 rounded">
                Logout
            </button>
        </form>
    </div>
</div>


</x-layout>
