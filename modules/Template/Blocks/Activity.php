<?php
namespace Modules\Template\Blocks;

use Modules\Template\Blocks\BaseBlock;
use Modules\Media\Helpers\FileHelper;

class Activity extends BaseBlock
{
    function __construct()
    {
        $this->setOptions([
            'settings' => [
                [
                    'id'        => 'title',
                    'type'      => 'input',
                    'inputType' => 'text',
                    'label'     => __('Title')
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
                            'id'        => 'desc',
                            'type'      => 'textArea',
                            'inputType' => 'textArea',
                            'label'     => __('Desc')
                        ],
                        [
                            'id'        => 'btn_text',
                            'type'      => 'input',
                            'inputType' => 'text',
                            'label'     => __('Btn text')
                        ],
                        [
                            'id'        => 'btn_link',
                            'type'      => 'input',
                            'inputType' => 'text',
                            'label'     => __('Btn link')
                        ],
                        [
                            'id'    => 'icon_image',
                            'type'  => 'uploader',
                            'label' => __('Image Uploader')
                        ]
                    ]
                ],
            ]
        ]);
    }

    public function getName()
    {
        return __('Activity');
    }

    public function content($model = [])
    {
        return view('Template::frontend.blocks.activity.index', $model);
    }
}