<x-layout>
  <div class="flex items-center justify-center min-h-screen bg-gray-100 dark:bg-gray-900">
    <form method="POST" action="{{ route('sports.update', $sport->id) }}" enctype="multipart/form-data" class="w-full max-w-md bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-xl shadow-md p-6">
      @csrf
      @method('PUT')

      <!-- Display current image if exists -->
      @if($sport->image)
        <img src="{{ $sport->image }}" alt="{{ $sport->name }}" class="w-full h-48 object-cover rounded-lg mb-4">
      @else
        <div class="w-full h-48 bg-gray-200 dark:bg-gray-700 flex items-center justify-center text-gray-500 dark:text-gray-300 rounded-lg mb-4">
          No Image
        </div>
      @endif

      <!-- Image upload -->
      <div class="mb-4">
        <label for="image" class="block text-gray-800 dark:text-gray-200 mb-1">Upload New Image:</label>
        <input id="image" type="file" name="image" class="w-full text-sm text-gray-800 dark:text-gray-200 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded p-2">
      </div>
      

      <!-- Name -->
      <div class="mb-4">
        <label for="name" class="block text-gray-800 dark:text-gray-200 mb-1">Name:</label>
        <input id="name" type="text" name="name" value="{{ old('name', $sport->name) }}" class="w-full p-2 border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 shadow-sm focus:ring focus:ring-green-300">
      </div>

      <!-- Location -->
      <div class="mb-4">
        <label for="location" class="block text-gray-800 dark:text-gray-200 mb-1">Location:</label>
        <input id="location" type="text" name="location" value="{{ old('location', $sport->location) }}" class="w-full p-2 border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 shadow-sm focus:ring focus:ring-green-300">
      </div>

      <!-- Type -->
      <div class="mb-4">
        <label for="type" class="block text-gray-800 dark:text-gray-200 mb-1">Type:</label>
        <input id="type" type="text" name="type" value="{{ old('type', $sport->type) }}" class="w-full p-2 border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 shadow-sm focus:ring focus:ring-green-300">
      </div>

      <!-- Price -->
      <div class="mb-4">
        <label for="price" class="block text-gray-800 dark:text-gray-200 mb-1">Price:</label>
        <input id="price" type="text" name="price" value="{{ old('price', $sport->price) }}" class="w-full p-2 border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 shadow-sm focus:ring focus:ring-green-300">
      </div>

      <!-- Contact Info -->
      <div class="mb-4">
        <label for="contact_info" class="block text-gray-800 dark:text-gray-200 mb-1">Contact Info:</label>
        <input id="contact_info" type="text" name="contact_info" value="{{ old('contact_info', $sport->contact_info) }}" class="w-full p-2 border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 shadow-sm focus:ring focus:ring-green-300">
      </div>

      <!-- Date Available -->
      <div class="mb-4">
        <label for="date_available" class="block text-gray-800 dark:text-gray-200 mb-1">Date Available:</label>
        <input id="date_available" type="date" name="date_available" value="{{ old('date_available', $sport->date_available) }}" class="w-full p-2 border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 shadow-sm focus:ring focus:ring-green-300">
      </div>

      <!-- Description -->
      <div class="mb-4">
        <label for="description" class="block text-gray-800 dark:text-gray-200 mb-1">Description:</label>
        <textarea id="description" name="description" rows="3" class="w-full p-2 border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 shadow-sm focus:ring focus:ring-green-300">{{ old('description', $sport->description) }}</textarea>
      </div>

      <!-- Submit Button -->
      <div class="mt-6">
        <button type="submit" class="w-full py-2 px-4 bg-green-600 text-white font-medium rounded hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400">
          Update
        </button>
      </div>
    </form>
  </div>
</x-layout>
