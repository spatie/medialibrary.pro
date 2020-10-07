require('../bootstrap');

import Vue from 'vue';

import MediaLibraryAttachment from '../../vendor/spatie/laravel-medialibrary-pro/ui/medialibrary-pro-vue-attachment/dist';
import MediaLibraryCollection from '../../vendor/spatie/laravel-medialibrary-pro/ui/medialibrary-pro-vue-collection/dist';

new Vue({
    components: { MediaLibraryAttachment, MediaLibraryCollection },

    el: '#app',

    data: () => ({
        window,
    }),
});
