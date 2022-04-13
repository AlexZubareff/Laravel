<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class Test extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_list_status_success():void
    {
        $this->get(route('news'))
             ->assertStatus(200);
    }

    public function test_create_status_success():void
    {
        $this->get(route('admin.news.create'))
             ->assertStatus(200);
    }

    public function test_news_status_success():void
    {
        $id = 9;
        $this->get(route('news.show',$id))
             ->assertStatus(200);
    }

    public function testBasicTest()
    {
        $this->get('/')
             ->assertStatus(200);
    }
    /*Проверяем соответствие переданных данных формы создания новости в формате JSON, полученному ответу */
    public function test_news_store_status_success():void
    {
        $data = [
          'title'=>'some title',
          'author'=>'author',
          'status'=>'status',
          'description'=>'some text'
        ];
        $this->post(route('admin.news.store'), $data)
             ->assertJson($data)
             ->assertStatus(201);
    }
/*Проверяем соответствие колличества передаваемых полей в форме создания новости, заданному значению*/
    public function test_news_store_count_status_success():void
    {
        $data = [
            'title'=>'some title',
            'author'=>'author',
            'status'=>'status',
            'description'=>'some text'
        ];
        $this->post(route('admin.news.store'), $data)
             ->assertJson($data)
             ->assertJsonCount(4)
             ->assertStatus(201);
    }

    /*Проверяем соответствие переданных данных формы создания категорий в формате JSON, полученному ответу */
    public function test_categories_store_status_success():void
    {
        $data = [
            'title'=>'some title',
            'description'=>'some text'
        ];
        $this->post(route('admin.categories.store'), $data)
             ->assertJson($data)->assertStatus(201);
    }

    /*Проверяем соответствие колличества передаваемых полей в форме создания категорий, заданному значению*/
    public function test_categories_store_count_status_success():void
    {
        $data = [
            'title'=>'some title',
            'description'=>'some text'
        ];
        $this->post(route('admin.categories.store'), $data)
             ->assertJson($data)
             ->assertJsonCount(2)
             ->assertStatus(201);
    }


    /*Проверяем соответствие переданных данных формы создания комментария к новости в формате JSON, полученному ответу */
    public function test_newsComment_store_status_success():void
    {
        $data = [
            'name'=>'some name',
            'comment'=>'some text'
        ];
        $this->post(route('userComment.store'), $data)
             ->assertJson($data)->assertStatus(201);
    }

    /*Проверяем соответствие колличества передаваемых полей в форме создания комментария к новости, заданному значению*/
    public function test_newsComment_store_count_status_success():void
    {
        $data = [
            'name'=>'some title',
            'comment'=>'some text'
        ];
        $this->post(route('userComment.store'), $data)
             ->assertJson($data)->assertJsonCount(2)
             ->assertStatus(201);

    }



}

