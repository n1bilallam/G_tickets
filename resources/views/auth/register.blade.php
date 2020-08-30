@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('register') }}"
          class="lg:w-1/2 lg:mx-auto bg-white py-12 px-16 rounded shadow"
    >
        @csrf

        <h1 class="text-2xl font-normal mb-10 text-center text-blue">Register</h1>

        <div class="field mb-6">
            <label class="label text-sm mb-2 block" for="name">Name</label>

            <div class="control">
                <input id="name"
                       type="text"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outlin{{ $errors->has('name') ? ' is-invalid' : '' }}"
                       name="name"
                       value="{{ old('name') }}"
                       required
                       autofocus>
            </div>
        </div>

        <div class="field mb-6">
            <label class="label text-sm mb-2 block" for="email">Email Address</label>

            <div class="control">
                <input id="email"
                       type="email"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outlin{{ $errors->has('email') ? ' is-invalid' : '' }}"
                       name="email"
                       value="{{ old('email') }}"
                       required>
            </div>
        </div>

        <div class="field mb-6">
            <label class="label text-sm mb-2 block" for="password">Password</label>

            <div class="control">
                <input id="password"
                       type="password"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outlin{{ $errors->has('password') ? ' is-invalid' : '' }}"
                       name="password"
                       required>
            </div>
        </div>

        <div class="field mb-6">
            <label class="label text-sm mb-2 block" for="password-confirmation">Confirm Password</label>

            <div class="control">
                <input id="password-confirmation"
                       type="password"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outlin"
                       name="password_confirmation"
                       required>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit"  class="bg-blue is-link mr-2 text-white rounded-lg no-underline text-sm py-2 px-5" style="box-shadow: 0 2px 7px 0 #b0eaff">Register</button>
            </div>
        </div>
    </form>
    <p class=" py-2 text-center text-grey text-xs">
        &copy;2020 G-tickets. All rights reserved.
    </p>
@endsection
@include ('errors')