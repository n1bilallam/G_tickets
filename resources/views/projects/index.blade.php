
@extends('layouts.app')
@section('content')

    <header class="flex items-center mb-3 py-4">
        <div class="flex  justify-between items-center  w-full">
            <h2 class="text-grey text-sm font-normal">My Tickets</h2>
        
        <a href="/projects/create" class="bg-blue text-white rounded-lg no-underline text-sm py-2 px-5" style="box-shadow: 0 2px 7px 0 #b0eaff" @click.prevent="$modal.show('new-project')">new ticket</a>
    </div>
    </header>

    <main class="lg:flex lg:flex-wrap -mx-3">
        @forelse ($projects as $project)
        <div class="lg:w-1/3 px-3 pb-6">
            @include('projects.card')
        </div>
        @empty
            <div>No Tickets yet.</div>
        @endforelse  
    </main>
    <new-project-modal></new-project-modal>
@endsection

