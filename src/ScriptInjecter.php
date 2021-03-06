<?php 
namespace Field\Interaction;

use Encore\Admin\Admin;
use Encore\Admin\Form\Field;

class ScriptInjecter extends Field{
	
	protected static $js = [
			'/vendor/Interaction/FieldHub.js',
	];
	
	public function __construct($column, $scripts) {
		$this->scripts = $scripts;
		//$this->form->ignore($this->column);
	}
	
	public function render () {
		$script_output = '';
		foreach ($this->scripts as $script) {
			$script->genScript();
			$script_output .= $script;
		}
		return Admin::script($script_output);
	}
	
	protected $scripts;
}
?>