<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
</head>
<body>
    <h1>Student List</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <p>
        <a href="{{ url('/student/create') }}">Create New Student</a>
    </p>

    @if ($students->count() > 0)
        <table border="1" cellpadding="10">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>
                            <a href="{{ url('/students/' . $student->id) }}">View</a>
                            |
                            <a href="{{ url('/students/' . $student->id . '/edit') }}">Edit</a>
                            |
                            <form
                                action="{{ url('/students/' . $student->id) }}"
                                method="POST"
                                style="display: inline;"
                                onsubmit="return confirm('Are you sure you want to delete this student?');"
                            >
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No students found.</p>
    @endif
</body>
</html>