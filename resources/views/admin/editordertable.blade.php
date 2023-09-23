<section class="mt-2">
    <div class="overflow-x-auto relative">
        <table class="text-xl text-left text-gray-500">
            <thead class="text-xl text gray-700 uppercase bg-gray-50">
                <tr>
                    
                    <th scope="col" class="py-3 px-6">
                        Order ID
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Status
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Date
                    </th>    
                            
                    <th scope="col" class="py-3 px-6">
                        Action
                    </th>
                </tr>
            </thead>

            <tbody>
                @foreach ($showOrder as $order)
                <tr class="border-b text-black">
                   
                    <td class="py-50 px-50">
                        {{ $order->unique_token }} 
                    </td>
                    
                    <td class="py-4 px-6">
                        @if($order->status == 'Processing')
                        {{ $order->status }}
                        @else
                        <b style="color:green;">{{ $order->status }}</b>
                        @endif
                    </td>
                    <td class="py-4 px-6">
                        {{ date('M d, Y g:i a', strtotime($order->created_at)) }}
                    </td>
                    <td class="py-4 px-6">
                        @if($order->status == 'Processing')
                        <form action="/admin/orders/{{$order->unique_token}}" method="POST">
                        @csrf
                        <button class="btn-outline-primary-2 px-4 py-1 rounded">Accept</button>   
                        </form>
                        @endif
                    </td>
                    
                </tr>
                @endforeach
   
            </tbody>
            
        </table>
         <div class="max-w-lg pt-6 p-4"> {{$showOrder->links()}}
        </div>
      
      
    </div>
</section>