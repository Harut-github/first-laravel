@extends('admin.layout')
  @section('title', 'Tag create')
@section('content')
<section class="content">
<form action="/admin/tags" method="POST">
    {{ csrf_field() }}
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Добавляем категорию</h3>
        </div>
        <div class="box-body">
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Название</label>
              <input type="text" name="title" class="form-control {{ $errors->has('title') ? 'error' : ''}}" id="exampleInputEmail1"  value="{{ old('title') }}">
            </div>
        </div>
      </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <a href="/admin/tags" class="btn btn-default">Назад</a>
          <button class="btn btn-success pull-right">Добавить</button>
        </div>
        @include('admin.errors.index')
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
</form>
</section>
@endsection
