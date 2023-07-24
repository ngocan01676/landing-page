<?php
namespace Modules\Template\Blocks;

use Modules\Template\Blocks\BaseBlock;

class DhlThirdBlock extends BaseBlock
{
    function __construct()
    {
        $this->setOptions([
            'settings' => [
                [
                    'id'        => 'title',
                    'type'      => 'input',
                    'inputType' => 'text',
                    'label'     => __('title')
                ],
                [
                    'id'        => 'note',
                    'type'      => 'editor',
                    'inputType' => 'textArea',
                    'label'     => __('Notes')
                ],
                [
                    'id'          => 'list_item',
                    'type'        => 'listItem',
                    'label'       => __('List Item(s)'),
                    'title_field' => 'title',
                    'settings'    => [
                        [
                            'id'        => 'title',
                            'type'      => 'input',
                            'inputType' => 'text',
                            'label'     => __('Title')
                        ],
                        [
                            'id'        => 'content',
                            'type'      => 'editor',
                            'inputType' => 'textArea',
                            'label'     => __('Content')
                        ],
                    ]
                ]
            ]
        ]);
    }

    public function getName()
    {
        return __('DHL Third block');
    }

    public function content($model = [])
    {
        return view('Template::frontend.blocks.dhl-third-block.index', $model);
    }
}