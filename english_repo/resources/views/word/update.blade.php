<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: DarkSeaGreen;
            background-image: url('../images/special_cource_3.png'); 
            background-size: cover;
            background-position: center;
            font-family: sans-serif;
        }

        .wordform{
            width: 320px;
            height: 450px;
            background: #000;
            color: #fff;
            top: 50%;
            left: 50%;
            position: absolute;
            transform: translate(-50%,-50%);
            box-sizing: border-box;
            padding: 30px 30px; 
        }
        .wordform label{
            margin: 0;
            padding: 0;
            font-weight: bold;
        }


        .wordform input{
            width: 100%;
            margin-bottom: 15px;
        }

        .wordform input[type="text"]
        {
            border: none;
            border-bottom: 1px solid #fff;
            background: transparent;
            outline: none;
            height: 30px;
            color: #fff;
            font-size: 15px;
        }
        .wordform input[type="submit"]
        {
            border: none;
            outline: none;
            height: 35px;
            background: #fb2525;
            color: #fff;
            font-size: 18px;
            border-radius: 20px;
        }
        .wordform input[type="submit"]:hover
        {
            cursor: pointer;
            background: #ffc107;
            color: #000;
        }
        table{
            border-collapse:collapse;
            background-color:yellow;
            width:100%;
        }
        td{
            background-color:#fff;
        }
        table th, td{
            border:1px solid black;
        }
    </style>
</head>
<body>
<a href = "display_word"><img src="icons/back_icon.jpg" alt="icon" style=" width: 20px; height: 20px;">Quay lại</button></a>
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
        <input type="file" name="image" accept=".img,.png" value="{{ asset($updateWord[0]->image_path) }}"  /><br>
        <label>Phát âm:</label>
        <input type="file" name="sound" accept=".ogg,.flac,.mp3" value="{{ asset($updateWord[0]->sound_path) }}"  /><br>
        <label>Ghi chú:</label>
        <input type="text" id="fname" name="note" value="<?php echo $updateWord[0]->note; ?> " ><br>
        <input type="submit" name="submit" class="btn btn-primary" value ="Sửa từ"/>
    </form>
</div>
    
</body>
</html>