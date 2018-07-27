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
        <form role="form" action="{{route('product.store')}}" method="POST">
            @csrf


            <div class="box-body">
                <div class="form-group">
                    <label>Select</label>
                    <select class="form-control" name="category">
                        @foreach($category as $categoryList)
                            <option value="{{$categoryList->id}}">{{$categoryList->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Product Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Product Name" name="name">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Product Type</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Product Type" name="type">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">price</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Price" name="price">
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