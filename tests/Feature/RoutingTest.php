<?php

namespace LNCHUK\LaravelExtendedResource\Tests\Feature;

use Illuminate\Support\Facades\Route;
use LNCHUK\LaravelExtendedResource\Tests\ProductsController;
use LNCHUK\LaravelExtendedResource\Tests\TestCase;

class RoutingTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        Route::resource('products', ProductsController::class);
    }

    /**
     * Test that a 'trashed' named route is created as part
     * of the resource route.
     *
     * @test
     */
    public function it_generates_a_trashed_route(): void
    {
        $this->assertTrue(Route::has('products.trashed'));
    }

    /**
     * Test that the trashed route is a GET route.
     *
     * @test
     */
    public function the_trashed_route_is_a_get_route(): void
    {
        $response = $this->get(route('products.trashed'));
        $response->assertStatus(200);
    }

    /**
     * Tests that the generated trashed route calls the trashed
     * method on the specified controller.
     *
     * @test
     */
    public function the_trashed_route_calls_the_trashed_method(): void
    {
        $route = Route::getRoutes()->getByName('products.trashed')->getActionName();
        $action = substr($route, strpos($route, '@') + 1);

        $this->assertEquals($action, 'trashed');
    }

    /**
     * Test that a 'delete' named route is created as part
     * of the resource route.
     *
     * @test
     */
    public function it_generates_a_delete_route(): void
    {
        $this->assertTrue(Route::has('products.delete'));
    }

    /**
     * Test that the delete route is a GET route.
     *
     * @test
     */
    public function the_delete_route_is_a_get_route(): void
    {
        $response = $this->get(route('products.delete', 1));
        $response->assertStatus(200);
    }

    /**
     * Tests that the generated delete route calls the delete
     * method on the specified controller.
     *
     * @test
     */
    public function the_delete_route_calls_the_delete_method(): void
    {
        $route = Route::getRoutes()->getByName('products.delete')->getActionName();
        $action = substr($route, strpos($route, '@') + 1);

        $this->assertEquals($action, 'delete');
    }

    /**
     * Test that a 'restore' named route is created as part
     * of the resource route.
     *
     * @test
     */
    public function it_generates_a_restore_route(): void
    {
        $this->assertTrue(Route::has('products.restore'));
    }

    /**
     * Test that the restore route is a PATCH route.
     *
     * @test
     */
    public function the_restore_route_is_a_patch_route(): void
    {
        $response = $this->patch(route('products.restore', 1));
        $response->assertStatus(200);
    }

    /**
     * Tests that the generated restore route calls the restore
     * method on the specified controller.
     *
     * @test
     */
    public function the_restore_route_calls_the_restore_method(): void
    {
        $route = Route::getRoutes()->getByName('products.restore')->getActionName();
        $action = substr($route, strpos($route, '@') + 1);

        $this->assertEquals($action, 'restore');
    }
}
