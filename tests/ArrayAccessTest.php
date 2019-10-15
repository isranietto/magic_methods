<?php


class ArrayAccessTest extends \PHPUnit\Framework\TestCase 
{
    /** @test **/
    function test_a_model_has_array_access_offset_get()
    {
        $user =  new UserTest([
            'name' => 'Israel Nieto',
            'email' => 'inieto@email.com',
            'website' => 'isganieto.com',
        ]);

        $this->assertSame('Israel Nieto', $user['name']);
        $this->assertSame('inieto@email.com', $user['email']);
        $this->assertSame('isganieto.com', $user['website']);
    }
    
    /** @test **/
    function test_a_model_has_array_access_offset_exits()
    {
        $user =  new UserTest([
            'name' => 'Israel Nieto',
        ]);

        $this->assertTrue(isset($user['name']));
        $this->assertFalse(empty($user['name']));
        $this->assertFalse(isset($user['email']));
        $this->assertTrue(empty($user['email']));
    }

    /** @test **/
    function test_a_model_has_array_access_offset_set()
    {
        $user =  new UserTest;
        $user['name'] = 'Israel Nieto';

        $this->assertSame('Israel Nieto', $user['name']);
    }
    
    /** @test **/
    function it_can_set_and_unset_properties_with_array_access()
    {
        $user =  new UserTest;
        $user['name'] = 'Israel Nieto';

        $this->assertTrue(isset($user['name']));

        unset($user['name']);

        $this->assertFalse(isset($user['name']));
    }
}


class UserTest extends \Styde\Model implements ArrayAccess
{
    //isset - empty
    public function offsetExists($offset)
    {
        return isset($this->$offset);
    }

    public function offsetGet($offset)
    {
        return $this->$offset;
    }

    public function offsetSet($offset, $value)
    {
        $this->$offset = $value;
    }

    public function offsetUnset($offset)
    {
        unset($this->$offset);
    }
}