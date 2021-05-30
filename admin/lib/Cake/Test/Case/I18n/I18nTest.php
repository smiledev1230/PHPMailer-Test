<?php
/**
 * I18nTest file
 *
 * PHP 5
 *
 * CakePHP(tm) Tests <http://book.cakephp.org/view/1196/Testing>
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://book.cakephp.org/view/1196/Testing CakePHP(tm) Tests
 * @package       Cake.Test.Case.I18n
 * @since         CakePHP(tm) v 1.2.0.5432
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('I18n', 'I18n');

/**
 * I18nTest class
 *
 * @package       Cake.Test.Case.I18n
 */
class I18nTest extends CakeTestCase {

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		Cache::delete('object_map', '_cake_core_');
		App::build(array(
			'locales' => array(CAKE . 'Test' . DS . 'test_app' . DS . 'Locale' . DS),
			'plugins' => array(CAKE . 'Test' . DS . 'test_app' . DS . 'Plugin' . DS)
		), true);
		CakePlugin::loadAll();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		Cache::delete('object_map', '_cake_core_');
		App::build();
		CakePlugin::unload();
	}


	public function testTranslationCaching() {
		Configure::write('Config.language', 'cache_test_po');
		$i18n = i18n::getInstance();

		// reset internally stored entries
		I18n::clear();

		Cache::clear(false, '_cake_core_');
		$lang = Configure::read('Config.language');#$i18n->l10n->locale;

		Cache::config('_cake_core_', Cache::config('default'));

		// make some calls to translate using different domains
		$this->assertEquals('Dom 1 Foo', I18n::translate('dom1.foo', false, 'dom1'));
		$this->assertEquals('Dom 1 Bar', I18n::translate('dom1.bar', false, 'dom1'));
		$domains = I18n::domains();
		$this->assertEquals('Dom 1 Foo', $domains['dom1']['cache_test_po']['LC_MESSAGES']['dom1.foo']);

		// reset internally stored entries
		I18n::clear();

		// now only dom1 should be in cache
		$cachedDom1 = Cache::read('dom1_' . $lang, '_cake_core_');
		$this->assertEquals('Dom 1 Foo', $cachedDom1['LC_MESSAGES']['dom1.foo']);
		$this->assertEquals('Dom 1 Bar', $cachedDom1['LC_MESSAGES']['dom1.bar']);
		// dom2 not in cache
		$this->assertFalse(Cache::read('dom2_' . $lang, '_cake_core_'));

		// translate a item of dom2 (adds dom2 to cache)
		$this->assertEquals('Dom 2 Foo', I18n::translate('dom2.foo', false, 'dom2'));

		// verify dom2 was cached through manual read from cache
		$cachedDom2 = Cache::read('dom2_' . $lang, '_cake_core_');
		$this->assertEquals('Dom 2 Foo', $cachedDom2['LC_MESSAGES']['dom2.foo']);
		$this->assertEquals('Dom 2 Bar', $cachedDom2['LC_MESSAGES']['dom2.bar']);

		// modify cache entry manually to verify that dom1 entries now will be read from cache
		$cachedDom1['LC_MESSAGES']['dom1.foo'] = 'FOO';
		Cache::write('dom1_' . $lang, $cachedDom1, '_cake_core_');
		$this->assertEquals('FOO', I18n::translate('dom1.foo', false, 'dom1'));
	}


/**
 * testDefaultStrings method
 *
 * @return void
 */
	public function testDefaultStrings() {
		$singular = $this->__singular();
		$this->assertEquals('Plural Rule 1', $singular);

		$plurals = $this->__plural();
		$this->assertTrue(in_array('0 = 0 or > 1', $plurals));
		$this->assertTrue(in_array('1 = 1', $plurals));
		$this->assertTrue(in_array('2 = 0 or > 1', $plurals));
		$this->assertTrue(in_array('3 = 0 or > 1', $plurals));
		$this->assertTrue(in_array('4 = 0 or > 1', $plurals));
		$this->assertTrue(in_array('5 = 0 or > 1', $plurals));
		$this->assertTrue(in_array('6 = 0 or > 1', $plurals));
		$this->assertTrue(in_array('7 = 0 or > 1', $plurals));
		$this->assertTrue(in_array('8 = 0 or > 1', $plurals));
		$this->assertTrue(in_array('9 = 0 or > 1', $plurals));
		$this->assertTrue(in_array('10 = 0 or > 1', $plurals));
		$this->assertTrue(in_array('11 = 0 or > 1', $plurals));
		$this->assertTrue(in_array('12 = 0 or > 1', $plurals));
		$this->assertTrue(in_array('13 = 0 or > 1', $plurals));
		$this->assertTrue(in_array('14 = 0 or > 1', $plurals));
		$this->assertTrue(in_array('15 = 0 or > 1', $plurals));
		$this->assertTrue(in_array('16 = 0 or > 1', $plurals));
		$this->assertTrue(in_array('17 = 0 or > 1', $plurals));
		$this->assertTrue(in_array('18 = 0 or > 1', $plurals));
		$this->assertTrue(in_array('19 = 0 or > 1', $plurals));
		$this->assertTrue(in_array('20 = 0 or > 1', $plurals));
		$this->assertTrue(in_array('21 = 0 or > 1', $plurals));
		$this->assertTrue(in_array('22 = 0 or > 1', $plurals));
		$this->assertTrue(in_array('23 = 0 or > 1', $plurals));
		$this->assertTrue(in_array('24 = 0 or > 1', $plurals));
		$this->assertTrue(in_array('25 = 0 or > 1', $plurals));

		$coreSingular = $this->__singularFromCore();
		$this->assertEquals('Plural Rule 1 (from core)', $coreSingular);

		$corePlurals = $this->__pluralFromCore();
		$this->assertTrue(in_array('0 = 0 or > 1 (from core)', $corePlurals));
		$this->assertTrue(in_array('1 = 1 (from core)', $corePlurals));
		$this->assertTrue(in_array('2 = 0 or > 1 (from core)', $corePlurals));
		$this->assertTrue(in_array('3 = 0 or > 1 (from core)', $corePlurals));
		$this->assertTrue(in_array('4 = 0 or > 1 (from core)', $corePlurals));
		$this->assertTrue(in_array('5 = 0 or > 1 (from core)', $corePlurals));
		$this->assertTrue(in_array('6 = 0 or > 1 (from core)', $corePlurals));
		$this->assertTrue(in_array('7 = 0 or > 1 (from core)', $corePlurals));
		$this->assertTrue(in_array('8 = 0 or > 1 (from core)', $corePlurals));
		$this->assertTrue(in_array('9 = 0 or > 1 (from core)', $corePlurals));
		$this->assertTrue(in_array('10 = 0 or > 1 (from core)', $corePlurals));
		$this->assertTrue(in_array('11 = 0 or > 1 (from core)', $corePlurals));
		$this->assertTrue(in_array('12 = 0 or > 1 (from core)', $corePlurals));
		$this->assertTrue(in_array('13 = 0 or > 1 (from core)', $corePlurals));
		$this->assertTrue(in_array('14 = 0 or > 1 (from core)', $corePlurals));
		$this->assertTrue(in_array('15 = 0 or > 1 (from core)', $corePlurals));
		$this->assertTrue(in_array('16 = 0 or > 1 (from core)', $corePlurals));
		$this->assertTrue(in_array('17 = 0 or > 1 (from core)', $corePlurals));
		$this->assertTrue(in_array('18 = 0 or > 1 (from core)', $corePlurals));
		$this->assertTrue(in_array('19 = 0 or > 1 (from core)', $corePlurals));
		$this->assertTrue(in_array('20 = 0 or > 1 (from core)', $corePlurals));
		$this->assertTrue(in_array('21 = 0 or > 1 (from core)', $corePlurals));
		$this->assertTrue(in_array('22 = 0 or > 1 (from core)', $corePlurals));
		$this->assertTrue(in_array('23 = 0 or > 1 (from core)', $corePlurals));
		$this->assertTrue(in_array('24 = 0 or > 1 (from core)', $corePlurals));
		$this->assertTrue(in_array('25 = 0 or > 1 (from core)', $corePlurals));
	}

/**
 * testPoRulesZero method
 *
 * @return void
 */
	public function testPoRulesZero() {
		Configure::write('Config.language', 'rule_0_po');

		$singular = $this->__singular();
		$this->assertEquals('Plural Rule 0 (translated)', $singular);

		$plurals = $this->__plural();
		$this->assertTrue(in_array('0 ends with any # (translated)', $plurals));
		$this->assertTrue(in_array('1 ends with any # (translated)', $plurals));
		$this->assertTrue(in_array('2 ends with any # (translated)', $plurals));
		$this->assertTrue(in_array('3 ends with any # (translated)', $plurals));
		$this->assertTrue(in_array('4 ends with any # (translated)', $plurals));
		$this->assertTrue(in_array('5 ends with any # (translated)', $plurals));
		$this->assertTrue(in_array('6 ends with any # (translated)', $plurals));
		$this->assertTrue(in_array('7 ends with any # (translated)', $plurals));
		$this->assertTrue(in_array('8 ends with any # (translated)', $plurals));
		$this->assertTrue(in_array('9 ends with any # (translated)', $plurals));
		$this->assertTrue(in_array('10 ends with any # (translated)', $plurals));
		$this->assertTrue(in_array('11 ends with any # (translated)', $plurals));
		$this->assertTrue(in_array('12 ends with any # (translated)', $plurals));
		$this->assertTrue(in_array('13 ends with any # (translated)', $plurals));
		$this->assertTrue(in_array('14 ends with any # (translated)', $plurals));
		$this->assertTrue(in_array('15 ends with any # (translated)', $plurals));
		$this->assertTrue(in_array('16 ends with any # (translated)', $plurals));
		$this->assertTrue(in_array('17 ends with any # (translated)', $plurals));
		$this->assertTrue(in_array('18 ends with any # (translated)', $plurals));
		$this->assertTrue(in_array('19 ends with any # (translated)', $plurals));
		$this->assertTrue(in_array('20 ends with any # (translated)', $plurals));
		$this->assertTrue(in_array('21 ends with any # (translated)', $plurals));
		$this->assertTrue(in_array('22 ends with any # (translated)', $plurals));
		$this->assertTrue(in_array('23 ends with any # (translated)', $plurals));
		$this->assertTrue(in_array('24 ends with any # (translated)', $plurals));
		$this->assertTrue(in_array('25 ends with any # (translated)', $plurals));

		$coreSingular = $this->__singularFromCore();
		$this->assertEquals('Plural Rule 0 (from core translated)', $coreSingular);

		$corePlurals = $this->__pluralFromCore();
		$this->assertTrue(in_array('0 ends with any # (from core translated)', $corePlurals));
		$this->assertTrue(in_array('1 ends with any # (from core translated)', $corePlurals));
		$this->assertTrue(in_array('2 ends with any # (from core translated)', $corePlurals));
		$this->assertTrue(in_array('3 ends with any # (from core translated)', $corePlurals));
		$this->assertTrue(in_array('4 ends with any # (from core translated)', $corePlurals));
		$this->assertTrue(in_array('5 ends with any # (from core translated)', $corePlurals));
		$this->assertTrue(in_array('6 ends with any # (from core translated)', $corePlurals));
		$this->assertTrue(in_array('7 ends with any # (from core translated)', $corePlurals));
		$this->assertTrue(in_array('8 ends with any # (from core translated)', $corePlurals));
		$this->assertTrue(in_array('9 ends with any # (from core translated)', $corePlurals));
		$this->assertTrue(in_array('10 ends with any # (from core translated)', $corePlurals));
		$this->assertTrue(in_array('11 ends with any # (from core translated)', $corePlurals));
		$this->assertTrue(in_array('12 ends with any # (from core translated)', $corePlurals));
		$this->assertTrue(in_array('13 ends with any # (from core translated)', $corePlurals));
		$this->assertTrue(in_array('14 ends with any # (from core translated)', $corePlurals));
		$this->assertTrue(in_array('15 ends with any # (from core translated)', $corePlurals));
		$this->assertTrue(in_array('16 ends with any # (from core translated)', $corePlurals));
		$this->assertTrue(in_array('17 ends with any # (from core translated)', $corePlurals));
		$this->assertTrue(in_array('18 ends with any # (from core translated)', $corePlurals));
		$this->assertTrue(in_array('19 ends with any # (from core translated)', $corePlurals));
		$this->assertTrue(in_array('20 ends with any # (from core translated)', $corePlurals));
		$this->assertTrue(in_array('21 ends with any # (from core translated)', $corePlurals));
		$this->assertTrue(in_array('22 ends with any # (from core translated)', $corePlurals));
		$this->assertTrue(in_array('23 ends with any # (from core translated)', $corePlurals));
		$this->assertTrue(in_array('24 ends with any # (from core translated)', $corePlurals));
		$this->assertTrue(in_array('25 ends with any # (from core translated)', $corePlurals));
	}

/**
 * testMoRulesZero method
 *
 * @return void
 */
	public function testMoRulesZero() {
		Configure::write('Config.language', 'rule_0_mo');

		$singular = $this->__singular();
		$this->assertEquals('Plural Rule 0 (translated)', $singular);

		$plurals = $this->__plural();
		$this->assertTrue(in_array('0 ends with any # (translated)', $plurals));
		$this->assertTrue(in_array('1 ends with any # (translated)', $plurals));
		$this->assertTrue(in_array('2 ends with any # (translated)', $plurals));
		$this->assertTrue(in_array('3 ends with any # (translated)', $plurals));
		$this->assertTrue(in_array('4 ends with any # (translated)', $plurals));
		$this->assertTrue(in_array('5 ends with any # (translated)', $plurals));
		$this->assertTrue(in_array('6 ends with any # (translated)', $plurals));
		$this->assertTrue(in_array('7 ends with any # (translated)', $plurals));
		$this->assertTrue(in_array('8 ends with any # (translated)', $plurals));
		$this->assertTrue(in_array('9 ends with any # (translated)', $plurals));
		$this->assertTrue(in_array('10 ends with any # (translated)', $plurals));
		$this->assertTrue(in_array('11 ends with any # (translated)', $plurals));
		$this->assertTrue(in_array('12 ends with any # (translated)', $plurals));
		$this->assertTrue(in_array('13 ends with any # (translated)', $plurals));
		$this->assertTrue(in_array('14 ends with any # (translated)', $plurals));
		$this->assertTrue(in_array('15 ends with any # (translated)', $plurals));
		$this->assertTrue(in_array('16 ends with any # (translated)', $plurals));
		$this->assertTrue(in_array('17 ends with any # (translated)', $plurals));
		$this->assertTrue(in_array('18 ends with any # (translated)', $plurals));
		$this->assertTrue(in_array('19 ends with any # (translated)', $plurals));
		$this->assertTrue(in_array('20 ends with any # (translated)', $plurals));
		$this->assertTrue(in_array('21 ends with any # (translated)', $plurals));
		$this->assertTrue(in_array('22 ends with any # (translated)', $plurals));
		$this->assertTrue(in_array('23 ends with any # (translated)', $plurals));
		$this->assertTrue(in_array('24 ends with any # (translated)', $plurals));
		$this->assertTrue(in_array('25 ends with any # (translated)', $plurals));

		$coreSingular = $this->__singularFromCore();
		$this->assertEquals('Plural Rule 0 (from core translated)', $coreSingular);

		$corePlurals = $this->__pluralFromCore();
		$this->assertTrue(in_array('0 ends with any # (from core translated)', $corePlurals));
		$this->assertTrue(in_array('1 ends with any # (from core translated)', $corePlurals));
		$this->assertTrue(in_array('2 ends with any # (from core translated)', $corePlurals));
		$this->assertTrue(in_array('3 ends with any # (from core translated)', $corePlurals));
		$this->assertTrue(in_array('4 ends with any # (from core translated)', $corePlurals));
		$this->assertTrue(in_array('5 ends with any # (from core translated)', $corePlurals));
		$this->assertTrue(in_array('6 ends with any # (from core translated)', $corePlurals));
		$this->assertTrue(in_array('7 ends with any # (from core translated)', $corePlurals));
		$this->assertTrue(in_array('8 ends with any # (from core translated)', $corePlurals));
		$this->assertTrue(in_array('9 ends with any # (from core translated)', $corePlurals));
		$this->assertTrue(in_array('10 ends with any # (from core translated)', $corePlurals));
		$this->assertTrue(in_array('11 ends with any # (from core translated)', $corePlurals));
		$this->assertTrue(in_array('12 ends with any # (from core translated)', $corePlurals));
		$this->assertTrue(in_array('13 ends with any # (from core translated)', $corePlurals));
		$this->assertTrue(in_array('14 ends with any # (from core translated)', $corePlurals));
		$this->assertTrue(in_array('15 ends with any # (from core translated)', $corePlurals));
		$this->assertTrue(in_array('16 ends with any # (from core translated)', $corePlurals));
		$this->assertTrue(in_array('17 ends with any # (from core translated)', $corePlurals));
		$this->assertTrue(in_array('18 ends with any # (from core translated)', $corePlurals));
		$this->assertTrue(in_array('19 ends with any # (from core translated)', $corePlurals));
		$this->assertTrue(in_array('20 ends with any # (from core translated)', $corePlurals));
		$this->assertTrue(in_array('21 ends with any # (from core translated)', $corePlurals));
		$this->assertTrue(in_array('22 ends with any # (from core translated)', $corePlurals));
		$this->assertTrue(in_array('23 ends with any # (from core translated)', $corePlurals));
		$this->assertTrue(in_array('24 ends with any # (from core translated)', $corePlurals));
		$this->assertTrue(in_array('25 ends with any # (from core translated)', $corePlurals));
	}

/**
 * testPoRulesOne method
 *
 * @return void
 */
	public function testPoRulesOne() {
		Configure::write('Config.language', 'rule_1_po');

		$singular = $this->__singular();
		$this->assertEquals('Plural Rule 1 (translated)', $singular);

		$plurals = $this->__plural();
		$this->assertTrue(in_array('0 = 0 or > 1 (translated)', $plurals));
		$this->assertTrue(in_array('1 = 1 (translated)', $plurals));
		$this->assertTrue(in_array('2 = 0 or > 1 (translated)', $plurals));
		$this->assertTrue(in_array('3 = 0 or > 1 (translated)', $plurals));
		$this->assertTrue(in_array('4 = 0 or > 1 (translated)', $plurals));
		$this->assertTrue(in_array('5 = 0 or > 1 (translated)', $plurals));
		$this->assertTrue(in_array('6 = 0 or > 1 (translated)', $plurals));
		$this->assertTrue(in_array('7 = 0 or > 1 (translated)', $plurals));
		$this->assertTrue(in_array('8 = 0 or > 1 (translated)', $plurals));
		$this->assertTrue(in_array('9 = 0 or > 1 (translated)', $plurals));
		$this->assertTrue(in_array('10 = 0 or > 1 (translated)', $plurals));
		$this->assertTrue(in_array('11 = 0 or > 1 (translated)', $plurals));
		$this->assertTrue(in_array('12 = 0 or > 1 (translated)', $plurals));
		$this->assertTrue(in_array('13 = 0 or > 1 (translated)', $plurals));
		$this->assertTrue(in_array('14 = 0 or > 1 (translated)', $plurals));
		$this->assertTrue(in_array('15 = 0 or > 1 (translated)', $plurals));
		$this->assertTrue(in_array('16 = 0 or > 1 (translated)', $plurals));
		$this->assertTrue(in_array('17 = 0 or > 1 (translated)', $plurals));
		$this->assertTrue(in_array('18 = 0 or > 1 (translated)', $plurals));
		$this->assertTrue(in_array('19 = 0 or > 1 (translated)', $plurals));
		$this->assertTrue(in_array('20 = 0 or > 1 (translated)', $plurals));
		$this->assertTrue(in_array('21 = 0 or > 1 (translated)', $plurals));
		$this->assertTrue(in_array('22 = 0 or > 1 (translated)', $plurals));
		$this->assertTrue(in_array('23 = 0 or > 1 (translated)', $plurals));
		$this->assertTrue(in_array('24 = 0 or > 1 (translated)', $plurals));
		$this->assertTrue(in_array('25 = 0 or > 1 (translated)', $plurals));

		$coreSingular = $this->__singularFromCore();
		$this->assertEquals('Plural Rule 1 (from core translated)', $coreSingular);

		$corePlurals = $this->__pluralFromCore();
		$this->assertTrue(in_array('0 = 0 or > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('1 = 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('2 = 0 or > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('3 = 0 or > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('4 = 0 or > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('5 = 0 or > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('6 = 0 or > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('7 = 0 or > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('8 = 0 or > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('9 = 0 or > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('10 = 0 or > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('11 = 0 or > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('12 = 0 or > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('13 = 0 or > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('14 = 0 or > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('15 = 0 or > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('16 = 0 or > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('17 = 0 or > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('18 = 0 or > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('19 = 0 or > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('20 = 0 or > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('21 = 0 or > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('22 = 0 or > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('23 = 0 or > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('24 = 0 or > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('25 = 0 or > 1 (from core translated)', $corePlurals));
	}

/**
 * testMoRulesOne method
 *
 * @return void
 */
	public function testMoRulesOne() {
		Configure::write('Config.language', 'rule_1_mo');

		$singular = $this->__singular();
		$this->assertEquals('Plural Rule 1 (translated)', $singular);

		$plurals = $this->__plural();
		$this->assertTrue(in_array('0 = 0 or > 1 (translated)', $plurals));
		$this->assertTrue(in_array('1 = 1 (translated)', $plurals));
		$this->assertTrue(in_array('2 = 0 or > 1 (translated)', $plurals));
		$this->assertTrue(in_array('3 = 0 or > 1 (translated)', $plurals));
		$this->assertTrue(in_array('4 = 0 or > 1 (translated)', $plurals));
		$this->assertTrue(in_array('5 = 0 or > 1 (translated)', $plurals));
		$this->assertTrue(in_array('6 = 0 or > 1 (translated)', $plurals));
		$this->assertTrue(in_array('7 = 0 or > 1 (translated)', $plurals));
		$this->assertTrue(in_array('8 = 0 or > 1 (translated)', $plurals));
		$this->assertTrue(in_array('9 = 0 or > 1 (translated)', $plurals));
		$this->assertTrue(in_array('10 = 0 or > 1 (translated)', $plurals));
		$this->assertTrue(in_array('11 = 0 or > 1 (translated)', $plurals));
		$this->assertTrue(in_array('12 = 0 or > 1 (translated)', $plurals));
		$this->assertTrue(in_array('13 = 0 or > 1 (translated)', $plurals));
		$this->assertTrue(in_array('14 = 0 or > 1 (translated)', $plurals));
		$this->assertTrue(in_array('15 = 0 or > 1 (translated)', $plurals));
		$this->assertTrue(in_array('16 = 0 or > 1 (translated)', $plurals));
		$this->assertTrue(in_array('17 = 0 or > 1 (translated)', $plurals));
		$this->assertTrue(in_array('18 = 0 or > 1 (translated)', $plurals));
		$this->assertTrue(in_array('19 = 0 or > 1 (translated)', $plurals));
		$this->assertTrue(in_array('20 = 0 or > 1 (translated)', $plurals));
		$this->assertTrue(in_array('21 = 0 or > 1 (translated)', $plurals));
		$this->assertTrue(in_array('22 = 0 or > 1 (translated)', $plurals));
		$this->assertTrue(in_array('23 = 0 or > 1 (translated)', $plurals));
		$this->assertTrue(in_array('24 = 0 or > 1 (translated)', $plurals));
		$this->assertTrue(in_array('25 = 0 or > 1 (translated)', $plurals));

		$coreSingular = $this->__singularFromCore();
		$this->assertEquals('Plural Rule 1 (from core translated)', $coreSingular);

		$corePlurals = $this->__pluralFromCore();
		$this->assertTrue(in_array('0 = 0 or > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('1 = 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('2 = 0 or > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('3 = 0 or > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('4 = 0 or > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('5 = 0 or > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('6 = 0 or > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('7 = 0 or > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('8 = 0 or > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('9 = 0 or > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('10 = 0 or > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('11 = 0 or > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('12 = 0 or > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('13 = 0 or > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('14 = 0 or > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('15 = 0 or > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('16 = 0 or > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('17 = 0 or > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('18 = 0 or > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('19 = 0 or > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('20 = 0 or > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('21 = 0 or > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('22 = 0 or > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('23 = 0 or > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('24 = 0 or > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('25 = 0 or > 1 (from core translated)', $corePlurals));
	}

/**
 * testPoRulesTwo method
 *
 * @return void
 */
	public function testPoRulesTwo() {
		Configure::write('Config.language', 'rule_2_po');

		$singular = $this->__singular();
		$this->assertEquals('Plural Rule 2 (translated)', $singular);

		$plurals = $this->__plural();
		$this->assertTrue(in_array('0 = 0 or 1 (translated)', $plurals));
		$this->assertTrue(in_array('1 = 0 or 1 (translated)', $plurals));
		$this->assertTrue(in_array('2 > 1 (translated)', $plurals));
		$this->assertTrue(in_array('3 > 1 (translated)', $plurals));
		$this->assertTrue(in_array('4 > 1 (translated)', $plurals));
		$this->assertTrue(in_array('5 > 1 (translated)', $plurals));
		$this->assertTrue(in_array('6 > 1 (translated)', $plurals));
		$this->assertTrue(in_array('7 > 1 (translated)', $plurals));
		$this->assertTrue(in_array('8 > 1 (translated)', $plurals));
		$this->assertTrue(in_array('9 > 1 (translated)', $plurals));
		$this->assertTrue(in_array('10 > 1 (translated)', $plurals));
		$this->assertTrue(in_array('11 > 1 (translated)', $plurals));
		$this->assertTrue(in_array('12 > 1 (translated)', $plurals));
		$this->assertTrue(in_array('13 > 1 (translated)', $plurals));
		$this->assertTrue(in_array('14 > 1 (translated)', $plurals));
		$this->assertTrue(in_array('15 > 1 (translated)', $plurals));
		$this->assertTrue(in_array('16 > 1 (translated)', $plurals));
		$this->assertTrue(in_array('17 > 1 (translated)', $plurals));
		$this->assertTrue(in_array('18 > 1 (translated)', $plurals));
		$this->assertTrue(in_array('19 > 1 (translated)', $plurals));
		$this->assertTrue(in_array('20 > 1 (translated)', $plurals));
		$this->assertTrue(in_array('21 > 1 (translated)', $plurals));
		$this->assertTrue(in_array('22 > 1 (translated)', $plurals));
		$this->assertTrue(in_array('23 > 1 (translated)', $plurals));
		$this->assertTrue(in_array('24 > 1 (translated)', $plurals));
		$this->assertTrue(in_array('25 > 1 (translated)', $plurals));

		$coreSingular = $this->__singularFromCore();
		$this->assertEquals('Plural Rule 2 (from core translated)', $coreSingular);

		$corePlurals = $this->__pluralFromCore();
		$this->assertTrue(in_array('0 = 0 or 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('1 = 0 or 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('2 > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('3 > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('4 > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('5 > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('6 > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('7 > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('8 > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('9 > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('10 > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('11 > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('12 > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('13 > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('14 > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('15 > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('16 > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('17 > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('18 > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('19 > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('20 > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('21 > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('22 > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('23 > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('24 > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('25 > 1 (from core translated)', $corePlurals));
	}

/**
 * testMoRulesTwo method
 *
 * @return void
 */
	public function testMoRulesTwo() {
		Configure::write('Config.language', 'rule_2_mo');

		$singular = $this->__singular();
		$this->assertEquals('Plural Rule 2 (translated)', $singular);

		$plurals = $this->__plural();
		$this->assertTrue(in_array('0 = 0 or 1 (translated)', $plurals));
		$this->assertTrue(in_array('1 = 0 or 1 (translated)', $plurals));
		$this->assertTrue(in_array('2 > 1 (translated)', $plurals));
		$this->assertTrue(in_array('3 > 1 (translated)', $plurals));
		$this->assertTrue(in_array('4 > 1 (translated)', $plurals));
		$this->assertTrue(in_array('5 > 1 (translated)', $plurals));
		$this->assertTrue(in_array('6 > 1 (translated)', $plurals));
		$this->assertTrue(in_array('7 > 1 (translated)', $plurals));
		$this->assertTrue(in_array('8 > 1 (translated)', $plurals));
		$this->assertTrue(in_array('9 > 1 (translated)', $plurals));
		$this->assertTrue(in_array('10 > 1 (translated)', $plurals));
		$this->assertTrue(in_array('11 > 1 (translated)', $plurals));
		$this->assertTrue(in_array('12 > 1 (translated)', $plurals));
		$this->assertTrue(in_array('13 > 1 (translated)', $plurals));
		$this->assertTrue(in_array('14 > 1 (translated)', $plurals));
		$this->assertTrue(in_array('15 > 1 (translated)', $plurals));
		$this->assertTrue(in_array('16 > 1 (translated)', $plurals));
		$this->assertTrue(in_array('17 > 1 (translated)', $plurals));
		$this->assertTrue(in_array('18 > 1 (translated)', $plurals));
		$this->assertTrue(in_array('19 > 1 (translated)', $plurals));
		$this->assertTrue(in_array('20 > 1 (translated)', $plurals));
		$this->assertTrue(in_array('21 > 1 (translated)', $plurals));
		$this->assertTrue(in_array('22 > 1 (translated)', $plurals));
		$this->assertTrue(in_array('23 > 1 (translated)', $plurals));
		$this->assertTrue(in_array('24 > 1 (translated)', $plurals));
		$this->assertTrue(in_array('25 > 1 (translated)', $plurals));

		$coreSingular = $this->__singularFromCore();
		$this->assertEquals('Plural Rule 2 (from core translated)', $coreSingular);

		$corePlurals = $this->__pluralFromCore();
		$this->assertTrue(in_array('0 = 0 or 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('1 = 0 or 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('2 > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('3 > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('4 > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('5 > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('6 > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('7 > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('8 > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('9 > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('10 > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('11 > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('12 > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('13 > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('14 > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('15 > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('16 > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('17 > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('18 > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('19 > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('20 > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('21 > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('22 > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('23 > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('24 > 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('25 > 1 (from core translated)', $corePlurals));
	}

/**
 * testPoRulesThree method
 *
 * @return void
 */
	public function testPoRulesThree() {
		Configure::write('Config.language', 'rule_3_po');

		$singular = $this->__singular();
		$this->assertEquals('Plural Rule 3 (translated)', $singular);

		$plurals = $this->__plural();
		$this->assertTrue(in_array('0 = 0 (translated)', $plurals));
		$this->assertTrue(in_array('1 ends 1 but not 11 (translated)', $plurals));
		$this->assertTrue(in_array('2 everything else (translated)', $plurals));
		$this->assertTrue(in_array('3 everything else (translated)', $plurals));
		$this->assertTrue(in_array('4 everything else (translated)', $plurals));
		$this->assertTrue(in_array('5 everything else (translated)', $plurals));
		$this->assertTrue(in_array('6 everything else (translated)', $plurals));
		$this->assertTrue(in_array('7 everything else (translated)', $plurals));
		$this->assertTrue(in_array('8 everything else (translated)', $plurals));
		$this->assertTrue(in_array('9 everything else (translated)', $plurals));
		$this->assertTrue(in_array('10 everything else (translated)', $plurals));
		$this->assertTrue(in_array('11 everything else (translated)', $plurals));
		$this->assertTrue(in_array('12 everything else (translated)', $plurals));
		$this->assertTrue(in_array('13 everything else (translated)', $plurals));
		$this->assertTrue(in_array('14 everything else (translated)', $plurals));
		$this->assertTrue(in_array('15 everything else (translated)', $plurals));
		$this->assertTrue(in_array('16 everything else (translated)', $plurals));
		$this->assertTrue(in_array('17 everything else (translated)', $plurals));
		$this->assertTrue(in_array('18 everything else (translated)', $plurals));
		$this->assertTrue(in_array('19 everything else (translated)', $plurals));
		$this->assertTrue(in_array('20 everything else (translated)', $plurals));
		$this->assertTrue(in_array('21 ends 1 but not 11 (translated)', $plurals));
		$this->assertTrue(in_array('22 everything else (translated)', $plurals));
		$this->assertTrue(in_array('23 everything else (translated)', $plurals));
		$this->assertTrue(in_array('24 everything else (translated)', $plurals));
		$this->assertTrue(in_array('25 everything else (translated)', $plurals));

		$coreSingular = $this->__singularFromCore();
		$this->assertEquals('Plural Rule 3 (from core translated)', $coreSingular);

		$corePlurals = $this->__pluralFromCore();
		$this->assertTrue(in_array('0 = 0 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('1 ends 1 but not 11 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('2 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('3 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('4 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('5 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('6 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('7 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('8 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('9 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('10 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('11 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('12 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('13 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('14 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('15 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('16 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('17 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('18 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('19 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('20 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('21 ends 1 but not 11 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('22 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('23 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('24 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('25 everything else (from core translated)', $corePlurals));
	}

/**
 * testMoRulesThree method
 *
 * @return void
 */
	public function testMoRulesThree() {
		Configure::write('Config.language', 'rule_3_mo');

		$singular = $this->__singular();
		$this->assertEquals('Plural Rule 3 (translated)', $singular);

		$plurals = $this->__plural();
		$this->assertTrue(in_array('0 = 0 (translated)', $plurals));
		$this->assertTrue(in_array('1 ends 1 but not 11 (translated)', $plurals));
		$this->assertTrue(in_array('2 everything else (translated)', $plurals));
		$this->assertTrue(in_array('3 everything else (translated)', $plurals));
		$this->assertTrue(in_array('4 everything else (translated)', $plurals));
		$this->assertTrue(in_array('5 everything else (translated)', $plurals));
		$this->assertTrue(in_array('6 everything else (translated)', $plurals));
		$this->assertTrue(in_array('7 everything else (translated)', $plurals));
		$this->assertTrue(in_array('8 everything else (translated)', $plurals));
		$this->assertTrue(in_array('9 everything else (translated)', $plurals));
		$this->assertTrue(in_array('10 everything else (translated)', $plurals));
		$this->assertTrue(in_array('11 everything else (translated)', $plurals));
		$this->assertTrue(in_array('12 everything else (translated)', $plurals));
		$this->assertTrue(in_array('13 everything else (translated)', $plurals));
		$this->assertTrue(in_array('14 everything else (translated)', $plurals));
		$this->assertTrue(in_array('15 everything else (translated)', $plurals));
		$this->assertTrue(in_array('16 everything else (translated)', $plurals));
		$this->assertTrue(in_array('17 everything else (translated)', $plurals));
		$this->assertTrue(in_array('18 everything else (translated)', $plurals));
		$this->assertTrue(in_array('19 everything else (translated)', $plurals));
		$this->assertTrue(in_array('20 everything else (translated)', $plurals));
		$this->assertTrue(in_array('21 ends 1 but not 11 (translated)', $plurals));
		$this->assertTrue(in_array('22 everything else (translated)', $plurals));
		$this->assertTrue(in_array('23 everything else (translated)', $plurals));
		$this->assertTrue(in_array('24 everything else (translated)', $plurals));
		$this->assertTrue(in_array('25 everything else (translated)', $plurals));

		$coreSingular = $this->__singularFromCore();
		$this->assertEquals('Plural Rule 3 (from core translated)', $coreSingular);

		$corePlurals = $this->__pluralFromCore();
		$this->assertTrue(in_array('0 = 0 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('1 ends 1 but not 11 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('2 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('3 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('4 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('5 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('6 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('7 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('8 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('9 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('10 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('11 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('12 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('13 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('14 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('15 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('16 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('17 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('18 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('19 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('20 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('21 ends 1 but not 11 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('22 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('23 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('24 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('25 everything else (from core translated)', $corePlurals));
	}

/**
 * testPoRulesFour method
 *
 * @return void
 */
	public function testPoRulesFour() {
		Configure::write('Config.language', 'rule_4_po');

		$singular = $this->__singular();
		$this->assertEquals('Plural Rule 4 (translated)', $singular);

		$plurals = $this->__plural();
		$this->assertTrue(in_array('0 everything else (translated)', $plurals));
		$this->assertTrue(in_array('1 = 1 (translated)', $plurals));
		$this->assertTrue(in_array('2 = 2 (translated)', $plurals));
		$this->assertTrue(in_array('3 everything else (translated)', $plurals));
		$this->assertTrue(in_array('4 everything else (translated)', $plurals));
		$this->assertTrue(in_array('5 everything else (translated)', $plurals));
		$this->assertTrue(in_array('6 everything else (translated)', $plurals));
		$this->assertTrue(in_array('7 everything else (translated)', $plurals));
		$this->assertTrue(in_array('8 everything else (translated)', $plurals));
		$this->assertTrue(in_array('9 everything else (translated)', $plurals));
		$this->assertTrue(in_array('10 everything else (translated)', $plurals));
		$this->assertTrue(in_array('11 everything else (translated)', $plurals));
		$this->assertTrue(in_array('12 everything else (translated)', $plurals));
		$this->assertTrue(in_array('13 everything else (translated)', $plurals));
		$this->assertTrue(in_array('14 everything else (translated)', $plurals));
		$this->assertTrue(in_array('15 everything else (translated)', $plurals));
		$this->assertTrue(in_array('16 everything else (translated)', $plurals));
		$this->assertTrue(in_array('17 everything else (translated)', $plurals));
		$this->assertTrue(in_array('18 everything else (translated)', $plurals));
		$this->assertTrue(in_array('19 everything else (translated)', $plurals));
		$this->assertTrue(in_array('20 everything else (translated)', $plurals));
		$this->assertTrue(in_array('21 everything else (translated)', $plurals));
		$this->assertTrue(in_array('22 everything else (translated)', $plurals));
		$this->assertTrue(in_array('23 everything else (translated)', $plurals));
		$this->assertTrue(in_array('24 everything else (translated)', $plurals));
		$this->assertTrue(in_array('25 everything else (translated)', $plurals));

		$coreSingular = $this->__singularFromCore();
		$this->assertEquals('Plural Rule 4 (from core translated)', $coreSingular);

		$corePlurals = $this->__pluralFromCore();
		$this->assertTrue(in_array('0 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('1 = 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('2 = 2 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('3 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('4 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('5 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('6 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('7 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('8 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('9 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('10 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('11 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('12 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('13 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('14 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('15 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('16 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('17 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('18 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('19 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('20 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('21 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('22 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('23 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('24 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('25 everything else (from core translated)', $corePlurals));
	}

/**
 * testMoRulesFour method
 *
 * @return void
 */
	public function testMoRulesFour() {
		Configure::write('Config.language', 'rule_4_mo');

		$singular = $this->__singular();
		$this->assertEquals('Plural Rule 4 (translated)', $singular);

		$plurals = $this->__plural();
		$this->assertTrue(in_array('0 everything else (translated)', $plurals));
		$this->assertTrue(in_array('1 = 1 (translated)', $plurals));
		$this->assertTrue(in_array('2 = 2 (translated)', $plurals));
		$this->assertTrue(in_array('3 everything else (translated)', $plurals));
		$this->assertTrue(in_array('4 everything else (translated)', $plurals));
		$this->assertTrue(in_array('5 everything else (translated)', $plurals));
		$this->assertTrue(in_array('6 everything else (translated)', $plurals));
		$this->assertTrue(in_array('7 everything else (translated)', $plurals));
		$this->assertTrue(in_array('8 everything else (translated)', $plurals));
		$this->assertTrue(in_array('9 everything else (translated)', $plurals));
		$this->assertTrue(in_array('10 everything else (translated)', $plurals));
		$this->assertTrue(in_array('11 everything else (translated)', $plurals));
		$this->assertTrue(in_array('12 everything else (translated)', $plurals));
		$this->assertTrue(in_array('13 everything else (translated)', $plurals));
		$this->assertTrue(in_array('14 everything else (translated)', $plurals));
		$this->assertTrue(in_array('15 everything else (translated)', $plurals));
		$this->assertTrue(in_array('16 everything else (translated)', $plurals));
		$this->assertTrue(in_array('17 everything else (translated)', $plurals));
		$this->assertTrue(in_array('18 everything else (translated)', $plurals));
		$this->assertTrue(in_array('19 everything else (translated)', $plurals));
		$this->assertTrue(in_array('20 everything else (translated)', $plurals));
		$this->assertTrue(in_array('21 everything else (translated)', $plurals));
		$this->assertTrue(in_array('22 everything else (translated)', $plurals));
		$this->assertTrue(in_array('23 everything else (translated)', $plurals));
		$this->assertTrue(in_array('24 everything else (translated)', $plurals));
		$this->assertTrue(in_array('25 everything else (translated)', $plurals));

		$coreSingular = $this->__singularFromCore();
		$this->assertEquals('Plural Rule 4 (from core translated)', $coreSingular);

		$corePlurals = $this->__pluralFromCore();
		$this->assertTrue(in_array('0 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('1 = 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('2 = 2 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('3 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('4 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('5 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('6 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('7 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('8 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('9 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('10 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('11 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('12 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('13 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('14 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('15 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('16 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('17 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('18 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('19 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('20 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('21 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('22 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('23 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('24 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('25 everything else (from core translated)', $corePlurals));
	}

/**
 * testPoRulesFive method
 *
 * @return void
 */
	public function testPoRulesFive() {
		Configure::write('Config.language', 'rule_5_po');

		$singular = $this->__singular();
		$this->assertEquals('Plural Rule 5 (translated)', $singular);

		$plurals = $this->__plural();
		$this->assertTrue(in_array('0 = 0 or ends in 01-19 (translated)', $plurals));
		$this->assertTrue(in_array('0 = 0 or ends in 01-19 (translated)', $plurals));
		$this->assertTrue(in_array('1 = 1 (translated)', $plurals));
		$this->assertTrue(in_array('2 = 0 or ends in 01-19 (translated)', $plurals));
		$this->assertTrue(in_array('3 = 0 or ends in 01-19 (translated)', $plurals));
		$this->assertTrue(in_array('4 = 0 or ends in 01-19 (translated)', $plurals));
		$this->assertTrue(in_array('5 = 0 or ends in 01-19 (translated)', $plurals));
		$this->assertTrue(in_array('6 = 0 or ends in 01-19 (translated)', $plurals));
		$this->assertTrue(in_array('7 = 0 or ends in 01-19 (translated)', $plurals));
		$this->assertTrue(in_array('8 = 0 or ends in 01-19 (translated)', $plurals));
		$this->assertTrue(in_array('9 = 0 or ends in 01-19 (translated)', $plurals));
		$this->assertTrue(in_array('10 = 0 or ends in 01-19 (translated)', $plurals));
		$this->assertTrue(in_array('11 = 0 or ends in 01-19 (translated)', $plurals));
		$this->assertTrue(in_array('12 = 0 or ends in 01-19 (translated)', $plurals));
		$this->assertTrue(in_array('13 = 0 or ends in 01-19 (translated)', $plurals));
		$this->assertTrue(in_array('14 = 0 or ends in 01-19 (translated)', $plurals));
		$this->assertTrue(in_array('15 = 0 or ends in 01-19 (translated)', $plurals));
		$this->assertTrue(in_array('16 = 0 or ends in 01-19 (translated)', $plurals));
		$this->assertTrue(in_array('17 = 0 or ends in 01-19 (translated)', $plurals));
		$this->assertTrue(in_array('18 = 0 or ends in 01-19 (translated)', $plurals));
		$this->assertTrue(in_array('19 = 0 or ends in 01-19 (translated)', $plurals));
		$this->assertTrue(in_array('20 everything else (translated)', $plurals));
		$this->assertTrue(in_array('21 everything else (translated)', $plurals));
		$this->assertTrue(in_array('22 everything else (translated)', $plurals));
		$this->assertTrue(in_array('23 everything else (translated)', $plurals));
		$this->assertTrue(in_array('24 everything else (translated)', $plurals));
		$this->assertTrue(in_array('25 everything else (translated)', $plurals));

		$coreSingular = $this->__singularFromCore();
		$this->assertEquals('Plural Rule 5 (from core translated)', $coreSingular);

		$corePlurals = $this->__pluralFromCore();
		$this->assertTrue(in_array('0 = 0 or ends in 01-19 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('0 = 0 or ends in 01-19 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('1 = 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('2 = 0 or ends in 01-19 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('3 = 0 or ends in 01-19 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('4 = 0 or ends in 01-19 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('5 = 0 or ends in 01-19 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('6 = 0 or ends in 01-19 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('7 = 0 or ends in 01-19 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('8 = 0 or ends in 01-19 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('9 = 0 or ends in 01-19 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('10 = 0 or ends in 01-19 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('11 = 0 or ends in 01-19 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('12 = 0 or ends in 01-19 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('13 = 0 or ends in 01-19 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('14 = 0 or ends in 01-19 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('15 = 0 or ends in 01-19 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('16 = 0 or ends in 01-19 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('17 = 0 or ends in 01-19 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('18 = 0 or ends in 01-19 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('19 = 0 or ends in 01-19 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('20 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('21 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('22 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('23 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('24 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('25 everything else (from core translated)', $corePlurals));
	}

/**
 * testMoRulesFive method
 *
 * @return void
 */
	public function testMoRulesFive() {
		Configure::write('Config.language', 'rule_5_mo');

		$singular = $this->__singular();
		$this->assertEquals('Plural Rule 5 (translated)', $singular);

		$plurals = $this->__plural();
		$this->assertTrue(in_array('0 = 0 or ends in 01-19 (translated)', $plurals));
		$this->assertTrue(in_array('0 = 0 or ends in 01-19 (translated)', $plurals));
		$this->assertTrue(in_array('1 = 1 (translated)', $plurals));
		$this->assertTrue(in_array('2 = 0 or ends in 01-19 (translated)', $plurals));
		$this->assertTrue(in_array('3 = 0 or ends in 01-19 (translated)', $plurals));
		$this->assertTrue(in_array('4 = 0 or ends in 01-19 (translated)', $plurals));
		$this->assertTrue(in_array('5 = 0 or ends in 01-19 (translated)', $plurals));
		$this->assertTrue(in_array('6 = 0 or ends in 01-19 (translated)', $plurals));
		$this->assertTrue(in_array('7 = 0 or ends in 01-19 (translated)', $plurals));
		$this->assertTrue(in_array('8 = 0 or ends in 01-19 (translated)', $plurals));
		$this->assertTrue(in_array('9 = 0 or ends in 01-19 (translated)', $plurals));
		$this->assertTrue(in_array('10 = 0 or ends in 01-19 (translated)', $plurals));
		$this->assertTrue(in_array('11 = 0 or ends in 01-19 (translated)', $plurals));
		$this->assertTrue(in_array('12 = 0 or ends in 01-19 (translated)', $plurals));
		$this->assertTrue(in_array('13 = 0 or ends in 01-19 (translated)', $plurals));
		$this->assertTrue(in_array('14 = 0 or ends in 01-19 (translated)', $plurals));
		$this->assertTrue(in_array('15 = 0 or ends in 01-19 (translated)', $plurals));
		$this->assertTrue(in_array('16 = 0 or ends in 01-19 (translated)', $plurals));
		$this->assertTrue(in_array('17 = 0 or ends in 01-19 (translated)', $plurals));
		$this->assertTrue(in_array('18 = 0 or ends in 01-19 (translated)', $plurals));
		$this->assertTrue(in_array('19 = 0 or ends in 01-19 (translated)', $plurals));
		$this->assertTrue(in_array('20 everything else (translated)', $plurals));
		$this->assertTrue(in_array('21 everything else (translated)', $plurals));
		$this->assertTrue(in_array('22 everything else (translated)', $plurals));
		$this->assertTrue(in_array('23 everything else (translated)', $plurals));
		$this->assertTrue(in_array('24 everything else (translated)', $plurals));
		$this->assertTrue(in_array('25 everything else (translated)', $plurals));

		$coreSingular = $this->__singularFromCore();
		$this->assertEquals('Plural Rule 5 (from core translated)', $coreSingular);

		$corePlurals = $this->__pluralFromCore();
		$this->assertTrue(in_array('0 = 0 or ends in 01-19 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('0 = 0 or ends in 01-19 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('1 = 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('2 = 0 or ends in 01-19 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('3 = 0 or ends in 01-19 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('4 = 0 or ends in 01-19 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('5 = 0 or ends in 01-19 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('6 = 0 or ends in 01-19 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('7 = 0 or ends in 01-19 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('8 = 0 or ends in 01-19 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('9 = 0 or ends in 01-19 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('10 = 0 or ends in 01-19 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('11 = 0 or ends in 01-19 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('12 = 0 or ends in 01-19 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('13 = 0 or ends in 01-19 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('14 = 0 or ends in 01-19 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('15 = 0 or ends in 01-19 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('16 = 0 or ends in 01-19 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('17 = 0 or ends in 01-19 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('18 = 0 or ends in 01-19 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('19 = 0 or ends in 01-19 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('20 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('21 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('22 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('23 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('24 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('25 everything else (from core translated)', $corePlurals));
	}

/**
 * testPoRulesSix method
 *
 * @return void
 */
	public function testPoRulesSix() {
		Configure::write('Config.language', 'rule_6_po');

		$singular = $this->__singular();
		$this->assertEquals('Plural Rule 6 (translated)', $singular);

		$plurals = $this->__plural();
		$this->assertTrue(in_array('0 ends in 0 or ends in 10-20 (translated)', $plurals));
		$this->assertTrue(in_array('1 ends in 1, not 11 (translated)', $plurals));
		$this->assertTrue(in_array('2 everything else (translated)', $plurals));
		$this->assertTrue(in_array('3 everything else (translated)', $plurals));
		$this->assertTrue(in_array('4 everything else (translated)', $plurals));
		$this->assertTrue(in_array('5 everything else (translated)', $plurals));
		$this->assertTrue(in_array('6 everything else (translated)', $plurals));
		$this->assertTrue(in_array('7 everything else (translated)', $plurals));
		$this->assertTrue(in_array('8 everything else (translated)', $plurals));
		$this->assertTrue(in_array('9 everything else (translated)', $plurals));
		$this->assertTrue(in_array('10 ends in 0 or ends in 10-20 (translated)', $plurals));
		$this->assertTrue(in_array('11 ends in 0 or ends in 10-20 (translated)', $plurals));
		$this->assertTrue(in_array('12 ends in 0 or ends in 10-20 (translated)', $plurals));
		$this->assertTrue(in_array('13 ends in 0 or ends in 10-20 (translated)', $plurals));
		$this->assertTrue(in_array('14 ends in 0 or ends in 10-20 (translated)', $plurals));
		$this->assertTrue(in_array('15 ends in 0 or ends in 10-20 (translated)', $plurals));
		$this->assertTrue(in_array('16 ends in 0 or ends in 10-20 (translated)', $plurals));
		$this->assertTrue(in_array('17 ends in 0 or ends in 10-20 (translated)', $plurals));
		$this->assertTrue(in_array('18 ends in 0 or ends in 10-20 (translated)', $plurals));
		$this->assertTrue(in_array('19 ends in 0 or ends in 10-20 (translated)', $plurals));
		$this->assertTrue(in_array('20 ends in 0 or ends in 10-20 (translated)', $plurals));
		$this->assertTrue(in_array('21 ends in 1, not 11 (translated)', $plurals));
		$this->assertTrue(in_array('22 everything else (translated)', $plurals));
		$this->assertTrue(in_array('23 everything else (translated)', $plurals));
		$this->assertTrue(in_array('24 everything else (translated)', $plurals));
		$this->assertTrue(in_array('25 everything else (translated)', $plurals));

		$coreSingular = $this->__singularFromCore();
		$this->assertEquals('Plural Rule 6 (from core translated)', $coreSingular);

		$corePlurals = $this->__pluralFromCore();
		$this->assertTrue(in_array('0 ends in 0 or ends in 10-20 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('1 ends in 1, not 11 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('2 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('3 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('4 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('5 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('6 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('7 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('8 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('9 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('10 ends in 0 or ends in 10-20 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('11 ends in 0 or ends in 10-20 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('12 ends in 0 or ends in 10-20 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('13 ends in 0 or ends in 10-20 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('14 ends in 0 or ends in 10-20 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('15 ends in 0 or ends in 10-20 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('16 ends in 0 or ends in 10-20 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('17 ends in 0 or ends in 10-20 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('18 ends in 0 or ends in 10-20 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('19 ends in 0 or ends in 10-20 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('20 ends in 0 or ends in 10-20 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('21 ends in 1, not 11 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('22 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('23 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('24 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('25 everything else (from core translated)', $corePlurals));
	}

/**
 * testMoRulesSix method
 *
 * @return void
 */
	public function testMoRulesSix() {
		Configure::write('Config.language', 'rule_6_mo');

		$singular = $this->__singular();
		$this->assertEquals('Plural Rule 6 (translated)', $singular);

		$plurals = $this->__plural();
		$this->assertTrue(in_array('0 ends in 0 or ends in 10-20 (translated)', $plurals));
		$this->assertTrue(in_array('1 ends in 1, not 11 (translated)', $plurals));
		$this->assertTrue(in_array('2 everything else (translated)', $plurals));
		$this->assertTrue(in_array('3 everything else (translated)', $plurals));
		$this->assertTrue(in_array('4 everything else (translated)', $plurals));
		$this->assertTrue(in_array('5 everything else (translated)', $plurals));
		$this->assertTrue(in_array('6 everything else (translated)', $plurals));
		$this->assertTrue(in_array('7 everything else (translated)', $plurals));
		$this->assertTrue(in_array('8 everything else (translated)', $plurals));
		$this->assertTrue(in_array('9 everything else (translated)', $plurals));
		$this->assertTrue(in_array('10 ends in 0 or ends in 10-20 (translated)', $plurals));
		$this->assertTrue(in_array('11 ends in 0 or ends in 10-20 (translated)', $plurals));
		$this->assertTrue(in_array('12 ends in 0 or ends in 10-20 (translated)', $plurals));
		$this->assertTrue(in_array('13 ends in 0 or ends in 10-20 (translated)', $plurals));
		$this->assertTrue(in_array('14 ends in 0 or ends in 10-20 (translated)', $plurals));
		$this->assertTrue(in_array('15 ends in 0 or ends in 10-20 (translated)', $plurals));
		$this->assertTrue(in_array('16 ends in 0 or ends in 10-20 (translated)', $plurals));
		$this->assertTrue(in_array('17 ends in 0 or ends in 10-20 (translated)', $plurals));
		$this->assertTrue(in_array('18 ends in 0 or ends in 10-20 (translated)', $plurals));
		$this->assertTrue(in_array('19 ends in 0 or ends in 10-20 (translated)', $plurals));
		$this->assertTrue(in_array('20 ends in 0 or ends in 10-20 (translated)', $plurals));
		$this->assertTrue(in_array('21 ends in 1, not 11 (translated)', $plurals));
		$this->assertTrue(in_array('22 everything else (translated)', $plurals));
		$this->assertTrue(in_array('23 everything else (translated)', $plurals));
		$this->assertTrue(in_array('24 everything else (translated)', $plurals));
		$this->assertTrue(in_array('25 everything else (translated)', $plurals));

		$coreSingular = $this->__singularFromCore();
		$this->assertEquals('Plural Rule 6 (from core translated)', $coreSingular);

		$corePlurals = $this->__pluralFromCore();
		$this->assertTrue(in_array('0 ends in 0 or ends in 10-20 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('1 ends in 1, not 11 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('2 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('3 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('4 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('5 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('6 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('7 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('8 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('9 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('10 ends in 0 or ends in 10-20 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('11 ends in 0 or ends in 10-20 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('12 ends in 0 or ends in 10-20 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('13 ends in 0 or ends in 10-20 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('14 ends in 0 or ends in 10-20 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('15 ends in 0 or ends in 10-20 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('16 ends in 0 or ends in 10-20 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('17 ends in 0 or ends in 10-20 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('18 ends in 0 or ends in 10-20 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('19 ends in 0 or ends in 10-20 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('20 ends in 0 or ends in 10-20 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('21 ends in 1, not 11 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('22 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('23 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('24 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('25 everything else (from core translated)', $corePlurals));
	}

/**
 * testPoRulesSeven method
 *
 * @return void
 */
	public function testPoRulesSeven() {
		Configure::write('Config.language', 'rule_7_po');

		$singular = $this->__singular();
		$this->assertEquals('Plural Rule 7 (translated)', $singular);

		$plurals = $this->__plural();
		$this->assertTrue(in_array('0 everything else (translated)', $plurals));
		$this->assertTrue(in_array('1 ends in 1, not 11 (translated)', $plurals));
		$this->assertTrue(in_array('2 ends in 2-4, not 12-14 (translated)', $plurals));
		$this->assertTrue(in_array('3 ends in 2-4, not 12-14 (translated)', $plurals));
		$this->assertTrue(in_array('4 ends in 2-4, not 12-14 (translated)', $plurals));
		$this->assertTrue(in_array('5 everything else (translated)', $plurals));
		$this->assertTrue(in_array('6 everything else (translated)', $plurals));
		$this->assertTrue(in_array('7 everything else (translated)', $plurals));
		$this->assertTrue(in_array('8 everything else (translated)', $plurals));
		$this->assertTrue(in_array('9 everything else (translated)', $plurals));
		$this->assertTrue(in_array('10 everything else (translated)', $plurals));
		$this->assertTrue(in_array('11 everything else (translated)', $plurals));
		$this->assertTrue(in_array('12 everything else (translated)', $plurals));
		$this->assertTrue(in_array('13 everything else (translated)', $plurals));
		$this->assertTrue(in_array('14 everything else (translated)', $plurals));
		$this->assertTrue(in_array('15 everything else (translated)', $plurals));
		$this->assertTrue(in_array('16 everything else (translated)', $plurals));
		$this->assertTrue(in_array('17 everything else (translated)', $plurals));
		$this->assertTrue(in_array('18 everything else (translated)', $plurals));
		$this->assertTrue(in_array('19 everything else (translated)', $plurals));
		$this->assertTrue(in_array('20 everything else (translated)', $plurals));
		$this->assertTrue(in_array('21 ends in 1, not 11 (translated)', $plurals));
		$this->assertTrue(in_array('22 ends in 2-4, not 12-14 (translated)', $plurals));
		$this->assertTrue(in_array('23 ends in 2-4, not 12-14 (translated)', $plurals));
		$this->assertTrue(in_array('24 ends in 2-4, not 12-14 (translated)', $plurals));
		$this->assertTrue(in_array('25 everything else (translated)', $plurals));

		$coreSingular = $this->__singularFromCore();
		$this->assertEquals('Plural Rule 7 (from core translated)', $coreSingular);

		$corePlurals = $this->__pluralFromCore();
		$this->assertTrue(in_array('0 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('1 ends in 1, not 11 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('2 ends in 2-4, not 12-14 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('3 ends in 2-4, not 12-14 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('4 ends in 2-4, not 12-14 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('5 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('6 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('7 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('8 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('9 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('10 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('11 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('12 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('13 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('14 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('15 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('16 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('17 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('18 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('19 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('20 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('21 ends in 1, not 11 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('22 ends in 2-4, not 12-14 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('23 ends in 2-4, not 12-14 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('24 ends in 2-4, not 12-14 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('25 everything else (from core translated)', $corePlurals));
	}

/**
 * testMoRulesSeven method
 *
 * @return void
 */
	public function testMoRulesSeven() {
		Configure::write('Config.language', 'rule_7_mo');

		$singular = $this->__singular();
		$this->assertEquals('Plural Rule 7 (translated)', $singular);

		$plurals = $this->__plural();
		$this->assertTrue(in_array('0 everything else (translated)', $plurals));
		$this->assertTrue(in_array('1 ends in 1, not 11 (translated)', $plurals));
		$this->assertTrue(in_array('2 ends in 2-4, not 12-14 (translated)', $plurals));
		$this->assertTrue(in_array('3 ends in 2-4, not 12-14 (translated)', $plurals));
		$this->assertTrue(in_array('4 ends in 2-4, not 12-14 (translated)', $plurals));
		$this->assertTrue(in_array('5 everything else (translated)', $plurals));
		$this->assertTrue(in_array('6 everything else (translated)', $plurals));
		$this->assertTrue(in_array('7 everything else (translated)', $plurals));
		$this->assertTrue(in_array('8 everything else (translated)', $plurals));
		$this->assertTrue(in_array('9 everything else (translated)', $plurals));
		$this->assertTrue(in_array('10 everything else (translated)', $plurals));
		$this->assertTrue(in_array('11 everything else (translated)', $plurals));
		$this->assertTrue(in_array('12 everything else (translated)', $plurals));
		$this->assertTrue(in_array('13 everything else (translated)', $plurals));
		$this->assertTrue(in_array('14 everything else (translated)', $plurals));
		$this->assertTrue(in_array('15 everything else (translated)', $plurals));
		$this->assertTrue(in_array('16 everything else (translated)', $plurals));
		$this->assertTrue(in_array('17 everything else (translated)', $plurals));
		$this->assertTrue(in_array('18 everything else (translated)', $plurals));
		$this->assertTrue(in_array('19 everything else (translated)', $plurals));
		$this->assertTrue(in_array('20 everything else (translated)', $plurals));
		$this->assertTrue(in_array('21 ends in 1, not 11 (translated)', $plurals));
		$this->assertTrue(in_array('22 ends in 2-4, not 12-14 (translated)', $plurals));
		$this->assertTrue(in_array('23 ends in 2-4, not 12-14 (translated)', $plurals));
		$this->assertTrue(in_array('24 ends in 2-4, not 12-14 (translated)', $plurals));
		$this->assertTrue(in_array('25 everything else (translated)', $plurals));

		$coreSingular = $this->__singularFromCore();
		$this->assertEquals('Plural Rule 7 (from core translated)', $coreSingular);

		$corePlurals = $this->__pluralFromCore();
		$this->assertTrue(in_array('0 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('1 ends in 1, not 11 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('2 ends in 2-4, not 12-14 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('3 ends in 2-4, not 12-14 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('4 ends in 2-4, not 12-14 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('5 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('6 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('7 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('8 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('9 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('10 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('11 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('12 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('13 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('14 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('15 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('16 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('17 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('18 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('19 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('20 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('21 ends in 1, not 11 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('22 ends in 2-4, not 12-14 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('23 ends in 2-4, not 12-14 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('24 ends in 2-4, not 12-14 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('25 everything else (from core translated)', $corePlurals));
	}

/**
 * testPoRulesEight method
 *
 * @return void
 */
	public function testPoRulesEight() {
		Configure::write('Config.language', 'rule_8_po');

		$singular = $this->__singular();
		$this->assertEquals('Plural Rule 8 (translated)', $singular);

		$plurals = $this->__plural();
		$this->assertTrue(in_array('0 everything else (translated)', $plurals));
		$this->assertTrue(in_array('1 is 1 (translated)', $plurals));
		$this->assertTrue(in_array('2 is 2-4 (translated)', $plurals));
		$this->assertTrue(in_array('3 is 2-4 (translated)', $plurals));
		$this->assertTrue(in_array('4 is 2-4 (translated)', $plurals));
		$this->assertTrue(in_array('5 everything else (translated)', $plurals));
		$this->assertTrue(in_array('6 everything else (translated)', $plurals));
		$this->assertTrue(in_array('7 everything else (translated)', $plurals));
		$this->assertTrue(in_array('8 everything else (translated)', $plurals));
		$this->assertTrue(in_array('9 everything else (translated)', $plurals));
		$this->assertTrue(in_array('10 everything else (translated)', $plurals));
		$this->assertTrue(in_array('11 everything else (translated)', $plurals));
		$this->assertTrue(in_array('12 everything else (translated)', $plurals));
		$this->assertTrue(in_array('13 everything else (translated)', $plurals));
		$this->assertTrue(in_array('14 everything else (translated)', $plurals));
		$this->assertTrue(in_array('15 everything else (translated)', $plurals));
		$this->assertTrue(in_array('16 everything else (translated)', $plurals));
		$this->assertTrue(in_array('17 everything else (translated)', $plurals));
		$this->assertTrue(in_array('18 everything else (translated)', $plurals));
		$this->assertTrue(in_array('19 everything else (translated)', $plurals));
		$this->assertTrue(in_array('20 everything else (translated)', $plurals));
		$this->assertTrue(in_array('21 everything else (translated)', $plurals));
		$this->assertTrue(in_array('22 everything else (translated)', $plurals));
		$this->assertTrue(in_array('23 everything else (translated)', $plurals));
		$this->assertTrue(in_array('24 everything else (translated)', $plurals));
		$this->assertTrue(in_array('25 everything else (translated)', $plurals));

		$coreSingular = $this->__singularFromCore();
		$this->assertEquals('Plural Rule 8 (from core translated)', $coreSingular);

		$corePlurals = $this->__pluralFromCore();
		$this->assertTrue(in_array('0 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('1 is 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('2 is 2-4 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('3 is 2-4 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('4 is 2-4 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('5 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('6 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('7 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('8 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('9 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('10 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('11 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('12 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('13 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('14 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('15 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('16 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('17 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('18 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('19 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('20 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('21 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('22 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('23 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('24 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('25 everything else (from core translated)', $corePlurals));
	}

/**
 * testMoRulesEight method
 *
 * @return void
 */
	public function testMoRulesEight() {
		Configure::write('Config.language', 'rule_8_mo');

		$singular = $this->__singular();
		$this->assertEquals('Plural Rule 8 (translated)', $singular);

		$plurals = $this->__plural();
		$this->assertTrue(in_array('0 everything else (translated)', $plurals));
		$this->assertTrue(in_array('1 is 1 (translated)', $plurals));
		$this->assertTrue(in_array('2 is 2-4 (translated)', $plurals));
		$this->assertTrue(in_array('3 is 2-4 (translated)', $plurals));
		$this->assertTrue(in_array('4 is 2-4 (translated)', $plurals));
		$this->assertTrue(in_array('5 everything else (translated)', $plurals));
		$this->assertTrue(in_array('6 everything else (translated)', $plurals));
		$this->assertTrue(in_array('7 everything else (translated)', $plurals));
		$this->assertTrue(in_array('8 everything else (translated)', $plurals));
		$this->assertTrue(in_array('9 everything else (translated)', $plurals));
		$this->assertTrue(in_array('10 everything else (translated)', $plurals));
		$this->assertTrue(in_array('11 everything else (translated)', $plurals));
		$this->assertTrue(in_array('12 everything else (translated)', $plurals));
		$this->assertTrue(in_array('13 everything else (translated)', $plurals));
		$this->assertTrue(in_array('14 everything else (translated)', $plurals));
		$this->assertTrue(in_array('15 everything else (translated)', $plurals));
		$this->assertTrue(in_array('16 everything else (translated)', $plurals));
		$this->assertTrue(in_array('17 everything else (translated)', $plurals));
		$this->assertTrue(in_array('18 everything else (translated)', $plurals));
		$this->assertTrue(in_array('19 everything else (translated)', $plurals));
		$this->assertTrue(in_array('20 everything else (translated)', $plurals));
		$this->assertTrue(in_array('21 everything else (translated)', $plurals));
		$this->assertTrue(in_array('22 everything else (translated)', $plurals));
		$this->assertTrue(in_array('23 everything else (translated)', $plurals));
		$this->assertTrue(in_array('24 everything else (translated)', $plurals));
		$this->assertTrue(in_array('25 everything else (translated)', $plurals));

		$coreSingular = $this->__singularFromCore();
		$this->assertEquals('Plural Rule 8 (from core translated)', $coreSingular);

		$corePlurals = $this->__pluralFromCore();
		$this->assertTrue(in_array('0 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('1 is 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('2 is 2-4 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('3 is 2-4 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('4 is 2-4 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('5 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('6 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('7 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('8 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('9 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('10 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('11 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('12 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('13 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('14 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('15 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('16 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('17 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('18 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('19 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('20 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('21 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('22 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('23 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('24 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('25 everything else (from core translated)', $corePlurals));
	}

/**
 * testPoRulesNine method
 *
 * @return void
 */
	public function testPoRulesNine() {
		Configure::write('Config.language', 'rule_9_po');

		$singular = $this->__singular();
		$this->assertEquals('Plural Rule 9 (translated)', $singular);

		$plurals = $this->__plural();
		$this->assertTrue(in_array('0 everything else (translated)', $plurals));
		$this->assertTrue(in_array('0 everything else (translated)', $plurals));
		$this->assertTrue(in_array('1 is 1 (translated)', $plurals));
		$this->assertTrue(in_array('2 ends in 2-4, not 12-14 (translated)', $plurals));
		$this->assertTrue(in_array('3 ends in 2-4, not 12-14 (translated)', $plurals));
		$this->assertTrue(in_array('4 ends in 2-4, not 12-14 (translated)', $plurals));
		$this->assertTrue(in_array('5 everything else (translated)', $plurals));
		$this->assertTrue(in_array('6 everything else (translated)', $plurals));
		$this->assertTrue(in_array('7 everything else (translated)', $plurals));
		$this->assertTrue(in_array('8 everything else (translated)', $plurals));
		$this->assertTrue(in_array('9 everything else (translated)', $plurals));
		$this->assertTrue(in_array('10 everything else (translated)', $plurals));
		$this->assertTrue(in_array('11 everything else (translated)', $plurals));
		$this->assertTrue(in_array('12 everything else (translated)', $plurals));
		$this->assertTrue(in_array('13 everything else (translated)', $plurals));
		$this->assertTrue(in_array('14 everything else (translated)', $plurals));
		$this->assertTrue(in_array('15 everything else (translated)', $plurals));
		$this->assertTrue(in_array('16 everything else (translated)', $plurals));
		$this->assertTrue(in_array('17 everything else (translated)', $plurals));
		$this->assertTrue(in_array('18 everything else (translated)', $plurals));
		$this->assertTrue(in_array('19 everything else (translated)', $plurals));
		$this->assertTrue(in_array('20 everything else (translated)', $plurals));
		$this->assertTrue(in_array('21 everything else (translated)', $plurals));
		$this->assertTrue(in_array('22 ends in 2-4, not 12-14 (translated)', $plurals));
		$this->assertTrue(in_array('23 ends in 2-4, not 12-14 (translated)', $plurals));
		$this->assertTrue(in_array('24 ends in 2-4, not 12-14 (translated)', $plurals));
		$this->assertTrue(in_array('25 everything else (translated)', $plurals));

		$coreSingular = $this->__singularFromCore();
		$this->assertEquals('Plural Rule 9 (from core translated)', $coreSingular);

		$corePlurals = $this->__pluralFromCore();
		$this->assertTrue(in_array('0 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('0 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('0 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('1 is 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('2 ends in 2-4, not 12-14 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('3 ends in 2-4, not 12-14 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('4 ends in 2-4, not 12-14 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('5 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('6 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('7 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('8 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('9 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('10 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('11 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('12 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('13 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('14 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('15 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('16 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('17 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('18 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('19 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('20 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('21 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('22 ends in 2-4, not 12-14 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('23 ends in 2-4, not 12-14 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('24 ends in 2-4, not 12-14 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('25 everything else (from core translated)', $corePlurals));
	}

/**
 * testMoRulesNine method
 *
 * @return void
 */
	public function testMoRulesNine() {
		Configure::write('Config.language', 'rule_9_po');

		$singular = $this->__singular();
		$this->assertEquals('Plural Rule 9 (translated)', $singular);

		$plurals = $this->__plural();
		$this->assertTrue(in_array('0 everything else (translated)', $plurals));
		$this->assertTrue(in_array('0 everything else (translated)', $plurals));
		$this->assertTrue(in_array('1 is 1 (translated)', $plurals));
		$this->assertTrue(in_array('2 ends in 2-4, not 12-14 (translated)', $plurals));
		$this->assertTrue(in_array('3 ends in 2-4, not 12-14 (translated)', $plurals));
		$this->assertTrue(in_array('4 ends in 2-4, not 12-14 (translated)', $plurals));
		$this->assertTrue(in_array('5 everything else (translated)', $plurals));
		$this->assertTrue(in_array('6 everything else (translated)', $plurals));
		$this->assertTrue(in_array('7 everything else (translated)', $plurals));
		$this->assertTrue(in_array('8 everything else (translated)', $plurals));
		$this->assertTrue(in_array('9 everything else (translated)', $plurals));
		$this->assertTrue(in_array('10 everything else (translated)', $plurals));
		$this->assertTrue(in_array('11 everything else (translated)', $plurals));
		$this->assertTrue(in_array('12 everything else (translated)', $plurals));
		$this->assertTrue(in_array('13 everything else (translated)', $plurals));
		$this->assertTrue(in_array('14 everything else (translated)', $plurals));
		$this->assertTrue(in_array('15 everything else (translated)', $plurals));
		$this->assertTrue(in_array('16 everything else (translated)', $plurals));
		$this->assertTrue(in_array('17 everything else (translated)', $plurals));
		$this->assertTrue(in_array('18 everything else (translated)', $plurals));
		$this->assertTrue(in_array('19 everything else (translated)', $plurals));
		$this->assertTrue(in_array('20 everything else (translated)', $plurals));
		$this->assertTrue(in_array('21 everything else (translated)', $plurals));
		$this->assertTrue(in_array('22 ends in 2-4, not 12-14 (translated)', $plurals));
		$this->assertTrue(in_array('23 ends in 2-4, not 12-14 (translated)', $plurals));
		$this->assertTrue(in_array('24 ends in 2-4, not 12-14 (translated)', $plurals));
		$this->assertTrue(in_array('25 everything else (translated)', $plurals));

		$coreSingular = $this->__singularFromCore();
		$this->assertEquals('Plural Rule 9 (from core translated)', $coreSingular);

		$corePlurals = $this->__pluralFromCore();
		$this->assertTrue(in_array('0 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('0 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('0 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('1 is 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('2 ends in 2-4, not 12-14 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('3 ends in 2-4, not 12-14 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('4 ends in 2-4, not 12-14 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('5 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('6 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('7 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('8 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('9 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('10 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('11 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('12 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('13 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('14 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('15 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('16 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('17 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('18 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('19 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('20 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('21 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('22 ends in 2-4, not 12-14 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('23 ends in 2-4, not 12-14 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('24 ends in 2-4, not 12-14 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('25 everything else (from core translated)', $corePlurals));
	}

/**
 * testPoRulesTen method
 *
 * @return void
 */
	public function testPoRulesTen() {
		Configure::write('Config.language', 'rule_10_po');

		$singular = $this->__singular();
		$this->assertEquals('Plural Rule 10 (translated)', $singular);

		$plurals = $this->__plural();
		$this->assertTrue(in_array('0 everything else (translated)', $plurals));
		$this->assertTrue(in_array('0 everything else (translated)', $plurals));
		$this->assertTrue(in_array('1 ends in 1 (translated)', $plurals));
		$this->assertTrue(in_array('2 ends in 2 (translated)', $plurals));
		$this->assertTrue(in_array('3 ends in 03-04 (translated)', $plurals));
		$this->assertTrue(in_array('4 ends in 03-04 (translated)', $plurals));
		$this->assertTrue(in_array('5 everything else (translated)', $plurals));
		$this->assertTrue(in_array('6 everything else (translated)', $plurals));
		$this->assertTrue(in_array('7 everything else (translated)', $plurals));
		$this->assertTrue(in_array('8 everything else (translated)', $plurals));
		$this->assertTrue(in_array('9 everything else (translated)', $plurals));
		$this->assertTrue(in_array('10 everything else (translated)', $plurals));
		$this->assertTrue(in_array('11 everything else (translated)', $plurals));
		$this->assertTrue(in_array('12 everything else (translated)', $plurals));
		$this->assertTrue(in_array('13 everything else (translated)', $plurals));
		$this->assertTrue(in_array('14 everything else (translated)', $plurals));
		$this->assertTrue(in_array('15 everything else (translated)', $plurals));
		$this->assertTrue(in_array('16 everything else (translated)', $plurals));
		$this->assertTrue(in_array('17 everything else (translated)', $plurals));
		$this->assertTrue(in_array('18 everything else (translated)', $plurals));
		$this->assertTrue(in_array('19 everything else (translated)', $plurals));
		$this->assertTrue(in_array('20 everything else (translated)', $plurals));
		$this->assertTrue(in_array('21 everything else (translated)', $plurals));
		$this->assertTrue(in_array('22 everything else (translated)', $plurals));
		$this->assertTrue(in_array('23 everything else (translated)', $plurals));
		$this->assertTrue(in_array('24 everything else (translated)', $plurals));
		$this->assertTrue(in_array('25 everything else (translated)', $plurals));

		$coreSingular = $this->__singularFromCore();
		$this->assertEquals('Plural Rule 10 (from core translated)', $coreSingular);

		$corePlurals = $this->__pluralFromCore();
		$this->assertTrue(in_array('0 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('0 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('1 ends in 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('2 ends in 2 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('3 ends in 03-04 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('4 ends in 03-04 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('5 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('6 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('7 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('8 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('9 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('10 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('11 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('12 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('13 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('14 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('15 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('16 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('17 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('18 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('19 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('20 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('21 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('22 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('23 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('24 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('25 everything else (from core translated)', $corePlurals));
	}

/**
 * testMoRulesTen method
 *
 * @return void
 */
	public function testMoRulesTen() {
		Configure::write('Config.language', 'rule_10_mo');

		$singular = $this->__singular();
		$this->assertEquals('Plural Rule 10 (translated)', $singular);

		$plurals = $this->__plural();
		$this->assertTrue(in_array('0 everything else (translated)', $plurals));
		$this->assertTrue(in_array('0 everything else (translated)', $plurals));
		$this->assertTrue(in_array('1 ends in 1 (translated)', $plurals));
		$this->assertTrue(in_array('2 ends in 2 (translated)', $plurals));
		$this->assertTrue(in_array('3 ends in 03-04 (translated)', $plurals));
		$this->assertTrue(in_array('4 ends in 03-04 (translated)', $plurals));
		$this->assertTrue(in_array('5 everything else (translated)', $plurals));
		$this->assertTrue(in_array('6 everything else (translated)', $plurals));
		$this->assertTrue(in_array('7 everything else (translated)', $plurals));
		$this->assertTrue(in_array('8 everything else (translated)', $plurals));
		$this->assertTrue(in_array('9 everything else (translated)', $plurals));
		$this->assertTrue(in_array('10 everything else (translated)', $plurals));
		$this->assertTrue(in_array('11 everything else (translated)', $plurals));
		$this->assertTrue(in_array('12 everything else (translated)', $plurals));
		$this->assertTrue(in_array('13 everything else (translated)', $plurals));
		$this->assertTrue(in_array('14 everything else (translated)', $plurals));
		$this->assertTrue(in_array('15 everything else (translated)', $plurals));
		$this->assertTrue(in_array('16 everything else (translated)', $plurals));
		$this->assertTrue(in_array('17 everything else (translated)', $plurals));
		$this->assertTrue(in_array('18 everything else (translated)', $plurals));
		$this->assertTrue(in_array('19 everything else (translated)', $plurals));
		$this->assertTrue(in_array('20 everything else (translated)', $plurals));
		$this->assertTrue(in_array('21 everything else (translated)', $plurals));
		$this->assertTrue(in_array('22 everything else (translated)', $plurals));
		$this->assertTrue(in_array('23 everything else (translated)', $plurals));
		$this->assertTrue(in_array('24 everything else (translated)', $plurals));
		$this->assertTrue(in_array('25 everything else (translated)', $plurals));

		$coreSingular = $this->__singularFromCore();
		$this->assertEquals('Plural Rule 10 (from core translated)', $coreSingular);

		$corePlurals = $this->__pluralFromCore();
		$this->assertTrue(in_array('0 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('0 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('1 ends in 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('2 ends in 2 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('3 ends in 03-04 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('4 ends in 03-04 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('5 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('6 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('7 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('8 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('9 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('10 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('11 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('12 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('13 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('14 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('15 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('16 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('17 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('18 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('19 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('20 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('21 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('22 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('23 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('24 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('25 everything else (from core translated)', $corePlurals));
	}

/**
 * testPoRulesEleven method
 *
 * @return void
 */
	public function testPoRulesEleven() {
		Configure::write('Config.language', 'rule_11_po');

		$singular = $this->__singular();
		$this->assertEquals('Plural Rule 11 (translated)', $singular);

		$plurals = $this->__plural();
		$this->assertTrue(in_array('0 everything else (translated)', $plurals));
		$this->assertTrue(in_array('1 is 1 (translated)', $plurals));
		$this->assertTrue(in_array('2 is 2 (translated)', $plurals));
		$this->assertTrue(in_array('3 is 3-6 (translated)', $plurals));
		$this->assertTrue(in_array('4 is 3-6 (translated)', $plurals));
		$this->assertTrue(in_array('5 is 3-6 (translated)', $plurals));
		$this->assertTrue(in_array('6 is 3-6 (translated)', $plurals));
		$this->assertTrue(in_array('7 is 7-10 (translated)', $plurals));
		$this->assertTrue(in_array('8 is 7-10 (translated)', $plurals));
		$this->assertTrue(in_array('9 is 7-10 (translated)', $plurals));
		$this->assertTrue(in_array('10 is 7-10 (translated)', $plurals));
		$this->assertTrue(in_array('11 everything else (translated)', $plurals));
		$this->assertTrue(in_array('12 everything else (translated)', $plurals));
		$this->assertTrue(in_array('13 everything else (translated)', $plurals));
		$this->assertTrue(in_array('14 everything else (translated)', $plurals));
		$this->assertTrue(in_array('15 everything else (translated)', $plurals));
		$this->assertTrue(in_array('16 everything else (translated)', $plurals));
		$this->assertTrue(in_array('17 everything else (translated)', $plurals));
		$this->assertTrue(in_array('18 everything else (translated)', $plurals));
		$this->assertTrue(in_array('19 everything else (translated)', $plurals));
		$this->assertTrue(in_array('20 everything else (translated)', $plurals));
		$this->assertTrue(in_array('21 everything else (translated)', $plurals));
		$this->assertTrue(in_array('22 everything else (translated)', $plurals));
		$this->assertTrue(in_array('23 everything else (translated)', $plurals));
		$this->assertTrue(in_array('24 everything else (translated)', $plurals));
		$this->assertTrue(in_array('25 everything else (translated)', $plurals));

		$coreSingular = $this->__singularFromCore();
		$this->assertEquals('Plural Rule 11 (from core translated)', $coreSingular);

		$corePlurals = $this->__pluralFromCore();
		$this->assertTrue(in_array('0 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('1 is 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('2 is 2 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('3 is 3-6 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('4 is 3-6 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('5 is 3-6 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('6 is 3-6 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('7 is 7-10 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('8 is 7-10 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('9 is 7-10 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('10 is 7-10 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('11 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('12 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('13 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('14 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('15 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('16 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('17 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('18 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('19 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('20 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('21 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('22 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('23 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('24 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('25 everything else (from core translated)', $corePlurals));
	}

/**
 * testMoRulesEleven method
 *
 * @return void
 */
	public function testMoRulesEleven() {
		Configure::write('Config.language', 'rule_11_mo');

		$singular = $this->__singular();
		$this->assertEquals('Plural Rule 11 (translated)', $singular);

		$plurals = $this->__plural();
		$this->assertTrue(in_array('0 everything else (translated)', $plurals));
		$this->assertTrue(in_array('1 is 1 (translated)', $plurals));
		$this->assertTrue(in_array('2 is 2 (translated)', $plurals));
		$this->assertTrue(in_array('3 is 3-6 (translated)', $plurals));
		$this->assertTrue(in_array('4 is 3-6 (translated)', $plurals));
		$this->assertTrue(in_array('5 is 3-6 (translated)', $plurals));
		$this->assertTrue(in_array('6 is 3-6 (translated)', $plurals));
		$this->assertTrue(in_array('7 is 7-10 (translated)', $plurals));
		$this->assertTrue(in_array('8 is 7-10 (translated)', $plurals));
		$this->assertTrue(in_array('9 is 7-10 (translated)', $plurals));
		$this->assertTrue(in_array('10 is 7-10 (translated)', $plurals));
		$this->assertTrue(in_array('11 everything else (translated)', $plurals));
		$this->assertTrue(in_array('12 everything else (translated)', $plurals));
		$this->assertTrue(in_array('13 everything else (translated)', $plurals));
		$this->assertTrue(in_array('14 everything else (translated)', $plurals));
		$this->assertTrue(in_array('15 everything else (translated)', $plurals));
		$this->assertTrue(in_array('16 everything else (translated)', $plurals));
		$this->assertTrue(in_array('17 everything else (translated)', $plurals));
		$this->assertTrue(in_array('18 everything else (translated)', $plurals));
		$this->assertTrue(in_array('19 everything else (translated)', $plurals));
		$this->assertTrue(in_array('20 everything else (translated)', $plurals));
		$this->assertTrue(in_array('21 everything else (translated)', $plurals));
		$this->assertTrue(in_array('22 everything else (translated)', $plurals));
		$this->assertTrue(in_array('23 everything else (translated)', $plurals));
		$this->assertTrue(in_array('24 everything else (translated)', $plurals));
		$this->assertTrue(in_array('25 everything else (translated)', $plurals));

		$coreSingular = $this->__singularFromCore();
		$this->assertEquals('Plural Rule 11 (from core translated)', $coreSingular);

		$corePlurals = $this->__pluralFromCore();
		$this->assertTrue(in_array('0 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('1 is 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('2 is 2 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('3 is 3-6 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('4 is 3-6 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('5 is 3-6 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('6 is 3-6 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('7 is 7-10 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('8 is 7-10 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('9 is 7-10 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('10 is 7-10 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('11 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('12 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('13 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('14 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('15 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('16 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('17 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('18 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('19 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('20 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('21 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('22 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('23 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('24 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('25 everything else (from core translated)', $corePlurals));
	}

/**
 * testPoRulesTwelve method
 *
 * @return void
 */
	public function testPoRulesTwelve() {
		Configure::write('Config.language', 'rule_12_po');

		$singular = $this->__singular();
		$this->assertEquals('Plural Rule 12 (translated)', $singular);

		$plurals = $this->__plural();
		$this->assertTrue(in_array('0 is 0 or 3-10 (translated)', $plurals));
		$this->assertTrue(in_array('1 is 1 (translated)', $plurals));
		$this->assertTrue(in_array('2 is 2 (translated)', $plurals));
		$this->assertTrue(in_array('3 is 0 or 3-10 (translated)', $plurals));
		$this->assertTrue(in_array('4 is 0 or 3-10 (translated)', $plurals));
		$this->assertTrue(in_array('5 is 0 or 3-10 (translated)', $plurals));
		$this->assertTrue(in_array('6 is 0 or 3-10 (translated)', $plurals));
		$this->assertTrue(in_array('7 is 0 or 3-10 (translated)', $plurals));
		$this->assertTrue(in_array('8 is 0 or 3-10 (translated)', $plurals));
		$this->assertTrue(in_array('9 is 0 or 3-10 (translated)', $plurals));
		$this->assertTrue(in_array('10 is 0 or 3-10 (translated)', $plurals));
		$this->assertTrue(in_array('11 everything else (translated)', $plurals));
		$this->assertTrue(in_array('12 everything else (translated)', $plurals));
		$this->assertTrue(in_array('13 everything else (translated)', $plurals));
		$this->assertTrue(in_array('14 everything else (translated)', $plurals));
		$this->assertTrue(in_array('15 everything else (translated)', $plurals));
		$this->assertTrue(in_array('16 everything else (translated)', $plurals));
		$this->assertTrue(in_array('17 everything else (translated)', $plurals));
		$this->assertTrue(in_array('18 everything else (translated)', $plurals));
		$this->assertTrue(in_array('19 everything else (translated)', $plurals));
		$this->assertTrue(in_array('20 everything else (translated)', $plurals));
		$this->assertTrue(in_array('21 everything else (translated)', $plurals));
		$this->assertTrue(in_array('22 everything else (translated)', $plurals));
		$this->assertTrue(in_array('23 everything else (translated)', $plurals));
		$this->assertTrue(in_array('24 everything else (translated)', $plurals));
		$this->assertTrue(in_array('25 everything else (translated)', $plurals));

		$coreSingular = $this->__singularFromCore();
		$this->assertEquals('Plural Rule 12 (from core translated)', $coreSingular);

		$corePlurals = $this->__pluralFromCore();
		$this->assertTrue(in_array('0 is 0 or 3-10 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('1 is 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('2 is 2 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('3 is 0 or 3-10 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('4 is 0 or 3-10 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('5 is 0 or 3-10 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('6 is 0 or 3-10 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('7 is 0 or 3-10 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('8 is 0 or 3-10 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('9 is 0 or 3-10 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('10 is 0 or 3-10 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('11 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('12 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('13 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('14 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('15 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('16 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('17 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('18 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('19 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('20 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('21 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('22 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('23 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('24 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('25 everything else (from core translated)', $corePlurals));
	}

/**
 * testMoRulesTwelve method
 *
 * @return void
 */
	public function testMoRulesTwelve() {
		Configure::write('Config.language', 'rule_12_mo');

		$singular = $this->__singular();
		$this->assertEquals('Plural Rule 12 (translated)', $singular);

		$plurals = $this->__plural();
		$this->assertTrue(in_array('0 is 0 or 3-10 (translated)', $plurals));
		$this->assertTrue(in_array('1 is 1 (translated)', $plurals));
		$this->assertTrue(in_array('2 is 2 (translated)', $plurals));
		$this->assertTrue(in_array('3 is 0 or 3-10 (translated)', $plurals));
		$this->assertTrue(in_array('4 is 0 or 3-10 (translated)', $plurals));
		$this->assertTrue(in_array('5 is 0 or 3-10 (translated)', $plurals));
		$this->assertTrue(in_array('6 is 0 or 3-10 (translated)', $plurals));
		$this->assertTrue(in_array('7 is 0 or 3-10 (translated)', $plurals));
		$this->assertTrue(in_array('8 is 0 or 3-10 (translated)', $plurals));
		$this->assertTrue(in_array('9 is 0 or 3-10 (translated)', $plurals));
		$this->assertTrue(in_array('10 is 0 or 3-10 (translated)', $plurals));
		$this->assertTrue(in_array('11 everything else (translated)', $plurals));
		$this->assertTrue(in_array('12 everything else (translated)', $plurals));
		$this->assertTrue(in_array('13 everything else (translated)', $plurals));
		$this->assertTrue(in_array('14 everything else (translated)', $plurals));
		$this->assertTrue(in_array('15 everything else (translated)', $plurals));
		$this->assertTrue(in_array('16 everything else (translated)', $plurals));
		$this->assertTrue(in_array('17 everything else (translated)', $plurals));
		$this->assertTrue(in_array('18 everything else (translated)', $plurals));
		$this->assertTrue(in_array('19 everything else (translated)', $plurals));
		$this->assertTrue(in_array('20 everything else (translated)', $plurals));
		$this->assertTrue(in_array('21 everything else (translated)', $plurals));
		$this->assertTrue(in_array('22 everything else (translated)', $plurals));
		$this->assertTrue(in_array('23 everything else (translated)', $plurals));
		$this->assertTrue(in_array('24 everything else (translated)', $plurals));
		$this->assertTrue(in_array('25 everything else (translated)', $plurals));

		$coreSingular = $this->__singularFromCore();
		$this->assertEquals('Plural Rule 12 (from core translated)', $coreSingular);

		$corePlurals = $this->__pluralFromCore();
		$this->assertTrue(in_array('0 is 0 or 3-10 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('1 is 1 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('2 is 2 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('3 is 0 or 3-10 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('4 is 0 or 3-10 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('5 is 0 or 3-10 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('6 is 0 or 3-10 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('7 is 0 or 3-10 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('8 is 0 or 3-10 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('9 is 0 or 3-10 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('10 is 0 or 3-10 (from core translated)', $corePlurals));
		$this->assertTrue(in_array('11 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('12 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('13 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('14 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('15 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('16 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('17 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('18 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('19 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('20 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('21 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('22 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('23 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('24 everything else (from core translated)', $corePlurals));
		$this->assertTrue(in_array('25 everything else (from core translated)', $corePlurals));
	}

/**
 * testPoRulesThirteen method
 *
 * @return void
 */
	public function testPoRulesThirteen() {
		Configure::write('Config.language', 'rule_13_po');

		$singular = $this->__singular();
		$this->assertEquals('Plural Rule 13 (translate