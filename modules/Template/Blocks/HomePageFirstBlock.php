<?php
namespace Modules\Template\Blocks;
class HomePageFirstBlock extends BaseBlock
{
    public function __construct()
    {
        $this->setOptions([
            'settings' => [
                [
                    'id'    => 'title',
                    'type'  => 'input',
                    'inputType' => 'text',
                    'label' => __('Nhập title')
                ],
                [
                    'id'        => 'desc',
                    'type'      => 'textArea',
                    'inputType' => 'text',
                    'label'     => __('Nhập description')
                ],
                [
                    'id'          => 'list_item',
                    'type'        => 'listItem',
                    'label'       => __('List Item(s)'),
                    'title_field' => 'title',
                    'settings'    => [
                        [
                            'id'    => 'bg_child',
                            'type'  => 'uploader',
                            'label' => __('Image Uploader')
                        ],
                        [
                            'id'        => 'class_name',
                            'type'      => 'input',
                            'inputType' => 'text',
                            'label'     => __('Classes')
                        ],
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
                        [
                            'id'        => 'btn_link',
                            'type'      => 'input',
                            'inputType' => 'text',
                            'label'     => __('Button text')
                        ],
                        [
                            'id'        => 'btn_link_url',
                            'type'      => 'input',
                            'inputType' => 'text',
                            'label'     => __('Link url')
                        ]
                    ]
                ]
            ]
        ]);
    }

    public function getName()
    {
        return __('Thành phố Apec');
    }

    public function content($model = [])
    {
        return view('Template::frontend.blocks.home-page-first-block.index', $model);
    }
}