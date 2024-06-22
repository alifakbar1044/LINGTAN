@extends('layout.home')
@section('header')

@endsection
@section('content')
<section class="card">
    <div class="card-header">
        <h3 class="card-title text-dark">Edit jawaban anda</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="/forum/update/{{$jawaban->id}}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="card-body">
            <input type="text" name="pertanyaan" value="{{$jawaban->pertanyaan->id}}" hidden>
            <div class="form-group">
                <label for="judul">Pertanyaan</label>
                <input type="text" class="form-control  @error('judul') is-invalid @enderror" name="judul" placeholder="masukan judul" id="judul" value="{{$jawaban->pertanyaan->judul}}" readonly>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Masukan jawaban anda</label>
                <textarea name="isi" id="isi" class="form-control my-editor">{!!$jawaban->isi!!}</textarea>
                @error('isi')
                <div class="invalid-feedback mt-2">{{ $message }}</div>
                @enderror
            </div>
            <a href="/forum/show/{{$jawaban->pertanyaan->id}}" type="submit" class="btn btn-light mt-3">kembali</a>
            <button type="submit" class="btn btn-light mt-3">Submit</button>
        </div>
        <!-- /.card-body -->
    </form>
</section>
@endsection
@section('footer')
<script>
    var editor_config = {
        path_absolute: "/",
        selector: "textarea.my-editor",
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        relative_urls: false,
        file_browser_callback: function(field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
            if (type == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

        }
    };
</script>
@endsection