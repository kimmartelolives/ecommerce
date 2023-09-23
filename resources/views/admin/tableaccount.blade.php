<section class="mt-2">
    <div class="overflow-x-auto relative">
        <table class="text-xl text-left text-gray-500">
            <thead class="text-xl text gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="py-3 px-6">
                       
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Name
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Email
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Role
                    </th>    
                    <th scope="col" class="py-3 px-6">
                        Date Created
                    </th>        
                    <th scope="col" class="py-3 px-6">
                        Action
                    </th>
                </tr>
            </thead>

            <tbody>
                @foreach ($showAccount as $account)
                <tr class="border-b text-black">
                    @php $default_profile = "https://avatars.dicebear.com/api/initials/".$account->email.".svg" @endphp  
                    <td>
                        <img src="{{ $account->dp_name ? asset("storage/user/thumbnail/".$account->dp_name) : $default_profile }}">
                    </td>
                    <td class="py-50 px-50">
                       {{ $account->first_name }}  {{ $account->last_name }}
                    </td>
                    <td class="py-4 px-6">
                        {{ $account->email }}
                    </td>
                    <td class="py-4 px-6">

                    @if( $account->role == "2" )
                    <p>Customer</p>
                    @elseif( $account->role == "1" )
                    <p>Admin</p>
                    @else

                    @endif  
                    </td>
                    <td class="py-4 px-6">
                        {{ date('M d, Y g:i a', strtotime($account->created_at)) }}
                    </td>
                    <td class="py-4 px-6">
                        <a href="/admin/account/{{$account->id}}" class="btn-outline-primary-2 px-4 py-1 rounded">Update</a>
                        
                        <form action="/admin/account/{{$account->id}}" method="POST">
                        @method('delete')
                        @csrf
                        <button class="btn-outline-primary-2 px-4 py-1 rounded">Remove</button>
                        </form>
                    </td>
                    
                </tr>
                @endforeach
   
            </tbody>
            
        </table>
        <div class="max-w-lg pt-6 p-4"> {{$showAccount->links()}}
        </div>
      
      
    </div>
</section>