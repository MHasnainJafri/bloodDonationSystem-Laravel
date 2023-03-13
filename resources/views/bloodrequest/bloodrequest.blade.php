<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            bloodrequest
        </h2>
    </x-slot>

    <div class="py-12 px-20 " >

        @if(Session::has('message'))
            <div class="bg-green-300 text-green-700 rounded px-2 py-3" style="background: #5ad25acf;
            opacity: 0.8;
            color: white;
            padding: 8px;
            margin: 20px;
            border-radius: 10px;">
                {{Session::get('message')}}
            </div>
        @endif
       

        <div class="" style="    display: flex;
        align-items: end;
        justify-content: end;
        margin-bottom:20px;
        margin-right:13vw;
        ">
        @if (auth()->user()->type==1)
        <a href="{{route('bloodrequest.create')}}" class="btn-primary inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 flex justify-self-end">Create bloodrequest</a>

        @endif
        </div>

        <table class="min-w-full divide-y divide-gray-200 w-100 mx-auto">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                    <th class="relative px-6 py-3">Donor Name</th>
                    <th class="relative px-6 py-3">Recipient Name</th>
                    <th class="relative px-6 py-3">Blood Type</th>
                    <th class="relative px-6 py-3">Location</th>
                    <th class="relative px-6 py-3">status</th>
                    <th class="relative px-6 py-3">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($bloodRequests as $data)
               
                    <tr>
                        <td class="px-6 py-4 ">{{$data->id}}</td>
                        <td class="px-6 py-4 ">{{$data->donor->name}}</td>
                        <td class="px-6 py-4 ">{{$data->recipient->name}}</td>
                        <td class="px-6 py-4 "><span class="bloodtag">{{$data->BloodType}}</span></td>
                        <td class="px-6 py-4 ">{{$data->location}}</td>
                        <td class="px-6 py-4 ">{{$data->status}}</td>
                        
                        <td class="px-6 py-4 ">

                            @if(auth()->user()->type==1)
                            <a href="{{route('bloodrequest.edit', [$data->id])}}" class="text-blue-500">Edit</a>
                            @else

                            @if(Route::currentRouteName()=="bloodrequest.requestRecieved" && $data->status=="Pending")
                            <a href="approveblooddonation/{{$data->id}}"}}>Approve</a>
                           @endif 
                            @if(Route::currentRouteName()=="bloodrequest.requestRecieved" && $data->status=="Active")
                            <span>Approved</span>
                            @endif
                           
@endif
                            <form method="post" action="{{route('bloodrequest.destroy', [$data->id])}}" id="deleteForm{{$data->id}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500" onclick="event.preventDefault(); if(confirm('Are you sure to delete?')) {document.getElementById('deleteForm{{$data->id}}').submit();} else {return false;} ">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-6 py-4 ">No bloodrequest to display</td></tr>
                @endforelse
            </tbody>
        </table>

            <div class="my-3">
                {{$bloodRequests->links()}}
            </div>
    </div>
</x-app-layout>