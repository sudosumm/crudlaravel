@extends('admin.master')

@section('title','فرم دسته بندی مقالات')

@section('main-content')

    <div class="row">
        <div class="col-md-12 animatedParent animateOnce z-index-50">
            <div class="panel panel-primary animated fadeInUp go">
                <div class="panel-heading clearfix">
                    <div class="panel-title">Primary Panel</div>
                </div>

                <!-- panel body -->
                <div class="panel-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (isset($category))
                        {!! Form::model($category, ['url' => route('admin.categories.update' , $category->id),'method' => 'patch','enctype' => 'multipart/form-data']) !!}
                    @else
                        {!! Form::open(['url' => route('admin.categories.store'),'method' => 'post','enctype' => 'multipart/form-data']) !!}
                    @endif

                    <div class="form-group">
                        <label for="title">عنوان</label>
                        {!! Form::text('title' , null ,[ 'class'=>'form-control' , 'id' =>'title','placeholder' => 'عنوان را وارد کنید']) !!}
                    </div>
                    <div class="form-group">
                        <label for="image">عکس</label>
                        {!! Form::file('image' , null ,[ 'class'=>'form-control' , 'id' =>'image','placeholder' => 'عکس را وارد کنید']) !!}
                    </div>
                    <div class="form-group">
                        <label for="status">انتشار</label>
                        {!! Form::checkbox('status') !!}
                    </div>

                    {!! Form::submit('ارسال' , ['class'=>'btn btn-primary']) !!}
                    {!! Form::close() !!}

                    <a href="{{ route('admin.categories.index') }}">
                        <button class="btn btn-danger">انصراف</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
