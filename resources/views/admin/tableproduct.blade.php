<section class="mt-2">
    <div class="overflow-x-auto relative">
        <table class="text-xl text-left text-gray-500">
            <thead class="text-xl text gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="py-3 px-6">
                       
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Product Name
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Price
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Category
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Quantity
                    </th>           
                    <th scope="col" class="py-3 px-6">
                        Action
                    </th>
                </tr>
            </thead>

            <tbody>
                @foreach ($showProduct as $product)
                <tr class="border-b text-black">
                    {{-- @php $default_profile = "https://avatars.dicebear.com/api/initials/".$product->product_name.".svg" @endphp   --}}
                       @php $default_profile = "https://api.dicebear.com/8.x/initials/svg?seed=" . urlencode($product->product_name); @endphp
                    <td>
                        <img src="{{ $product->product_image ? asset("storage/product/thumbnail/".$product->product_image) : $default_profile }}">
                    </td>
                    <td class="py-50 px-50">
                       {{ $product->product_name }}
                    </td>
                    <td class="py-50 px-50">
                        {{ number_format($product->price, 0, '', ',') }}
                     </td>
                    <td class="py-4 px-6">
                        {{ $product->category }}
                    </td>
                    <td class="py-4 px-6">
                    @if( $product->quantity >= '1')
                        {{ $product->quantity }}
                    @else
                    <p class="text-danger">SOLD OUT</p>
                    @endif
                    </td>
                    <td class="py-4 px-6">
                        <a href="/admin/{{$product->id}}" class="btn-outline-primary-2 px-4 py-1 rounded">Update</a>
                        
                        <form action="/admin/{{$product->id}}" method="POST">
                        @method('delete')
                        @csrf
                        <button class="btn-outline-primary-2 px-4 py-1 rounded">Remove</button>
                        </form>
                    </td>
                    
                </tr>
                @endforeach
   
            </tbody>
            
        </table>
        <div class="max-w-lg pt-6 p-4"> {{$showProduct->links()}}
        </div>
      
      
    </div>
</section>