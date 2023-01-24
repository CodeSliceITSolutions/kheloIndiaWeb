<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Max 3 Plus') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    
                    <!-- Success Message -->
                    <x-alert-success />

                    <form method="POST" action="{{ route('admin-draw-max3-plus-save') }}">
                        @csrf

                        <div class="flex justify-between">
                            <!-- Draw ID -->
                            <div>
                                <x-label for="draw_id" :value="__('Draw ID')" />

                                <x-input id="draw_id" class="block mt-1 w-full" type="text" name="draw_id" :value="old('draw_id')" placeholder="Enter Draw ID" required autofocus />
                            </div>

                            <!-- Draw Title -->
                            <div>
                                <x-label for="draw_title" :value="__('Draw Title')" />

                                <x-input id="draw_title" class="block mt-1 w-full" type="text" name="draw_title" :value="old('draw_title')" placeholder="Enter Draw Title" required />
                            </div>

                            <!-- Draw Date -->
                            <div>
                                <x-label for="draw_date" :value="__('Draw Date')" />

                                <x-input id="draw_date" class="block mt-1 w-full" type="date" name="draw_date" :value="old('draw_date')" placeholder="Select Draw Date" required />
                            </div>

                            <!-- Draw Time -->
                            <div>
                                <x-label for="draw_time" :value="__('Draw Time')" />

                                <x-input id="draw_time" class="block mt-1 w-full" type="time" name="draw_time" :value="old('draw_time')" placeholder="Select Draw Time" required />
                            </div>

                            <!-- Draw Result -->
                            <div>
                                <x-label for="draw_result" :value="__('Draw Result')" />

                                <x-input id="draw_result" class="block mt-1 w-full" type="text" name="draw_result" :value="old('draw_result')" placeholder="Enter Draw Result" required />
                            </div>

                            <div class="flex items-center justify-end">
                                <x-button class="ml-4">
                                    {{ __('Save') }}
                                </x-button>
                            </div>
                        </div>
                    </form>
                    <br />
                    <br />
                    <br />
                    <div>
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Draw ID</th>
                                    <th>Draw Title</th>
                                    <th>Draw Date</th>
                                    <th>Draw Time</th>
                                    <th>Draw Result</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                   <tr>
                                        <td>{{ $item->draw_id }}</td>
                                        <td>{{ $item->draw_title }}</td>
                                        <td>{{ date('d M Y', strtotime($item->draw_date)) }}</td>
                                        <td>{{ date('h:i:s', strtotime($item->draw_time)) }}</td>
                                        <td>{{ $item->draw_result }}</td>
                                        <td><a href="{{ url('delete/maxThreePlus/'.$item->id) }}" class="text-danger">Delete</a></td>
                                    </tr> 
                                @endforeach                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>



<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>