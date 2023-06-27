@extends('admin.layouts.applayout');
@section('content')
        <form method="post" action="" name="productForm" id="productForm">
    				<!-- Content Header (Page header) -->
                    <section class="content-header">					
                        <div class="container-fluid my-2">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1>Create Product</h1>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <a href='{{route("products.index")}}' class="btn btn-primary">Back</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.container-fluid -->
                    </section>
                    <!-- Main content -->
                    <section class="content">
                        <!-- Default box -->
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card mb-3">
                                        <div class="card-body">								
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="title">Title</label>
                                                        <input type="text" name="title" id="title" class="form-control" placeholder="Title">
                                                        <p></p>	
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="slug">Slug</label>
                                                        <input type="text" name="slug" id="slug" class="form-control" placeholder="Slug">	
                                                        <p></p>	
                                                    </div>
                                                </div>	
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="description">Description</label>
                                                        <textarea name="description" id="description" cols="30" rows="10" class="summernote" placeholder="Description"></textarea>
                                                    </div>
                                                </div>                                            
                                            </div>
                                        </div>	                                                                      
                                    </div>
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <h2 class="h4 mb-3">Media</h2>								
                                            <div id="image" class="dropzone dz-clickable">
                                                <div class="dz-message needsclick">    
                                                    <br>Drop files here or click to upload.<br><br>                                            
                                                </div>
                                            </div>
                                        </div>	                                                                      
                                    </div>
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <h2 class="h4 mb-3">Pricing</h2>								
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="price">Price</label>
                                                        <input type="text" name="price" id="price" class="form-control" placeholder="Price">	
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="compare_price">Compare at Price</label>
                                                        <input type="text" name="compare_price" id="compare_price" class="form-control" placeholder="Compare Price">
                                                        <p class="text-muted mt-3">
                                                            To show a reduced price, move the product’s original price into Compare at price. Enter a lower value into Price.
                                                        </p>	
                                                    </div>
                                                </div>                                            
                                            </div>
                                        </div>	                                                                      
                                    </div>
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <h2 class="h4 mb-3">Inventory</h2>								
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="sku">SKU (Stock Keeping Unit)</label>
                                                        <input type="text" name="sku" id="sku" class="form-control" placeholder="sku">	
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="barcode">Barcode</label>
                                                        <input type="text" name="barcode" id="barcode" class="form-control" placeholder="Barcode">	
                                                    </div>
                                                </div>   
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="track_qty" name="track_qty" checked>
                                                            <label for="track_qty" class="custom-control-label">Track Quantity</label>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <input type="number" min="0" name="qty" id="qty" class="form-control" placeholder="Qty">	
                                                    </div>
                                                </div>                                         
                                            </div>
                                        </div>	                                                                      
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card mb-3">
                                        <div class="card-body">	
                                            <h2 class="h4 mb-3">Product status</h2>
                                            <div class="mb-3">
                                                <select name="status" id="status" class="form-control">
                                                    <option value="1">Active</option>
                                                    <option value="0">Block</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="card">
                                        <div class="card-body">	
                                            <h2 class="h4  mb-3">Product category</h2>
                                            <div class="mb-3">
                                                <label for="category">Category</label>
                                                <select name="category" id="category" class="form-control">
                                                    <option value="">Select a Category</option>
                                                    @if($categories->isNotEmpty())
                                                    @foreach ($categories as $category )
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                    @endif
                                                    
                                                    
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="category">Sub category</label>
                                                <select name="sub_category" id="sub_category" class="form-control">
                                                    <option value="">Mobile</option>
                                                    <option value="">Home Theater</option>
                                                    <option value="">Headphones</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="card mb-3">
                                        <div class="card-body">	
                                            <h2 class="h4 mb-3">Product brand</h2>
                                            <div class="mb-3">
                                                <select name="status" id="status" class="form-control">
                                                    <option value="">Apple</option>
                                                    <option value="">Vivo</option>
                                                    <option value="">HP</option>
                                                    <option value="">Samsung</option>
                                                    <option value="">DELL</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="card mb-3">
                                        <div class="card-body">	
                                            <h2 class="h4 mb-3">Featured product</h2>
                                            <div class="mb-3">
                                                <select name="status" id="status" class="form-control">
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>                                                
                                                </select>
                                            </div>
                                        </div>
                                    </div>                                 
                                </div>
                            </div>
                            
                            <div class="pb-5 pt-3">
                                <button type="" class="btn btn-primary">Create</button>
                                <a href="products.html" class="btn btn-outline-dark ml-3">Cancel</a>
                            </div>
                        </div>
                        <!-- /.card -->
                    </section>
                    <!-- /.content -->
        
                </form>
@endsection

@section('customJs')
<script>
// $("#slug").change(function(){ 
//     var element = $(this);
//     $.ajax({
//         url:'{{route("getSlug")}}',
//         type:'get',
//         data: {title: element.val()},
//         dataType:'json',
//         success: function(response){
//             if(response["status"]== true){
//                $('#slug').val(response["slug"]);
//             }
           

//         },error: function(){
//             console.log('Something went wrong');
//         }

//     });
// });
</script>
<script>
$("#productForm").submit(function(event){
    event.preventDefault();
    var element = $(this);
    var formArray = $(this).serializeArray();
    $.ajax({
        url:'{{route("products.store")}}',
        type:'post',
        data: formArray,
        dataType:'json',
        success: function(response){
                if(response["status"]== true){
                    $("#title").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                    $('#slug').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
               }
               else{

                var errors = response['errors'];
                if(errors['title']){
                  $("#title").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['title']);
                } else{
                  $("#title").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                }
                if(errors['slug']){
                  $('#slug').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['slug']);
                } else{
                  $('#slug').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                }
               }

            },error: function(){
                console.log('Something went wrong');
            }

    });
});
</script>
@endsection