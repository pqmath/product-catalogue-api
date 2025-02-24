<?php

namespace App\Http\Controllers;

use application\Http\Requests\CreatecategoryRequest;
use application\Http\Requests\UpdateCategoryRequest;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;


class CategoryController
{

    public function __construct(
        private readonly CategoryRepository $categoryRepository,
        private readonly ProductRepository $productRepository
    )
    {}

    /**
     * Exibe uma lista com as categorias.
     */
    public function index(Request $request)
    {
        $categories = $this->categoryRepository->orderBy('id', 'asc')->paginate(10);

        return view('categories.index')
            ->with('categories', $categories);
    }

    /**
     * Mostra a pagina para criar uma categoria.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Cria uma nova categoria.
     */
    public function store(CreatecategoryRequest $request)
    {
        $input = $request->all();

        $category = $this->categoryRepository->create($input);

        Flash::success('Categoria criada com sucesso.');

        return redirect(route('categories.index'));
    }

    /**
     * Exibe a categoria especificada.
     */
    public function show($id)
    {
        try{
            if(!is_integer($id) || $id <= 0){
                throw new \InvalidArgumentException('Digite um valor valido.');
            }

        $category = $this->categoryRepository->find($id);


        if (empty($category)) {
            Flash::error('Categoria não encontrada.');

            return redirect(route('categories.index'));
        }

        return view('categories.show')->with('category', $category);

    }catch(\InvalidArgumentException $e){
            Flash::error($e->getMessage());
        }catch (\Exception $e) {
            Flash::error('Ocorreu um erro ao buscar a categoria.');
        }
        return  redirect(route('categories.index'));
    }

    /**
     * Edita a categoria especificada.
     */
    public function edit($id)
    {
        $category = $this->categoryRepository->find($id);

        if($id <= 0){
            Flash::error('Digite um ID de categoria válido.');
            return redirect(route('categories.index'));
        }

        if (empty($category)) {
            Flash::error('Categoria não encontrada.');

            return redirect(route('categories.index'));
        }

        return view('categories.edit')->with('category', $category);
    }

    /**
     * Atualiza a categoria especificada.
     */
    public function update($id, UpdateCategoryRequest $request)
    {
        $category = $this->categoryRepository->find($id);

        if (empty($category)) {
            Flash::error('Categoria não encontrada.');

            return redirect(route('categories.index'));
        }

        $category = $this->categoryRepository->update($request->all(), $id);

        Flash::success('Categoria atualizada com sucesso.');

        return redirect(route('categories.index'));
    }

    /**
     * Remove a categoria especificada.
     * @param $id
     * @param $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy($id)
    {
        $category = $this->categoryRepository->find($id);

        if (empty($category)) {
            Flash::error('Categoria não encontrada.');

            return redirect(route('categories.index'));
        }

        $hasProduct = $this->productRepository->where('category_id', $id)->exists();

        if($hasProduct){
            Flash::error('Não é possível deletar esta categoria. Ainda há itens relacionados a ela');
            return redirect(route('categories.index'));
        }

        $this->categoryRepository->delete($id);

        Flash::success('Categoria removida com sucesso!');

        return redirect(route('categories.index'));
    }
}
