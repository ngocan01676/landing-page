<?php
namespace Modules\Template\Blocks;

use Modules\Template\Blocks\BaseBlock;
use Modules\Media\Helpers\FileHelper;

class Story extends BaseBlock
{
    function __construct()
    {
        $this->setOptions([
            'settings' => [
                [
                    'id'    => 'icon_image',
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
                    'type'      => 'input',
                    'inputType' => 'text',
                    'label'     => __('Sub title')
                ],
                [
                    'id'        => 'desc',
                    'type'      => 'editor',
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
                    'values'        => '/',
                    'label'     => __('Btn link')
                ]
            ]
        ]);
    }

    public function getName()
    {
        return __('Story');
    }

    public function content($model = [])
    {
        return view('Template::frontend.blocks.story.index', $model);
    }
}