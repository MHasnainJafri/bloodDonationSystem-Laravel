<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Person Donated Blood
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
            <a href="{{route('bloodrequest.create')}}" class="btn-primary inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 flex justify-self-end">Create bloodrequest</a>
        </div>

        <table class="min-w-full divide-y divide-gray-200 w-100 mx-auto">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                    <th class="relative px-6 py-3">Name</th>
                    <th class="relative px-6 py-3">Email</th>
                    <th class="relative px-6 py-3">Donated Counts</th>
                    <th class="relative px-6 py-3">Location</th>
                    {{-- <th class="relative px-6 py-3">status</th> --}}
                    <th class="relative px-6 py-3"></th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($donors as $data)
               
                    <tr>
                        <td class="px-6 py-4 ">{{$data->id}}</td>
                        <td class="px-6 py-4 ">{{$data->name}}</td>
                        <td class="px-6 py-4 ">{{$data->email}}</td>
                        <td class="px-6 py-4 ">{{$data->donationCount() }}</td>
                        <td class="px-6 py-4 ">{{$data->userinfo->Address}}</td>
                        {{-- <td class="px-6 py-4 ">{{$data->status}}</td> --}}
                        <td class="px-6 py-4 ">
                            <a href="{{route('users.edit', [$data->id])}}" class="text-blue-500">Edit</a>
                        </td>
                        <td class="px-6 py-4 ">
                            <form method="post" action="{{route('users.destroy', [$data->id])}}" id="deleteForm{{$data->id}}">
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
                {{-- {{$donors->links()}} --}}
            </div>
    </div>
</x-app-layout>