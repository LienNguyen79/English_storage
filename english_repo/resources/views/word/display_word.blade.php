<!-- //trong learn_controller gán cái mảng lấy được khi query ra vào words:$data = array('words' => $data);
//thì khi extract nó lấy cái words thành biến nên dùng được cái foreach $words -->

<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kho từ của bạn</title>
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
        <td><img style=" width: 80px; height: 80px;  margin :auto; display: block;" src='<?php echo $arr->image_path ?>' alt="Không có hình ảnh"> </td>
        <td><audio controls><source src="<?php echo $arr->sound_path ?>" type="audio/mpeg"></audio> </td>
        <td><?php echo  $arr->note; ?> </td>
        <td><?php echo  $arr->created_at; ?> </td>
        <td><?php echo  $arr->updated_at; ?> </td>
        <td>
          <!-- <form method="POST" >
            <input type="text" hidden name="id" value=""> -->
            <a href = "/update"> <button name='update'>Sửa từ</button> 
          <!-- </form> -->
          <form method="POST" >
            <input type="text" hidden name="id" value="">
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