<input type="button" id="back" value="Back" style="width:200px"><br>
<td><?php
    echo $this->Html->link(
    'DOWNLOAD',
    array(
    'controller' => 'getresults',
    'action' => 'sendFile',$filename ),true );
    ?>
</td>
<table border="1">
    <tr>
        <td>FILE PATH</td>
        <td>LINE NO</td>
    </tr>

      <?php if(  isset($data) ){?>

          <?php foreach($data as $val) {?>
              <tr>
                  <td><?php echo $val['dir']?></td>
                  <td><?php echo $val['lineno']?></td>
              </tr>
          <?php }?>
      <?php }else{?>
        <tr>
            <td colspan="2">No Result Found For : <?php echo $serachtext?></td>
        </tr>
      <?php } ?>
</table>
