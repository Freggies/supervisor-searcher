<!-- create.blade.php -->
<form action="{{ route('projecttitle.store') }}" method="POST">
    @csrf
    <label for="title">Project Title:</label>
    <input type="text" name="title" id="title">
    <label for="lecturers_id">ID:</label>
    <input type="integer" name="lecturers_id" id="lecturers_id">
    <button type="submit">Submit</button>
    
</form>
