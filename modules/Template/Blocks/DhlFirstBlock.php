<?php
namespace Modules\Template\Blocks;

use Modules\Template\Blocks\BaseBlock;

class DhlFirstBlock extends BaseBlock
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
                    'id'        => 'btn_label',
                    'type'      => 'input',
                    'inputType' => 'text',
                    'label'     => __('Btl label')
                ],
                [
                    'id'          => 'list_item',
                    'type'        => 'listItem',
                    'label'       => __('List Item(s)'),
                    'title_field' => 'title',
                    'settings'    => [
                        [
                            'id'    => 'bg',
                            'type'  => 'uploader',
                            'label' => __('Image Uploader')
                        ],
                        [
                            'id'        => 'link',
                            'type'      => 'input',
                            'inputType' => 'text',
                            'label'     => __('Link to page')
                        ],
                        [
                            'id'        => 'title',
                            'type'      => 'input',
                            'inputType' => 'text',
                            'label'     => __('Title')
                        ],
                        [
                            'id'        => 'sub_title',
                            'type'      => 'textArea',
                            'label'     => __('Sub Title')
                        ]
                    ]
                ]
            ]
        ]);
    }

    public function getName()
    {
        return __('DHL First block');
    }

    public function content($model = [])
    {
        return view('Template::frontend.blocks.dhl-first-block.index', $model);
    }
}