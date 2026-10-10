<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Course</title>
</head>
<body>
    <h1>Create New Course</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('/courses') }}" method="POST">
        @csrf

        <label for="name">Course Name:</label>
        <input type="text" id="name" name="name"
               value="{{ old('name') }}" required>
        <br><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description">{{ old('description') }}</textarea>
        <br><br>

        <label for="duration">Duration (weeks):</label>
        <input type="number" id="duration" name="duration"
               value="{{ old('duration') }}" min="1" required>
        <br><br>

        <label for="fee">Fee:</label>
        <input type="number" id="fee" name="fee"
               value="{{ old('fee') }}" min="0" step="0.01" required>
        <br><br>

        <label for="difficulty">Difficulty:</label>
        <select id="difficulty" name="difficulty" required>
            <option value="">Select difficulty</option>
            <option value="Easy" {{ old('difficulty') == 'Easy' ? 'selected' : '' }}>Easy</option>
            <option value="Medium" {{ old('difficulty') == 'Medium' ? 'selected' : '' }}>Medium</option>
            <option value="Hard" {{ old('difficulty') == 'Hard' ? 'selected' : '' }}>Hard</option>
        </select>
        <br><br>

        <label for="is_active">Active:</label>
        <input type="checkbox" id="is_active" name="is_active"
               value="1" {{ old('is_active', '1') ? 'checked' : '' }}>
        <br><br>

        <button type="submit">Create Course</button>
    </form>

    <p><a href="{{ url('/courses') }}">Back to Course List</a></p>
</body>
</html>