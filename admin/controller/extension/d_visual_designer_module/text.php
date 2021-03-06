<?php
/*
*  location: admin/controller
*/

class ControllerExtensionDVisualDesignerModuleText extends Controller {
    /**
    * module codename - keep it simple yet unique. add prefix
    */
    private $codename = 'text';
    private $route = 'extension/d_visual_designer_module/text';
    
    /**
    * share loaded language files and models with all methods
    */
    public function __construct($registry) {
        parent::__construct($registry);
        
        $this->load->language($this->route);
        $this->load->model('extension/d_visual_designer/designer');
        $this->load->model('extension/d_opencart_patch/load');
    }
    
    /**
    * returns the module block view
    */
    public function index($setting){
        
        $data['setting'] = $this->model_extension_d_visual_designer_designer->getSetting($setting, $this->codename);
        
        $data['setting']['text'] = html_entity_decode(htmlspecialchars_decode($data['setting']['text']), ENT_QUOTES, 'UTF-8');
        
        return $this->model_extension_d_opencart_patch_load->view($this->route, $data);
    }
    
    /**
    * returns the module settings view
    */
    public function setting($setting){
        
        $data['entry_text'] = $this->language->get('entry_text');
        $data['setting'] = $this->model_extension_d_visual_designer_designer->getSetting($setting, $this->codename);
        $data['setting']['text'] = html_entity_decode(htmlspecialchars_decode($data['setting']['text']), ENT_QUOTES, 'UTF-8');
        
        return $this->model_extension_d_opencart_patch_load->view($this->route.'_setting', $data);
    }
}