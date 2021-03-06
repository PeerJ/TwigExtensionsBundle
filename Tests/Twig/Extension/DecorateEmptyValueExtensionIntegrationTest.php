<?php

namespace Craue\TwigExtensionsBundle\Tests\Twig\Extension;

use Craue\TwigExtensionsBundle\Tests\TwigBasedTestCase;

/**
 * @group integration
 *
 * @author Christian Raue <christian.raue@gmail.com>
 * @copyright 2011-2013 Christian Raue
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */
class DecorateEmptyValueExtensionIntegrationTest extends TwigBasedTestCase {

	/**
	 * @dataProvider dataDecorateEmptyValue
	 */
	public function testDecorateEmptyValue($value, $placeholder, $result) {
		$this->assertSame($result,
				$this->getTwig()->render('IntegrationTestBundle:DecorateEmptyValue:default.html.twig', array(
					'value' => $value,
					'placeholder' => $placeholder,
				)));
	}

	public function dataDecorateEmptyValue() {
		return array(
			array(null, null, '&mdash;'),
			array(null, '&ndash;', '&ndash;'),
			array(null, '-', '-'),
			array(null, 0, '0'),
			array(false, '-', '-'),
			array(0, '-', '0'),
			array('a value', null, 'a value'),
		);
	}

}
