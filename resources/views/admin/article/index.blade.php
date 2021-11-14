@extends('admin.master')

@section('title','مدیریت مقالات')

@section('main-content')

    <div class="row">
        <div class="col-lg-12 animatedParent animateOnce z-index-47">
            <div class="panel panel-primary animated fadeInUp go">
                <div class="panel-heading clearfix">
                    <h3 class="panel-title">مقالات</h3>
                    <a href="{{ route('admin.articles.create') }}">
                        <button class="btn btn-success">ایجاد</button>
                    </a>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>عنوان</th>
                                <th>دسته بندی</th>
                                <th>ویرایش</th>
                                <th>حذف</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach( $articles as $article )
                                <tr>
                                    <th scope="row">{{ $article->id }}</th>
                                    <td>{{ $article->title }}</td>
                                    <td>{{ $article->category->title }}</td>
                                    <td>
                                        <a href="{{ route('admin.articles.edit',$article->id) }}">
                                        <button class="btn btn-blue">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        </a>
                                    </td>
                                    <td>
                                        {!! Form::open(['url' => route('admin.articles.destroy',$article->id),'method' => 'delete']) !!}
                                        <button class="btn btn-danger">
                                            <i class="fa fa-remove"></i>
                                        </button></td>
                                    {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
