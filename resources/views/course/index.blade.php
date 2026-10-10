
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course List</title>
</head>
<body>
    <h1>Course List</h1>

    @if (session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    <p>
        <a href="{{ url('/courses/create') }}">Create New Course</a>
    </p>

    @if ($courses->isEmpty())
        <p>No courses found.</p>
    @else
        <table border="1" cellpadding="10">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Duration (weeks)</th>
                    <th>Fee</th>
                    <th>Difficulty</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                    <tr>
                        <td>{{ $course->id }}</td>
                        <td>{{ $course->name }}</td>
                        <td>{{ $course->duration }}</td>
                        <td>{{ $course->fee }}</td>
                        <td>{{ $course->difficulty }}</td>
                        <td>{{ $course->is_active ? 'Yes' : 'No' }}</td>
                        <td>
                            <a href="{{ url('/courses/' . $course->id) }}">View</a>
                            |
                            <a href="{{ url('/courses/' . $course->id . '/edit') }}">Edit</a>
                            |
                            <form action="{{ url('/courses/' . $course->id) }}"
                                  method="POST"
                                  style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        onclick="return confirm('Delete this course?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <p><a href="{{ url('/students') }}">Back to Students</a></p>
</body>
</html>
