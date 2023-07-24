<?php
namespace Modules\Template\Blocks;
class HomePageSecondBlock extends BaseBlock
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
                            'id'        => 'sub_title',
                            'type'      => 'textArea',
                            'label'     => __('Sub Title')
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
        return __('Apec Group');
    }

    public function content($model = [])
    {
        return view('Template::frontend.blocks.home-page-second-block.index', $model);
    }
}