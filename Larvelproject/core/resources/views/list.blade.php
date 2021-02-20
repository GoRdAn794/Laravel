<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<h1>products</h1>
<table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Product Name</th>
        <th scope="col">Sku</th>
        <th scope="col">Category</th>
        <th scope="col">Price</th>

      </tr>
    </thead>
    <tbody>
        @foreach ($product as $item)
        <tr>
            <td>{{$item['id']}}</td>
            <td>{{$item['Prodname']}}</td>
            <td>{{$item['Sku']}}</td>
            <td>{{$item['Category']}}</td>
            <td>{{$item['price']}}</td>
        </tr>
        @endforeach
    </tbody>
  </table>