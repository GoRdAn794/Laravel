<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
  <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
  
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
</head>
<style>
  h1{
    text-align: center;
  }
  
</style>
<body>
    <!-- add product -->
    <div class="modal fade" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Modal Heading</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
            <form>
              @csrf
              <div class="form-group w-50">
                Product Name:<input type="text" class="form-control" id="pname" placeholder="Enter product name">
                <span class="text-danger" id="product"></span>

              </div>
              <div class="form-group w-50">
                Category:<input type="text" id="cat" class="form-control"placeholder="Enter category">
                <span class="text-danger" id="category"></span>
              
              </div>
              <div class="form-group w-50">
                Sku:<input type="text" id="sku" class="form-control"placeholder="Enter sku">
                <span class="text-danger" id="sk"></span>
              
              </div>
              <div class="form-group w-50">
                Price:<input type="text" id="price" class="form-control"placeholder="Enter price">
                <span class="text-danger" id="pr"></span>
              
              </div>
              <button type="button"  class="btn btn-primary" id="add">Add</button>
            </form>
          </div>         
        </div>
      </div>
    </div>
<!-- edit modal -->
<div class="modal fade" id="myModal2">
  <div class="modal-dialog">
    <div class="modal-content">
    
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">
        <form>
          @csrf
          <div class="form-group w-50">
            Product Name:<input type="text" class="form-control" id="editpname" placeholder="Enter product name">
            <span class="text-danger" id="prod"></span>
            
          </div>
          <div class="form-group w-50">
            Category:<input type="text" id="editcatid" class="form-control"placeholder="Enter category">
            <span class="text-danger" id="categ"></span>
          
          </div>
          <div class="form-group w-50">
            Sku:<input type="text" id="editskuid" class="form-control"placeholder="Enter sku">
            <span class="text-danger" id="SKU"></span>          
          </div>
          <div class="form-group w-50">
            Price:<input type="text" id="editprice" class="form-control"placeholder="Enter price">
            <span class="text-danger" id="pric"></span>           
          </div>
          <button type="button"  class="btn btn-primary" id="addproduct">Edit</button>
        </form>
      </div>         
    </div>
  </div>
</div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('logoutmcp')}}">Logout</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>
      <!-- Button to Open the Modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
      Add Product
    </button>
      {{-- @if(Session::has('user'))
      {{Session::get('user')}}
      @endif --}}
      {{-- @php
        $user=Auth::get();
        print_r($user->email);  
      @endphp --}}
    {{-- <li class="nav-item menu-items">
        <a class="nav-link href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
          
          <span class="menu-icon">
            <i class="mdi mdi-speedometer"></i>
          </span>
          <span class="menu-title">Logout</span>
      </a>    
      <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
      </form>
      </li>  --}}
      <h1>Product Details</h1>
      <table class="table" id="prod">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Product Name</th>
            <th scope="col">Sku</th>
            <th scope="col">Category</th>
            <th scope="col">Price</th>
            <th scope="col">Actions</th>
    
          </tr>
        </thead>
        <tbody id="tab">
            {{-- @foreach ($product as $item)
            <tr>
                <td>{{$item['id']}}</td>
                <td>{{$item['Prodname']}}</td>
                <td>{{$item['Sku']}}</td>
                <td>{{$item['Category']}}</td>
                <td>{{$item['price']}}</td>
                <td><button type="button" class="btn btn-outline-success">Edit</button> <button type="button" class="btn btn-outline-danger" id="del" data-id=$item[id]>Delete</button></td>
            </tr>
            @endforeach --}}  
  
        </tbody>
          </table>

  <script>
    var elementid;
    var APP_URL = {!! json_encode(url('/')) !!}
    function show(){
      $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
            $.ajax({
                url: APP_URL+"/product",
                type: 'POST',
                dataType:'JSON',
                success: function(data) {
                    // console.log(data);
                    let res = $.parseJSON(data);
                    // console.log(res);
                    let s = '';
                    let len = res.length;
                    for (i = 0; i < len; i++) {
                        s += '<tr><td>' + res[i].id + '</td><td>' + res[i].Prodname + '</td><td>' + res[i].Sku + '</td><td>' + res[i].Category + '</td><td>'+res[i].price+'</td><td><button class="btn btn-success mr-3" data-toggle="modal" data-target="#myModal2" id="editbtn" data-id=' + res[i].id + '><i class="fa fa-pencil" aria-hidden="true"></i>Edit</button><button data-id=' + res[i].id + ' class="btn btn-danger delete"><i class="fa fa-trash" aria-hidden="true"></i>Delete</button></td></tr>';
                    }
                    $('#tab').html(s);
                },
                error: function() {
                    console.log('Error Occured');
                }
            });
    } 
  // $(function(){
  //   $("#prod").dataTable();
  // });
  //Fuction for Adding Products
  


//Showing Product Listings
  $(document).ready(function() {

    show();

    $('#add').click(function(){
    let name = $('#pname').val();
    let cat = $('#cat').val();
    let sku = $('#sku').val();
    let price = $('#price').val();
    console.log(name);
    console.log(cat);
    console.log(sku);
    console.log(price);
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $.ajax({
      url:APP_URL+"/addproduct",
      type:'POST',
      data:{
        'name':name,
        'cat':cat,
        'sku':sku,
        'price':price        
      },
      success:function(data)
      {
        alert("Product added successfully");
        show();
      },
      error:function(data){
        // console.log(data.responseJSON.errors);
        console.log(data);

        // $('#prod').text(data.responseJSON.errors.name);
        // $('#categ').text(data.responseJSON.errors.cat);
        // $('#SKU').text(data.responseJSON.errors.Sku);
        // $('#pric').text(data.responseJSON.errors.price);

      }
    });

  });
    });
    
//Deleting a product
        $(document).on('click', '.delete', function() {
          id=$(this).data('id');
    console.log(id);
    $.ajax({
                url: APP_URL+"/deleteproduct",
                type: 'POST',
                data: {
                    'id': id
                },
                success: function(data) {
                  show();
                },
                error: function() {
                    console.log('Error Occured');
                }

            });
        });
        //Edit product
        $(document).on('click', '#editbtn', function() {
          elementid = $(this).data('id');            
            $.ajax({
                url: APP_URL+"/editproduct",
                type: 'POST',
                datatype:'JSON',
                data: {
                    'id': elementid
                },
                success: function(data) {
                    console.log(data);
                    let res = $.parseJSON(data);
                    $('#editpname').val(res[0].Prodname);
                    $('#editcatid').val(res[0].Category);
                    $('#editskuid').val(res[0].Sku);
                    $('#editprice').val(res[0].price);

                },
                error: function(data) {
                  console.log("error");
                }
            });
        });

        $(document).on('click', '#addproduct', function() {
          let pname = $('#editpname').val();
          let cat = $('#editcatid').val();
          let sku= $('#editskuid').val();
           let price=$('#editprice').val();
           console.log(pname);
           console.log(cat);
           console.log(sku);
           console.log(price);
           $.ajax({
            url: APP_URL+"/editproductrecord",
            type: 'POST',
            data: {
               'pname':pname,
               'cat':cat,
               'sku':sku,
               'price':price,
               'id':elementid,
                },
                
                success:function(data)
                {
                  alert("record updated");
                  show();
                },
                error:function(data){
                  console.log(data.responseJSON.errors);
                  $('#product').text(data.responseJSON.errors.name);
        // $('#category').text(data.responseJSON.errors.cat);
        $('#sk').text(data.responseJSON.errors.Sku);
        // $('#pr').text(data.responseJSON.errors.price);
                  // alert("error");
                }

           });
        });

  </script>
</body>

</html>
    
