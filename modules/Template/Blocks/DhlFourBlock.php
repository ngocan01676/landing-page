<?php
namespace Modules\Template\Blocks;

use Modules\Template\Blocks\BaseBlock;

class DhlFourBlock extends BaseBlock
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
        return __('DHL Four block');
    }

    public function content($model = [])
    {
        return view('Template::frontend.blocks.dhl-four-block.index', $model);
    }
}