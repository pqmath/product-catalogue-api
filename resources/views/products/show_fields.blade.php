<div class="col-sm-12">
    {!! Form::label('id', 'Id do produto:') !!}
    <p>{{ $product->id }}</p>
</div>

<!-- Nome Field -->
<div class="col-sm-12">
    {!! Form::label('nome', 'Nome:') !!}
    <p>{{ $product->nome }}</p>
</div>

<!-- Descricao Field -->
<div class="col-sm-12">
    {!! Form::label('descricao', 'Descricao:') !!}
    <p>{{ $product->descricao }}</p>
</div>

<!-- Preco Field -->
<div class="col-sm-12">
    {!! Form::label('preco', 'Preco:') !!}
    <p>{{ $product->preco }}</p>
</div>

<!-- Quantidade Field -->
<div class="col-sm-12">
    {!! Form::label('quantidade', 'Quantidade:') !!}
    <p>{{ $product->quantidade }}</p>
</div>

<!-- Category Id Field -->
<div class="col-sm-12">
    {!! Form::label('categoria', 'Categoria:') !!}
    <p>{{ $product->category->nome}}</p>
</div>
