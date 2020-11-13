import Vue from "vue";

import { MediaLibraryAttachment } from "media-library-pro-vue2-attachment";
import { MediaLibraryCollection } from "media-library-pro-vue2-collection";

new Vue({
    components: { MediaLibraryAttachment, MediaLibraryCollection },
    data: () => ({
        window,
    }),
    el: "#app"
});
