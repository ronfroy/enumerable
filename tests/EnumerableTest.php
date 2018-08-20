<?php

declare(strict_types=1);

namespace Tests\Enumerable;

use Enumerable\Enumerable;
use PHPUnit\Framework\TestCase;

class EnumerableTest extends TestCase
{
    /**
     * @covers \Enumerable\Enumerable::getConstants
     *
     * @throws \ReflectionException
     */
    public function testGetConstants(): void
    {
        $this->assertEquals([
            'ENUM_1' => 1,
            'ENUM_2' => 2,
        ], TestEnum::getAll());
    }

    /**
     * @covers \Enumerable\Enumerable::isValidName
     *
     * @throws \ReflectionException
     */
    public function testIsValidName(): void
    {
        $this->assertTrue(TestEnum::isValidName('ENUM_1'));
        $this->assertTrue(TestEnum::isValidName('ENUM_2'));
        $this->assertFalse(TestEnum::isValidName('ENUM_3'));
    }

    /**
     * @covers \Enumerable\Enumerable::isValidValue
     *
     * @throws \ReflectionException
     */
    public function testIsValidValue(): void
    {
        $this->assertTrue(TestEnum::isValidValue(1));
        $this->assertTrue(TestEnum::isValidValue(2));
        $this->assertFalse(TestEnum::isValidValue(3));
    }

    /**
     * @covers \Enumerable\Enumerable::isSameAs
     */
    public function testIsSameAs(): void
    {
        $enum1 = new TestEnum(TestEnum::ENUM_1);
        $enum2 = new TestEnum(TestEnum::ENUM_1);
        $enum3 = new TestEnum(TestEnum::ENUM_2);
        $enum4 = new TestEnum2(TestEnum2::ENUM_1);

        $this->assertTrue($enum1->isSameAs(TestEnum::ENUM_1));
        $this->assertFalse($enum1->isSameAs(TestEnum::ENUM_2));
        $this->assertTrue($enum1->isSameAs($enum2));
        $this->assertFalse($enum1->isSameAs($enum3));
        $this->assertFalse($enum1->isSameAs($enum4));
    }

    /**
     * @covers \Enumerable\Enumerable::__invoke
     */
    public function testInvoke(): void
    {
        $enum = new TestEnum(TestEnum::ENUM_1);

        $this->assertSame(TestEnum::ENUM_1, $enum());
    }

    /**
     * @covers \Enumerable\Enumerable::__toString
     */
    public function testToString(): void
    {
        $enum = new TestEnum(TestEnum::ENUM_1);

        $this->assertSame('1', (string) $enum);
    }
}

class TestEnum extends Enumerable
{
    const ENUM_1 = 1;
    const ENUM_2 = 2;
}

class TestEnum2 extends Enumerable
{
    const ENUM_1 = 1;
    const ENUM_2 = 2;
}
