@extends('layouts.app')
@section('content')
    
<header class="flex items-center mb-3 py-4">
    <div class="flex  justify-between items-center  w-full">
        <p class="text-grey text-sm font-normal">
            <a href="/projects" class="text-muted text-grey text-lg no-underline hover:underline">My Tickets</a> / {{$project->title}}
        <p>
        <a href="{{$project->path().'/edit'}}" class="bg-blue text-white rounded-lg no-underline text-sm py-2 px-5" style="box-shadow: 0 2px 7px 0 #b0eaff">Edit Ticket</a>
        
    </div>
</header>
<main>
    <div class="lg:flex -mx-3 ">
        <div class="lg:w-3/4 px-3 mb-6">
            <div class="bg-white  p-5 rounded-lg shadow mb-6 " style="height: 200px">
                <h3 class="font-normal text-xl py-4 -ml-5 mb-3 border-l-4 border-blue pl-4">
                        {{$project->title}}
                </h3>
                <div class="text-grey mb-16">{{$project->description}}</div>
                <footer>
                    <form action="{{$project->path()}}" method="POST" class="text-right">
                            @method('DELETE')
                            @csrf
                            <button class="text-xs text-red shadow rounded" type="submit">Delete</button>
                        </form>
                </footer>
            </div>
            <div class="mb-6">
                <h2 class="text-grey text-lg font-normal mb-3">Comments</h2>
                    {{--comments--}}
                    @foreach ($project->comments as $comment)
                        <form action="{{ $project->path() . '/comments/'.$comment->id}}" method="POST">
                            <div class="bg-white  p-5 rounded-lg shadow mb-2 ">
                                      <div class="flex items-center">
                                        <img class="w-10 h-10 rounded-full mr-4" src="/uploads/avatars/{{ Auth::user()->avatar }}" >
                                        <div >
                                          <p class=" text-sm leading-none py-2">{{ auth()->user()->name }}</p>
                                          <p class=" text-xs text-grey">comment at {{$comment->created_at->format('H:i:s')}}</p>
                                        </div>
                                      </div>
                                      <div class="px-16 py-4">
                                        <p class="leading-normal  text-base " style="color: #4a5568">{{ $comment->body}}</p>
                                      </div>
                            </div> 
                        </form>
                    @endforeach
                        <form action="{{$project->path() . '/comments' }}" method="POST">
                            @csrf
                            <div class="bg-white  p-5 rounded-lg shadow mb-2 ">
                                <input placeholder="Add your comment..." class="w-full" name="body">
                            </div>
                        </form>
                             


            </div>
        </div>
        <div class="lg:w-1/4 px-3 ">
            <div class="bg-white  p-5 rounded-lg shadow "style="height: 180px">
                <h3 class="font-normal text-xl py-4 -ml-5 mb-3 border-l-4 border-blue pl-4">
                    Status
                </h3>
            <form method="POST" action="{{$project->path()}}">
                @csrf
                @method('PATCH')
                <div class="inline-block relative w-full">
                    <select name="status" class="block appearance-none w-full bg-white border border-grey hover:bordergrey px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                        <option >{{$project->status}}</option>
                        <option>Submited</option>
                        <option>Closed</option>
                    </select>
                    <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                </div>
                <div class="py-4">
                  <button type="submit" class="bg-green mr-2 text-white rounded-lg no-underline text-sm py-2 px-5">update</button>
                </div>
                </form>

                @include ('errors'  );
            </div>
            
        </div>
    </div>
</main>
    
@endsection