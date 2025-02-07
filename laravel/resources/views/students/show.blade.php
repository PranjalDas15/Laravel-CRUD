@extends('layouts.app')

@section('title', 'Students')
@section('content')
<div class="w-[90vw] md:w-[70vw] bg-white drop-shadow-lg rounded-xl p-4 bg-gradient-to-b from-slate-100 to-white ">
    <div>
        <a class="py-2 px-3 bg-blue-500 hover:bg-blue-600 rounded-lg font-semibold text-white" href="{{url('/students')}}">Back</a>
    </div>
    <h1 class="text-center font-bold text-3xl py-2">{{$student->name}}</h1>
    <h3 class="text-2xl font-bold py-3">Details</h3>
    <div class="md:text-xl py-5">
        <p><span class="font-bold">Course: </span>{{$student->course}}</p>
        <p><span class="font-bold">Age: </span>{{$student->age}}</p>
        <p><span class="font-bold">Gender: </span>{{$student->gender}}</p>
        <p><span class="font-bold">Created At: </span>{{\Carbon\Carbon::parse($student->created_at)->setTimezone('Asia/Kolkata')->format('d M, y - h:i A') }}</p>
        <p><span class="font-bold">Updated At: </span>{{\Carbon\Carbon::parse($student->updated_at)->setTimezone('Asia/Kolkata')->format('d M, y - h:i A') }}</p>
    </div>
</div>
@endsection