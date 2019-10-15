<?php


class StrTest extends \PHPUnit\Framework\TestCase
{
    /** @tests **/
    function test_studly_method_convert_strings()
    {
        $this->assertSame(
            'Name', \Styde\Str::studly('name'),
            'Lamar a Str:studly con name no retorna el valor esperado Name'
        );

        $this->assertSame(
            'FullName', \Styde\Str::studly('full_name'),
            'Lamar a Str:studly con full_name no retorna el valor esperado FullName'
        );

        $this->assertSame(
            'BirthDate', \Styde\Str::studly('birth_date'),
            'Lamar a Str:studly con birth_date no retorna el valor esperado BirthDate'
        );
    }
}