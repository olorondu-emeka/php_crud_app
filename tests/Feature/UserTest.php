<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class UserTest extends TestCase{
    /**
     * @test
     */
    public function should_create_new_user(){
        $user = $this->userData();
        //post data to registration end-point
        $this->post('/api/v1/register', $user);
    }

    private function userData(){
        return [
            'surname' => 'smith',
            'firstName' => 'john',
            'email' => 'john@example.com'
        ];

    }
}