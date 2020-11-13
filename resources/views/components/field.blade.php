<div class="grid gap-2 w-full max-w-2xl">
    @if( $attributes['label'] )
    <label class="text-xs uppercase tracking-logo text-blue-500">{{ $attributes['label'] }}</label>
    @endif
    {{ $slot }}
</div>