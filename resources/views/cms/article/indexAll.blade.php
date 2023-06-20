@extends('cms.parant')


@section('titel','Index Article')

@section('styles')

@endsection
@section('Maintitel','Index Article')

@section('subtitel','index article')

@section('content')

<div class="col-12">
    <div class="card">
      <div class="card-header">
        {{-- <h3 class="card-title">Article of Table</h3> --}}
    {{-- <a href="{{ route('createArticle',$id) }}" type="button"class="btn btn-primary">Add New Article</a> --}}

        <div class="card-tools">

        </div>
      </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table  text-nowrap">
            <thead>
            <tr>
                <th>ID</th>
                <th>Article Title</th>
                <th>Description Article </th>
                {{-- <th>setting</th> --}}
            </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)

                <tr>
                    <td>{{ $article->id }}</td>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->short_description }}</td>
                    <td>{{ $article->full_description }}</td>

                    {{-- <td>
                    <div class="btn ">
            <a href={{ route('articles.edit', $article->id ) }} type="button" class="btn btn-primary">edit</a>
            <a href="#"  onclick="performDestroy({{ $article->id }} , this)"
                type="button" class="btn btn-danger">Delete</a>
                <button type="button" class="btn btn-success">info</button>
                    </div>
                    </td> --}}

                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    {{ $articles->links() }}
    <!-- /.card -->
</div>

@endsection
@section('script')
<script>

    function performDestroy(id,referance) {
        // let url= '/news/admin/cities/'+id;
        confirmDestroy('/news/admin/articles/'+id,referance)

    }
</script>
@endsection
