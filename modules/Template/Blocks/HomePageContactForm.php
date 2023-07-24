<?php
namespace Modules\Template\Blocks;
class HomePageContactForm extends BaseBlock
{
    public function __construct()
    {
        $this->setOptions([
            'settings' => [
                [
                    'id'        => 'title',
                    'type'      => 'textArea',
                    'label'     => __('Title')
                ],
                [
                    'id'        => 'sub_title',
                    'type'      => 'textArea',
                    'label'     => __('Content')
                ],
                [
                    'id'        => 'btn_text',
                    'type'  => 'input',
                    'inputType' => 'text',
                    'label'     => __('Button text')
                ]
            ]
        ]);
    }

    public function getName()
    {
        return __('Apec form ứng tuyển');
    }

    public function content($model = [])
    {
        return view('Template::frontend.blocks.home-page-contact-form.index', $model);
    }
}