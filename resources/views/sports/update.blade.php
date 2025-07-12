<!-- resources/views/sports/edit.blade.php -->
<form method="POST" action="{{ route('sports.update', $sport->id) }}">
    @csrf
    @method('PUT')
    <label>Name:</label>
    <input type="text" name="name" value="{{ old('name', $sport->name) }}">
    <label>Location:</label>
    <input type="text" name="location" value="{{ old('location', $sport->location) }}">
    <label>Type:</label>
    <input type="text" name="type" value="{{ old('type', $sport->type) }}">
    <label>Price:</label>
    <input type="text" name="price" value="{{ old('price', $sport->price) }}">
    <label>Contact Info:</label>
    <input type="text" name="contact_info" value="{{ old('contact_info', $sport->contact_info) }}">
    <label>Date Available:</label>
    <input type="text" name="date_available" value="{{ old('date_available', $sport->date_available) }}">
    <label>Description:</label>
    <input type="text" name="description" value="{{ old('description', $sport->description) }}">
    <button type="submit">Update</button>
</form>
