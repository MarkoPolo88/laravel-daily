<table>
    <thead>
        <tr>
            <th>Name</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
            <tr>
                <td>
                    {{ $product->name }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>