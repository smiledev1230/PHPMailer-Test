<?php
$this->webroot = $this->webroot . 'index.php/';
?>

<div id="header">
    <!-- nav !-->
    <div class="nav">
        <div id="nav-wrap">
            <img width="194" height="88" src="/images/bottom-HonestLogo.gif">
        </div>

        <div id="nav-style">
            <?php if ($this->Session->read('isLogin') && $this->action != 'preview' && $this->action != 'editEmailPreview') : ?>
                <ul class="dropdown dropdown-horizontal">
                    <li><a href="<?php echo $this->webroot; ?>" class="dir2" id="active">Home</a></li>
                    <?php if ($this->Session->check('user_type') and ($this->Session->read('user_type') == 1)) : ?>
                        <li><a href="<?php echo $this->webroot; ?>pages/home" class="dir">Customers</a>
                            <ul>
                                <li><a href="<?php echo $this->webroot; ?>pages/home">Customer List</a></li>
                                <li><a href="<?php echo $this->webroot; ?>users/add_new">Add New Customer</a></li>
                                <li><a href="<?php echo $this->webroot; ?>appointments/visitors">Customer Web Contact List</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <?php if ($this->Session->check('user_type') and ($this->Session->read('user_type') == 1)) : ?>
                        <li><a href="<?php echo $this->webroot; ?>users/interested">Customer Interests</a>
                        </li>
                    <?php endif; ?>
                    <li><a href="<?php echo $this->webroot; ?>teams/" <?= ($this->Session->read('user_type') == 1) ? 'class="dir"' : ""; ?>>Teams</a>
                        <?php if ($this->Session->read('user_type') == 1) : ?>
                            <ul>
                                <li><a href="<?php echo $this->webroot; ?>teams/">Team List</a></li>
                                <li><a href="<?php echo $this->webroot; ?>teams/add_user">Add User</a></li>
                            </ul>
                        <?php endif; ?>
                    </li>
                    <li><a href="<?php echo $this->webroot; ?>products/" <?= ($this->Session->read('user_type') == 1) ? 'class="dir"' : ""; ?>>Products</a>
                        <?php if ($this->Session->check('user_type') and ($this->Session->read('user_type') == 1)) : ?>
                            <ul>
                                <li><a href="<?php echo $this->webroot; ?>products/">Product List</a></li>
                                <li><a href="<?php echo $this->webroot; ?>products/add_new">Add Product</a></li>
                            </ul>
                        <?php endif; ?>
                    </li>
                    <li><a href="<?php echo $this->webroot; ?>categories/" class="dir2">Categories</a></li>
                    <li><a href="<?php echo $this->webroot; ?>subjects/" class="dir">Subjects</a>
                        <ul>
                            <li><a href="<?php echo $this->webroot; ?>subjects/">Subject List</a></li>
                            <li><a href="<?php echo $this->webroot; ?>subjects/add_new">Add Subject</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo $this->webroot; ?>appointments/editEmail" class="dir">Email Layout</a>
                        <ul>
                            <li><a href="<?php echo $this->webroot; ?>appointments/editEmail">Email Layout</a></li>
                            <li><a href="<?php echo $this->webroot; ?>appointments/editEmailConfirmation">Visitor Email Confirmation</a></li>
                        </ul>

                    </li>
                    <li><a href="<?php echo $this->webroot; ?>teams/logout">Logout</a></li>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- eof nav !-->
</div>