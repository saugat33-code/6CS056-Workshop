<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
</head>
<body>
    <h1>Edit Student</h1>

    <form action="{{ url('/students/' . $student->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Name:</label>
        <input
            type="text"
            id="name"
            name="name"
            value="{{ old('name', $student->name) }}"
            required
        >
        @error('name')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        <br><br>

        <label for="email">Email:</label>
        <input
            type="email"
            id="email"
            name="email"
            value="{{ old('email', $student->email) }}"
            required
        >
        @error('email')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        <br><br>

        <label for="phone">Phone:</label>
        <input
            type="text"
            id="phone"
            name="phone"
            value="{{ old('phone', $student->phone) }}"
            required
        >
        @error('phone')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        <br><br>

        <label for="address">Address:</label>
        <textarea id="address" name="address">{{ old('address', $student->address) }}</textarea>
        @error('address')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        <br><br>

        <label for="date_of_birth">Date of Birth:</label>
        <input
            type="date"
            id="date_of_birth"
            name="date_of_birth"
            value="{{ old('date_of_birth', $student->date_of_birth) }}"
        >
        @error('date_of_birth')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        <br><br>

        <button type="submit">Update Student</button>
    </form>

    <p>
        <a href="{{ url('/students/' . $student->id) }}">Cancel</a>
    </p>
</body>
</html>