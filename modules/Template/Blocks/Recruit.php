<?php
namespace Modules\Template\Blocks;

use Modules\Template\Blocks\BaseBlock;
use Modules\Media\Helpers\FileHelper;

class Recruit extends BaseBlock
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
                    'id'        => 'desc',
                    'type'      => 'textArea',
                    'inputType' => 'textArea',
                    'label'     => __('Desc')
                ],
                [
                    'id'    => 'bg',
                    'type'  => 'uploader',
                    'label' => __('Image Uploader')
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
                            'id'        => 'salary_text',
                            'type'      => 'input',
                            'inputType' => 'text',
                            'label'     => __('Salary text')
                        ],
                        [
                            'id'        => 'salary_value',
                            'type'      => 'input',
                            'inputType' => 'text',
                            'label'     => __('Salary value')
                        ],
                        [
                            'id'        => 'quantity_text',
                            'type'      => 'input',
                            'inputType' => 'text',
                            'label'     => __('Quantity text')
                        ],
                        [
                            'id'        => 'quantity_value',
                            'type'      => 'input',
                            'inputType' => 'text',
                            'label'     => __('Quantity value')
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
                            'values'        => '/',
                            'label'     => __('Btn link')
                        ]
                    ]
                ],
                [
                    'id'        => 'view_all_text',
                    'type'      => 'input',
                    'inputType' => 'text',
                    'label'     => __('View all text')
                ],
                [
                    'id'        => 'view_all_link',
                    'type'      => 'input',
                    'inputType' => 'text',
                    'label'     => __('View all link')
                ]
            ]
        ]);
    }

    public function getName()
    {
        return __('Recruit');
    }

    public function content($model = [])
    {
        return view('Template::frontend.blocks.recruit.index', $model);
    }
}