<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
</head>
<body>
    <h1>Products</h1>

    <div class="products">
        @foreach($products as $product)
            <div class="product">
                <h2>{{ $product->name }}</h2>
                <p>Price: ${{ number_format($product->price, 2) }}</p>
            </div>
        @endforeach
    </div>
</body>
</html>
