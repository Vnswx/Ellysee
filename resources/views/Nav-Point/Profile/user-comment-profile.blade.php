@extends('Layout.layout')
{{-- @include('Layout.header') --}}
@section('header')
    @include('Layout.header')
@endsection

@section('content')
    <style>
        .card-img {
            max-width: 100%;
        }

        /* line 5, src/assets/scss/theme.scss */
        a,
        .a:hover {
            -webkit-transition: all 0.2s;
            transition: all 0.2s;
        }

        /* line 8, src/assets/scss/theme.scss */
        @media screen and (min-width: 992px) {
            .card-columns {
                -webkit-column-count: 4;
                column-count: 5;
                -webkit-column-gap: 1.25rem;
                column-gap: 1.25rem;
                orphans: 1;
                widows: 1;
            }
        }

        /* line 13, src/assets/scss/theme.scss */
        .border-round-0 {
            border-radius: 0;
        }

        /* line 16, src/assets/scss/theme.scss */
        .mt-neg100 {
            margin-top: -100px;
        }

        /* line 19, src/assets/scss/theme.scss */
        .min-50vh {
            min-height: 50vh;
        }

        /* line 22, src/assets/scss/theme.scss */
        .dropdown-header {
            font-size: 1.5rem;
        }

        /* line 25, src/assets/scss/theme.scss */
        .fixed-top {
            border-bottom: 1px solid #f1f1f1;
        }

        /* line 28, src/assets/scss/theme.scss */
        footer.footer {
            border-top: 1px solid #f1f1f1;
        }

        /* line 31, src/assets/scss/theme.scss */
        .nav-link,
        .dropdown-item {
            font-weight: 700;
        }

        /* line 32, src/assets/scss/theme.scss */
        .navbar {
            padding: 0.5rem 2rem;
        }

        /* line 34, src/assets/scss/theme.scss */
        .overlay {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            height: 100%;
            width: 100%;
            opacity: 0;
            -webkit-transition: .2s ease;
            transition: .2s ease;
            background-color: #008CBA;
        }

        /* line 46, src/assets/scss/theme.scss */
        .card {
            border: 0;
        }

        /* line 47, src/assets/scss/theme.scss */
        .card-pin:hover .overlay {
            opacity: .5;
            border: 5px solid #f3f3f3;
            -webkit-transition: ease .2s;
            transition: ease .2s;
            background-color: #000000;
            cursor: -webkit-zoom-in;
            cursor: zoom-in;
        }

        /* line 55, src/assets/scss/theme.scss */
        .more {
            color: white;
            font-size: 14px;
            position: absolute;
            bottom: 0;
            right: 0;
            text-transform: uppercase;
            -webkit-transform: translate(-20%, -20%);
            transform: translate(-20%, -20%);
            -ms-transform: translate(-50%, -50%);
        }

        /* line 66, src/assets/scss/theme.scss */
        .card-pin:hover .card-title {
            color: #ffffff;
            margin-top: 10px;
            text-align: center;
            font-size: 1.2em;
        }

        /* line 73, src/assets/scss/theme.scss */
        .card-pin:hover .more a {
            text-decoration: none;
            color: #ffffff;
        }

        /* line 78, src/assets/scss/theme.scss */
        .card-pin:hover .download a {
            text-decoration: none;
            color: #ffffff;
        }

        /* line 83, src/assets/scss/theme.scss */
        .social {
            position: relative;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
        }

        /* line 88, src/assets/scss/theme.scss */
        .social .fa {
            margin: 0 3px;
        }

        .card-columns {
            -webkit-column-count: 4;
            column-count: 5;
            -webkit-column-gap: 1.25rem;
            column-gap: 1.25rem;
            orphans: 1;
            widows: 1;
        }
    </style>
    <style>
        a {
            text-decoration: none;
        }

        .Instagram-card {
            background: #ffffff;
            border: 1px solid #f2f2f2;
            border-radius: 3px;
            width: 100%;
            max-width: 900px;
            margin: auto;
            display: flex;
            overflow: auto;
        }

        .Instagram-card-header {
            padding: 0px;
            height: 40px;
        }

        .Instagram-card-user-image {
            border-radius: 50%;
            width: 40px;
            height: 40px;
            vertical-align: middle;
        }

        .Instagram-card-time {
            float: right;
            width: 80px;
            padding-top: 10px;
            text-align: right;
            color: #999;
        }

        .Instagram-card-user-name {
            margin-left: 5px;
            font-weight: bold;
            color: #262626;
        }

        .Instagram-card-content {
            padding: 20px;
            width: 600px;
        }

        .Likes {
            font-weight: bold;
        }

        .Instagram-card-content-user {
            font-weight: bold;
            color: #262626;
        }

        .hashtag {
            color: #003569;
        }

        .comments {
            color: #999;
        }

        .user-comment {
            color: #003569;
        }

        .Instagram-card-footer {
            padding-top: 20px;
            padding-left: 20px;
            align-items: center;
            clear: both;
        }

        hr {
            border: none;
            border-bottom: 1px solid #ccc;
            margin-top: 30px;
            margin-bottom: 0px;
            padding-bottom: 0px;

        }


        .footer-action-icons {
            position: relative;
            top: 49px;
            left: 25px;
            font-size: 25px;
            color: #ccc;
            border: none;
            background: none;
            padding: 0;
        }

        .likes {
            position: absolute;
            top: 49px;
            left: 5px;
        }

        .Likess {
            font-weight: bold;
        }

        .fa-heart:hover {
            background-color: white !important
        }



        .comments-input {
            border: none;
            margin-left: 10px;
            width: 100%;
        }
    </style>

    <style>
        /* Gaya untuk tampilan gambar penuh */
        .full-image-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .full-image-overlay img {
            max-width: 90%;
            max-height: 90%;
        }

        .like-button {
            background-color: transparent;
            border: none;
            cursor: pointer;
        }

        .like-button i::before {

            color: rgb(181, 176, 176);
            /* Warna default ikon hati sebelum diklik */
        }

        .like-button.liked i::before {
            color: red;
        }

        .komentar-list {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .komentar {
            margin-bottom: 5px;
        }

        .komentar strong {
            color: #333;
            font-weight: bold;
        }

        /* Gaya untuk isi komentar */
        .komentar p {
            margin-top: 5px;
            color: #666;
        }

        .comment-time-wrapper {
            font-size: smaller;
            margin-bottom: 20px
        }

        .comment-time {}

        .fieldInput {
            display: block;
            width: 345px;
            height: 40px;
            left: 60px;
            position: relative;
            box-shadow: 0 4px 20px 0 rgba(0, 0, 0, 0.09);
            border-radius: 35px;
            overflow: hidden;

            .form-input {
                width: 100%;
                background: none;
                border: none;
                height: 40px;
                padding: 10px 20px;
                font-size: 12px;
                color: #6A7C92;

                &:focus {
                    outline: none;
                }
            }

            .form-submit {
                font-size: 12px;
                color: #6A7C92;
                position: absolute;
                right: 0;
                top: 0;
                width: 70px;
                height: 40px;
                border-radius: 17px;
                border: none;
                background: none;
                box-shadow: 5px -2px 81px 1px rgba(0, 0, 0, 0.09);
                cursor: pointer;
            }

            @media screen and (max-width: 768px) {
                .Instagram-card-footer {
                    display: flex;
                    flex-direction: column-reverse;
                    align-items: flex-end;
                }

                .komentar-list {
                    max-height: 200px;
                    overflow-y: auto;
                    width: 100%;
                }

                .footer-action-icons {
                    margin-top: 10px;
                }
            }

        }
    </style>
    <!-- related-photo-detail.blade.php -->
@section('content')
    <div class="Instagram-card" style="margin-top: 10rem; margin-bottom: 5rem; position: relative">
        <div class="Instagram-card-image">
            <img id="foto_{{ $photo->id }}" src="{{ Storage::url($photo->lokasifile) }}"
                style="max-width: 450px; cursor: pointer;"
                onclick="showFullImage('{{ Storage::url($photo->lokasifile) }}', 'foto_{{ $photo->id }}')">
        </div>

        <div class="Instagram-card-content">
            <div class="Instagram-card-header">
                @if (isset($userName) && isset($userProfileImage))
                    @if ($userProfileImage === 'images/default_profile.jpg')
                        <img src="{{ asset('images/default_profile.jpg') }}" alt="Profile Image"
                            class="Instagram-card-user-image" width="80">
                    @else
                        <img src="{{ asset('storage/' . $userProfileImage) }}" alt="Profile Image"
                            class="Instagram-card-user-image" width="80">
                    @endif
                    <a class="Instagram-card-user-name" href="{{ $userName }}">
                        {{ $userName }}
                    </a>
                    <div class="Instagram-card-time"> 1 sem </div>
                @endif
            </div>
            <p class="Likess" style="margin-top: 2rem;">{{ $photo->judulfoto }}</p>
            <p>{{ $photo->deskripsifoto }}</p>

            @if ($relatedComments->count() > 0)
                <p class="comments">{{ $relatedComments->count() }} Comments</p>
            @else
                <!-- Kode untuk menampilkan ketika tidak ada komentar -->
                <p>No comments yet.</p>
            @endif
            <hr>
            <div class="Instagram-card-footer">
                @if ($relatedComments->count() > 0)
                    <div class="komentar-list" style="max-height: 265px; overflow-y: auto;">
                        @foreach ($relatedComments as $comment)
                            <div class="komentar">
                                <strong>{{ $comment->user->name }}</strong>:
                                {{ $comment->komentar }}
                                <div class="comment-time-wrapper" data-last="{{ $loop->last ? 'true' : 'false' }}">
                                    <span class="comment-time">{{ $comment->formatted_time }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p style="margin-bottom: 50px; position: relative; left: 120px; width: 150px">No comments yet.</p>
                @endif

                <div class="formContainer" style="position: absolute; bottom: 0; margin-bottom: 10px;">
                    <form id="likeForm" action="{{ route('like') }}" method="POST">
                        @csrf
                        <input type="hidden" name="photo_id" value="{{ $photo->id }}">
                        <p id="totalLikes" class="likes">{{ $relatedLikes }}</p>
                        @if ($photo->likedByUser())
                            <button type="submit" class="footer-action-icons" style="outline: none;"><i class="fa fa-heart"
                                    style="color: #f00030;"></i></button>
                        @else
                            <button type="submit" class="footer-action-icons" style="outline: none;"><i class="fa fa-heart"
                                    style="color: #ccc;"></i></button>
                        @endif
                    </form>

                    <form action="{{ route('comment.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="photo_id" value="{{ $photo->id }}">
                        <fieldset class="fieldInput">
                            <input name="komentar" class="form-input" type="text" placeholder="Comment Here!">
                            <button type="submit" class="form-submit">Enter</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: 9vw">
        <div class="row">
            <div class="card-columns" style="margin-left: 1vw;margin-right: 1vw">
                @foreach ($relatedPhotos as $relatedPhoto)
                    <div class="card card-pin">
                        <a href="{{ route('related-photo-detail', encrypt($relatedPhoto->id)) }}">
                            <img class="card-img" src="{{ Storage::url($relatedPhoto->lokasifile) }}" alt="Card image">
                            <div class="overlay">
                                <h2 class="card-title title">{{ $relatedPhoto->judulfoto }}</h2>
                                <div class="more">
                                    <a href="{{ route('related-photo-detail', encrypt($relatedPhoto->id)) }}">
                                        <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> More </a>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <script>
        setInterval(function() {
            var currentTime = new Date();
            $('.comment-time').each(function() {
                var commentTime = new Date($(this).data('time'));
                $(this).text(formatCommentTime(commentTime, currentTime));
            });
        }, 1000); // Update setiap detik
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var lastComment = document.querySelector('.comment-time-wrapper[data-last="true"]');
            if (lastComment) {
                lastComment.style.marginBottom = "40px";
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '#likeForm button[type="submit"]', function(e) {
                e.preventDefault(); // Mencegah aksi default formulir

                $.ajax({
                    type: 'POST',
                    url: $('#likeForm').attr('action'),
                    data: $('#likeForm').serialize(),
                    success: function(response) {
                        if (response.liked) {
                            $('#likeForm button[type="submit"]').html(
                                '<i class="fa fa-heart" style="color: #f00030;"></i>'
                            );
                        } else {
                            $('#likeForm button[type="submit"]').html(
                                '<i class="fa fa-heart" style="color: #ccc;"></i>'
                            );
                        }

                        $('#totalLikes').text(response.totalLikes);

                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endsection

@section('footer')
    @include('Layout.footer')
@endsection
