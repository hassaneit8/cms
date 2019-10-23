<?php

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categor1 = Category::create([
            'name' => 'News'
        ]);
        $categor2 = Category::create([
            'name' => 'Marketing'
        ]);
        $categor3 = Category::create([
            'name' => 'product'
        ]);
        $categor4 = Category::create([
            'name' => 'Design'

        ]);

        $tag1 = Tag::create([
            'name' => 'Progress'

        ]);


        $tag2 = Tag::create([
            'name' => 'Customer'

        ]);


        $tag3 = Tag::create([
            'name' => 'Record'

        ]);

        $tag4 = Tag::create([
            'name' => 'Job'

        ]);


        $post1 = Post::create([
            'title' => 'We relocated our office to a new designed garage',
            'description' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'image' => 'posts/1.jpg',
            'category_id' => $categor1->id
        ]);
        $post2 = Post::create([
            'title' => 'Top 5 brilliant content marketing strategies',
            'description' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'image' => 'posts/2.jpg',
            'category_id' => $categor2->id
        ]);
        $post3 = Post::create([
            'title' => 'Best practices for minimalist design with example',
            'description' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit',
            'content' => 'Lorem Ipsum is simply dummy text of the printingindustry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'image' => 'posts/3.jpg',
            'category_id' => $categor3->id
        ]);
        $post4 = Post::create([
            'title' => 'Congratulate and thank to Maryam for joining our team',
            'description' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit',
            'content' => 'Lorem Ipsum is simply dummy text of the printingindustry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'image' => 'posts/4.jpg',
            'category_id' => $categor1->id
        ]);
        $post5 = Post::create([
            'title' => 'New published books to read by a product designer',
            'description' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit',
            'content' => 'Lorem Ipsum is simply dummy text of the printingindustry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'image' => 'posts/5.jpg',
            'category_id' => $categor2->id
        ]);
        $post6 = Post::create([
            'title' => 'This is why it\'s time to ditch dress codes at work',
            'description' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit',
            'content' => 'Lorem Ipsum is simply dummy text of the printingindustry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'image' => 'posts/6.jpg',
            'category_id' => $categor4->id
        ]);

        $post1->tags()->attach([$tag1->id, $tag3->id, $tag4->id,]);
        $post2->tags()->attach([$tag1->id, $tag3->id, ]);
        $post3->tags()->attach([$tag1->id,  $tag4->id,]);
        $post4->tags()->attach([$tag3->id, $tag4->id,]);
        $post5->tags()->attach([$tag1->id, $tag2->id, $tag4->id,]);
        $post6->tags()->attach([$tag1->id, $tag2->id,]);

    }
}
