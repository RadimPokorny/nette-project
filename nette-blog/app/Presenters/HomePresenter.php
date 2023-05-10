<?php
namespace App\Presenters;

use Nette;
use Nette\Application\UI\Form;
use App\Router\RouterFactory;

final class HomePresenter extends Nette\Application\UI\Presenter
{
	public function __construct(
		private Nette\Database\Explorer $database,
	) {
	}

	public function renderDefault(): void
{
	$this->template->posts = $this->database
		->getPublicArticles()
		->limit(5);
}
}