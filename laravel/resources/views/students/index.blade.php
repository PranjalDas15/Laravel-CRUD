@extends('layouts.app')

@section('title', 'Students')
@section('content')
    <div class="w-[90vw] md:w-[70vw] bg-white drop-shadow-lg rounded-xl p-4 bg-gradient-to-b from-slate-100 to-white ">
        <h1 class="text-center font-bold text-2xl py-2">Students</h1>
        <div>
            <table class="w-full">
                <thead>
                    <tr class="border-b">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Course</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($students->isNotEmpty())
                        @foreach ($students as $student)
                            <tr class="text-center">
                                <td>{{ $student->id }}</td>
                                <td><a class="text-orange-600 hover:text-black hover:underline"
                                        href="{{ url('/students', $student->id) }}">{{ $student->name }}</a></td>
                                <td>{{ $student->course }}</td>
                                <td>{{ $student->age }}</td>
                                <td>{{ $student->gender }}</td>
                                <td class="flex items-center justify-center gap-2 py-2">
                                    <a href="{{ route('students.edit', $student->id) }}"
                                        class="text-white font-semibold px-2 py-1 text-sm rounded-lg hover:bg-yellow-500 bg-yellow-400">Edit</a>
                                    <a href="#" onclick="deleteStudent({{ $student->id }});"
                                        class="text-white font-semibold px-2 py-1 text-sm rounded-lg hover:bg-red-500 bg-red-400">Delete
                                    </a>
                                    <form id="delete-student-{{ $student->id }}"
                                        action="{{ route('students.destroy', $student->id) }}" method="post">
                                        @csrf
                                        @method('delete')

                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="text-center py-10 text-gray-500 font-semibold text-lg" colspan="6">
                                No Students added yet.
                            </td>
                        </tr>
                    @endif
                <tbody>


            </table>
        </div>
    </div>
    <script>
        function deleteStudent(id) {
            if (confirm("Are you sure?")) {
                document.getElementById("delete-student-" + id).submit();
            }
        }
    </script>
@endsection
