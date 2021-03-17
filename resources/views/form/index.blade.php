<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All user Entries') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <x-table.th>#</x-table.th>
                            <x-table.th>Name</x-table.th>
                            <x-table.th>Email</x-table.th>                          
                            <x-table.th>Pincode</x-table.th>                          
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @if ($users->count())
                                @foreach ($users as $user)
                                    <tr>
                                        <x-table.td>{{($users->currentPage() - 1) * 10 + $loop->iteration}}</x-table.td>
                                        <x-table.td>{{$user->name}}</x-table.td>
                                        <x-table.td>{{$user->email}}</x-table.td>
                                        <x-table.td>{{$user->pincode}}</x-table.td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <x-table.td colspan="4" class="text-center">NO DATA FOUND</x-table.td>
                                </tr>
                            @endif
                            
                            
                        </tbody>
                    </table>
                    {{ $users->links() }}                  

                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>