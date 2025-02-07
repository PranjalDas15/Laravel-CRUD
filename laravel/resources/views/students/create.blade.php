@extends('layouts.app')

@section('title', 'Create Student')

@section('content')
    <div class="w-[90vw] md:w-[70vw] bg-white drop-shadow-lg rounded-xl p-4 bg-gradient-to-b from-slate-100 to-white ">
        <div>
            <a class="py-2 px-3 bg-blue-500 hover:bg-blue-600 rounded-lg font-semibold text-white" href="{{url('/students')}}">Back</a>
        </div>
        <h1 class="text-center font-bold text-2xl py-2">Create a Student</h1>
        <form action='{{ route('students.store') }}' method="post"
            class="flex flex-col justify-center items-center gap-3 py-2">
            @csrf
            <div class="md:w-1/3">
                <label for="name" class="block">Name</label>
                <input type="text" placeholder="Enter name" id="name" name="name"
                value="{{ old('name') }}"
                    class="w-full py-2 px-3 rounded-lg border border-blue-200">
                @error('name')
                    <p class="text-red-400 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="md:w-1/3">
                <label for="course" class="block">Course</label>
                <input type="text" placeholder="Enter course name" id="course" name="course"
                   value="{{old('course')}}" class="w-full py-2 px-3 rounded-lg border border-blue-200">
                @error('course')
                    <p class="text-red-400 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="md:w-1/3">
                <label for="age" class="block">Age</label>
                <input type="number" placeholder="Enter age" id="age" name="age"
                value="{{old('age')}}" class="w-full py-2 px-3 rounded-lg border border-blue-200">
                @error('age')
                    <p class="text-red-400 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="md:w-1/3">
                <label for="gender" class="block">Gender</label>
                <select name="gender" value="{{old('gender')}}" id="gender" class="w-full py-2 px-3 border border-blue-200 bg-white rounded-lg">
                    <option disabled selected value="">Select gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                @error('gender')
                    <p class="text-red-400 text-sm">{{ $message}}</p>
                @enderror
            </div>
            <div class="md:w-1/3">
                <button
                    class="flex gap-1 items-center px-3 py-1 bg-blue-500 hover:bg-blue-600 font-semibold rounded-lg text-white">
                    <span class="text-2xl font-bold">+</span>Create
                </button>
            </div>
        </form>
    </div>
@endsection
