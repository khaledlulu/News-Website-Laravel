@extends('cms.parant')


@section('titel','Index Comment')

@section('styles')

@endsection
@section('Maintitel','Index Comment')

@section('subtitel','index comment')

@section('content')

<div class="col-12">
    <div class="card">
      <div class="card-header">
        <div class="card-tools">

        </div>
      </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table  text-nowrap">
            <thead>
            <tr>
                <th>ID</th>
                <th>Comment</th>
                <th>Number it Article </th>
                <th>setting</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($comments as $comment)

                <tr>
                    <td>{{ $comment->id }}</td>
                    <td>{{ $comment->comment }}</td>
                    <td>{{ $comment->article_id }}</td>
                    <td>

                    <div class="btn ">
            <a href="#"  onclick="performDestroy({{ $comment->id }} , this)"
                type="button" class="btn btn-danger">Delete</a>
                    </div>

                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    {{ $comments->links() }}
    <!-- /.card -->
</div>

@endsection
@section('script')
<script>

    function performDestroy(id,referance) {
        // let url= '/news/admin/cities/'+id;
        confirmDestroy('/news/admin/comments/'+id,referance)

    }
</script>
@endsection
