<?php

namespace App\Presenters;

use Librette\FlashMessages\Component\TFlashMessages;
use Librette\FlashMessages\TEnhancedFlashMessages;
use Nette;


class HomepagePresenter extends Nette\Application\UI\Presenter
{
	use TEnhancedFlashMessages;
	use TFlashMessages;

	/** @persistent */
	public $locale;

	/** @var \Kdyby\Translation\Translator @inject */
	public $translator;

	protected function getTranslator()
	{
		return $this->translator;
	}

	public function renderDefault()
	{
		$this->template->language = $this->locale;


		$this->flashMessage('ui.wow');
		$this->flashMessage('ui.wow', 'warning');
		$this->flashMessage('ui.wow', 'error');
		$this->flashMessage('ui.num', 'success', 3);
		$this->flashMessage('ui.num', 'info', 1);
		$this->flashMessage('ui.name', 'success', FALSE, ['name' => "Karel"]);
		$this->flashMessage('ui.name', 'success', ['name' => "Karel"]);
		$this->flashMessage('ui.numname', 'success', 3, ['name' => "Karel"]);
		$this->flashMessage('ui.numname', 'success', 1, ['name' => "Karel"]);

	}


}