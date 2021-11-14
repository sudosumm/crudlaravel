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
                    @if (isset($article))
                        {!! Form::model($article, ['url' => route('admin.articles.update' , $article->id),'method' => 'patch']) !!}
                    @else
                        {!! Form::open(['url' => route('admin.articles.store'),'method' => 'post']) !!}
                    @endif

                    <div class="form-group">

                        <label for="title">عنوان</label>
                        {!! Form::text('title' , null ,[ 'class'=>'form-control' , 'id' =>'title','placeholder' => 'عنوان را وارد کنید']) !!}

                        <label for="category">دسته بندی</label>
                        {!! Form::select('category_id' ,$categories->pluck('title','id'), null ,[ 'class'=>'form-control' , 'id' =>'category','placeholder' => 'دسته بندی را وارد کنید']) !!}

                        <label for="body">متن اصلی</label>
                        {!! Form::textarea('body' , null ,[ 'class'=>'form-control' , 'id' =>'body','placeholder' => 'متن را وارد کنید']) !!}

                    </div>
                    {!! Form::submit('ارسال' , ['class'=>'btn btn-primary']) !!}
                    {!! Form::close() !!}

                    <a href="{{ route('admin.articles.index') }}">
                        <button class="btn btn-danger">انصراف</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
