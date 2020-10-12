<input class="h-10 px-3 text-blue-900 placeholder-blue-300 bg-blue-50 border-transparent border-2 focus:outline-none focus:border-yellow-500" {{ $attributes }} />
@error($attributes['name'])
    <div class="text-xs mb-8 px-4 py-2 bg-red-100 text-red-500">{{ $message }}</div>
@enderror
