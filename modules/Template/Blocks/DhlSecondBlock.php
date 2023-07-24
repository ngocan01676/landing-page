<?php
namespace Modules\Template\Blocks;

use Modules\Template\Blocks\BaseBlock;

class DhlSecondBlock extends BaseBlock
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
        return __('DHL Second block');
    }

    public function content($model = [])
    {
        return view('Template::frontend.blocks.dhl-second-block.index', $model);
    }
}