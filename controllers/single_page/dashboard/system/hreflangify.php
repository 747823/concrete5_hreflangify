<?php

namespace Concrete\Package\Hreflangify\Controller\SinglePage\Dashboard\System;
use \Concrete\Core\Page\Controller\DashboardPageController;

class Hreflangify extends DashboardPageController {

	public function view() {
		$this->redirect('/dashboard/system/hreflangify/editor');
	}

}
