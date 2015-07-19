<?php

namespace App\Presenters;

use Nette;
use IPub\FlashMessages;


class HomepagePresenter extends Nette\Application\UI\Presenter
{
	use FlashMessages\TFlashMessages;

	/** @persistent */
	public $locale;

	/** @var \Kdyby\Translation\Translator @inject */
	public $translator;


	/**
	 * Component for displaying messages
	 *
	 * @return FlashMessages\Control
	 */
	protected function createComponentFlashMessages()
	{
		// Init action confirm
		$control = $this->flashMessagesFactory->create();

		return $control;
	}


	public function renderDefault()
	{
		$this->template->language = $this->locale;

		$this->flashMessage('ui.wow', 'danger');
		$this->flashMessage('ui.wow', 'danger', $this->translator->translate('ui.error'));
		$this->flashMessage('ui.num', 'success', NULL, FALSE, 3);
		$this->flashMessage('ui.num', 'info', NULL, FALSE, 1);
		$this->flashMessage('ui.name', 'success', NULL, FALSE, ['name' => "Karel"]);
		$this->flashMessage('ui.numname', 'success', NULL, FALSE, 3, ['name' => "Karel"]);
		$this->flashMessage('ui.numname', 'success', NULL, FALSE, 1, ['name' => "Karel"]);
		$this->flashMessage(
			'ui.numname',
			'danger',
			$this->translator->translate('ui.error'),
			FALSE,
			1,
			['name' => "Karel"]
		);
		$this->flashNotifier->overlay('ui.wow');
		$this->flashNotifier->error('ui.wow', 'ui.title');

	}

}