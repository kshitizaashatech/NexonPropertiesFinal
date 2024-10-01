@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h4>Create New Category</h4>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

<<<<<<< HEAD
                    <form action="{{ route('admin.categories.store') }}" method="POST">
=======
                    <form action="{{ route('categories.store') }}" method="POST">
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
                        @csrf

                        {{-- Title Input --}}
                        <div class="form-group mb-3">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
                        </div>

                        {{-- Keywords Input --}}
                        <div class="form-group mb-3" style="display:hidden">
                            <label for="meta_keywords">Keywords</label>
                            <input type="text" name="meta_keywords" id="meta_keywords" class="form-control" value="{{ old('meta_keywords') }}" required>
                        </div>

                        {{-- Submit and Cancel Buttons --}}
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Create Category</button>
<<<<<<< HEAD
                            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Cancel</a>
=======
                            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancel</a>
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<<<<<<< HEAD
@endsection
=======
@endsection
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
