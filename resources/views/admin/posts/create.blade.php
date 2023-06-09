@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Добавить статью
                <small>приятные слова..</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Добавляем статью</h3>
                        @include('admin.errors')
                    </div>
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Название</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="title"
                                       value="{{ old('title') }}" placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Лицевая картинка</label>
                                <input type="file" name="image" id="exampleInputFile">

                                <p class="help-block">Какое-нибудь уведомление о форматах..</p>
                            </div>

                            <div class="form-group">
                                <label>Категория</label>
                                {{Form::select('category_id',
                                    $categories,
                                    null, ['class' => 'form-control select2'])
                                    }} {{ Form::close() }}
{{--                                <select class="form-control select2" style="width: 100%;">--}}
{{--                                    <option selected="selected">Alabama</option>--}}
{{--                                    <option>Alaska</option>--}}
{{--                                    <option>California</option>--}}
{{--                                    <option>Delaware</option>--}}
{{--                                    <option>Tennessee</option>--}}
{{--                                    <option>Texas</option>--}}
{{--                                    <option>Washington</option>--}}
{{--                                </select>--}}
                            </div>
                            <div class="form-group">
                                <label>Теги</label>
                                {{Form::select('tags[]',
                             $tags,
                             null, ['class' => 'form-control select2',
                               'multiple' => "multiple",
                               'data-placeholder' => "Выберите теги",
                               ]
                               )}} {{ Form::close() }}
{{--                                <select class="form-control select2" multiple="multiple"--}}
{{--                                        data-placeholder="Выберите теги" style="width: 100%;">--}}
{{--                                    <option>Alabama</option>--}}
{{--                                    <option>Alaska</option>--}}
{{--                                    <option>California</option>--}}
{{--                                    <option>Delaware</option>--}}
{{--                                    <option>Tennessee</option>--}}
{{--                                    <option>Texas</option>--}}
{{--                                    <option>Washington</option>--}}
{{--                                </select>--}}
                            </div>
                            <!-- Date -->
                            <div class="form-group">
                                <label>Дата:</label>

                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" id="datepicker" name="date"
                                           value="{{ old('date') }}">

                                </div>
                                <!-- /.input group -->
                            </div>

                            <!-- checkbox -->
                            <div class="form-group">
                                <label>
{{--                                    <link rel="stylesheet" href="{{ asset('/admin/plugins/iCheck/minimal/blue.png') }}">--}}
                                    <input type="checkbox" name="is_featured" class="minimal">
                                </label>
                                <label>
                                    Рекомендовать
                                </label>
                            </div>

                            <!-- checkbox -->
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="status" class="minimal">
                                </label>
                                <label>
                                    Черновик
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Описание</label>
                                <textarea name="description" id="" cols="30" rows="10" class="form-control">
                                    {{ old('description') }}
                                </textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Полный текст</label>
                                <textarea name="content" id="summary-ckeditor" cols="30" rows="10"
                                          class="form-control">{{ $post->content }}
                            </textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button class="btn btn-default">Назад</button>
                        <button class="btn btn-success pull-right">Добавить</button>
                    </div>
                    <!-- /.box-footer-->
                </div>
                <!-- /.box -->
            </form>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
