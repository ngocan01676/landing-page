<?php
namespace Modules\Template\Blocks;
class HomePageThreeBlock extends BaseBlock
{
    public function __construct()
    {
        $this->setOptions([
            'settings' => [
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
                    'label'     => __('Button url')
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
                            'id'        => 'title',
                            'type'      => 'input',
                            'inputType' => 'text',
                            'label'     => __('Title')
                        ],
                        [
                            'id'        => 'content',
                            'type'      => 'textArea',
                            'label'     => __('Content')
                        ],
                        [
                            'id'        => 'link_url',
                            'type'      => 'input',
                            'inputType' => 'text',
                            'label'     => __('Link url')
                        ],
                    ]
                ]
            ]
        ]);
    }

    public function getName()
    {
        return __('Vườn APEC');
    }

    public function content($model = [])
    {
        return view('Template::frontend.blocks.home-page-three-block.index', $model);
    }
}