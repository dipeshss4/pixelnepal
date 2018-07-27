@extends('backend.layout.master')
@section('content')
    <div class="content-wrapper">


        <div class="box box-primary">
            @if (session('status'))
                <div class="alert alert-success">
                </div>
            @endif
            <div class="box-header with-border">
                <h3 class="box-title">Product</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{route('category.store')}}" method="POST">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Product Name" name="name">
                    </div>

                    <div class="form-group">
                        <div class="radio">
                            <label>
                                <input type="radio" name="status" id="optionsRadios1" value="1" checked>
                                Active
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="status" id="optionsRadios2" value="0">
                                Deactive
                            </label>
                        </div>

                    </div>

                    <!-- /.box-body -->

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection