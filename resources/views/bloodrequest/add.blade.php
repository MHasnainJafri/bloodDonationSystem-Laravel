<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="post" action="{{ route('bloodrequest.store') }}">
                        @csrf
                        <div class="p-2 flex items-center">
                            <label for="title" class="w-20">Donor Name</label>
                          
                            <select class="rounded-md border-gray-300 hover:border-gray-600 flex-1" name="donor_id">

                            @foreach (\App\Models\User::whereHas('userInfo', function($query) {
                                
                                $query->where('is_donor', 1);
                            })->get()  as  $donor)
                            <option value="{{$donor->id}}">{{$donor->name}}</option>
                                
                            @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('donor_id')" class="mt-2" />

                        </div>
                        <div class="p-2 flex items-center">
                            <label for="body" class="w-20">Recipient Name</label>
                            <select class="rounded-md border-gray-300 hover:border-gray-600 flex-1" name="recipient_id">

                                @foreach (\App\Models\User::whereHas('userInfo', function($query) {
                                    
                                    $query->where('is_acceptor', 1);
                                })->get()  as  $donor)
                                <option value="{{$donor->id}}">{{$donor->name}}</option>
                                    
                                @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('recipient_id')" class="mt-2" />

                        </div>
                        <div class="p-2 flex items-center">
                            <label for="body" class="w-20">Blood Group</label>
                            <select class="rounded-md border-gray-300 hover:border-gray-600 flex-1" name="BloodType">
                            <option value="A">A</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B">B</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="O">O</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                            </select>
                            <x-input-error :messages="$errors->get('BloodType')" class="mt-2" />

                        </div>
                        <div class="p-2 flex items-center">
                            <label for="body" class="w-20">Location</label>
                            <input type="text" class="rounded-md border-gray-300 hover:border-gray-600 flex-1" name="location"/>
                            <x-input-error :messages="$errors->get('location')" class="mt-2" />

                        </div>
                        <div class="p-6">
                          <button type="submit" class="btn-primary inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 flex justify-self-end">Add Blood Request</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>