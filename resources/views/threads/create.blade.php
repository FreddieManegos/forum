@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create New Thread</div>

                    <div class="card-body">
                        <form action="">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" placeholder="title">
                            </div>

                            <div class="form-group">
                                <label for="title">Body</label>
                                <textArea class="form-control" name="body" id="body" placeholder="body"></textArea>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
