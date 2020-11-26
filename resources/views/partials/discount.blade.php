<div class="mb-8 flex justify-center">
    @if($discount->active)
        <div class="md:flex items-center px-4 sm:px-12 py-2 text-center text-blue-500 bg-blue-50 rounded md:text-lg">
            <span>{{ $discount->name }} ends in</span>
            <span class="font-semibold">
                    <x-countdown class="md:ml-2 space-x-1" :expires="$discount->expiresAt()">
                        <span>
                            <span class="markup-tabular" x-text="timer.days">{{ $component->days() }}</span> <span
                                class="text-sm">days</span>
                        </span>
                        <span>
                            <span class="markup-tabular" x-text="timer.hours">{{ $component->hours() }}</span> <span
                                class="text-sm">hours</span>
                        </span>
                        <span>
                            <span class="markup-tabular" x-text="timer.minutes">{{ $component->minutes() }}</span> <span
                                class="text-sm">minutes</span>
                        </span>
                        <span>
                            <span class="markup-tabular" x-text="timer.seconds">{{ $component->seconds() }}</span> <span
                                class="text-sm">seconds</span>
                        </span>
                    </x-countdown>
                </span>
        </div>
    @endif
</div>
