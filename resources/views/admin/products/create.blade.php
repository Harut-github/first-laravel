@extends('admin.layout')
  @section('title', 'Shop create')
@section('content')

<section class="content">
  <form action="/admin/products" method="POST" enctype="multipart/form-data">
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
              <label for="exampleInputEmail1">цена</label>
              <input type="text" class="form-control {{ $errors->has('price') ? 'error' : ''}}" id="" placeholder="" name="price" value="{{ old('price') }}">
            </div>
    
            <div class="form-group">
              <label for="exampleInputFile">Лицевая картинка</label>
              <input type="file" id="exampleInputFile" name="image" class="">
              
              <p class="help-block">Какое-нибудь уведомление о форматах..</p>
            </div>
            
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for="exampleInputEmail1">кароткая описаня</label>
              <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ old('description') }}</textarea>
            </div>
          </div>

          <div class="col-md-12">
            <div class="form-group">
              <label for="exampleInputEmail1">Полный текст</label>
              <textarea name="content" id="" cols="30" rows="10" class="form-control">{{ old('content') }}</textarea>
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
