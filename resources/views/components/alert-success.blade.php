@if(session()->get('success'))
    <p class="text-sm text-success mt-4 pb-6">
        {{ session()->get('success') }} 
    </p>
@endif