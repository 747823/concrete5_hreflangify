<?php

namespace Concrete\Package\Hreflangify;
use \Concrete\Core\Package\Package;
use \Concrete\Core\Page\Single as SinglePage;
use \Concrete\Core\Asset\AssetList as AssetList;

class Controller extends Package {
	
	protected $pkgHandle = 'hreflangify';
	protected $appVersionRequired = '5.7.4.3b1';
	protected $pkgVersion = '1.0.1';

	public function getPackageDescription() {
		return t('Adds dashboard tools to manage alternate link tags for multilingual sites.');
	}

	public function getPackageName() {
		return t('Hreflangify');
	}

	public function install() {
		$pkg = parent::install();
		// Add single pages
		$hreflangifyPage = SinglePage::add('/dashboard/system/hreflangify', $pkg);
		$hreflangifyEditorPage = SinglePage::add('/dashboard/system/hreflangify/editor', $pkg);
		$hreflangifySettingsPage = SinglePage::add('/dashboard/system/hreflangify/settings', $pkg);
	}

	public function upgrade() {
		parent::upgrade();
	}

	public function on_start() {
		// Register assets
		$al = AssetList::getInstance();
		$al->register(
			'javascript', 'vue', 'js/vue/vue.min.js',
			array('version' => '1.0.24', 'minify' => false, 'combine' => true),
			'hreflangify'
		);
		$al->register(
			'javascript', 'hreflangify', 'js/app/hreflangify.js',
			array('version' => $pkgVersion, 'minify' => false, 'combine' => true),
			'hreflangify'
		);
		$al->registerGroup('hreflangify', array(
			array('javascript', 'vue'),
			array('javascript', 'hreflangify')
		));
	}

}
