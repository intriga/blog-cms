@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">
            Lista de Posts

            <a href="{{ route('posts.create') }}" class="btn btn-primary btn-sm pull-right">
              crear
            </a>
          </div>

          <div class="panel-body">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th width="10px">ID</th>
                  <th>Nombre</th>
                  <th colspan="3">&nbsp;</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($posts as $post)
                  <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->name }}</td>
                    <td width="10">
                      <a href="{{ route('posts.show', $post->id) }}" class="btn btn-default">
                        Ver
                      </a>
                    </td>
                    <td width="10">
                      <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-default">
                        Editar
                      </a>
                    </td>
                    <td width="10">
                      {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}
                        <button class="btn btn-danger btn-sm">
                          Eliminar
                        </button>
                      {!! Form::close() !!}
                    </td>
                  </tr>    
                @endforeach

              </tbody>
            </table>

            {{ $posts->render() }}

          </div>

        </div>
      </div>
    
    </div>
  </div>
@endsection