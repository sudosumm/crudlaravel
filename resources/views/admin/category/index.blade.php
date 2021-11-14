@extends('admin.master')

@section('title','مدیریت دسته بندی مقالات')

@section('main-content')

    <div class="row">
        <div class="col-lg-12 animatedParent animateOnce z-index-47">
            <div class="panel panel-primary animated fadeInUp go">
                <div class="panel-heading clearfix">
                    <h3 class="panel-title">دسته بندی مقالات</h3>
                    <a href="{{ route('admin.categories.create') }}">
                        <button class="btn btn-success">ایجاد</button>
                    </a>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>عکس</th>
                                <th>عنوان</th>
                                <th>ویرایش</th>
                                <th>حذف</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach( $categories as $category )
                                <tr>
                                    <th scope="row">{{ $category->id }}</th>
                                    <th>
                                        <img class="avatar img-circle" src="{{ Storage::url($category->image) }}" alt="" title="">
                                    </th>
                                    <td>{{ $category->title }}</td>
                                    <td>
                                        <a href="{{ route('admin.categories.edit',$category->id) }}">
                                        <button class="btn btn-blue">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        </a>
                                    </td>
                                    <td>
                                        {!! Form::open(['url' => route('admin.categories.destroy',$category->id),'method' => 'delete']) !!}
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
