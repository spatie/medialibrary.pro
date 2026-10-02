import { createApp } from 'vue';
import { MediaLibraryAttachment } from 'media-library-pro-vue3-attachment';
import { MediaLibraryCollection } from 'media-library-pro-vue3-collection';

createApp({
    components: { MediaLibraryAttachment, MediaLibraryCollection },
    data: () => ({
        window,
    }),
}).mount('#app');
