<?php
defined('IN_ADMIN') or exit('No permission resources.');
include $this->admin_tpl('header', admin);
?>
<script type="text/javascript">

</script>

<div class="pad-10">
    <div>
        <table width="100%"  class="table_form">
            <tr>
                <th width="80">Name:</th>
                <td class="y-bg"><?php echo $info['name'];?></td>
            </tr>
            <tr>
                <th width="80">Phone</th>
                <td class="y-bg"><?php echo $info['phone'];?></td>
            </tr>
            <tr>
                <th width="80">Email</th>
                <td class="y-bg"><?php echo $info['email'];?></td>
            </tr>
            <tr>
                <th width="80">Company</th>
                <td class="y-bg"><?php echo $info['company'];?></td>
            </tr>
            
            <tr>
                <th width="80">Country</th>
                <td class="y-bg"><?php echo $info['country'];?></td>
            </tr>
            <tr>
                <th width="80">Message</th>
                <td class="y-bg"><?php echo $info['message'];?></td>
            </tr>
            
        </table>
        <div class="bk15"></div>
    </div>
</div>
</body>
</html>