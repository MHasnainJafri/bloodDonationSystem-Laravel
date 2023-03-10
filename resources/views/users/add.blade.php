<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   
                    <form method="post" action="{{ route('users.store') }}">
                        @csrf
                        <div class="p-2 flex items-center">
                            <label for="title" class="w-20">Name</label>
                            <input type="text" class="rounded-md border-gray-300 hover:border-gray-600 flex-1"
                         
                            name="name"/>
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />

                        </div>
                        <div class="p-2 flex items-center">
                            <label for="body" class="w-20">email</label>
                            <input type="text" class="rounded-md border-gray-300 hover:border-gray-600 flex-1"
                           
                            name="email"/>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                           </div>
                        
                        <div class="p-2 flex items-center">
                            <label for="body" class="w-20">password</label>
                            <input type="text" class="rounded-md border-gray-300 hover:border-gray-600 flex-1"
                           
                            name="password"/>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                           </div>
                        
                           
                           <div class="p-2 flex items-center">
                            <label for="body" class="w-20">Address</label>
                            <input type="text" class="rounded-md border-gray-300 hover:border-gray-600 flex-1"
                           
                            name="Address"/>
                            <x-input-error :messages="$errors->get('address')" class="mt-2" />
                           </div>
                           <div class="p-2 flex items-center">
                            <label for="body" class="w-20">country</label>
                            <input type="text" class="rounded-md border-gray-300 hover:border-gray-600 flex-1"
                         
                            name="Country"/>
                            <x-input-error :messages="$errors->get('Country')" class="mt-2" />
                           </div>
                           <div class="p-2 flex items-center">
                            <label for="body" class="w-20">province</label>
                            <input type="text" class="rounded-md border-gray-300 hover:border-gray-600 flex-1"
                           
                            name="provice"/>
                            <x-input-error :messages="$errors->get('province')" class="mt-2" />
                           </div>
                           <div class="p-2 flex items-center">
                            <label for="body" class="w-20">District</label>
                            <input type="text" class="rounded-md border-gray-300 hover:border-gray-600 flex-1"
                         
                            name="District"/>
                            <x-input-error :messages="$errors->get('District')" class="mt-2" />
                           </div>
                           <div class="p-2 flex items-center">
                            <label for="body" class="w-20">Phone Number</label>
                            <input type="text" class="rounded-md border-gray-300 hover:border-gray-600 flex-1"
                          
                            name="phoneNumber"/>
                            <x-input-error :messages="$errors->get('phoneNumber')" class="mt-2" />
                           </div>
                        
                           <div class="p-2 flex items-center">
                            <label for="body" class="w-20">Blood Group</label>
                            <select class="rounded-md border-gray-300 hover:border-gray-600 flex-1" name="BloodType"
                           
                            >
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
                            <label for="body" class="w-20">Can Donate</label>
                            <select class="rounded-md border-gray-300 hover:border-gray-600 flex-1" name="is_donor"
                      
                            >
                           
                            <option value="0">cannot donate</option>
                            <option value="1" selected>Can Donate</option>
                            </select>
                            <x-input-error :messages="$errors->get('is_donor')" class="mt-2" />

                        </div>

                        <div class="p-2 flex items-center">
                            <label for="body" class="w-20">Can Recieve Blood</label>
                            <select class="rounded-md border-gray-300 hover:border-gray-600 flex-1" name="is_acceptor"
                          
                            >
                           
                            <option value="0">Cannot Recieve Blood</option>
                            <option value="1" >Cannot Recieve Blood</option>
                            </select>
                            <x-input-error :messages="$errors->get('is_acceptor')" class="mt-2" />

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