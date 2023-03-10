<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="row">
                        <x-user-count-card />
                        <x-donor-count-card />
                        <x-reciever-count-card />
                  
                    </div> 

                </div>
            </div>
        </div>
    </div>

    <style>
.row {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

.card-container {
    width: calc(25% - 10px);
    margin-bottom: 20px;
    border-radius: 10px;
}

.card {
    border: none;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
}

.logo-container {
    width: 80px;
}

.logo-container img {
    max-width: 100%;
    height: auto;
}

.title-container {
   
}

.card-title {
    text-align: center;
    font-size: 2rem;
    font-weight: 800;
    font-family: unset;
}

.card-subtitle {
   
    text-align: center;
    font-size: 1rem;
    font-weight: 800;
    font-family: unset;
    color: #6c757d;
}

.count-container {
    font-size: 2.5rem;
    font-weight: bold;
}

.count-container p {
    font-size: 1.5rem;
    margin-top: 5px;
    color: #6c757d;
}

</style>
</x-app-layout>
