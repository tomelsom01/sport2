<x-layout>
      @if ($errors->any())
      <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

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
            <input type="file" name="image" id="imageInput" class="border border-gray-300 rounded-lg w-full p-2">
            <div class="mt-4">
              <img id="preview" style="max-width: 300px; display: none; border-radius: 8px;" alt="Image Preview" />
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
                <label for="date_available" class="block text-gray-700 font-semibold mb-2">Date Available</label>
                <input type="date" name="date_available" id="date_available" value="{{ old('date_available') }}"
                       class="border border-gray-300 rounded-lg w-full p-2">
                @error('date_available')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
             <div class="mb-4">
                <label for="description" class="block text-gray-700 font-semibold mb-2">Description</label>
                <input type="textarea" name="description" id="description" value="{{ old('description') }}"
                       class="border border-gray-300 rounded-lg w-full p-2">
                @error('description')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Create Post</button>
        </form>
</x-layout>
