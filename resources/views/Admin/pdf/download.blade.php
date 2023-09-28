<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h1 style="text-align: center; color:red;">
      Order Detail
    </h1>

<hr/>

       Coustmer Name :         <h3>{{$orders->name}}</h3>
       <hr/>

       Coustmer Email :   <h3>{{$orders->email}}</h3>
       <hr/>
       Coustmer Phone :   <h3>{{$orders->phone}}</h3>
       <hr/>
       Coustmer Address :    <h3>{{$orders->address}}</h3>
       <hr/>
          Product Name  :    <h3>{{$orders->product_name}}</h3>
          <hr/>
          Product Price  :   <h3>{{$orders->price}}</h3>
          <hr/>
          Product Quantity :   <h3>{{$orders->quantity}}</h3>
          <hr/>
             Product ID  : <h3>{{$orders->product_id}}</h3>
             <hr/>
            User ID :    <h3>{{$orders->user_id}}</h3>
            <hr/>
             Payment Status  :  <h3>{{$orders->payment_status}}</h3>
             <hr/>
               Delivery Status : <h3>{{$orders->delivery_status}}</h3>
           {{-- Product Image : <h3>   <img src="{{ asset('/uploads/products/' . $orders->image) }}"></h3> --}}





</body>
</html>
