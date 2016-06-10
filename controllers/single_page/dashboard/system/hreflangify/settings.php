<?php

namespace Concrete\Package\Hreflangify\Controller\SinglePage\Dashboard\System\Hreflangify;
use \Concrete\Core\Page\Controller\DashboardPageController;

class Settings extends DashboardPageController {

	public function view() {
		$this->requireAsset('hreflangify');
	}

}
