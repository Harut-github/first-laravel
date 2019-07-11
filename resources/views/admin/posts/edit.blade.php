@extends('admin.layout')
  @section('title', 'Posts edit')
@section('content')
    <section class="content">
  <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
    {{ method_field('PATCH') }}
    {{ csrf_field() }}
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Обновляем статью</h3>
        </div>
        
        <div class="box-body">
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Название</label>
              <input type="text" name="title" class="form-control" id="exampleInputEmail1" value="{{$post->title}}"> 
            </div>
            
            <div class="form-group">
              <img src="/storage/uploadsimg/{{ $post->image }}" alt="" class="img-responsive" width="200">
              <label for="exampleInputFile">Лицевая картинка</label>
              <input type="file" id="exampleInputFile" name="image">
                
              <p class="help-block">Какое-нибудь уведомление о форматах..</p>
            </div>
            <div class="form-group">
              <label>Категория</label>
              <select class="form-control select2" style="width: 100%;" name="category_id">
                <option value="{{ $post->category_id }}">{{ $post->category_id }}</option>
                  @foreach ($categories as $category)
                     <option value="{{ $category->title }}">{{ $category->title  }}</option>
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
                <input type="text" class="form-control pull-right" id="datepicker" name="date" value="{{$post->date}}">
              </div>
              <!-- /.input group -->
            </div>

            <!-- checkbox -->
            <div class="form-group">
              <label>
                <input type="checkbox" class="minimal" name="is_featured" value="{{ $post->is_featured}} ">
              </label>
              <label>
                Рекомендовать
              </label>
              
            </div>
            <!-- checkbox -->
            <div class="form-group">
              <label>
                <input type="checkbox" class="minimal" name="status" value="{{$post->status}}">
              </label>
              <label>
                Черновик
              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for="exampleInputEmail1">Полный текст</label>
              <textarea name="content" id="" cols="30" rows="10" class="form-control">{{$post->content}}
              </textarea>
          </div>
        </div>
      </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button class="btn btn-default">Назад</button>
          <button class="btn btn-warning pull-right">Изменить</button>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    </form>
    </section>
    <!-- /.content -->
@endsection


