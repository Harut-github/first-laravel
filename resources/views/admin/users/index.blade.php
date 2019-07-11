@extends('admin.layout')
  @section('title', 'User ')
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
                <a href="{{ route('tags.create')}}" class="btn btn-success">Добавить</a>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Название</th>
                  <th>E-mail</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($users as $user)
                  <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                          <!--etumes editi page cherez controller-->
                      <a href="{{ route('users.edit', $user->id)}}" class="fa fa-pencil"></a>

                         <!--DELETE etumes controler jnjumes uxarkuma es ej noric page-->
                        <form action="{{ route('users.destroy', $user->id)}}" method="POST">
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
 