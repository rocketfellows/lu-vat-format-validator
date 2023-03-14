<?php

namespace rocketfellows\LUVatFormatValidator\tests\unit;

use PHPUnit\Framework\TestCase;

class LUVatFormatValidatorTest extends TestCase
{
    /**
     * @var LUVatFormatValidator
     */
    private $validator;

    protected function setUp(): void
    {
        parent::setUp();

        $this->validator = new LUVatFormatValidator();
    }

    /**
     * @dataProvider getVatNumbersProvidedData
     */
    public function testValidationResult(string $vatNumber, bool $isValid): void
    {
        $this->assertEquals($isValid, $this->validator->isValid($vatNumber));
    }

    public function getVatNumbersProvidedData(): array
    {
        return [
            [
                'vatNumber' => 'LU12345678',
                'isValid' => true,
            ],
            [
                'vatNumber' => 'LU11111111',
                'isValid' => true,
            ],
            [
                'vatNumber' => 'LU00000000',
                'isValid' => true,
            ],
            [
                'vatNumber' => 'LU99999999',
                'isValid' => true,
            ],
            [
                'vatNumber' => '12345678',
                'isValid' => true,
            ],
            [
                'vatNumber' => '00000000',
                'isValid' => true,
            ],
            [
                'vatNumber' => '11111111',
                'isValid' => true,
            ],
            [
                'vatNumber' => '99999999',
                'isValid' => true,
            ],
            [
                'vatNumber' => 'LU123456789',
                'isValid' => false,
            ],
            [
                'vatNumber' => 'LU1234567',
                'isValid' => false,
            ],
            [
                'vatNumber' => '123456789',
                'isValid' => false,
            ],
            [
                'vatNumber' => '1234567',
                'isValid' => false,
            ],
            [
                'vatNumber' => 'DE12345678',
                'isValid' => false,
            ],
            [
                'vatNumber' => 'LU1234567A',
                'isValid' => false,
            ],
            [
                'vatNumber' => '1234567A',
                'isValid' => false,
            ],
            [
                'vatNumber' => '0',
                'isValid' => false,
            ],
            [
                'vatNumber' => '1',
                'isValid' => false,
            ],
            [
                'vatNumber' => '',
                'isValid' => false,
            ],
        ];
    }
}
