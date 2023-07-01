<!-- create.blade.php -->
<form action="{{ route('projecttitle.store') }}" method="POST">
    @csrf
    <label for="title">Project Title:</label>
    <input type="text" name="title" id="title">
    <button type="submit">Submit</button>
</form>
