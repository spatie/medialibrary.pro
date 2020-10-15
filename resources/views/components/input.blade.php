<input
    class="h-10 px-3 text-blue-900 placeholder-blue-300 bg-blue-50 border-transparent border-2 focus:outline-none focus:border-yellow-500" {{ $attributes }} />
<x-error :name="$attributes['name']"/>
