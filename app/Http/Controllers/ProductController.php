<?php

namespace App\Http\Controllers;

use application\Http\Requests\CreateProductRequest;
use application\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class ProductController
{

    public function __construct(private readonly ProductRepository $productRepository)
    {
    }

    /**
     * Exibe a lista de produtos
     */
    public function index(Request $request)
    {
        $products = $this->productRepository->orderBy('id', 'asc')->paginate(10);

        return view('products.index')
            ->with('products', $products);
    }

    /**
     * Formulario para criar um produto
     */
    public function create()
    {
        $categories = Category::pluck('nome', 'id');
        return view('products.create', compact('categories'));
    }

    /**
     * Cria e salva o produto
     */
    public function store(CreateProductRequest $request)
    {
        try {

            $input = $request->all();

            if (!is_integer($input['category_id']) || $input['category_id'] <= 0) {
                throw new \InvalidArgumentException('O id de categoria deve ser um numero inteiro positivo,');
            }

            $category = Category::find($input['category_id']);

            if (!$category) {
                throw new \InvalidArgumentException('Categoria não encontrada.');
            }

            $product = $this->productRepository->create($input);

            Flash::success('Produto salvo com sucesso.');

            return redirect(route('products.index'));

        } catch (\InvalidArgumentException $e) {
            Flash::error($e->getMessage());
        } catch (\Exception $e) {
            Flash::error('Ocorreu um erro ao salvar o produto.');
        }

        return redirect(route('products.index'));
    }

    /**
     * Mostra o produto especificado
     */

    public function show($id)
    {
        try{
            if(!is_integer($id) || $id <= 0){
                throw new \InvalidArgumentException('Digite um valor valido.');
            }

            $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Produto não encontrado');
            return redirect(route('products.index'));
        }

        return view('products.show')->with('product', $product);

    }catch(\InvalidArgumentException $e){
        Flash::error($e->getMessage());
        } catch (\Exception $e) {
            Flash::error('Ocorreu um erro ao buscar o produto');
        }
        return redirect(route('products.index'));
    }

    /**
     * Formulario para editar um/o produto
     */
    public function edit($id)
    {
        $product = $this->productRepository->find($id);
        $categories = Category::pluck('nome', 'id');

        if (empty($product)) {
            Flash::error('Produto não encontrado');
            return redirect(route('products.index'));
        }

        return view('products.edit', compact('categories'))->with('product', $product);
    }

    /**
     * Atualiza o produto especificado
     */
    public function update($id, UpdateProductRequest $request)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Produto não encontrado');

            return redirect(route('products.index'));
        }

        $product = $this->productRepository->update($request->all(), $id);

        Flash::success('Produto atualizado com sucesso!');

        return redirect(route('products.index'));
    }

    /**
     * Deleta o produto especificado
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Produto não encontrado');

            return redirect(route('products.index'));
        }

        $this->productRepository->delete($id);

        Flash::success('Produto removido com sucesso!.');

        return redirect(route('products.index'));
    }

}
