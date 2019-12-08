<?php

namespace Encore\PHPEditor;

use Encore\Admin\Form\Field;
use Jxlwqq\CodeMirror\CodeMirror;

class Editor extends Field
{
    /**
     * {@inheritdoc}
     */
    protected $view = 'laravel-admin-code-mirror::editor';

    /**
     * {@inheritdoc}
     */
    protected static $css = [
        CodeMirror::ASSETS_PATH . 'lib/codemirror.css',
        CodeMirror::ASSETS_PATH . 'addon/hint/show-hint.css',
    ];

    /**
     * {@inheritdoc}
     */
    protected static $js = [
        CodeMirror::ASSETS_PATH . 'lib/codemirror.js',
        CodeMirror::ASSETS_PATH . 'mode/css/css.js',
        CodeMirror::ASSETS_PATH . 'addon/edit/matchbrackets.js',
        CodeMirror::ASSETS_PATH . 'addon/comment/continuecomment.js',
        CodeMirror::ASSETS_PATH . 'addon/comment/comment.js',
        CodeMirror::ASSETS_PATH . 'addon/hint/show-hint.js',
        CodeMirror::ASSETS_PATH . 'addon/hint/sql-hint.js',
        CodeMirror::ASSETS_PATH . 'mode/sql/sql.js',
    ];

    /**
     * Set editor height.
     *
     * @param int $height
     *
     * @return $this
     */
    public function height($height = 10)
    {
        return $this->addVariables(compact('height'));
    }

    /**
     * {@inheritdoc}
     */
    public function render()
    {
        $options = array_merge(
            [
                'mode'           => 'text/x-mysql',
                'lineNumbers'    => true,   //是否在编辑器左侧显示行号
                'matchBrackets'  => true,   //是否在初始化时自动获取焦点
                'smartIndent'    => true,   //自动缩进，设置是否根据上下文自动缩进,默认为true
                'extraKeys'      => [
                    'Ctrl-Space' => 'autocomplete',
                ],
                'indentUnit'     => 4,
                'indentWithTabs' => true,
            ]
//            MysqlEditor::config('config', [])
        );

        $options = json_encode($options);

        $this->script = <<<EOT
CodeMirror.fromTextArea(document.getElementById("{$this->id}"), $options);
EOT;

        return parent::render();
    }
}