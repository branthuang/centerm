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
                <th width="80">First Name:</th>
                <td class="y-bg"><?php echo $info['first_name'];?></td>
            </tr>
            <tr>
                <th width="80">Last Name:</th>
                <td class="y-bg"><?php echo $info['last_name'];?></td>
            </tr>
            <tr>
                <th width="80">Company</th>
                <td class="y-bg"><?php echo $info['company'];?></td>
            </tr>
            <tr>
                <th width="80">Title</th>
                <td class="y-bg"><?php echo $info['title'];?></td>
            </tr>
            <tr>
                <th width="80">Email</th>
                <td class="y-bg"><?php echo $info['email'];?></td>
            </tr>
            <tr>
                <th width="80">Phone</th>
                <td class="y-bg"><?php echo $info['phone'];?></td>
            </tr>
            <tr>
                <th width="80">Country</th>
                <td class="y-bg"><?php echo $info['country'];?></td>
            </tr>
            <tr>
                <th width="80">State</th>
                <td class="y-bg"><?php echo $info['state'];?></td>
            </tr>
            <tr>
                <th width="80">Request</th>
                <td class="y-bg"><?php echo $info['request'];?></td>
            </tr>
        </table>
        <div class="bk15"></div>
    </div>
</div>
</body>
</html>