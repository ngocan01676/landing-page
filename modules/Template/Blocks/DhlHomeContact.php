<?php
namespace Modules\Template\Blocks;

use Modules\Template\Blocks\BaseBlock;
use Modules\Media\Helpers\FileHelper;

class DhlHomeContact extends BaseBlock
{
    function __construct()
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
                    'id'        => 'desc',
                    'type'      => 'editor',
                    'inputType' => 'textArea',
                    'label'     => __('Desc')
                ],
                [
                    'id'        => 'hotline_1',
                    'type'      => 'input',
                    'inputType' => 'text',
                    'label'     => __('Hotline 1')
                ],
                [
                    'id'        => 'hotline_1_link',
                    'type'      => 'input',
                    'inputType' => 'text',
                    'label'     => __('Hotline 1 Phone number')
                ],
                [
                    'id'        => 'hotline_2',
                    'type'      => 'input',
                    'inputType' => 'text',
                    'label'     => __('Hotline 2')
                ],
                [
                    'id'        => 'hotline_2_link',
                    'type'      => 'input',
                    'inputType' => 'text',
                    'label'     => __('Hotline 2 Phone number')
                ],
                [
                    'id'        => 'left_text_footer',
                    'type'      => 'editor',
                    'inputType' => 'textArea',
                    'label'     => __('Left text footer')
                ],
                [
                    'id'        => 'right_text_footer',
                    'type'      => 'input',
                    'inputType' => 'text',
                    'label'     => __('Rigth text footer')
                ]
                
            ]
        ]);
    }

    public function getName()
    {
        return __('DHL Home Contact');
    }

    public function content($model = [])
    {
        return view('Template::frontend.blocks.dhl-contact-form.index', $model);
    }
}