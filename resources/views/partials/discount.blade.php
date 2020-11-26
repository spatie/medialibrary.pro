<div class="mb-8 flex justify-center">
    @if($discount->active)
        <div class="px-4 sm:px-12 py-2 text-center text-blue-600 bg-yellow-100 rounded text-sm">
            <span class="font-bold">{{ $discount->name }} ends in</span>
            <span class="font-semibold text-xs">
                    <x-countdown :expires="$discount->expiresAt()">
                        <span>
                            <span class="markup-tabular" x-text="timer.days">{{ $component->days() }}</span> <span
                                class="font-normal">days</span>
                        </span>
                        <span>
                            <span class="markup-tabular" x-text="timer.hours">{{ $component->hours() }}</span> <span
                                class="font-normal">hours</span>
                        </span>
                        <span>
                            <span class="markup-tabular" x-text="timer.minutes">{{ $component->minutes() }}</span> <span
                                class="font-normal">minutes</span>
                        </span>
                        <span>
                            <span class="markup-tabular" x-text="timer.seconds">{{ $component->seconds() }}</span> <span
                                class="font-normal">seconds</span>
                        </span>
                    </x-countdown>
                </span>
        </div>
    @endif
</div>
