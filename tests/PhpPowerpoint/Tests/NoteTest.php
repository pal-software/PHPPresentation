<?php
/**
 * This file is part of PHPPowerPoint - A pure PHP library for reading and writing
 * presentations documents.
 *
 * PHPPowerPoint is free software distributed under the terms of the GNU Lesser
 * General Public License version 3 as published by the Free Software Foundation.
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code. For the full list of
 * contributors, visit https://github.com/PHPOffice/PHPPowerPoint/contributors.
 *
 * @copyright   2009-2014 PHPPowerPoint contributors
 * @license     http://www.gnu.org/licenses/lgpl.txt LGPL version 3
 * @link        https://github.com/PHPOffice/PHPPowerPoint
 */

namespace PhpOffice\PhpPowerpoint\Tests;

use PhpOffice\PhpPowerpoint\Note;
use PhpOffice\PhpPowerpoint\PhpPowerpoint;
use PhpOffice\PhpPowerpoint\Shape\RichText;

/**
 * Test class for PhpPowerpoint
 *
 * @coversDefaultClass PhpOffice\PhpPowerpoint\PhpPowerpoint
 */
class NoteTest extends \PHPUnit_Framework_TestCase
{
    public function testParent()
    {
        $object = new Note();
        $this->assertNull($object->getParent());
        
        $oPhpPowerpoint = new PhpPowerpoint();
        $oSlide = $oPhpPowerpoint->createSlide();
        $oSlide->setNote($object);
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Slide', $object->getParent());
    }
    
    public function testShape()
    {
        $object = new Note();
        $this->assertEquals(0, $object->getShapeCollection()->count());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\RichText', $object->createRichTextShape());
        $this->assertEquals(1, $object->getShapeCollection()->count());
        
        $oRichText = new RichText();
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\RichText', $object->addShape($oRichText));
        $this->assertEquals(2, $object->getShapeCollection()->count());
    }

    /**
     * Test get/set hash index
     */
    public function testSetGetHashIndex()
    {
        $object = new Note();
        $value = rand(1, 100);
        $this->assertNull($object->getHashIndex());
        $object->setHashIndex($value);
        $this->assertEquals($value, $object->getHashIndex());
    }
}