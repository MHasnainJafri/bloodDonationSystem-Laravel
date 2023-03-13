<x-app-layout>
    <meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    table{
        margin-top: 20px;
    }
    tr td{
        text-align: center
    }
    </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blood Request') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(Session::has('success'))
<p class="p-5 bg-success text-light">{{ Session::get('success') }}</p>
@endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
<form method="post" action="{{route('donorrequest.search')}}">
                    @csrf

                    <div class="p-2 flex items-center">
                        <label for="body" class="w-20">Blood type</label>
                        <select name="BloodType"
                            class="rounded-md border-gray-300 hover:border-gray-600 flex-1 ml-4 mr-4" id="BloodType">
                            @foreach (\App\Models\bloodtype::all() as $bloodtype)
                                <option value="{{ $bloodtype->id }}">{{ $bloodtype->type }}</option>
                            @endforeach
                        </select>


                    </div>
                    <div class="p-2 flex items-center">
                        <label for="body" class="w-20">Area</label>
                        <input type="text" class="rounded-md border-gray-300 hover:border-gray-600 flex-1 ml-4 mr-4"
                            name="Address" id="address" />
                    </div>
                    <div class="p-6">
                        <button onclick="searchdonor()"
                            class="btn-primary inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 flex justify-self-end">Add
                            Blood Request</button>
                    </div>

                </div>
@if (isset($bloodRequest))
    

                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="h1 text-center font-semibold text-xl text-gray-800 leading-tight"> All searched results
                    </h1>

                    <table class="min-w-full divide-y divide-gray-200 w-100 mx-auto mt-5" style="width:70%">
                        <thead class="bg-gray-50">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Blood Type</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($bloodRequest as $request)
                                     <td>{{$request->id}}</td>
                                <td>{{$request->name}}</td>
                                <td>{{$request->userinfo->Address}}</td>
                                <td>{{$request->userinfo->blood->type}}</td>
                                <td><a href="/sendRequest/{{$request->id}}/{{$request->userinfo->blood->type}}">Send Request</a></td>
                                @endforeach
                               
                            </tr>
                        </tbody>
                    </table>

                </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

{{-- <script>
    function searchdonor() {
        var BloodType = $('#BloodType').find(":selected").text();
        var address = $('#address').val()
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });


        var formData = {
            BloodType: BloodType,
            Adress: address,
        };
        var type = "POST";
        var ajaxurl = 'searchblood';
        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
            success: function(data) {
                console.log(data)
            },
            error: function(data) {
                console.log(data);
            }
        });
    }
</script> --}}
