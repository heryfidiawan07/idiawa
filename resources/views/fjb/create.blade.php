@extends('layouts.app')

@section('content')
<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default" style="padding: 5px 5px; margin-left: -20px; margin-right: -20px;">
        <form action="" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
            <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }} ">
                <label for="title">Judul</label>
                <input type="text" name="title" id="title" class="form-control" value="{{old('title')}}">
                <span class="help-block" style="color: red;"><i>{{ Session::get('ganti') }}</i></span>
                @if($errors->has('title'))
                    <span class="help-block"> {{$errors->first('title')}} </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('tag_id') ? ' has-error' : '' }} ">
                <label for="tag_id">Kategori</label>
                <select name="tag_id" id="tag_id" class="form-control">
                    <option value="">Pilih Kategori</option>
                    @foreach($jtags as $jtag)
                        <option value=" {{$jtag->id}} "> {{$jtag->name}} </option>
                    @endforeach
                </select>
                @if($errors->has('tag_id'))
                    <span class="help-block"> {{$errors->first('tag_id')}} </span>
                @endif
            </div>
            <div class="form-group form-inline {{ $errors->has('hargaNormal') ? ' has-error' : '' }} ">
                <label for="hargaNormal" style="width: 100px;">Harga Normal</label>
                <input type="number" name="hargaNormal" value="{{old('hargaNormal')}}" class="form-control bfh-number" placeholder="example : 5000">
                @if($errors->has('hargaNormal'))
                    <span class="help-block"> {{$errors->first('hargaNormal')}} </span>
                @endif
            </div>
            <div class="form-group form-inline {{ $errors->has('diskon') ? ' has-error' : '' }} ">
                <label for="diskon" style="width: 100px;">Diskon</label>
                <input type="number" name="diskon" value="{{old('diskon')}}" class="form-control bfh-number" placeholder="example : 1000">
                @if($errors->has('diskon'))
                    <span class="help-block"> {{$errors->first('diskon')}} </span>
                @endif
            </div>

            @include('layouts.partials.uploadfjb')
            
            <div class="form-group {{ $errors->has('deskripsi') ? ' has-error' : '' }} ">
                <label for="deskripsi">Deskripsi</label>
                <label class="pull-right">
                    url gambar ? upload <a href="http://fidiupload.esy.es/"><u>disini</u></a>
                </label>
                <textarea name="deskripsi" id="deskripsi" rows="20" class="form-control">{{old('deskripsi')}}</textarea>
                @if($errors->has('deskripsi'))
                    <span class="help-block"> {{$errors->first('deskripsi')}} </span>
                @endif
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary btn-sm" value="post">
            </div>
        </form>
    </div>
</div>

@endsection
@section('js')
    <script type="text/javascript" src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script type="text/javascript" src="/js/comtiny.js"></script>
@endsection