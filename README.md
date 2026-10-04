# medialibrary.pro

This is the source code of https://medialibrary.pro

## Deployment

This site runs on [Laravel Cloud](https://cloud.laravel.com). Every push to `master` is deployed automatically.

The static files in `public` (including the Vite build) are served from a public Laravel Cloud bucket, so requests for them never wake the app. The build command ends with `php artisan upload-assets-to-bucket`, which uploads them under a versioned prefix with a long `Cache-Control` header and points `asset()` and `@vite` to that prefix. The bucket is configured with the `ASSETS_BUCKET`, `ASSETS_BUCKET_ENDPOINT`, `ASSETS_BUCKET_URL`, `ASSETS_BUCKET_ACCESS_KEY_ID` and `ASSETS_BUCKET_SECRET_ACCESS_KEY` environment variables. Without them, the app serves its own assets.

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/laravel-medialibrary.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/laravel-medialibrary)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).


## Security

If you discover any security related issues, please email [security@spatie.be](mailto:security@spatie.be) instead of using the issue tracker.