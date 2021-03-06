<?php
/*
 *	location: admin/controller
 */

class ControllerExtensionDVisualDesignerModuleImage extends Controller
{
    private $codename = 'image';
    private $route = 'extension/d_visual_designer_module/image';

    public function __construct($registry)
    {
        parent::__construct($registry);
        
        $this->load->language($this->route);
        $this->load->model('extension/module/d_visual_designer');
        $this->load->model('extension/d_opencart_patch/load');
        $this->load->model($this->route);
    }
    public function index($setting)
    {
        $data['setting'] = $this->model_extension_module_d_visual_designer->getSetting($setting, $this->codename);
        
        $this->load->model('tool/image');
        
        if (isset($data['setting']['image']) && is_file(DIR_IMAGE . $data['setting']['image'])) {
            $image = $data['setting']['image'];
        } else {
            $image = 'no_image.png';
        }

        $data['desktop_size'] = $this->{'model_extension_d_visual_designer_module_'.$this->codename}->getSize($image, $data['setting']['size'], $data['setting']['width'], $data['setting']['height']);
        
        if (!empty($data['setting']['size_phone'])) {
            $data['phone_size'] = $this->{'model_extension_d_visual_designer_module_'.$this->codename}->getSize($image, $data['setting']['size_phone'], $data['setting']['width_phone'], $data['setting']['height_phone']);
        }

        if (!empty($data['setting']['size_tablet'])) {
            $data['tablet_size'] = $this->{'model_extension_d_visual_designer_module_'.$this->codename}->getSize($image, $data['setting']['size_tablet'], $data['setting']['width_tablet'], $data['setting']['height_tablet']);
        }

        list($width, $height) = getimagesize(DIR_IMAGE . $image);
        
        $data['thumb'] = $this->model_tool_image->resize($image, $width, $height);

        if (VERSION>='3.0.0.0') {
            $popup_width = $this->config->get('theme_'.$this->config->get('config_theme') . '_image_popup_width');
            $popup_height = $this->config->get('theme_'.$this->config->get('config_theme') . '_image_popup_height');
        } elseif (VERSION>='2.2.0.0') {
            $popup_width = $this->config->get($this->config->get('config_theme') . '_image_popup_width');
            $popup_height = $this->config->get($this->config->get('config_theme') . '_image_popup_height');
        } else {
            $popup_width = $this->config->get('config_image_popup_width');
            $popup_height = $this->config->get('config_image_popup_height');
        }
        $data['popup'] = $this->model_tool_image->resize($image, $popup_width, $popup_height);
        
        $data['unique_id'] = uniqid();

        return $this->model_extension_d_opencart_patch_load->view($this->route, $data);
    }
    public function setting($setting)
    {
        $data['entry_title'] = $this->language->get('entry_title');
        $data['entry_image'] = $this->language->get('entry_image');
        $data['entry_size'] = $this->language->get('entry_size');
        $data['entry_width'] = $this->language->get('entry_width');
        $data['entry_height'] = $this->language->get('entry_height');
        $data['entry_style'] = $this->language->get('entry_style');
        $data['entry_align'] = $this->language->get('entry_align');
        $data['entry_additional_image'] = $this->language->get('entry_additional_image');
        $data['entry_onclick'] = $this->language->get('entry_onclick');
        $data['entry_link'] = $this->language->get('entry_link');
        $data['entry_link_target'] = $this->language->get('entry_link_target');
        $data['entry_alt'] = $this->language->get('entry_alt');
        $data['entry_title'] = $this->language->get('entry_title');
        $data['entry_parallax'] = $this->language->get('entry_parallax');
        $data['entry_parallax_height'] = $this->language->get('entry_parallax_height');
        $data['entry_adaptive_design'] = $this->language->get('entry_adaptive_design');

        $data['column_size'] = $this->language->get('column_size');
        $data['column_align'] = $this->language->get('column_align');
        $data['column_device'] = $this->language->get('column_device');

        $data['text_phone'] = $this->language->get('text_phone');
        $data['text_tablet'] = $this->language->get('text_tablet');

        $data['text_new_window'] = $this->language->get('text_new_window');
        $data['text_current_window'] = $this->language->get('text_current_window');
        $data['text_enabled'] = $this->language->get('text_enabled');
        $data['text_yes'] = $this->language->get('text_yes');
        $data['text_no'] = $this->language->get('text_no');
        $data['text_none'] = $this->language->get('text_none');
        
        
        $data['button_remove'] = $this->language->get('button_remove');
        $data['button_image_add'] = $this->language->get('button_image_add');
        
        $data['setting'] = $this->model_extension_module_d_visual_designer->getSetting($setting, $this->codename);
        
        $this->load->model('tool/image');
        
        if (isset($data['setting']['image']) && is_file(DIR_IMAGE . $data['setting']['image'])) {
            $image = $data['setting']['image'];
        } else {
            $image = 'no_image.png';
        }
        
        
        $data['thumb'] = $this->model_tool_image->resize($image, 100, 100);
        
        $data['placeholder'] = $this->model_tool_image->resize('no_image.png', 100, 100);
        
        $data['styles'] = array(
            '' => $this->language->get('text_style_default'),
            'rounded' => $this->language->get('text_style_rounded'),
            'border' => $this->language->get('text_style_border'),
            'outline' => $this->language->get('text_style_outline'),
            'shadow' => $this->language->get('text_style_shadow'),
            'shadow_border' => $this->language->get('text_style_bordered_shadow'),
            'shadow_3d' => $this->language->get('text_style_shadow_3d'),
            'circle' => $this->language->get('text_style_circle'),
            'border_circle' => $this->language->get('text_style_border_circle'),
            'outline_circle' => $this->language->get('text_style_outline_circle'),
            'shadow_circle' => $this->language->get('text_style_shadow_circle'),
            'shadow_border_circle' => $this->language->get('text_style_shadow_border_circle'),
            );
        
        
        $data['aligns'] = array(
            'left' => $this->language->get('text_left'),
            'center' => $this->language->get('text_center'),
            'right' => $this->language->get('text_right')
            );

        $data['sizes'] = array(
            'original' => $this->language->get('text_original'),
            'semi_responsive' => $this->language->get('text_semi_responsive'),
            'responsive' => $this->language->get('text_responsive'),
            'small' => $this->language->get('text_small'),
            'medium' => $this->language->get('text_medium'),
            'large' => $this->language->get('text_large'),
            'custom' => $this->language->get('text_custom')
            );
        
        $data['actions'] = array(
            '' => $this->language->get('text_none'),
            'link' => $this->language->get('text_link'),
            'popup' => $this->language->get('text_popup')
            );
        
        return $this->model_extension_d_opencart_patch_load->view($this->route.'_setting', $data);
    }
}
