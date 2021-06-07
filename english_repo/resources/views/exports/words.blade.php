<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
        <tr>
            <th>STT</th>
            <th>Từ</th>
            <th>Loại từ </th>
            <th>Nghĩa</th>
            <th>Hình ảnh</th>
            <th>Âm thanh</th>
            <th>Ghi chú</th>
            <th>Ngày tạo</th>
            <th>Ngày sửa</th>
        </tr>
        </thead>
        <tbody>
        @foreach($words as $word)
            <tr>
                <th>{{ $loop->index+1}}</th>
                <th>{{ $word->name_word}}</th>
                <th>{{ $word->type_word}}</th>
                <th>{{ $word->mean}}</th>
                <th>{{ $word->image_path}}</th>
                <th>{{ $word->sound_path}}</th>
                <th>{{ $word->note}}</th>
                <th>{{ $word->created_at}}</th>
                <th>{{ $word->updated_at}}</th>

            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>