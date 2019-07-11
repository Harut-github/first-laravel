@extends('admin.layout')
  @section('title', 'Category index')
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
                <a href="{{ route('categories.create')}}" class="btn btn-success">Добавить</a>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Название</th>
                  <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($categories as $category)
                  <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->title }}</td>
                    <td>
                          <!--etumes editi page cherez controller-->
                      <a href="{{ route('categories.edit', $category->id)}}" class="fa fa-pencil"></a>

                         <!--DELETE etumes controler jnjumes uxarkuma es ej noric page-->
                        <form action="{{ route('categories.destroy', $category->id)}}" method="POST">
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
 