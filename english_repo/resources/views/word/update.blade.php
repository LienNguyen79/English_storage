<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href = "display_word"><img src="" alt="icon" style=" width: 20px; height: 20px;">Quay lại</button></a>
<div class="wordform">
    <form enctype="multipart/form-data" id="form1" method="post" action="{{url ('update_word') }}" role="form">
    @csrf
        <input type="text" hidden name="id" value="<?php echo $updateWord[0]->id; ?>">
        <label >Từ:</label>
        <input type="text" id="fname" name="word" value="<?php echo $updateWord[0]->name_word; ?> " ><br>
        <label>Loại từ:</label>
        <input type="text" id="lname" name="type" value="<?php echo $updateWord[0]->type_word; ?> " ><br>
        <label>Nghĩa:</label>
        <input type="text" id="fname" name="mean" value="<?php echo $updateWord[0]->mean; ?> " ><br>
        <label>Ảnh:</label>
        <input type="file" name="image" accept=".img,.png" value="<?php echo $updateWord[0]->image_path; ?> "  /><br>
        <label>Phát âm:</label>
        <input type="file" name="sound" accept=".ogg,.flac,.mp3" value="<?php echo $updateWord[0]->sound_path; ?> "  /><br>
        <label>Ghi chú:</label>
        <input type="text" id="fname" name="note" value="<?php echo $updateWord[0]->note; ?> " ><br>
        <input type="submit" name="submit" class="btn btn-primary" value ="Sửa từ"/>
    </form>
</div>
    
</body>
</html>