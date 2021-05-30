<?php
$this->webroot = $this->webroot . 'index.php/';
?>
<div id="pagewidth">
    <div id="header">
        <!-- header !-->
        <div class="header"><img src="/images/random/1.jpg" alt="1.jpg" /></div>
        <!-- eof header !-->

        <!-- nav !-->
        <div class="nav">
            <div id="nav-wrap">
                <?php if ($this->action != 'preview' && $this->action != 'editEmailPreview') : ?>
                    <ul class="dropdown dropdown-horizontal">
                        <li><a href="<?php echo $this->webroot; ?>" class="dir2" id="active">Home</a></li>
                        <?php //if ($this->Session->check('user_type') and ($this->Session->read('user_type') == 1)) : ?>
                        <li><a href="<?php echo $this->webroot; ?>pages/home" class="dir">Customers</a>
                            <ul>
                                <li><a href="<?php echo $this->webroot; ?>users/add_new">Add Customer</a></li>
                                <li><a href="<?php echo $this->webroot; ?>appointments/visitors">Web Contact</a></li>
                            </ul>
                        </li>
                        <?php //endif; ?>
                        <?php if ($this->Session->check('user_type') and ($this->Session->read('user_type') == 1)) : ?>
                            <li><a href="<?php echo $this->webroot; ?>users/interested">Customer Interests</a>
                            </li>
                        <?php endif; ?>
                        <li><a href="<?php echo $this->webroot; ?>teams/" <?= ($this->Session->read('user_type') == 1) ? 'class="dir"' : ""; ?>>Teams</a>
                            <?php if ($this->Session->read('user_type') == 1) : ?>
                                <ul>
                                    <li><a href="<?php echo $this->webroot; ?>teams/add_user">Add User</a></li>
                                </ul>
                            <?php endif; ?>
                        </li>
                        <li><a href="<?php echo $this->webroot; ?>products/">Products</a>
                            <?php if ($this->Session->check('user_type') and ($this->Session->read('user_type') == 1)) : ?>
                                <ul>
                                    <li><a href="<?php echo $this->webroot; ?>products/">Products</a></li>
                                    <li><a href="<?php echo $this->webroot; ?>products/add_new">Add Product</a></li>
                                </ul>
                            <?php endif; ?>
                        </li>
                        <li><a href="<?php echo $this->webroot; ?>categories/" class="dir2">Categories</a></li>
                        <li><a href="<?php echo $this->webroot; ?>subjects/" class="dir">Subjects</a>
                            <ul>
                                <li><a href="<?php echo $this->webroot; ?>subjects/add_new">Add Subject</a></li>
                            </ul>
                        </li>
                        <li><a href="<?php echo $this->webroot; ?>appointments/editEmail" class="dir">Email Layout</a>
                            <ul>
                                <li><a href="<?php echo $this->webroot; ?>appointments/editEmail">Email Layout</a></li>
                                <li><a href="<?php echo $this->webroot; ?>appointments/editEmailConfirmation">Visitor Email Confirmation</a></li>
                            </ul>

                        </li>
                    </ul>
                    <div style="width: 60px; float: right; margin-right:70px;">
                        <ul class="dropdown dropdown-horizontal">
                            <li><a href="<?php echo $this->webroot; ?>teams/logout">Logout</a></li>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <!-- eof nav !-->
    </div>
    <div id="rotator"><span class="schedule"></span></div>