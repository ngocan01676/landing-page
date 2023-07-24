<?php
namespace Modules\Template;

use Modules\ModuleServiceProvider;

class ModuleProvider extends ModuleServiceProvider
{
    public function boot()
    {

    }

    public function register()
    {

    }

    public static function getTemplateBlocks(){
        return [
            // 'text'=>"\\Modules\\Template\\Blocks\\Text",
            // 'video_player'=>"\\Modules\\Template\\Blocks\\VideoPlayer",
            // 'faqs'=>"\\Modules\\Template\\Blocks\\FaqList",
            // 'offer_block'=>"\\Modules\\Template\\Blocks\\OfferBlock",
            // 'how_it_works'=>"\\Modules\\Template\\Blocks\\HowItWork",
            // 'partner'=>"\\Modules\\Template\\Blocks\\Partner",
            // 'news'=>"\\Modules\\Template\\Blocks\\News",
            // 'recruit'=>"\\Modules\\Template\\Blocks\\Recruit",
            // 'project'=>"\\Modules\\Template\\Blocks\\Project",
            // 'activity'=>"\\Modules\\Template\\Blocks\\Activity",
            // 'story'=>"\\Modules\\Template\\Blocks\\Story",
            // 'home'=>"\\Modules\\Template\\Blocks\\Home",
            'dhl_home_contact'=>"\\Modules\\Template\\Blocks\\DhlHomeContact",
            'dhl_first_block'=>"\\Modules\\Template\\Blocks\\DhlFirstBlock",
            'dhl_second_block'=>"\\Modules\\Template\\Blocks\\DhlSecondBlock",
            'dhl_third_block'=>"\\Modules\\Template\\Blocks\\DhlThirdBlock",
            'dhl_four_block'=>"\\Modules\\Template\\Blocks\\DhlFourBlock",
            'dhl_five_block'=>"\\Modules\\Template\\Blocks\\DhlFiveBlock"
        ];
    }
}
