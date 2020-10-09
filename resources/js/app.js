import Vue from "vue";

import { MediaLibraryAttachment } from "../../vendor/spatie/laravel-medialibrary-pro/ui/medialibrary-pro-vue-attachment";
import { MediaLibraryCollection } from "../../vendor/spatie/laravel-medialibrary-pro/ui/medialibrary-pro-vue-collection";

var app = new Vue({
    components: { MediaLibraryAttachment, MediaLibraryCollection },

    el: "#app"
});
