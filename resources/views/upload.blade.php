<form action="/upload" method="POST" enctype="multipart/form-data">
    <input type="file" name="file">
    @csrf
    <input type="submit" value="upload">
</form>
