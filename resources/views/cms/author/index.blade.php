@extends('cms.parant')


@section('titel','Index author')

@section('styles')

@endsection
@section('Maintitel','Index author')

@section('subtitel','index author')

@section('content')

<div class="col-12">
    <div class="card">
      <div class="card-header">
        {{-- <h3 class="card-title">author of Table</h3> --}}
        <a href="{{ route('authors.create') }}" type="button"
        class="btn btn-primary">Add New author</a>

        <div class="card-tools">

        </div>
      </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table  text-nowrap">
            <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                {{-- <th>LastName</th> --}}
                <th>Email</th>
                <th>Mobile</th>
                <th>Article</th>
                <th>Status </th>
                <th>Gender</th>
                <th>BirthDate</th>
                <th>Image</th>
                <th>Setting</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($authors as $author)

                <tr>
                    <td>{{ $author->id }}</td>
                    {{-- يجوز الوجهان في كتابة البديل في هدول المثالين --}}
        <td>{{ $author->user ? $author->user->first_name.' '.$author->user->last_name: 'not found'  }}</td>
                    {{-- <td>{{ $author->user ? $author->user->last_name : 'not found' }}</td> --}}
                    <td>{{ $author->email}}</td>
                    <td>{{ $author->user->mobile??'not found'  }}</td>

                    <td><a href="{{route('indexArticles',['id'=>$author->id])}}"
                        class="btn btn-info">({{$author->articles_count}})
                        article/s</a> </td>

                    <td>{{ $author->user->status ?? 'not found' }}</td>
                    <td>{{ $author->user->gender ?? 'not found' }}</td>
                    <td>{{ $author->user->birth_date ?? 'not found' }}</td>
                    <td>

                        <img class="img-circle img-bordered-sm "
                        src="{{ $author->user ? asset('storage/images/authors/'.$author->user->image) : asset('image/Backend_Roadmap _.jpg') }}"
                        width="50" height="50" alt="User Image">
                    </td>


                <td>
            <div class="btn-group-sm card-body">
            <a href={{ route('authors.edit', $author->id ) }} type="button" class="btn btn-primary">edit</a>
            <a href="#"  onclick="performDestroy({{ $author->id }}, this)"
                type="button" class="btn btn-danger">Delete</a>

                {{-- <button type="button" class="btn btn-success">info</button> --}}
                    </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    {{ $authors->links() }}
    <!-- /.card -->
</div>

@endsection
@section('script')
<script>




function performDestroy(id,referance) {
        let url= '/news/admin/authors/'+id;
        confirmDestroy(url,referance)

    }
</script>
@endsection

