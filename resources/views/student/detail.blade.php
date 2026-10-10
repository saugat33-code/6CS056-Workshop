<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
</head>
<body>
    <h1>Student Details</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <p><strong>ID:</strong> {{ $student->id }}</p>
    <p><strong>Name:</strong> {{ $student->name }}</p>
    <p><strong>Email:</strong> {{ $student->email }}</p>
    <p><strong>Phone:</strong> {{ $student->phone }}</p>
    <p><strong>Address:</strong> {{ $student->address ?? 'Not provided' }}</p>
    <p><strong>Date of Birth:</strong> {{ $student->date_of_birth ?? 'Not provided' }}</p>

    <a href="{{ url('/students/' . $student->id . '/edit') }}">Edit Student</a>
    |
    <a href="{{ route('students.index') }}">Back to Student List</a>
</body>
</html>