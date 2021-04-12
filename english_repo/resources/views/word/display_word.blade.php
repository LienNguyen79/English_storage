<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kho từ của bạn</title>
  <meta charset="UTF-8">

  </head>
<body>
  <div>
  
<table >

  <th>Số thứ tự</th>
  <th>Từ</th>
  <th>Loại từ</th>
  <th>Nghĩa</th>
  <th>Hình ảnh</th>
  <th>Phát âm</th>
  <th>Ghi chú</th>
  <th>Ngày tạo</th>
  <th>Ngày sửa</th>
  <th> Thao tác</th>
  <?php  $i = 1;    

    foreach ($words as $arr){
      echo "<tr>";
      //echo $arr['image'];
      //foreach($arr as $key => $item){
    ?>
        <td><?php echo  $i ?> </td> 
        <?php $i++; ?>
        <td><?php echo  $arr->name_word; ?> </td>
        <td><?php echo  $arr->type_word; ?> </td>
        <td><?php echo  $arr->mean; ?> </td>
        <td><img style=" width: 80px; height: 80px;  margin :auto; display: block;" src="{{ asset($arr->image_path) }}" alt="Không có hình ảnh"> </td>
        <td><audio src="{{ asset($arr->sound_path) }}" controls></audio> </td>
        <td><?php echo  $arr->note; ?> </td>
        <td><?php echo  $arr->created_at; ?> </td>
        <td><?php echo  $arr->updated_at; ?> </td>
        <td>
         
          <form method="POST" >
          @csrf
            <input type="text" hidden name="id" value="<?php echo $arr->id; ?>">
            <button name='update'> Sửa từ </button>
            <button name='delete'> Xóa từ </button>
          </form>
        <td>
        
  <?php
    } 
    echo "</tr>";
      
  ?>
</table>
</div>

  </body>
</html>
</x-app-layout>