<?php
class FieldDropdown implements Fieldinterface
{
	public $properties;
	protected $tpl;

	public function __construct(ImTplEngine $tpl)
	{
		$this->tpl = $tpl;
		$this->name = null;
		$this->class = null;
		$this->id = null;
		$this->options = array();
		$this->value = null;
	}


	public function render($sanitize=false)
	{
		if(is_null($this->name))
			return false;

		$itemeditor = $this->tpl->getTemplates('field');
		$select = $this->tpl->getTemplate('select', $itemeditor);
		$tploption = $this->tpl->getTemplate('option', $itemeditor);

		if(is_array($this->options))
		{
			$tplbuffer = new Template();
			foreach($this->options as $option)
			{
				$tplbuffer->push($this->tpl->render($tploption, array(
						'option' => !$sanitize ? $this->sanitize($option) : $option,
						'selected' => (!empty($this->value) && ($option == $this->value)) ? 'selected' : ''
						), true
					)
				);
			}
		}

		return $this->tpl->render($select, array(
				'name' => $this->name,
				'class' => $this->class,
				'id' => $this->id,
				'options' => $tplbuffer->content), true, array()
		);
	}
	protected function sanitize($value){return safe_slash_html_input($value);}
}