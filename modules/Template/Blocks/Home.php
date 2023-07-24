<?php
namespace Modules\Template\Blocks;

use Modules\Template\Blocks\BaseBlock;
use Modules\Media\Helpers\FileHelper;

class Home extends BaseBlock
{
    function __construct()
    {
        $this->setOptions([
            'settings' => [
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
                ],
                [
                    'id'        => 'video_url',
                    'type'      => 'input',
                    'inputType' => 'text',
                    'title_field' => 'Url should be from youtube link',
                    'label'     => __('Video url')
                ]
            ]
        ]);
    }

    public function getName()
    {
        return __('Home');
    }

    public function content($model = [])
    {
        return view('Template::frontend.blocks.home.index', $model);
    }
}