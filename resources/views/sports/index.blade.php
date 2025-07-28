<x-layout>
    <div class="container mx-auto mt-10 px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($sports as $sport)
                <div class="bg-white shadow-lg rounded-lg overflow-hidden flex flex-col">
                    @if($sport->image)
                        <img src="{{ $sport->image }}"
                             alt="{{ $sport->name }}"
                             class="h-48 w-full object-cover">
                    @else
                        <div class="h-48 w-full bg-gray-200 flex items-center justify-center text-gray-400">
                            No Image
                        </div>
                    @endif
                    <div class="p-6 flex-1 flex flex-col">
                        <h2 class="text-xl font-bold mb-2 text-gray-800">{{ $sport->name }}</h2>
                        <p class="text-gray-600 mb-1"><span class="font-semibold">Location:</span> {{ $sport->location }}</p>
                        <p class="text-gray-600 mb-1"><span class="font-semibold">Price:</span> {{ $sport->price ? '£' . number_format($sport->price, 2) : 'N/A' }}</p>
                        <p class="text-gray-600 mb-1"><span class="font-semibold">Contact:</span> {{ $sport->contact_info ?? 'N/A' }}</p>
                        <p class="text-gray-600 mb-1"><span class="font-semibold">Type:</span> {{ $sport->type ?? 'N/A' }}</p>
                        <p class="text-gray-700 mt-2 flex-1">{{ $sport->description }}</p>
                    </div>
                    <div class="p-4 bg-gray-50 flex justify-between">
                        <a href="{{ route('sports.edit', $sport->id) }}"
                           class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded text-sm font-semibold transition">
                            Update
                        </a>
                        <form action="{{ route('sports.destroy', $sport->id) }}" method="POST"
                              onsubmit="return confirm('Are you sure you want to delete this sport?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded text-sm font-semibold transition">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
