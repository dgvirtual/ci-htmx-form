<?= $this->extend('default_layout') ?>

<?= $this->section('content') ?>

<?php if (!empty($msg)) : ?> 
<div class="alert alert-secondary alert-dismissible fade show" role="alert">
    <p><?= $msg ?></p>
</div>
<?php endif; ?>

<h3 class="mt-4"><?php echo $title; ?></h3>




<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item">Fragments</li>
    <li class="breadcrumb-item active"><?php echo $title; ?></li>
</ol>

<div class="container" style="max-width:500px;">

    <form hx-boost="true" action="<?= site_url('fragment/save') ?>" method="post">
    <?= csrf_field() ?>

        <div class="row">
            <?php $fieldName = 'first_name'; ?>
            <div id="<?=$fieldName?>" class="col-12">
                <?php $this->fragment($fieldName); ?>
                <div class="mb-3">
                    <label class="form-label" for="<?=$fieldName?>">First Name</label>
                    <input 
                        hx-trigger="blur" 
                        hx-target="#<?=$fieldName?>" 
                        hx-get="<?= site_url('fragment/validateField/'. $fieldName) ?>" 
                        hx-ext="disable-element" 
                        hx-disable-element="#submit" 
                        hx-sync="closest form:abort"
                        type="text" 
                        class="form-control<?php 
                            if (!empty(validation_show_error($fieldName))) 
                                echo ' is-invalid';
                            elseif (validation_errors()) 
                                echo ' is-valid';
                        ?>" 
                        name="<?=$fieldName?>" 
                        value="<?= $values[$fieldName] ?? old($fieldName) ?>"
                    >
                    <?= validation_show_error($fieldName) ?>
                </div>
                <?php $this->endFragment(); ?>
            </div>

            <?php $fieldName = 'last_name'; ?>
            <div id="<?=$fieldName?>" class="col-12">
                <?php $this->fragment($fieldName); ?>
                <div class="mb-3">
                    <label class="form-label" for="<?=$fieldName?>">Last Name</label>
                    <input 
                        hx-trigger="blur" <?php /*keyup delay:500ms*/?>
                        hx-target="#<?=$fieldName?>" 
                        hx-ext="disable-element" 
                        hx-disable-element="#submit"
                        hx-sync="closest form:abort"
                        hx-get="<?= site_url('fragment/validateField/'. $fieldName) ?>" 
                        type="text" 
                        class="form-control<?php 
                            if (!empty(validation_show_error($fieldName))) 
                                echo ' is-invalid';
                            elseif (validation_errors()) 
                                echo ' is-valid';
                        ?>"
                        name="<?=$fieldName?>" 
                        value="<?= $values[$fieldName] ?? old($fieldName) ?>"
                >
                    <?= validation_show_error($fieldName) ?>
                </div>
                <?php $this->endFragment(); ?>
            </div>

            <?php $fieldName = 'color'; ?>
            <div id="<?=$fieldName?>" class="col-12">
                <?php $this->fragment($fieldName); ?>
                <div class="mb-3">
                    <label class="form-label" for="<?=$fieldName?>">Color</label>
                    <select 
                        hx-trigger="blur"
                        hx-target="#<?=$fieldName?>" 
                        hx-ext="disable-element" 
                        hx-disable-element="#submit"
                        hx-get="<?= site_url('fragment/validateField/'. $fieldName) ?>" 
                        type="text" 
                        class="form-select<?php 
                            if (!empty(validation_show_error($fieldName))) 
                                echo ' is-invalid';
                            elseif (validation_errors()) 
                                echo ' is-valid';
                        ?>"
                        name="<?=$fieldName?>" 
                    >
                        <option value="">- select one -</option>
                        <option value="blue" <?= (($values[$fieldName] ?? old($fieldName)) == 'blue') ? 'selected' : '' ?>>Blue</option>
                        <option value="yelow" <?= (($values[$fieldName] ?? old($fieldName)) == 'yelow') ? 'selected' : '' ?>>Yelow</option>
                        <option value="red" <?= (($values[$fieldName] ?? old($fieldName)) == 'red') ? 'selected' : '' ?>>Red</option>
                        <option value="green" <?= (($values[$fieldName] ?? old($fieldName)) == 'green') ? 'selected' : '' ?>>Green</option>
                    </select>
                    <?= validation_show_error($fieldName) ?>
                </div>
                <?php $this->endFragment(); ?>
            </div>

            <div class="col-12">
                <div class="mb-3">
                    <button id="submit" type="submit" class="btn btn-success">Save</button>
                </div>
            </div>
        </div>

    </form>
</div>

<?= $this->endSection() ?>