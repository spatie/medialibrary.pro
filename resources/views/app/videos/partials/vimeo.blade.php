@section('javaScript-body')
    <script src="https://player.vimeo.com/api/player.js"></script>
    <script>
        var vimeoWrapper = document.querySelector('#player');
        var vimeo = new Vimeo.Player('player');
        var videoId = vimeoWrapper.dataset.videoId;
        var userId = vimeoWrapper.dataset.userId;

        vimeo.on('play', function (data) {
            if (data.seconds === 0) {
                gtag('event', 'video-start', {
                    'video_id': videoId,
                    'video_title': vimeoWrapper.dataset.videoTitle,
                    'user_id': userId,
                });
            }
        });

        vimeo.on('timeupdate', function (data) {
            if (data.seconds % 15 === 0) {
                gtag('event', 'video-duration', {
                    'video_id': videoId,
                    'video_playtime': data.seconds,
                    'video_title': vimeoWrapper.dataset.videoTitle,
                    'user_id': userId,
                });
            }
        });

        vimeo.on('ended', function (data) {
            gtag('event', 'video-end', {
                'video_id': videoId,
                'video_playtime': data.seconds,
                'video_title': vimeoWrapper.dataset.videoTitle,
                'user_id': userId,
            });
        });
    </script>
@endsection
