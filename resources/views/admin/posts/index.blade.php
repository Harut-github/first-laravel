@extends('admin.layout')
  @section('title', 'Posts index')
@section('content')

<section class="content">

      <!-- Default box -->
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Листинг сущности</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
                <a href="{{ route('posts.create')}}" class="btn btn-success">Добавить</a>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Название</th>
                  <th>Категория</th>
                  <th>Теги</th>
                  <th>Картинка</th>
                  <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($posts as $post)
                    <tr>
                      <td>{{ $post->id}}</td>
                      <td>{{ $post->title}}</td>
                      <td>{{ $post->category_id}}</td>
                      <td>{{ $post->tags}}</td>
                      <td>
                        <img src="/storage/uploadsimg/{{ $post->image }}" alt="" width="100">
                      </td>
                      <td>
                          <!--etumes editi page cherez controller-->
                      <a href="{{ route('posts.edit', $post->id)}}" class="fa fa-pencil"></a>
                          
                         <!--DELETE etumes controler jnjumes uxarkuma es ej noric page-->
                        <form action="{{ route('posts.destroy', $post->id)}}" method="POST">
                          @method('DELETE')
                          @csrf
                          <button onclick="return confirm('вы уверени што хотите удалять???')">
                            <i class="fa fa-remove"></i></button>
                        </form> 
                      </td>
                    </tr>
                  @endforeach 
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
      <!-- /.box -->

    </section>
@endsection
 