<x-layout>
    <div class="container mx-auto mt-10 px-4">
        <h1 class="text-2xl font-bold mb-6">Create a New Sport</h1>
        <form action="{{ route('sports.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold mb-2">Sport Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                       class="border border-gray-300 rounded-lg w-full p-2"
                       required>
                @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="location" class="block text-gray-700 font-semibold mb-2">Location</label>
                <input type="text" name="location" id="location" value="{{ old('location') }}"
                       class="border border-gray-300 rounded-lg w-full p-2"
                       required>
                @error('location')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="price" class="block text-gray-700 font-semibold mb-2">Price</label>
                <input type="number" name="price" id="price" value="{{ old('price') }}"
                       class="border border-gray-300 rounded-lg w-full p-2"
                       step="0.01">
                @error('price')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="contact_info" class="block text-gray-700 font-semibold mb-2">Contact Info</label>
                <input type="text" name="contact_info" id="contact_info" value="{{ old('contact_info') }}"
                       class="border border-gray-300 rounded-lg w-full p-2">
                @error('contact_info')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="type" class="block text-gray-700 font-semibold mb-2">Type</label>
                <input type="text" name="type" id="type" value="{{ old('type') }}"
                       class="border border-gray-300 rounded-lg w-full p-2">
                @error('type')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
             <div class="mb-4">
                <label for="type" class="block text-gray-700 font-semibold mb-2">Type</label>
                <input type="text" name="description" id="description" value="{{ old('description') }}"
                       class="border border-gray-300 rounded-lg w-full p-2">
                @error('description')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
</x-layout>
