<!DOCTYPE html>
<html>
<head>
    <title>Import Excel</title>
</head>
<body>
    <form action="{{ route('upload-excel') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" accept=".xls, .xlsx">
        <button type="submit">Import Excel</button>
    </form>
</body>
</html>
