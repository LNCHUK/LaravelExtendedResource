<?php

namespace LNCHUK\LaravelExtendedResource\Tests;

class ProductsController
{
    public function trashed()
    {
        return true;
    }

    public function delete($id)
    {
        return true;
    }

    public function restore()
    {
        return true;
    }
}
