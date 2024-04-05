<?php

use Modules\UserDetail\Database\UserDetailStore;
use Tests\TestCase;

class UserDetailFeatureTest extends TestCase
{
    public function testCategoryFormIsAuthenticated()
    {
        $response = $this->get(route('userDetail.create', ['type'=> 'news']));
        $response->assertRedirect('/login');

        $response = $this->post(route('userDetail.store'));
        $response->assertRedirect('/login');
    }

    public function testValidateCategoryForms()
    {
//        $this->withoutExceptionHandling();
        $data = [
            'title' => 'test',
            'parent_id' => 0,
            'userDetailable_type' => 'App/Models/news',
            'user_id' => 1,
            'slug' => 'test'
        ];
        $response = $this->post(route('userDetail.store'), $data);
        $this->assertEquals(CategoryStore::countCategory() , 1);

    }
}
