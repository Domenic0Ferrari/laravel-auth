<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{

    private $validations = [
        'title' => 'required|string|min:5|max:100',
        'url_image' => 'required|url|max:200',
        'content' => 'required|string',
    ];

    private $validation_messages = [

        // title
        'title.required' => 'Il campo titolo è obbligatorio',
        'title.min' => 'Il campo titolo deve avere almeno :min caratteri',
        'title.max' => 'Il campo titolo deve avere massimo :max caratteri',
        // url
        'url_image.required' => 'Il campo Immagine è obbligatorio',
        'url_image.url' => 'Il campo Immagine deve essere un url valido',
        'url_image.max' => 'Il campo Immagine deve avere massimo :max caratteri',
        // content
        'content.required' => 'Il campo Content è obbligatorio',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(5);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validare i dati del form
        $request->validate($this->validations, $this->validation_messages);

        // i dati li prendiamo da $request che contiente i dati che inseriramo nel form...Request contiene tutte le informazioni della richiesta dell'utente, tra cui i dati del form
        $data = $request->all();

        // salvare i dati nel database se validi
        $newPost = new Post();
        $newPost->title = $data['title'];
        $newPost->url_image = $data['url_image'];
        $newPost->content = $data['content'];
        // salvare i dati
        $newPost->save();

        // ridirezionare su una rotta di tipo get, la show è una rotta con parametri quindi bisogna passarlo, tramite array
        return to_route('admin.posts.show', ['post' => $newPost]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // bisogna passare i dati, ci pensa Laravel con la dependencie injection
        // da compact('post) deriva la variabile $post che abbiamo nell'edit
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate($this->validations, $this->validation_messages);

        $data = $request->all();
        // aggiornare i dati nel database se validi
        $post->title = $data['title'];
        $post->url_image = $data['url_image'];
        $post->content = $data['content'];
        // aggiornare i dati
        $post->update();
        // reindirizza alla pagina show
        return to_route('admin.posts.show', ['post' => $post]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return to_route('admin.posts.index')->with('delete_success', $post);
    }

    public function restore($id)
    {
    }
}
