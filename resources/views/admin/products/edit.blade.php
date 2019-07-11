@extends('admin.layout')
  @section('title', 'Product edit')
@section('content')
    <section class="content">
  <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
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
              <input type="text" name="title" class="form-control {{ $errors->has('title') ? 'error' : ''}}" id="exampleInputEmail1" value="{{$product->title}}"> 
            </div>

             <div class="form-group">
              <label for="exampleInputEmail1">цена</label>
              <input type="text" class="form-control {{ $errors->has('price') ? 'error' : ''}}" id="" placeholder="" name="price" value="{{$product->price}}">
            </div>

            <div class="form-group">
              <img src="/storage/uploadsimg/{{ $product->image }}" alt="" class="img-responsive" width="200">
              <label for="exampleInputFile">Лицевая картинка</label>
              <input type="file" id="exampleInputFile" name="image">
                
              <p class="help-block">Какое-нибудь уведомление о форматах..</p>
            </div>
           
          </div>

           <div class="col-md-12">
            <div class="form-group">
              <label for="exampleInputEmail1">кароткая описаня</label>
              <textarea name="description" id="" cols="30" rows="10" class="form-control">{{$product->description}}</textarea>
            </div>
          </div>

          <div class="col-md-12">
            <div class="form-group">
              <label for="exampleInputEmail1">Полный текст</label>
              <textarea name="content" id="" cols="30" rows="10" class="form-control">{{$product->content}}
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
          @include('admin.errors.index')
      </div>
      <!-- /.box -->
    </form>
    </section>
    <!-- /.content -->
@endsection


