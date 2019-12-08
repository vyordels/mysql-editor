<?php

namespace Encore\MysqlEditor;

use Encore\Admin\Admin;
use Encore\Admin\Form;
use Illuminate\Support\ServiceProvider;

class MysqlEditorServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot(MysqlEditor $extension)
    {
        if (! MysqlEditor::boot()) {
            return ;
        }

        Admin::booting(function () {
            Form::extend('mysql', Editor::class);
        });
    }
}