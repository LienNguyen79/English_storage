<x-app-layout>
<!DOCTYPE html>
<html>
<head>
    <title>Laravel 8 Import Export Excel to database Example - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
</head>
<body>
   
<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
        <p>Để thêm nhiều từ mới, bạn hãy tạo file excel lưu trữ các 
    từ muốn thêm. Cột 1 là từ, cột 2 là loại từ, cột 3 là nghĩa, cột 4 là 
    hình ảnh, cột 5 là âm thanh, cột 6 là ghi chú</p>
        <p>Để lưu toàn bộ từ của bạn về máy, chọn "Export Word Data"</p>
        </div>
        <div class="card-body">
            <form action="{{ url('import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import Words Data</button>
                <a class="btn btn-warning" href="{{ url('export') }}">Export Words Data</a>
            </form>
        </div>
    </div>
</div>
   
</body>
</html>
</x-app-layout>