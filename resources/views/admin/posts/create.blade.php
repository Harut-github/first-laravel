@extends('admin.layout')
  @section('title', 'Posts create')
@section('content')

<section class="content">
  <form action="/admin/posts" method="POST" enctype="multipart/form-data">
  {{ csrf_field() }}
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Добавляем статью</h3>
        </div>
        <div class="box-body">
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Название</label>
              <input type="text" class="form-control {{ $errors->has('title') ? 'error' : ''}}" id="exampleInputEmail1" placeholder="" name="title" value="{{ old('title') }}">
            </div>
            
            <div class="form-group">
              <label for="exampleInputFile">Лицевая картинка</label>
              <input type="file" id="exampleInputFile" name="image" class="">
             
              <p class="help-block">Какое-нибудь уведомление о форматах..</p>
            </div>
            <div class="form-group">
              <label>Категория</label>
              <select class="form-control select2" style="width: 100%;" name="category_id">
                  @foreach ($categories as $category)
                     <!--  <option selected="selected">Alabama</option>  -->
                      <option value="{{ $category->title }}">{{ $category->title }}</option>
                  @endforeach 
              </select>
            </div>
            <div class="form-group">
              <label>Теги</label>
              <select name="tags[]" class="form-control select2" multiple="multiple" data-placeholder="Выберите теги" style="width: 100%;">
                 @foreach ($tags as $tag)
                    <option value="{{ $tag->title }}">{{ $tag->title }}</option>
                 @endforeach 
              </select>
            </div>
            <!-- Date -->
            <div class="form-group">
              <label>Дата:</label>

              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right" id="datepicker" name="date">
              </div>
              <!-- /.input group -->
            </div>

            <!-- checkbox -->
            <div class="form-group">
              <label>
                <input type="checkbox" class="minimal" name="is_featured">
              </label>
              <label>
                Рекомендовать
              </label>
            </div>

            <!-- checkbox -->
            <div class="form-group">
              <label>
                <input type="checkbox" class="minimal" name="status">
              </label>
              <label>
                Черновик
              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for="exampleInputEmail1">Полный текст</label>
              <textarea name="content" id="" cols="30" rows="10" class="form-control {{ $errors->has('content') ? 'error' : ''}}">{{ old('content') }}</textarea>
          </div>
        </div>
      </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button class="btn btn-default">Назад</button>
          <button class="btn btn-success pull-right">Добавить</button>
        </div>
        @include('admin.errors.index')
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    </form>
    </section>
    <!-- /.content -->
@endsection
