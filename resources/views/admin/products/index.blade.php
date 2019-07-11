@extends('admin.layout')
  @section('title', 'Shop index')
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
                <a href="{{ route('products.create')}}" class="btn btn-success">Добавить</a>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Название</th>
                  <th>цена</th>
                  <th>Картинка</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($products as $product)
                    <tr>
                      <td>{{ $product->id}}</td>
                      <td>{{ $product->title}}</td>
                      <td>{{ $product->price}}$</td>
                      <td>
                        <img src="/storage/uploadsimg/{{ $product->image }}" alt="" width="100">
                      </td>
                      <td>
                          <!--etumes editi page cherez controller-->
                      <a href="{{ route('products.edit', $product->id)}}" class="fa fa-pencil"></a>
                          
                         <!--DELETE etumes controler jnjumes uxarkuma es ej noric page-->
                        <form action="{{ route('products.destroy', $product->id)}}" method="POST">
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
 