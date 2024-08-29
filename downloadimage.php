 <td>      
    
   <!-- for downloading image button -->
     
    <form action="download.php" method="post"style="">
     <input type="hidden" name="path"value="<?php echo $row['image']; ?>">
      <input type="submit" name="download"value="Download">
    </td>

</form>
