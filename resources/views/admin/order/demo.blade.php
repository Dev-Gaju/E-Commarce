<head>
    <style>
        invoice {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        invoice,td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        invoice,tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>
<div style="display: inline">
<h3 style="text-align: center; color: black">INVOICE</h3>
<h3 style="text-align: center; color: black">VIP6 Online Market</h3>
<p style="text-align: center; color: black">Mirpur-1 Dhaka-1216</p>
</div>
<table>
    <tr>
        <th>Customer Name: </th>
        <td>{{$customer->first_name.' '.$customer->last_nam}}</td>
    </tr>
    <tr>
        <th>Customer Phone: </th>
        <td>{{$customer->phone_number}}</td>
    </tr>
    <tr>
        <th>Customer Email: </th>
        <td>{{$customer->email}}</td>
    </tr>
</table>
<br><br><br>

<table class="invoice">
    <tr>
        <th >SL No</th>
        <th>Product Id</th>
        <th>Product Name</th>
        <th>Product Price</th>
        <th>Product Quantity</th>
        <th>Total Price</th>
    </tr>
    @php($i=1)
    @foreach($products as $product)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $product->product_id }}</td>
            <td>{{ $product->product_name }}</td>
            <td>TK. {{ $product->product_price }}</td>
            <td>{{ $product->product_quantity }}</td>
            <td>TK. {{ $product->product_price * $product->product_quantity}}</td>

        </tr>
        <tr>
            <td>{{$i++}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>{{$i++}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>{{$i++}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th></th>
            <td></td>
            <td></td>
            <td>Total</td>
            <td></td>
            <td>{{$product->product_price * $product->product_quantity}}</td>
        </tr>
    @endforeach

</table>




</body>
