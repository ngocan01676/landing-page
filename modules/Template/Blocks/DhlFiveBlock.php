<?php
namespace Modules\Template\Blocks;

use Modules\Template\Blocks\BaseBlock;

class DhlFiveBlock extends BaseBlock
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
                            'id'        => 'content',
                            'type'      => 'input',
                            'inputType' => 'text',
                            'label'     => __('Content')
                        ],
                    ]
                ]
            ]
        ]);
    }

    public function getName()
    {
        return __('DHL Five block');
    }

    public function content($model = [])
    {
        return view('Template::frontend.blocks.dhl-five-block.index', $model);
    }
}