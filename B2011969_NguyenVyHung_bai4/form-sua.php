<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Thay đổi mật khẩu</title>
  </head>
  <body>
    <form action="sua_mk.php" method="post">
      <label for="old_password">Mật khẩu cũ:</label>
      <input type="text" id="old_password" name="old_password" required>
      
      <br>
      <label for="new_password">Mật khẩu mới:</label>
      <input type="text" id="new_password" name="new_password" required>
      <br>
      <label for="confirm_password">Xác nhận mật khẩu mới:</label>
      <input type="text" id="confirm_password" name="confirm_password" required>
      <br>
      <input type="submit" name="submit" value="Xác nhận">
    </form>
</body>
</html>
