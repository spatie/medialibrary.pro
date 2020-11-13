@php
    use Carbon\Carbon;

    $launchDate = Carbon::createFromFormat('Y-m-d H:i', '2020-11-12 15:00')->startOfMinute();
@endphp

<div class="bg-red-500 -mt-24 -mb-16">
    <section id="pricecard" class="pt-32 pb-16 w-full max-w-5xl mx-auto px-4 sm:px-12">
        <div class="md:flex mb-12">
            <div class="mx-auto flex flex-col items-center text-white">
                <h2 class="h-12 flex items-center justify-center text-4xl font-bold">
                    Launching 12/11/2020
                </h2>
            </div>
        </div>

    </section>
</div>


