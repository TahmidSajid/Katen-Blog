<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend-assets') }}/images/favicon.png">

    <!-- STYLES -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css" /> --}}
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend-assets') }}/css/style.css" type="text/css" media="all">
    {{-- <link rel="stylesheet" href="{{ asset('su') }}"> --}}
    <title>Document</title>
    <style>
        .note-btn-group .note-btn {
            color: black;
            background: white;
        }
        input{
            height: 40px!important;
        }
    </style>
</head>

<body>
    <div class="container" style="padding-top: 100px">
        <div class="row">
            <div class="col-lg-12 text-center">
                <img src="{{ asset('frontend-assets/images/logo.svg') }}" alt="img" srcset="">
                <h2>Write a post here.....</h2>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12">
                <form action="{{ route('post.store') }}" class="mx-auto" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="messages"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Name input -->
                            <div class="form-group">
                                <input type="text" class="form-control" name="blog_title"
                                    placeholder="Enter Your Blog Title">
                                @error('blog_title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <!-- Name input -->
                            <div class="form-group">
                                <input type="file" class="form-control" name="blog_photo">
                                @error('blog_photo')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <!-- Email input -->
                            <div class="form-group">
                                <select class="form-select form-control" name="category">
                                    <option value="#" selected>Open this select menu</option>
                                    @forelse (App\Models\Categories::all() as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}
                                        </option>
                                    @empty
                                        <option value="">Nothing added yet</option>
                                    @endforelse
                                </select>
                                @error('category')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="column col-md-12">
                            <textarea name="blog" id="summernote" cols="30" rows="10"></textarea>
                            @error('blog')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="column col-md-12 my-3 text-right">
                            <button class="btn btn-danger rounded-pill" type="submit"
                                style="font-size: 20px; background: linear-gradient(to right, #FE4F70 0%, #FFA387 100%) !important">Post</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    </script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                tabsize: 2,
                height: 400,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });
    </script>
</body>

</html>
