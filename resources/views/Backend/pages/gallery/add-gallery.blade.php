@extends('backend.layout.master')
@section('content')
    <div class="content-wrapper">


        <div class="box box-primary">
            @if (session('status'))
                <div class="alert alert-success">
                </div>
            @endif
            <div class="box-header with-border">
                <h3 class="box-title">Gallery</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{route('gallery.store')}}" method="POST">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Slider  Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Product Name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Description</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Product Type" name="type">
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
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Image</label>
                            <input type="File" class="form-control" id="exampleInputEmail1"  name="image">
                        </div>

                        <!-- textarea -->
                        <div class="form-group">
                            <label>Textarea</label>
                            <textarea class="form-control" rows="3" placeholder="Enter the Description of Slider"></textarea>
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