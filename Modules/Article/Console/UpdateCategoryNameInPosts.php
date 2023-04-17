<?php

namespace Modules\Article\Console;

use Illuminate\Console\Command;
use Modules\Article\Entities\Post;

class UpdateCategoryNameInPosts extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'article:UpdateCategoryNameInPosts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the Category name in all the posts. It will be useful when we change the name of any category.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

    }
}
