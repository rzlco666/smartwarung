<?php if($user['role'] == 0): ?>
    <?php if($this->session->userdata('username')==$user['username']): ?>
    <li><a <?php echo($active == 'index'?'class="active"':'') ?> href="<?php echo site_url('profile')?>">Profile</a></li>
    <li><a <?php echo($active == 'order'?'class="active"':'') ?> href="<?php echo site_url('profile/order') ?>">Pesanan saya</a></li>
    <?php else: ?>
        <li><a <?php echo($active == 'index'?'class="active"':'') ?> href="<?php echo site_url('profile/show/').$user['username']?>">Profile</a></li>
    <?php endif; ?>
<?php elseif($user['role'] == 1): ?>
    <?php  if($this->session->userdata('username') == $user['username']): ?>
    <li><a <?php echo($active == 'mywarung'?'class="active"':'') ?> href="<?php echo site_url('warung/mywarung')?>">Dashboard</a></li>
    <li><a <?php echo($active == 'index'?'class="active"':'') ?> href="<?php echo site_url('profile')?>">Profile</a></li>
    <li><a <?php echo($active == 'order'?'class="active"':'') ?> href="<?php echo site_url('profile/order') ?>">Pesanan masuk</a></li>
    <li><a <?php echo($active == 'bank'?'class="active"':'') ?> href="<?php echo site_url('warung/bank/').$user['username'] ?>">Bank</a></li>
    <li><a <?php echo($active == 'comment'?'class="active"':'') ?> href="<?php echo site_url('profile/comment') ?>">Kritik Saran</a></li>
    <?php else: ?>
    <li><a <?php echo($active == 'index'?'class="active"':'') ?> href="<?php echo site_url('profile/show/').$user['username']?>">Profile</a></li>
    <?php endif ?>
    <li><a <?php echo($active == 'etalase'?'class="active"':'') ?> href="<?php echo site_url('profile/etalase/').$user['username'] ?>">Etalase</a></li>
    <li><a <?php echo($active == 'laporan'?'class="active"':'') ?> href="<?php echo site_url('warung/laporan/') ?>">Pembukuan</a></li>
<?php endif; ?>