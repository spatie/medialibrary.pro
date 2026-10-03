<div class="mb-8 flex justify-center" x-show="couldFetchPrice" style="display: none">
    <div class="px-4 sm:px-12 py-2 text-center text-blue-600 bg-yellow-100 rounded text-sm" x-show="discount.active" style="display: none">
        <span class="font-bold"><span x-text="discount.name"></span> ends in</span>
        <span class="font-semibold text-xs">
            <div>
                <span>
                    <span class="markup-tabular" x-text="countdown.days"></span> <span
                        class="font-normal">days</span>
                </span>
                <span>
                    <span class="markup-tabular" x-text="countdown.hours"></span> <span
                        class="font-normal">hours</span>
                </span>
                <span>
                    <span class="markup-tabular" x-text="countdown.minutes"></span> <span
                        class="font-normal">minutes</span>
                </span>
                <span>
                    <span class="markup-tabular" x-text="countdown.seconds"></span> <span
                        class="font-normal">seconds</span>
                </span>
            </div>
        </span>
    </div>
</div>
