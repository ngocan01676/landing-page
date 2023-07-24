<?php
namespace Modules\Template\Blocks;

use Modules\Template\Blocks\BaseBlock;
use Modules\Media\Helpers\FileHelper;

class News extends BaseBlock
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
                            'id'        => 'createAt',
                            'type'      => 'input',
                            'inputType' => 'text',
                            'label'     => __('CreateAt')
                        ],
                        [
                            'id'        => 'news_url',
                            'type'      => 'input',
                            'inputType' => 'text',
                            'values'        => '/',
                            'label'     => __('News url')
                        ],
                        [
                            'id'    => 'icon_image',
                            'type'  => 'uploader',
                            'label' => __('Image Uploader')
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
        return __('News');
    }

    public function content($model = [])
    {
        return view('Template::frontend.blocks.news.index', $model);
    }
}