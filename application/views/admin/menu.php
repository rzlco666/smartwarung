<?php if($this->session->userdata('role') == 0): ?>
<li><a class="active" href="<?php echo site_url('profile')?>">Profile</a></li>
<li><a href="<?php echo site_url('profile/order') ?>">Pesanan saya</a></li>
<?php elseif($this->session->userdata('role') == 1): ?>
<li><a href="<?php echo site_url('profile')?>">Profile</a></li>
<li><a class="active" href="<?php echo site_url('profile/etalase') ?>">Etalase</a></li>
<li><a href="<?php echo site_url('profile/order') ?>">Pesanan masuk</a></li>
<?php elseif($this->session->userdata('role') == 99): ?>
<li><a <?php echo($active == 'index'?'class="active"':'') ?> href="<?php echo site_url('admin')?>">Semua</a></li>
<li><a <?php echo($active == 'orders'?'class="active"':'') ?> href="<?php echo site_url('admin/orders') ?>">Pesanan</a></li>
<li><a <?php echo($active == 'week_sale'?'class="active"':'') ?> href="<?php echo site_url('admin/week_sale') ?>">Orbal Mingguan</a></li>
<li><a <?php echo($active == 'warung'?'class="active"':'') ?> href="<?php echo site_url('admin/warung') ?>">Warung</a></li>
<li><a <?php echo($active == 'user'?'class="active"':'') ?> href="<?php echo site_url('admin/user') ?>">Pembeli</a></li>
<li><a <?php echo($active == 'comment'?'class="active"':'') ?> href="<?php echo site_url('admin/comment') ?>">Kritik Saran</a></li>
<li><a <?php echo($active == 'billing'?'class="active"':'') ?> href="<?php echo site_url('admin/billing') ?>">Pendapatan Warung</a></li>
<?php endif; ?>