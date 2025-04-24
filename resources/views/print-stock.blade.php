<!DOCTYPE html>
<html>
<head>
    <title>Stock Report - {{ $product->name }}</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 800px; margin: 0 auto; padding: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .print-button { margin-top: 20px; padding: 10px 20px; background-color: #2563eb; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Stock Report</h1>
        <table>
            <tr>
                <th>Product Name</th>
                <td>{{ $product->name }}</td>
            </tr>
            <tr>
                <th>Category</th>
                <td>{{ $product->category->name }}</td>
            </tr>
            <tr>
                <th>Stock</th>
                <td>{{ $product->stock }}</td>
            </tr>
            <tr>
                <th>Price</th>
                <td>Rp {{ number_format($product->price, 2) }}</td>
            </tr>
        </table>
        <button class="print-button" onclick="window.print()">Print</button>
    </div>
</body>
</html>