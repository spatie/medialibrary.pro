<ul class="h-10 flex items-center justify-center space-x-6 text-xxs text-gray-500">
    <li>
        <a href="#" @click.prevent="tech = 'blade'" :class="{ 'text-blue-900' : tech === 'blade' }">
            Livewire and Blade
            <div x-show="tech === 'blade'" class="absolute w-full top-0 -mt-4 left-0 text-center text-yellow-500 text-sm">
                •
            </div>
        </a>
    </li>
    <li>
        <a href="#" @click.prevent="tech = 'react'" :class="{ 'text-blue-900' : tech === 'react' }">
            React
            <div x-show="tech === 'react'" class="absolute w-full top-0 -mt-4 left-0 text-center text-yellow-500 text-sm">
                •
            </div>
        </a>
    </li>
    <li>
        <a href="#" @click.prevent="tech = 'vue'" :class="{ 'text-blue-900' : tech === 'vue' }">
            Vue
            <div x-show="tech === 'vue'" class="absolute w-full top-0 -mt-4 left-0 text-center text-yellow-500 text-sm">
                •
            </div>
        </a>
    </li>
</ul>
